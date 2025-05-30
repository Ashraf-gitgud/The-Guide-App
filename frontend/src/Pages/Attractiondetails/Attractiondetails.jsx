import React, { useState, useEffect } from 'react';
import axios from 'axios';
import { Link, useParams } from 'react-router-dom';
import styles from './Attractiondetails.module.css';
import Agents from '../../Components/Agents/Agents';

const AttractionPage = () => {
  const [attraction, setAttraction] = useState(null);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState(null);
  const { id } = useParams();
  const [userRole, serRole] = useState(localStorage.getItem('role'));

  useEffect(() => {
    const fetchAttraction = async () => {
      try {
        const response = await axios.get(`${process.env.REACT_APP_API_URL}/attractions/${id}`);
        setAttraction(response.data);
        setLoading(false);
      } catch (err) {
        setError('Failed to fetch attraction details');
        setLoading(false);
      }
    };

    fetchAttraction();
  }, [id]);

  if (loading) return <div className="loading-dots">
          <div class="dot"></div>
          <div class="dot"></div>
          <div class="dot"></div>
        </div>;
  if (error) return <div className={styles.error}>{error}</div>;
  if (!attraction) return <div className={styles.error}>No attraction found</div>;

  const position = attraction.position ? JSON.parse(attraction.position) : null;

  return (
    <>
    <div className={styles.container}>
      <div className={styles.imageSection}>
        {attraction.image && (
          <img src={attraction.image} alt={attraction.name} className={styles.image} />
        )}
      </div>
      <div className={styles.contentSection}>
        <h1 className={styles.title}>{attraction.name}</h1>
        <p className={styles.description}>{attraction.description}</p>
        <div className={styles.infoGrid}>
          <div className={styles.infoItem}>
            <strong>Location: </strong> {attraction.location}
          </div>
          <div className={styles.infoItem}>
            <strong>Category: </strong> {attraction.category || 'N/A'}
          </div>
          <div className={styles.infoItem}>
            <strong>City: </strong> {attraction.city}
          </div>
          <div className={styles.infoItem}>
            <strong>Social Hours: </strong> {attraction.social_hours}
          </div>
        </div>
        <div className={styles.buttonContainer}>
        {userRole === 'tourist' && <Link to={`/reservations/guide/${attraction.id}/new`} className={styles.bookButton}>Book a Tour</Link>}
        {userRole === 'tourist' &&<Link to={`/reservations/driver/${attraction.id}/new`} className={styles.rideButton}>Get a Ride</Link>}
        </div>
      </div>
    </div>
    <Agents/>
    </>
  );
};

export default AttractionPage;
