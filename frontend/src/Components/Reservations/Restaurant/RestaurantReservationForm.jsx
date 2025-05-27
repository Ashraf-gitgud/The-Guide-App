import React, { useState, useEffect, useCallback } from 'react';
import { useParams, useNavigate } from 'react-router-dom';
import axiosInstance from '../../../services/axiosConfig';
import './RestaurantReservationForm.css';

const RestaurantReservationForm = () => {
    const { id, restaurant_id } = useParams();
    const navigate = useNavigate();
    
    const isEditMode = Boolean(id);
    const isAddMode = Boolean(restaurant_id);
    
    
    const userId = localStorage.getItem('user_id');

    // Separate state for each field
    const [restaurantId, setRestaurantId] = useState('');
    const [restaurantName, setRestaurantName] = useState('');
    const [peopleNumber, setPeopleNumber] = useState('');
    const [reservationDate, setReservationDate] = useState('');
    const [reservationTime, setReservationTime] = useState('');
    const [status, setStatus] = useState('pending');

    const [restaurant, setRestaurant] = useState([]);
    const [loading, setLoading] = useState(false);
    const [error, setError] = useState(null);
    const [validationErrors, setValidationErrors] = useState({});

    useEffect(() => {
        
        if (!userId) {
            navigate('/login');
            return;
        }
        
        if (isEditMode) {
            fetchReservation();
        }
        if (isAddMode) {
            fetchRestaurant();
            setRestaurantId(restaurant_id);
        }
    }, [id, userId, navigate, isEditMode, isAddMode, restaurant_id]);

    const fetchRestaurant = async () => {
        try {
            const response = await axiosInstance.get(`/restaurants/${restaurant_id}`);
            
            if (response.data) {
                setRestaurant(response.data);
            } else {
                setRestaurant([]);
            }
        } catch (err) {
            setError('Failed to fetch restaurant');
        }
    };

    const fetchReservation = useCallback(async () => {
        try {
            const response = await axiosInstance.get(`/restaurant_reservations/${id}`);
            const reservation = response.data.reservation;
            if (reservation) {
                setRestaurantId(reservation.restaurant_id || '');
                setRestaurantName(reservation.restaurant.name || '');
                setPeopleNumber(reservation.people_number || '');
                setReservationDate(reservation.date ? reservation.date.split('T')[0] : '');
                setReservationTime(reservation.time || '');
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
            restaurant_id: parseInt(restaurantId),
            people_number: parseInt(peopleNumber),
            date: reservationDate,
            time: reservationTime,
            status: status,
            user_id: parseInt(userId)
        };

        try {
            if (isEditMode) {
                await axiosInstance.put(`/restaurant_reservations/${id}`, formData);
                alert('Restaurant reservation updated successfully!');
            } else {
                await axiosInstance.post('/restaurant_reservations', formData);
                alert('Restaurant reservation created successfully!');
                navigate('/');
            }
            
        } catch (err) {
            if (err.response?.status === 422) {
                console.log(err)
                setValidationErrors(err.response.data.errors || {});
                setError('Please correct the validation errors below');
            } else {
                setError(err.response?.data?.message || 'Failed to save reservation');
            }
        } finally {
            setLoading(false);
        }
    };
    return (
        <div className="reservation">
            <div className="reservation-header">
                <h2>Restaurant Reservations</h2>
            </div>
            <div className="reservation-form-container">
                <h2>{isEditMode ? 'Edit Reservation' : 'New Reservation'}</h2>
                
                {error && <div className="error-message">{error}</div>}
                
                <form onSubmit={handleSubmit} className="reservation-form">
                    {isEditMode && (
                        <div className="form-group">
                            <label htmlFor="restaurant">Restaurant</label>
                            <input 
                                id="restaurant" 
                                type="text" 
                                value={restaurantName} 
                                disabled
                            />
                        </div>
                    )}
                    {isAddMode && (
                        <div className="form-group">
                            <label htmlFor="restaurant">Restaurant</label>
                            <input 
                                id="restaurant"
                                type="text" 
                                value={restaurant?.name || ''} 
                                disabled
                            />
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
                            required
                            className={validationErrors.people_number ? 'error' : ''}
                        />
                        {validationErrors.people_number && (
                            <div className="validation-error">{validationErrors.people_number[0]}</div>
                        )}
                    </div>
    
                    <div className="form-group">
                        <label htmlFor="reservation_date">Reservation Date</label>
                        <input
                            type="date"
                            id="reservation_date"
                            value={reservationDate}
                            onChange={(e) => setReservationDate(e.target.value)}
                            required
                            className={validationErrors.date ? 'error' : ''}
                        />
                        {validationErrors.date && (
                            <div className="validation-error">{validationErrors.date[0]}</div>
                        )}
                    </div>
    
                    <div className="form-group">
                        <label htmlFor="reservation_time">Reservation Time </label>
                        <input
                            type="time"
                            id="reservation_time"
                            value={reservationTime}
                            onChange={(e) => setReservationTime(e.target.value)}
                            required
                            className={validationErrors.time ? 'error' : ''}
                        />
                        {validationErrors.time && (
                            <div className="validation-error">{validationErrors.time[0]}</div>
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
                            onClick={() => navigate('/reservations/restaurant')}
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

export default RestaurantReservationForm; 