import React, { useState, useEffect, useCallback } from 'react';
import { useParams, useNavigate } from 'react-router-dom';
import Select from 'react-select';
import axiosInstance from '../../../services/axiosConfig';
import './GuideReservationForm.css';

const GuideReservationForm = () => {
    const { id, place_id } = useParams();
    const navigate = useNavigate();
    const isEditMode = Boolean(id);   
    const isAddMode = !isEditMode ? true : false;

    const userId = localStorage.getItem('user_id');

    // Separate state for each field
    const [guideId, setGuideId] = useState('');
    const [guideName, setGuideName] = useState('');
    const [peopleNumber, setPeopleNumber] = useState('');
    const [startDate, setStartDate] = useState('');
    const [endDate, setEndDate] = useState('');
    const [time, setTime] = useState('');
    const [location, setLocation] = useState('');
    const [status, setStatus] = useState('pending');
     
    const [isNotTourist, setIsNotTourist] = useState(true);
    const [guides, setGuides] = useState([]);
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
            fetchGuides();
            fetchPlaces();
        }
    }, [id, userId, navigate, isEditMode, isAddMode]);

    const fetchPlaces = async () => {
        try {
            const response = await axiosInstance.get(`/attractions/${place_id}`);
            setLocation(response.data.location)
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

    const fetchGuides = async () => {
        try {
            const response = await axiosInstance.get('/guides');
            if (response.data) {
                const allGuides = response.data;
                
                const availableGuides = allGuides.filter(driver => {
                    if (driver.status === 'pending' || driver.status === 'cancelled') return false;
                    else return true;
                });

                const formattedGuides = availableGuides.map(guide => ({
                    value: guide.guide_id,
                    label: guide.full_name
                }));
                setGuides(formattedGuides);
            }
        } catch (err) {
            setError('Failed to fetch guides');
        }
    };


    const fetchReservation = useCallback(async () => {
        try {
            const response = await axiosInstance.get(`/guide_reservations/${id}`);
            const reservation = response.data.reservation;
            if (reservation) {
                setGuideId(reservation.guide_id || '');
                setGuideName(reservation.guide.full_name || '');
                setPeopleNumber(reservation.people_number || '');
                setStartDate(reservation.start_date ? reservation.start_date.split('T')[0] : '');
                setEndDate(reservation.end_date ? reservation.end_date.split('T')[0] : '');
                setTime(reservation.time || '');
                setLocation(reservation.location || '');
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
            guide_id: parseInt(guideId),
            people_number: parseInt(peopleNumber),
            start_date: startDate,
            end_date: endDate,
            time: time,
            location: location,
            status: status,
            user_id: parseInt(userId)
        };

        try {
            if (isEditMode) {
                await axiosInstance.put(`/guide_reservations/${id}`, formData);
                alert('Guide reservation updated successfully!');
                navigate('/tourist');
            } else {
                await axiosInstance.post('/guide_reservations', formData);
                alert('Guide reservation created successfully!');
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
            border: validationErrors.guide_id ? '1px solid #dc3545' : '1px solid #ddd',
            '&:hover': {
                border: validationErrors.guide_id ? '1px solid #dc3545' : '1px solid #4a90e2'
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
                <h2>Guide Reservations</h2>
            </div>
            <div className="reservation-form-container">
                <h2>{isEditMode ? 'Edit Reservation' : 'New Reservation'}</h2>
                
                {error && <div className="error-message">{error}</div>}
                
                <form onSubmit={handleSubmit} className="reservation-form">
                    {isEditMode && (
                        <div className="form-group">
                            <label htmlFor="guide">Guide</label>
                            <input 
                                id='guide'
                                type="text" 
                                value={guideName} 
                                disabled
                            />
                        </div>
                    )}
                    {isAddMode && (
                        <div className="form-group">
                            <label htmlFor="guide">Select Guide</label>
                            <Select
                                id="guide"
                                value={guides.find(guide => guide.value === parseInt(guideId)) || null}
                                onChange={(selected) => {
                                    setGuideId(selected ? selected.value : '');
                                    setGuideName(selected ? selected.label : '');
                                }}
                                options={guides}
                                placeholder="Search for a guide..."
                                isClearable
                                isSearchable
                                required
                                styles={customStyles}
                                className={validationErrors.guide_id ? 'error' : ''}
                            />
                            {validationErrors.guide_id && (
                                <div className="validation-error">{validationErrors.guide_id[0]}</div>
                            )}
                        </div>
                    )}

                    <div className="form-group">
                        <label htmlFor="people_number">Number of People</label>
                        <input
                            type="number"
                            id="people_number"
                            value={peopleNumber}
                            onChange={(e) => setPeopleNumber(e.target.value)}
                            min="1"
                            max="27"
                            required
                            className={validationErrors.people_number ? 'error' : ''}
                        />
                        {validationErrors.people_number && (
                            <div className="validation-error">{validationErrors.people_number[0]}</div>
                        )}
                    </div>

                    <div className="form-group">
                        <label htmlFor="start_date">Start Date</label>
                        <input
                            type="date"
                            id="start_date"
                            value={startDate}
                            onChange={(e) => setStartDate(e.target.value)}
                            min={today}
                            required
                            className={validationErrors.start_date ? 'error' : ''}
                        />
                        {validationErrors.start_date && (
                            <div className="validation-error">{validationErrors.start_date[0]}</div>
                        )}
                    </div>

                    <div className="form-group">
                        <label htmlFor="end_date">End Date</label>
                        <input
                            type="date"
                            id="end_date"
                            value={endDate}
                            onChange={(e) => setEndDate(e.target.value)}
                            required
                            className={validationErrors.end_date ? 'error' : ''}
                        />
                        {validationErrors.end_date && (
                            <div className="validation-error">{validationErrors.end_date[0]}</div>
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
                        <label htmlFor="location">Location</label>
                        <input
                            type="text"
                            id="location"
                            value={location}
                            onChange={(e) => setLocation(e.target.value)}
                            required
                            className={validationErrors.location ? 'error' : ''}
                        />
                        {validationErrors.location && (
                            <div className="validation-error">{validationErrors.location[0]}</div>
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

export default GuideReservationForm; 