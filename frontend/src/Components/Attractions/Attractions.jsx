import React, { useState, useEffect } from 'react';
import axios from 'axios';
import { Link } from 'react-router-dom';
import styles from './Attractions.module.css';

const Attractions = () => {
  const [items, setItems] = useState([]);
  const [totalAttractions, setTotalAttractions] = useState(0);

  useEffect(() => {
    const fetchItems = async () => {
      try {
        const response = await axios.get('http://127.0.0.1:8000/api/attractions');
        const allItems = response.data;
        setTotalAttractions(allItems.length);
        const randomItems = getRandomItems(allItems, 8);
        setItems(randomItems);
      } catch (error) {
        console.error('Error fetching items: ', error);
      }
    };

    fetchItems();
  }, []);

  const getRandomItems = (array, count) => {
    const shuffled = array.sort(() => 0.5 - Math.random());
    return shuffled.slice(0, count);
  };

  return (
    <section className={styles.attractionsSection}>
      <header className={styles.attractionsHeader}>
        <h2 className={styles.attractionsTitle}>Adventure Awaits</h2>
        <p className={styles.attractionsSubtitle}>Unveil the extraordinary in every corner</p>
      </header>
      <div className={styles.attractionsGrid}>
        {items.map((item, index) => (
          <ItemCard key={item.id} item={item} index={index} />
        ))}
      </div>
      <div className={styles.dividerContainer}>
        <div className={styles.dividerLine}></div>
        <Link to="/attractions" className={styles.discoverMore}>
          Discover More ({totalAttractions})
        </Link>
      </div>
    </section>
  );
};

const ItemCard = ({ item, index }) => {
  const [isHovered, setIsHovered] = useState(false);
  const isFirstInRow = index % 4 === 0;
  const isLastInRow = index % 4 === 3;

  return (
    <div
      className={styles.itemCardWrapper}
      onMouseEnter={() => setIsHovered(true)}
      onMouseLeave={() => setIsHovered(false)}
    >
      <div
        className={styles.itemCard}
        style={{ backgroundImage: `url(${item.image})` }}
      >
        <h3 className={styles.itemName}>{item.name}</h3>
      </div>

      <div
        className={`
          ${styles.expandedCard} 
          ${isHovered ? styles.expandedCardVisible : ''} 
          ${isFirstInRow ? styles.expandRight : ''} 
          ${isLastInRow ? styles.expandLeft : ''}
        `}
      >
        <img src={item.image} alt={item.name} className={styles.expandedImage} />
        <div className={styles.expandedContent}>
          <h3>
            {item.name}, {item.location}
          </h3>
          <div className={styles.descriptionWrapper}>
            <p className={styles.description}>{item.description}</p>
            <Link to={`/attractions/${item.id}`} className={styles.seeMoreButton}>
              See More
            </Link>
          </div>
        </div>
      </div>
    </div>
  );
};

export default Attractions;