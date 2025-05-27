import React, { useState, useEffect } from 'react';
import axios from 'axios';
import { useParams } from 'react-router-dom';
import styles from './Attractiondetails.module.css';
import Agents from '../../Components/Agents/Agents';

const AttractionPage = () => {
  const [attraction, setAttraction] = useState(null);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState(null);
  const { id } = useParams();

  useEffect(() => {
    const fetchAttraction = async () => {
      try {
        const response = await axios.get(`http://localhost:8000/api/attractions/${id}`);
        setAttraction(response.data);
        setLoading(false);
      } catch (err) {
        setError('Failed to fetch attraction details');
        setLoading(false);
      }
    };

    fetchAttraction();
  }, [id]);

  if (loading) return <div className={styles.loading}>Loading...</div>;
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
        </div>{/* 
        {position && (
          <div className={styles.position}>
            <strong>Position: </strong> 
            Latitude: {position[0]}, Longitude: {position[1]}
          </div>
        )} */}
        <div className={styles.buttonContainer}>
          <button className={styles.bookButton}>Book a Tour</button>
          <button className={styles.rideButton}>Get a Ride</button>
        </div>
      </div>
    </div>
    <Agents/>
    </>
  );
};

export default AttractionPage;
