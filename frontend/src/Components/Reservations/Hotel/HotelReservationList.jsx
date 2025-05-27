import React, { useState, useEffect } from 'react';
import { Link } from 'react-router-dom';
import axiosInstance from '../../../services/axiosConfig';
import './HotelReservationList.css';

const HotelReservationList = () => {
    const [reservations, setReservations] = useState([]);
    const [loading, setLoading] = useState(true);
    const [error, setError] = useState(null);

    useEffect(() => {
        fetchReservations();
    }, []);

    const fetchReservations = async () => {
        try {
            const response = await axiosInstance.get('/hotel_reservations');
            if (response.data && typeof response.data === 'object') {
                const reservationsArray = Object.values(response.data);
                setReservations(reservationsArray[0]);
            } else {
                setReservations([]);
            }
            setLoading(false);
        } catch (err) {
            console.error('Error fetching reservations:', err);
            if (err.response?.status === 404) {
                setReservations([]);
                setError(null);
            } else {
                setError('Failed to fetch reservations');
                setReservations([]);
            }
            setLoading(false);
        }
    };

    const handleDelete = async (id) => {
        if (window.confirm('Are you sure you want to delete this reservation?')) {
            try {
                await axiosInstance.delete(`/hotel_reservations/${id}`);
                setReservations(reservations.filter(res => res.id !== id));
            } catch (err) {
                setError('Failed to delete reservation');
            }
        }
    };

    const formatDate = (dateString) => {
        const options = { year: 'numeric', month: 'short', day: 'numeric' };
        return new Date(dateString).toLocaleDateString(undefined, options);
    };

    if (loading) return (
        <div className="loading-container">
            <div className="loading-spinner"></div>
            <p>Loading reservations...</p>
        </div>
    );

    return (
        <div className="reservation-list">
            <div className="reservation-header">
                <h2>Hotel Reservations</h2>
                <Link to="/reservations/hotel/new" className="new-reservation-btn">
                    New Reservation
                </Link>
            </div>
            
            {error && error !== 'No reservations found' && (
                <div className="error-message">{error}</div>
            )}
            
            {reservations.length === 0 ? (
                <div className="no-reservations">
                    <p>No reservations found.</p>
                    <p>Click the "New Reservation" button to create your first reservation.</p>
                </div>
            ) : (
                <div className="reservations-grid">
                    {reservations.map((reservation, index) => (
                        <div 
                            key={reservation.id || `reservation-${index}`} 
                            className="reservation-card"
                            data-status={reservation.status}
                        >
                            <h3>{reservation.hotel?.name || 'Hotel Name'}</h3>
                            <div className="reservation-details">
                                <p>
                                    <strong>Room Type:</strong> {reservation.room_type}
                                </p>
                                <p>
                                    <strong>People:</strong> {reservation.people_number}
                                </p>
                                <p>
                                    <strong>Check-in:</strong> {formatDate(reservation.start_date)}
                                </p>
                                <p>
                                    <strong>Check-out:</strong> {formatDate(reservation.end_date)}
                                </p>
                                <p>
                                    <strong>Status:</strong>{' '}
                                    <span className={`status ${reservation.status}`}>
                                        {reservation.status}
                                    </span>
                                </p>
                            </div>
                            
                            <div className="reservation-actions">
                                <Link 
                                    to={`/reservations/hotel/${reservation.id}`} 
                                    className="view-btn"
                                >
                                    View
                                </Link>
                                <Link 
                                    to={`/reservations/hotel/${reservation.id}/edit`} 
                                    className="edit-btn"
                                >
                                    Edit
                                </Link>
                                <button 
                                    onClick={() => handleDelete(reservation.id)}
                                    className="delete-btn"
                                >
                                    Delete
                                </button>
                            </div>
                        </div>
                    ))}
                </div>
            )}
        </div>
    );
};

export default HotelReservationList; 