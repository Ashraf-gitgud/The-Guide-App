import React, { useState, useEffect } from 'react';
import { useParams } from 'react-router-dom';
import axios from 'axios';
import { Link } from 'react-router-dom';
import './Hotelpage.css';
import Reviews from '../../Components/Reviews/Reviews';

const HotelPage = () => {
  const { id } = useParams();
  const [hotel, setHotel] = useState(null);
  const [user, setUser] = useState(null);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState(null);
  const [touristId, setTouristId] = useState(null);
  const [userRole, setRole] = useState(localStorage.getItem('role'));

  useEffect(() => {
    const fetchData = async () => {
      try {
        const hotelResponse = await axios.get(`${process.env.REACT_APP_API_URL}/hotels/${id}`);
        setHotel(hotelResponse.data);

        const userResponse = await axios.get(`${process.env.REACT_APP_API_URL}/users/${hotelResponse.data.user_id}`);
        setUser(userResponse.data);

        if (userRole == 'tourist') {
          const userId = localStorage.getItem('user_id');
          if (userId) {
            const touristResponse = await axios.get(`${process.env.REACT_APP_API_URL}/tourists/${userId}`);
            setTouristId(touristResponse.data.tourist_id);
          }
        }

        setLoading(false);
      } catch (err) {
        setError('An error occurred while fetching data');
        console.error(err);
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

  if (loading) return <div className="loading-dots">
          <div class="dot"></div>
          <div class="dot"></div>
          <div class="dot"></div>
        </div>;
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
            <p><i className="fas fa-envelope"></i> <strong>Email: </strong> {hotel.email}</p>
            <p><i className="fas fa-phone"></i> <strong>Phone: </strong> {hotel.phone_number}</p>
            <p><i className="fas fa-map-marker-alt"></i> <strong>Address: </strong> {hotel.adress}</p>
          </div>
          <div className="detail-card">
            <h3>Hotel Information</h3>
            <p><i className="fas fa-star"></i> <strong>Hotel Rating: </strong> {hotel.hotel_rating} stars</p>
            <p><i className="fas fa-users"></i> <strong>User Rating: </strong> {hotel.rating} / 5</p>
            <p><i className="fas fa-calendar-alt"></i> <strong>Created: </strong> {new Date(hotel.created_at).toLocaleDateString()}</p>
          </div>
        </div>
        <div className="hotel-image">
          {user.profile ? (
            <img src={user.profile} alt={hotel.name} />
          ) : (
            <div className="image-placeholder">No Image Available</div>
          )}{userRole === 'tourist' &&
          <Link to={`/reservations/hotel/${hotel.hotel_id}/new`} className="book-now-btn">Book Now</Link>}
        </div>
      </div>
      <Reviews target={user.user_id} touristId={touristId} />
    </div>
  );
};

export default HotelPage;