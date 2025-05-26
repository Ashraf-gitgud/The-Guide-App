import React, { useState, useEffect } from 'react';
import { useParams } from 'react-router-dom';
import axios from 'axios';
import './Hotelpage.css';

const HotelPage = () => {
  const { id } = useParams();
  const [hotel, setHotel] = useState(null);
  const [user, setUser] = useState(null);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState(null);

  useEffect(() => {
    const fetchData = async () => {
      try {
        const hotelResponse = await axios.get(`http://127.0.0.1:8000/api/hotels/${id}`);
        setHotel(hotelResponse.data);
        const userResponse = await axios.get(`http://127.0.0.1:8000/api/users/${hotelResponse.data.user_id}`);
        setUser(userResponse.data);
        setLoading(false);
      } catch (err) {
        setError('An error occurred while fetching data');
        setLoading(false);
      }
    };
    fetchData();
  }, [id]);

  const formatPosition = (positionString) => {
    if (!positionString) return 'N/A';
    const [lat, lon] = JSON.parse(positionString);
    return `${lat.toFixed(6)}, ${lon.toFixed(6)}`;
  };

  if (loading) return <div className="loading">Loading...</div>;
  if (error) return <div className="error">{error}</div>;
  if (!hotel || !user) return <div className="error">No data available</div>;

  return (
    <div className="hotel-page">
      <header className="hotel-header">
        <h1>{hotel.name}</h1>
        <div className="rating-badge">{hotel.hotel_rating} ★</div>
      </header>
      <div className="hotel-content">
        <div className="hotel-details">
          <div className="detail-card">
            <h3>Contact Information</h3>
            <p><i className="fas fa-envelope"></i> <strong>Email:</strong> {hotel.email}</p>
            <p><i className="fas fa-phone"></i> <strong>Phone:</strong> {hotel.phone_number}</p>
            <p><i className="fas fa-map-marker-alt"></i> <strong>Address:</strong> {hotel.adress}</p>
            {/* <p><i className="fas fa-map"></i> <strong>Position:</strong> {formatPosition(hotel.position)}</p> */}
          </div>
          <div className="detail-card">
            <h3>Hotel Information</h3>
            <p><i className="fas fa-star"></i> <strong>Hotel Rating:</strong> {hotel.hotel_rating} stars</p>
            <p><i className="fas fa-users"></i> <strong>User Rating:</strong> {hotel.rating} / 5</p>
            {/* <p><i className="fas fa-info-circle"></i> <strong>Status:</strong> {hotel.status}</p> */}
            <p><i className="fas fa-calendar-alt"></i> <strong>Created:</strong> {new Date(hotel.created_at).toLocaleDateString()}</p>
            {/* <p><i className="fas fa-clock"></i> <strong>Last Updated:</strong> {new Date(hotel.updated_at).toLocaleDateString()}</p> */}
          </div>
        </div>
        <div className="hotel-image">
          {user.profile ? (
            <img src={user.profile} alt={hotel.name} />
          ) : (
            <div className="image-placeholder">No Image Available</div>
          )}
          <button className="book-now-btn">Book Now</button>
        </div>
      </div>
    </div>
  );
};

export default HotelPage;