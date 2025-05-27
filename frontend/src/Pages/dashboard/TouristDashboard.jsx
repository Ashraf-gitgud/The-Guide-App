import React, { useState, useEffect } from 'react';
import { useNavigate } from 'react-router-dom';
import axiosInstance from '../../services/axiosConfig';
import './TouristDashboard.css';

const TouristDashboard = () => {
    const navigate = useNavigate();
    const userId = localStorage.getItem('user_id');
    const [userData, setUserData] = useState(null);
    const [reservations, setReservations] = useState({
        hotel_reservations: [],
        restaurant_reservations: [],
        driver_reservations: [],
        guide_reservations: []
    });
    const [loading, setLoading] = useState(true);
    const [error, setError] = useState(null);
    const [noReservations, setNoReservations] = useState(false);

    useEffect(() => {
        if (!userId) {
            navigate('/login');
            return;
        }
        fetchUserData();
    }, [userId, navigate]);

    const fetchUserData = async () => {
        try {
            const response = await axiosInstance.get(`/reservations/user/${userId}`);
            setUserData(response.data.user);
            setReservations(response.data.reservations);
            setNoReservations(false);
            setError(null);
        } catch (err) {
            if (err.response?.status === 404) {
                if (err.response.data.message === 'User not found') {
                    setError('User account not found. Please contact support.');
                    // Optionally redirect to login or registration
                    // navigate('/login');
                } else if (err.response.data.message === 'No reservations found for this user') {
                    setUserData(err.response.data.user);
                    setNoReservations(true);
                    setError(null);
                }
            } else {
                setError('Failed to fetch user data. Please try again later.');
            }
            console.error(err);
        } finally {
            setLoading(false);
        }
    };

    const formatDate = (dateString) => {
        return new Date(dateString).toLocaleDateString();
    };

    const getStatusColor = (status) => {
        switch (status) {
            case 'confirmed':
                return 'status-confirmed';
            case 'pending':
                return 'status-pending';
            case 'cancelled':
                return 'status-cancelled';
            default:
                return '';
        }
    };

    if (loading) return <div className="loading">Loading...</div>;
    if (error) return <div className="error">{error}</div>;

    return (
        <div className="dashboard">
            <div className="dashboard-header">
                <h1>Tourist Dashboard</h1>
            </div>

            <div className="dashboard-content">
                {userData && (
                    <div className="profile-section">
                        <h2>Profile Information</h2>
                        <div className="profile-info">
                            <div className="info-group">
                                <label>Name:</label>
                                <span>{userData.name}</span>
                            </div>
                            <div className="info-group">
                                <label>Email:</label>
                                <span>{userData.email}</span>
                            </div>
                            <div className="info-group">
                                <label>Phone:</label>
                                <span>{userData.phone}</span>
                            </div>
                        </div>
                    </div>
                )}

                <div className="reservations-section">
                    <h2>My Reservations</h2>

                    {noReservations ? (
                        <div className="no-reservations-container">
                            <p className="no-reservations-message">You haven't made any reservations yet.</p>
                            <div className="reservation-actions">
                                <button 
                                    className="action-button"
                                    onClick={() => navigate('/hotels')}
                                >
                                    Book a Hotel
                                </button>
                                <button 
                                    className="action-button"
                                    onClick={() => navigate('/guides')}
                                >
                                    Hire a Guide
                                </button>
                                <button 
                                    className="action-button"
                                    onClick={() => navigate('/drivers')}
                                >
                                    Book a Driver
                                </button>
                            </div>
                        </div>
                    ) : (
                        <>
                            {/* Hotel Reservations */}
                            <div className="reservation-category">
                                <h3>Hotel Reservations</h3>
                                {reservations.hotel_reservations.length > 0 ? (
                                    <div className="reservation-list">
                                        {reservations.hotel_reservations.map(reservation => (
                                            <div key={reservation.id} className="reservation-card">
                                                <h4>{reservation.hotel.name}</h4>
                                                <div className="reservation-details">
                                                    <p>Check-in: {formatDate(reservation.start_date)}</p>
                                                    <p>Check-out: {formatDate(reservation.end_date)}</p>
                                                    <p>Room Type: {reservation.room_type}</p>
                                                    <p>Guests: {reservation.people_number}</p>
                                                    <p className={`status ${getStatusColor(reservation.status)}`}>
                                                        {reservation.status}
                                                    </p>
                                                </div>
                                            </div>
                                        ))}
                                    </div>
                                ) : (
                                    <p className="no-reservations">No hotel reservations found</p>
                                )}
                            </div>

                            {/* Guide Reservations */}
                            <div className="reservation-category">
                                <h3>Guide Reservations</h3>
                                {reservations.guide_reservations.length > 0 ? (
                                    <div className="reservation-list">
                                        {reservations.guide_reservations.map(reservation => (
                                            <div key={reservation.id} className="reservation-card">
                                                <h4>{reservation.guide.full_name}</h4>
                                                <div className="reservation-details">
                                                    <p>Date: {formatDate(reservation.start_date)}</p>
                                                    <p>Time: {reservation.time}</p>
                                                    <p>Location: {reservation.location}</p>
                                                    <p>People: {reservation.people_number}</p>
                                                    <p className={`status ${getStatusColor(reservation.status)}`}>
                                                        {reservation.status}
                                                    </p>
                                                </div>
                                            </div>
                                        ))}
                                    </div>
                                ) : (
                                    <p className="no-reservations">No guide reservations found</p>
                                )}
                            </div>

                            {/* Driver Reservations */}
                            <div className="reservation-category">
                                <h3>Driver Reservations</h3>
                                {reservations.driver_reservations.length > 0 ? (
                                    <div className="reservation-list">
                                        {reservations.driver_reservations.map(reservation => (
                                            <div key={reservation.id} className="reservation-card">
                                                <h4>{reservation.driver.full_name}</h4>
                                                <div className="reservation-details">
                                                    <p>Date: {formatDate(reservation.date)}</p>
                                                    <p>Time: {reservation.time}</p>
                                                    <p>From: {reservation.start_place}</p>
                                                    <p>To: {reservation.end_place}</p>
                                                    <p>People: {reservation.people_number}</p>
                                                    <p className={`status ${getStatusColor(reservation.status)}`}>
                                                        {reservation.status}
                                                    </p>
                                                </div>
                                            </div>
                                        ))}
                                    </div>
                                ) : (
                                    <p className="no-reservations">No driver reservations found</p>
                                )}
                            </div>

                            {/* Restaurant Reservations */}
                            <div className="reservation-category">
                                <h3>Restaurant Reservations</h3>
                                {reservations.restaurant_reservations.length > 0 ? (
                                    <div className="reservation-list">
                                        {reservations.restaurant_reservations.map(reservation => (
                                            <div key={reservation.id} className="reservation-card">
                                                <h4>{reservation.restaurant.name}</h4>
                                                <div className="reservation-details">
                                                    <p>Date: {formatDate(reservation.date)}</p>
                                                    <p>Time: {reservation.time}</p>
                                                    <p>People: {reservation.people_number}</p>
                                                    <p className={`status ${getStatusColor(reservation.status)}`}>
                                                        {reservation.status}
                                                    </p>
                                                </div>
                                            </div>
                                        ))}
                                    </div>
                                ) : (
                                    <p className="no-reservations">No restaurant reservations found</p>
                                )}
                            </div>
                        </>
                    )}
                </div>
            </div>
        </div>
    );
};

export default TouristDashboard; 