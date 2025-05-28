import React, { useState, useEffect } from 'react';
import axios from 'axios';
import Slider from 'react-slick';
import 'slick-carousel/slick/slick.css';
import 'slick-carousel/slick/slick-theme.css';
import styles from './DoubleCarousel.module.css';
import { Link } from 'react-router-dom';

const DoubleCarousel = () => {
  const [hotels, setHotels] = useState([]);
  const [restaurants, setRestaurants] = useState([]);
  const [users, setUsers] = useState([]);

  useEffect(() => {
    const fetchData = async () => {
      try {
        const [hotelsResponse, restaurantsResponse, usersResponse] = await Promise.all([
          axios.get('http://127.0.0.1:8000/api/hotels'),
          axios.get('http://127.0.0.1:8000/api/restaurants'),
          axios.get('http://127.0.0.1:8000/api/users'),
        ]);

        setHotels(hotelsResponse.data);
        setRestaurants(restaurantsResponse.data);
        setUsers(usersResponse.data);
      } catch (error) {
        console.error('Error fetching data: ', error);
      }
    };

    fetchData();
  }, []);

  const settings = {
    dots: true,
    infinite: true,
    speed: 500, 
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: true,  
    autoplaySpeed: 3000,  
    pauseOnHover: true, 
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
    ]
  };

  const getProfileImage = (userId) => {
    const user = users.find(u => u.user_id === userId);
    return user ? user.profile : '';
  };

  const renderStars = (rating) => {
    return Array.from({ length: 5 }, (_, index) => (
      <span 
        key={index} 
        className={styles.star}
        style={{ color: index < rating ? 'gold' : 'gray' }}
      >
        ★
      </span>
    ));
  };

  return (
    <div className={styles.doubleCarouselContainer}>
      <div className={styles.carouselSection}>
        <h2 className={styles.carouselTitle}>Have a meal,</h2>
        <Slider {...settings}>
          {restaurants.map((restaurant) => (
            <div key={restaurant.restaurant_id}>
              <div 
                className={styles.card}
                style={{backgroundImage: `url(${getProfileImage(restaurant.user_id)})`}}
              >
                <h3 className={styles.cardName}>{restaurant.name}</h3>
                <Link to={`/restaurants/${restaurant.restaurant_id}`} >
                <button className={styles.seeMoreButton}>See more</button>
                </Link>
              </div>
            </div>
          ))}
        </Slider>
      </div>

      <div className={styles.carouselSection}>
        <h2 className={styles.carouselTitle}>Have a stay!</h2>
        <Slider {...settings}>
          {hotels.map((hotel) => (
            <div key={hotel.hotel_id}>
              <div 
                className={styles.card}
                style={{backgroundImage: `url(${getProfileImage(hotel.user_id)})`}}
              >
                <h3 className={styles.cardName}>{hotel.name}</h3>
                <div className={styles.starRating}>
                  {renderStars(parseInt(hotel.hotel_rating))}
                </div>
                <Link to={`/hotels/${hotel.hotel_id}`} >
                <button className={styles.seeMoreButton}>See more</button>
                </Link>
              </div>
            </div>
          ))}
        </Slider>
      </div>
    </div>
  );
};

export default DoubleCarousel;