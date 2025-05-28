import React, { useState, useEffect, useCallback } from 'react';
import { useParams, useNavigate } from 'react-router-dom';
import Select from 'react-select';
import axiosInstance from '../../../services/axiosConfig';
import './DriverReservationForm.css';

const DriverReservationForm = () => {
    const { id, place_id } = useParams();
    const navigate = useNavigate();
    const isEditMode = Boolean(id);   
    const isAddMode = !isEditMode ? true : false;
    const userId = localStorage.getItem('user_id');

    // Separate state for each field
    const [driverId, setDriverId] = useState('');
    const [driverName, setDriverName] = useState('');
    const [date, setDate] = useState('');
    const [time, setTime] = useState('');
    const [startPlace, setStartPlace] = useState('');
    const [endPlace, setEndPlace] = useState('');
    const [peopleNumber, setPeopleNumber] = useState('');
    const [status, setStatus] = useState('pending');
     
    const [isNotTourist, setIsNotTourist] = useState(true);
    const [drivers, setDrivers] = useState([]);
    const [loading, setLoading] = useState(false);
    const [error, setError] = useState(null);
    const [validationErrors, setValidationErrors] = useState({});

    useEffect(() => {
        if (!userId) {
            navigate('/login');
            return;
        }
        if (isEditMode) {
            fetchUsers();
            fetchReservation();
        }
        if (isAddMode) {
            fetchPlaces();
            fetchDrivers();
        }
    }, [id, userId, navigate, isEditMode, isAddMode]);

    // Add new useEffect for date changes
    useEffect(() => {
        if (isAddMode && date) {
            fetchDrivers();
        }
    }, [date, isAddMode]);

    const fetchDrivers = async () => {
        try {
            const response = await axiosInstance.get('/drivers');
            if (response.data) {
                const allDrivers = response.data;
                
                const availableDrivers = allDrivers.filter(driver => {
                    if (driver.status === 'pending' || driver.status === 'cancelled') return false;
                    else return true;
                });

                const formattedDrivers = availableDrivers.map(driver => ({
                    value: driver.driver_id,
                    label: driver.full_name
                }));
                setDrivers(formattedDrivers);
            }
        } catch (err) {
            setError('Failed to fetch drivers');
        }
    };
    const fetchPlaces = async () => {
        try {
            const response = await axiosInstance.get(`/attractions/${place_id}`);
            setEndPlace(response.data.location)
        } catch (err) {
            setError('Failed to fetch place');
        }
    };
    const fetchUsers = async () => {
        try {
            const response = await axiosInstance.get(`/users/${userId}`);
            if(!response.data.role === 'tourist'){
                setIsNotTourist(false);
            }
        } catch (err) {
            setError('Failed to fetch user');
        }
    };


    const fetchReservation = useCallback(async () => {
        try {
            const response = await axiosInstance.get(`/driver_reservations/${id}`);
            const reservation = response.data.reservation;
            if (reservation) {
                setDriverId(reservation.driver_id || '');
                setDriverName(reservation.driver.full_name || '');
                setDate(reservation.date ? reservation.date.split('T')[0] : '');
                setTime(reservation.time || '');
                setStartPlace(reservation.start_place || '');
                setEndPlace(reservation.end_place || '');
                setPeopleNumber(reservation.people_number || '');
                setStatus(reservation.status || 'pending');
            }
        } catch (err) {
            setError('Failed to fetch reservation details');
        }
    }, [id]);

    const handleSubmit = async (e) => {
        e.preventDefault();
        setLoading(true);
        setError(null);
        setValidationErrors({});

        const formData = {
            driver_id: parseInt(driverId),
            date: date,
            time: time,
            start_place: startPlace,
            end_place: endPlace,
            people_number: parseInt(peopleNumber),
            status: status,
            user_id: parseInt(userId)
        };

        try {
            if (isEditMode) {
                await axiosInstance.put(`/driver_reservations/${id}`, formData);
                alert('Driver reservation updated successfully!');
                navigate('/tourist');
            } else {
                await axiosInstance.post('/driver_reservations', formData);
                alert('Driver reservation created successfully!');
                navigate('/'); // Navigate to homepage
            }
        } catch (err) {
            if (err.response?.status === 422) {
                setValidationErrors(err.response.data.errors || {});
                setError('Please correct the validation errors below');
            } else {
                setError(err.response?.data?.message || 'Failed to save reservation');
                console.log(err.response?.data?.error)
            }
        } finally {
            setLoading(false);
        }
    };

    const customStyles = {
        control: (base) => ({
            ...base,
            minHeight: '45px',
            border: validationErrors.driver_id ? '1px solid #dc3545' : '1px solid #ddd',
            '&:hover': {
                border: validationErrors.driver_id ? '1px solid #dc3545' : '1px solid #4a90e2'
            }
        }),
        option: (base, state) => ({
            ...base,
            backgroundColor: state.isFocused ? '#f0f0f0' : 'white',
            color: '#333',
            '&:hover': {
                backgroundColor: '#e6e6e6'
            }
        })
    };

    // Get today's date in YYYY-MM-DD format for the date input min attribute
    const today = new Date().toISOString().split('T')[0];

    return (
        <div className="reservation">
            <div className="reservation-header">
                <h2>Driver Reservations</h2>
            </div>
            <div className="reservation-form-container">
                <h2>{isEditMode ? 'Edit Reservation' : 'New Reservation'}</h2>
                
                {error && <div className="error-message">{error}</div>}
                
                <form onSubmit={handleSubmit} className="reservation-form">
                    {isEditMode && (
                        <div className="form-group">
                            <label htmlFor="driver">Driver</label>
                            <input 
                                id='driver'
                                type="text" 
                                value={driverName} 
                                disabled
                            />
                        </div>
                    )}
                    {isAddMode && (
                        <div className="form-group">
                            <label htmlFor="driver">Select Driver</label>
                            <Select
                                id="driver"
                                value={drivers.find(driver => driver.value === parseInt(driverId)) || null}
                                onChange={(selected) => {
                                    setDriverId(selected ? selected.value : '');
                                    setDriverName(selected ? selected.label : '');
                                }}
                                options={drivers}
                                placeholder="Search for a driver..."
                                isClearable
                                isSearchable
                                required
                                styles={customStyles}
                                className={validationErrors.driver_id ? 'error' : ''}
                            />
                            {validationErrors.driver_id && (
                                <div className="validation-error">{validationErrors.driver_id[0]}</div>
                            )}
                        </div>
                    )}

                    <div className="form-group">
                        <label htmlFor="date">Date</label>
                        <input
                            type="date"
                            id="date"
                            value={date}
                            onChange={(e) => setDate(e.target.value)}
                            min={today}
                            required
                            className={validationErrors.date ? 'error' : ''}
                        />
                        {validationErrors.date && (
                            <div className="validation-error">{validationErrors.date[0]}</div>
                        )}
                    </div>

                    <div className="form-group">
                        <label htmlFor="time">Time</label>
                        <input
                            type="time"
                            id="time"
                            value={time}
                            onChange={(e) => setTime(e.target.value)}
                            required
                            className={validationErrors.time ? 'error' : ''}
                        />
                        {validationErrors.time && (
                            <div className="validation-error">{validationErrors.time[0]}</div>
                        )}
                    </div>

                    <div className="form-group">
                        <label htmlFor="start_place">Start Place</label>
                        <input
                            type="text"
                            id="start_place"
                            value={startPlace}
                            onChange={(e) => setStartPlace(e.target.value)}
                            required
                            className={validationErrors.start_place ? 'error' : ''}
                        />
                        {validationErrors.start_place && (
                            <div className="validation-error">{validationErrors.start_place[0]}</div>
                        )}
                    </div>

                    <div className="form-group">
                        <label htmlFor="end_place">End Place</label>
                        <input
                            type="text"
                            id="end_place"
                            value={endPlace}
                            onChange={(e) => setEndPlace(e.target.value)}
                            required
                            className={validationErrors.end_place ? 'error' : ''}
                        />
                        {validationErrors.end_place && (
                            <div className="validation-error">{validationErrors.end_place[0]}</div>
                        )}
                    </div>

                    <div className="form-group">
                        <label htmlFor="people_number">Number of People</label>
                        <input
                            type="number"
                            id="people_number"
                            value={peopleNumber}
                            onChange={(e) => setPeopleNumber(e.target.value)}
                            min="1"
                            max="6"
                            required
                            className={validationErrors.people_number ? 'error' : ''}
                        />
                        {validationErrors.people_number && (
                            <div className="validation-error">{validationErrors.people_number[0]}</div>
                        )}
                    </div>

                    {!isNotTourist && isEditMode && (
                        <div className="form-group">
                            <label htmlFor="status">Status</label>
                            <select
                                id="status"
                                value={status}
                                onChange={(e) => setStatus(e.target.value)}
                            >
                                <option value="pending">Pending</option>
                                <option value="confirmed">Confirmed</option>
                                <option value="cancelled">Cancelled</option>
                            </select>
                        </div>
                    )}

                    <div className="form-actions">
                        <button 
                            type="button" 
                            onClick={() => navigate('/tourist')}
                            className="cancel-btn"
                        >
                            Cancel
                        </button>
                        <button 
                            type="submit" 
                            disabled={loading}
                            className="submit-btn"
                        >
                            {loading ? 'Saving...' : isEditMode ? 'Update' : 'Create'}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    );
};

export default DriverReservationForm; 