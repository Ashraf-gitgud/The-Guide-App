import React, { useState, useEffect } from 'react';
import { Link } from 'react-router-dom';
import axiosInstance from '../../../services/axiosConfig';
import './HotelReservationList.css';

const HotelReservationList = () => {
    const [reservations, setReservations] = useState([]);
    const [loading, setLoading] = useState(true);
    const [error, setError] = useState(null);
    const $token = '1|pbItNuBQNB1lsns4T7T3emOSwNiy9ipWKAzIjPU05fe9ba94';

    useEffect(() => {
        fetchReservations();
    }, []);

    const fetchReservations = async () => {
        try {
            const response = await axiosInstance.get('/hotel_reservations', {
                headers: {
                    'Authorization': `Bearer ${$token}`
                }
            });
            // Handle object response
            if (response.data && typeof response.data === 'object') {
                // Convert object to array if needed
                const reservationsArray = Object.values(response.data);
                setReservations(reservationsArray[0]);
            } else {
                setReservations([]);
            }
            setLoading(false);
        } catch (err) {
            console.error('Error fetching reservations:', err);
            // Handle 404 as a valid case (no reservations found)
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
                await axiosInstance.delete(`/hotel_reservations/${id}`, {
                    headers: {
                        'Authorization': `Bearer ${$token}`
                    }
                });
                setReservations(reservations.filter(res => res.id !== id));
            } catch (err) {
                setError('Failed to delete reservation');
            }
        }
    };

    if (loading) return <div>Loading...</div>;
    
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
                        >
                            <h3>{reservation.hotel?.name || 'Hotel Name'}</h3>
                            <p>Room Type: {reservation.room_type}</p>
                            <p>People: {reservation.people_number}</p>
                            <p>Check-in: {new Date(reservation.start_date).toLocaleDateString()}</p>
                            <p>Check-out: {new Date(reservation.end_date).toLocaleDateString()}</p>
                            <p>Status: <span className={`status ${reservation.status}`}>{reservation.status}</span></p>
                            
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