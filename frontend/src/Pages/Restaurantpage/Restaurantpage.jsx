import React, { useState, useEffect } from 'react';
import { Link, useParams } from 'react-router-dom';
import axios from 'axios';
import './Restaurantpage.css';
import Reviews from '../../Components/Reviews/Reviews';

const RestaurantPage = () => {
  const { id } = useParams();
  const [restaurant, setRestaurant] = useState(null);
  const [user, setUser] = useState(null);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState(null);
  const [touristId, setTouristId] = useState(null);

  useEffect(() => {
    const fetchData = async () => {
      try {
        const restaurantResponse = await axios.get(`http://127.0.0.1:8000/api/restaurants/${id}`);
        setRestaurant(restaurantResponse.data);

        const userResponse = await axios.get(`http://127.0.0.1:8000/api/users/${restaurantResponse.data.user_id}`);
        setUser(userResponse.data);

        // Fetch tourist data only if not admin
        const userRole = localStorage.getItem('role');
        if (userRole === 'tourist') {
          const userId = localStorage.getItem('user_id');
          if (userId) {
            const touristResponse = await axios.get(`http://127.0.0.1:8000/api/tourists/${userId}`);
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

  if (loading) return <div className="loading">Loading...</div>;
  if (error) return <div className="error">{error}</div>;
  if (!restaurant || !user) return <div className="error">No data available</div>;

  return (
    <div className="restaurant-page">
      <header className="restaurant-header">
        <h1>{restaurant.name}</h1>
        <div className="rating-badge">{restaurant.restaurant_rating} ★</div>
      </header>
      <div className="restaurant-content">
        <div className="restaurant-details">
          <div className="detail-card">
            <h3>Contact Information</h3>
            <p><i className="fas fa-envelope"></i> <strong>Email:</strong> {restaurant.email}</p>
            <p><i className="fas fa-phone"></i> <strong>Phone:</strong> {restaurant.phone_number}</p>
            <p><i className="fas fa-map-marker-alt"></i> <strong>Address:</strong> {restaurant.adress}</p>
          </div>
          <div className="detail-card">
            <h3>Restaurant Information</h3>
            <p><i className="fas fa-star"></i> <strong>Restaurant Rating:</strong> {restaurant.restaurant_rating} stars</p>
            <p><i className="fas fa-users"></i> <strong>User Rating:</strong> {restaurant.rating} / 5</p>
            <p><i className="fas fa-calendar-alt"></i> <strong>Created:</strong> {new Date(restaurant.created_at).toLocaleDateString()}</p>
          </div>
        </div>
        <div className="restaurant-image">
          {user.profile ? (
            <img src={user.profile} alt={restaurant.name} />
          ) : (
            <div className="image-placeholder">No Image Available</div>
          )}
          <Link to={`/reservations/restaurant/${restaurant.restaurant_id}/new`} className="book-now-btn">Book Now</Link>
        </div>
      </div>
      <Reviews target={user.user_id} touristId={touristId} />
    </div>
  );
};

export default RestaurantPage;