import React, { useState } from 'react';
import styles from './SearchBar.module.css';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faSearch } from '@fortawesome/free-solid-svg-icons';

const SearchBar = () => {
  const [searchTerm, setSearchTerm] = useState('');
  const [activeFilter, setActiveFilter] = useState('all');

  const handleSearch = (e) => {
    e.preventDefault();
    // Implement search functionality here
    console.log(`Searching for ${searchTerm} in ${activeFilter}`);
  };

  return (
    <div className={styles.searchContainer}>
      <form onSubmit={handleSearch} className={styles.searchForm}>
        <input
          type="text"
          placeholder="Search destinations..."
          value={searchTerm}
          onChange={(e) => setSearchTerm(e.target.value)}
          className={styles.searchInput}
        />
        <button type="submit" className={styles.searchButton}>
          <FontAwesomeIcon icon={faSearch} />
        </button>
      </form>
      <div className={styles.filterButtons}>
        <button
          className={`${styles.filterButton} ${activeFilter === 'all' ? styles.active : ''}`}
          onClick={() => setActiveFilter('all')}
        >
          All
        </button>
        <button
          className={`${styles.filterButton} ${activeFilter === 'hotels' ? styles.active : ''}`}
          onClick={() => setActiveFilter('hotels')}
        >
          Hotels
        </button>
        <button
          className={`${styles.filterButton} ${activeFilter === 'restaurants' ? styles.active : ''}`}
          onClick={() => setActiveFilter('restaurants')}
        >
          Restaurants
        </button>
        <button
          className={`${styles.filterButton} ${activeFilter === 'sites' ? styles.active : ''}`}
          onClick={() => setActiveFilter('sites')}
        >
          Sites
        </button>
      </div>
    </div>
  );
};

export default SearchBar;
