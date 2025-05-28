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

    const handleEdit = (type, id) => {
        switch(type) {
            case 'hotel':
                navigate(`/reservations/hotel/${id}/edit`);
                break;
            case 'restaurant':
                navigate(`/reservations/restaurant/${id}/edit`);
                break;
            case 'guide':
                navigate(`/reservations/guide/${id}/edit`);
                break;
            case 'driver':
                navigate(`/reservations/driver/${id}/edit`);
                break;
            default:
                break;
        }
    };

    const handleDelete = async (type, id) => {
        if (window.confirm('Are you sure you want to cancel this reservation?')) {
            try {
                await axiosInstance.delete(`/${type}_reservations/${id}`);
                // Refresh the data after deletion
                fetchUserData();
            } catch (err) {
                console.error('Error deleting reservation:', err);
                setError('Failed to cancel reservation. Please try again later.');
            }
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
        <div className="touristdashboard">
            <div className="touristdashboard-header">
                <h1>Tourist Dashboard</h1>
            </div>

            <div className="touristdashboard-content">
                {userData && (
                    <div className="profil-section">
                        <h2>Profile Information</h2>
                        <div className="profil-info">
                            <div className="info-group">
                                <label>Name:</label>
                                <span>{userData.full_name}</span>
                            </div>
                            <div className="info-group">
                                <label>Email:</label>
                                <span>{userData.email}</span>
                            </div>
                            <div className="info-group">
                                <label>Phone:</label>
                                <span>{userData.phone_number}</span>
                            </div>
                        </div>
                        <div className="profil">
                            <img src={userData.user.profile} alt="Profile" className="profil-image" />
                        </div>
                    </div>
                )}

                <div className="reservations-section">
                    <h2>My Reservations</h2>

                    {noReservations ? (
                        <div className="no-reservations-container">
                            <p className="no-reservations-message">You haven't made any reservations yet.</p>
                            <div className="no-reservations-actions">
                                <button 
                                    className="action-button"
                                    onClick={() => navigate('/')}
                                >
                                    Book a Hotel or restaurant
                                </button>
                                <button 
                                    className="action-button"
                                    onClick={() => navigate('/attractions')}
                                >
                                    Hire a Guide or Driver
                                </button>
                            </div>
                        </div>
                    ) : (
                        <>
                            {/* Hotel Reservations */}
                            <div className="reservations-category">
                                <h3>Hotel Reservations</h3>
                                {reservations.hotel_reservations.length > 0 ? (
                                    <div className="reservations-list">
                                        {reservations.hotel_reservations.map(reservation => (
                                            <div key={reservation.id} className="reservations-card" data-status={reservation.status}>
                                                <h4>{reservation.hotel.name}</h4>
                                                <div className="reservations-details">
                                                    <p>Check-in: {formatDate(reservation.start_date)}</p>
                                                    <p>Check-out: {formatDate(reservation.end_date)}</p>
                                                    <p>Room Type: {reservation.room_type}</p>
                                                    <p>Guests: {reservation.people_number}</p>
                                                    <p className={`status-rservation ${getStatusColor(reservation.status)}`}>
                                                        {reservation.status}
                                                    </p>
                                                </div>
                                                <div className="reservations-actions">
                                                    <button 
                                                        className="edit-btn"
                                                        onClick={() => handleEdit('hotel', reservation.id)}
                                                    >
                                                        Edit
                                                    </button>
                                                    <button 
                                                        className="delete-btn"
                                                        onClick={() => handleDelete('hotel', reservation.id)}
                                                    >
                                                        Cancel
                                                    </button>
                                                </div>
                                            </div>
                                        ))}
                                    </div>
                                ) : (
                                    <div className="reservations-actions-mini">
                                        <p className="no-reservations">No hotel reservations found</p>
                                        <button 
                                        className="action-button"
                                        onClick={() => navigate('/')}
                                        >
                                            Book a Hotel
                                        </button>
                                    </div>
                                )}
                            </div>

                             {/* Restaurant Reservations */}
                             <div className="reservations-category">
                                <h3>Restaurant Reservations</h3>
                                {reservations.restaurant_reservations.length > 0 ? (
                                    <div className="reservations-list">
                                        {reservations.restaurant_reservations.map(reservation => (
                                            <div key={reservation.id} className="reservations-card" data-status={reservation.status}>
                                                <h4>{reservation.restaurant.name}</h4>
                                                <div className="reservations-details">
                                                    <p>Date: {formatDate(reservation.date)}</p>
                                                    <p>Time: {reservation.time}</p>
                                                    <p>People: {reservation.people_number}</p>
                                                    <p className={`status-rservation ${getStatusColor(reservation.status)}`}>
                                                        {reservation.status}
                                                    </p>
                                                </div>
                                                <div className="reservations-actions">
                                                    <button 
                                                        className="edit-btn"
                                                        onClick={() => handleEdit('restaurant', reservation.id)}
                                                    >
                                                        Edit
                                                    </button>
                                                    <button 
                                                        className="delete-btn"
                                                        onClick={() => handleDelete('restaurant', reservation.id)}
                                                    >
                                                        Cancel
                                                    </button>
                                                </div>
                                            </div>
                                        ))}
                                    </div>
                                ) : (
                                    <div className="reservations-actions-mini">
                                        <p className="no-reservations">No restaurant reservations found</p>
                                        <button 
                                        className="action-button"
                                        onClick={() => navigate('/')}
                                        >
                                            Book a restaurant
                                        </button>
                                    </div>
                                )}
                            </div>

                            {/* Guide Reservations */}
                            <div className="reservations-category">
                                <h3>Guide Reservations</h3>
                                {reservations.guide_reservations.length > 0 ? (
                                    <div className="reservations-list">
                                        {reservations.guide_reservations.map(reservation => (
                                            <div key={reservation.id} className="reservations-card" data-status={reservation.status}>
                                                <h4>{reservation.guide.full_name}</h4>
                                                <div className="reservations-details">
                                                    <p>Date: {formatDate(reservation.start_date)}</p>
                                                    <p>Time: {reservation.time}</p>
                                                    <p>Location: {reservation.location}</p>
                                                    <p>People: {reservation.people_number}</p>
                                                    <p className={`status-rservation ${getStatusColor(reservation.status)}`}>
                                                        {reservation.status}
                                                    </p>
                                                </div>
                                                <div className="reservations-actions">
                                                    <button 
                                                        className="edit-btn"
                                                        onClick={() => handleEdit('guide', reservation.id)}
                                                    >
                                                        Edit
                                                    </button>
                                                    <button 
                                                        className="delete-btn"
                                                        onClick={() => handleDelete('guide', reservation.id)}
                                                    >
                                                        Cancel
                                                    </button>
                                                </div>
                                            </div>
                                        ))}
                                    </div>
                                ) : (
                                    <div className="reservations-actions-mini">
                                        <p className="no-reservations">No guide reservations found</p>
                                            <button 
                                            className="action-button"
                                            onClick={() => navigate('/attractions')}
                                            >
                                                Hire a Guide
                                            </button>
                                    </div>
                                )}
                            </div>

                            {/* Driver Reservations */}
                            <div className="reservations-category">
                                <h3>Driver Reservations</h3>
                                {reservations.driver_reservations.length > 0 ? (
                                    <div className="reservations-list">
                                        {reservations.driver_reservations.map(reservation => (
                                            <div key={reservation.id} className="reservations-card" data-status={reservation.status}>
                                                <h4>{reservation.driver.full_name}</h4>
                                                <div className="reservations-details">
                                                    <p>Date: {formatDate(reservation.date)}</p>
                                                    <p>Time: {reservation.time}</p>
                                                    <p>From: {reservation.start_place}</p>
                                                    <p>To: {reservation.end_place}</p>
                                                    <p>People: {reservation.people_number}</p>
                                                    <p className={`status-rservation ${getStatusColor(reservation.status)}`}>
                                                        {reservation.status}
                                                    </p>
                                                </div>
                                                <div className="reservations-actions">
                                                    <button 
                                                        className="edit-btn"
                                                        onClick={() => handleEdit('driver', reservation.id)}
                                                    >
                                                        Edit
                                                    </button>
                                                    <button 
                                                        className="delete-btn"
                                                        onClick={() => handleDelete('driver', reservation.id)}
                                                    >
                                                        Cancel
                                                    </button>
                                                </div>
                                            </div>
                                        ))}
                                    </div>
                                ) : (
                                    <div className="reservations-actions-mini">
                                        <p className="no-reservations">No driver reservations found  </p>
                                        <button 
                                        className="action-button"
                                        onClick={() => navigate('/attractions')}
                                        >
                                            Hire a Driver
                                        </button>
                                    </div>
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