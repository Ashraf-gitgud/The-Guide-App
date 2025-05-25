import React, { useState, useEffect } from 'react';
import { useParams, useNavigate } from 'react-router-dom';
import axiosInstance from '../../../services/axiosConfig';
import './HotelReservationForm.css';

const HotelReservationForm = () => {
    const { id } = useParams();
    const navigate = useNavigate();
    const isEditMode = Boolean(id);

    const $token = '1|pbItNuBQNB1lsns4T7T3emOSwNiy9ipWKAzIjPU05fe9ba94';

    // Separate state for each field
    const [hotelId, setHotelId] = useState('');
    const [peopleNumber, setPeopleNumber] = useState('');
    const [roomType, setRoomType] = useState('');
    const [startDate, setStartDate] = useState('');
    const [endDate, setEndDate] = useState('');
    const [status, setStatus] = useState('pending');

    const [hotels, setHotels] = useState([]);
    const [loading, setLoading] = useState(false);
    const [error, setError] = useState(null);
    const [validationErrors, setValidationErrors] = useState({});

    const roomTypes = [
        'single',
        'double',
        'twin',
        'connecting',
        'triple',
        'deluxe',
        'junior suite',
        'standard'
    ];

    useEffect(() => {
        fetchHotels();
        if (isEditMode) {
            fetchReservation();
        }
    }, [id]);

    const fetchHotels = async () => {
        try {
            const response = await axiosInstance.get('/hotels', {
                headers: {
                    'Authorization': `Bearer ${$token}`
                }
            });
            if (response.data && typeof response.data === 'object') {
                const hotelsArray = Object.values(response.data);
                setHotels(hotelsArray);
            } else {
                setHotels([]);
            }
        } catch (err) {
            setError('Failed to fetch hotels');
        }
    };

    const fetchReservation = async () => {
        try {
            const response = await axiosInstance.get(`/hotel_reservations/${id}`, {
                headers: {
                    'Authorization': `Bearer ${$token}`
                }
            });
            const reservation = response.data.reservation;
            if (reservation) {
                setHotelId(reservation.hotel_id || '');
                setPeopleNumber(reservation.people_number || '');
                setRoomType(reservation.room_type || '');
                setStartDate(reservation.start_date ? reservation.start_date.split('T')[0] : '');
                setEndDate(reservation.end_date ? reservation.end_date.split('T')[0] : '');
                setStatus(reservation.status || 'pending');
            }
        } catch (err) {
            setError('Failed to fetch reservation details');
        }
    };

    const handleSubmit = async (e) => {
        e.preventDefault();
        setLoading(true);
        setError(null);
        setValidationErrors({});

        const formData = {
            hotel_id: parseInt(hotelId),
            people_number: parseInt(peopleNumber),
            room_type: roomType,
            start_date: startDate,
            end_date: endDate,
            status: status
        };
        console.log(formData); 

        try {
            if (isEditMode) {
                await axiosInstance.put(`/hotel_reservations/${id}`, formData, {
                    headers: {
                        'Authorization': `Bearer ${$token}`
                    }
                });
            } else {
                await axiosInstance.post('/hotel_reservations', formData, {
                    headers: {
                        'Authorization': `Bearer ${$token}`
                    }
                });
            }
            navigate('/reservations/hotel');
        } catch (err) {
            if (err.response?.status === 422) {
                setValidationErrors(err.response.data.errors || {});
                setError('Please correct the validation errors below');
            } else {
                setError(err.response?.data?.message || 'Failed to save reservation');
                console.log(err.response?.data)
            }
        } finally {
            setLoading(false);
        }
    };

    return (
        <div className="reservation-form-container">
            <h2>{isEditMode ? 'Edit Reservation' : 'New Reservation'}</h2>
            
            {error && <div className="error-message">{error}</div>}
            
            <form onSubmit={handleSubmit} className="reservation-form">
                <div className="form-group">
                    <label htmlFor="hotel_id">Hotel</label>
                    <select
                        id="hotel_id"
                        value={hotelId}
                        onChange={(e) => setHotelId(e.target.value)}
                        required
                        className={validationErrors.hotel_id ? 'error' : ''}
                    >
                        <option value="">Select a hotel</option>
                        {hotels.map((hotel) => (
                            <option key={hotel.hotel_id} value={hotel.hotel_id}>
                                {hotel.name}
                            </option>
                        ))}
                    </select>
                    {validationErrors.hotel_id && (
                        <div className="validation-error">{validationErrors.hotel_id[0]}</div>
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
                        required
                        className={validationErrors.people_number ? 'error' : ''}
                    />
                    {validationErrors.people_number && (
                        <div className="validation-error">{validationErrors.people_number[0]}</div>
                    )}
                </div>

                <div className="form-group">
                    <label htmlFor="room_type">Room Type</label>
                    <select
                        id="room_type"
                        value={roomType}
                        onChange={(e) => setRoomType(e.target.value)}
                        required
                        className={validationErrors.room_type ? 'error' : ''}
                    >
                        <option value="">Select room type</option>
                        {roomTypes.map(type => (
                            <option key={type} value={type}>
                                {type.charAt(0).toUpperCase() + type.slice(1)}
                            </option>
                        ))}
                    </select>
                    {validationErrors.room_type && (
                        <div className="validation-error">{validationErrors.room_type[0]}</div>
                    )}
                </div>

                <div className="form-group">
                    <label htmlFor="start_date">Check-in Date</label>
                    <input
                        type="date"
                        id="start_date"
                        value={startDate}
                        onChange={(e) => setStartDate(e.target.value)}
                        required
                        className={validationErrors.start_date ? 'error' : ''}
                    />
                    {validationErrors.start_date && (
                        <div className="validation-error">{validationErrors.start_date[0]}</div>
                    )}
                </div>

                <div className="form-group">
                    <label htmlFor="end_date">Check-out Date</label>
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

                {isEditMode && (
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
                        onClick={() => navigate('/reservations/hotel')}
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
    );
};

export default HotelReservationForm; 