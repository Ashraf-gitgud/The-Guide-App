import React, { useState, useEffect } from 'react';
import { Link } from 'react-router-dom';
import styles from './SearchBar.module.css';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faSearch } from '@fortawesome/free-solid-svg-icons';
import axios from 'axios';

const SearchBar = ({ onSelectLocation, isMapSearch = false }) => {
  const [searchTerm, setSearchTerm] = useState('');
  const [activeFilter, setActiveFilter] = useState('all');
  const [suggestions, setSuggestions] = useState([]);
  const [locations, setLocations] = useState([]);

  useEffect(() => {
    const fetchLocations = async () => {
      try {
        const [hotelsRes, restaurantsRes, attractionsRes] = await Promise.all([
          axios.get('http://127.0.0.1:8000/api/hotels'),
          axios.get('http://127.0.0.1:8000/api/restaurants'),
          axios.get('http://127.0.0.1:8000/api/attractions'),
        ]);

        const hotels = hotelsRes.data.map(hotel => ({ ...hotel, type: 'hotel' }));
        const restaurants = restaurantsRes.data.map(restaurant => ({ ...restaurant, type: 'restaurant' }));
        const attractions = attractionsRes.data.map(attraction => ({ ...attraction, type: 'attraction' }));

        setLocations([...hotels, ...restaurants, ...attractions]);
      } catch (error) {
        console.error('Error fetching locations: ', error);
      }
    };

    fetchLocations();
  }, []);

  const handleSearch = (e) => {
    e.preventDefault();
    console.log(`Searching for ${searchTerm} in ${activeFilter}`);
  };

  const handleInputChange = (e) => {
    const query = e.target.value;
    setSearchTerm(query);
    if (query) {
      const filtered = locations
        .filter(loc => 
          loc.name.toLowerCase().includes(query.toLowerCase()) &&
          (activeFilter === 'all' || loc.type === activeFilter)
        )
        .slice(0, 3);
      setSuggestions(filtered);
    } else {
      setSuggestions([]);
    }
  };


  return (
    <div className={`${styles.searchContainer} ${isMapSearch ? styles.mapSearch : ''}`}>
      <form onSubmit={handleSearch} className={styles.searchForm}>
        <input
          type="text"
          placeholder="Search destinations..."
          value={searchTerm}
          onChange={handleInputChange}
          className={styles.searchInput}
        />
        <button type="submit" className={styles.searchButton}>
          <FontAwesomeIcon icon={faSearch} />
        </button>
      </form>
      {suggestions.length > 0 && (
        <ul className={styles.suggestions}>
          {suggestions.map((loc) => (
            <li
              key={`${loc.type}-${loc.id}`}
              className={styles.suggestionItem}
            >
              <Link to="/map" className={styles.suggestionLink}>
                <img src={loc.image || '/placeholder-image.jpg'} alt={loc.name} className={styles.suggestionThumbnail} />
                <div className={styles.suggestionText}>
                  <span className={styles.suggestionName}>{loc.name}</span>
                </div>
              </Link>
            </li>
          ))}
        </ul>
      )}
      {!isMapSearch && (
        <div className={styles.filterButtons}>
          <button
            className={`${styles.filterButton} ${activeFilter === 'all' ? styles.active : ''}`}
            onClick={() => setActiveFilter('all')}
          >
            All
          </button>
          <button
            className={`${styles.filterButton} ${activeFilter === 'hotel' ? styles.active : ''}`}
            onClick={() => setActiveFilter('hotel')}
          >
            Hotels
          </button>
          <button
            className={`${styles.filterButton} ${activeFilter === 'restaurant' ? styles.active : ''}`}
            onClick={() => setActiveFilter('restaurant')}
          >
            Restaurants
          </button>
          <button
            className={`${styles.filterButton} ${activeFilter === 'attraction' ? styles.active : ''}`}
            onClick={() => setActiveFilter('attraction')}
          >
            Sites
          </button>
        </div>
      )}
    </div>
  );
};

export default SearchBar;
