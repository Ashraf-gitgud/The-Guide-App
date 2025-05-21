import React from 'react';
import styles from './Hero.module.css';
import SearchBar from '../SearchBar/SearchBar'

const Hero = () => {
  return (
    <>
    <div className={styles.hero} style={{ backgroundImage: `url('/images/Chef_Hero.jpeg')` }} >
      <div className={styles.heroContent}>
        <h1 className={styles.heroTitle}>EXPLORE THE NORTH</h1>
        <p className={styles.heroText}>
          The North of Morocco is rich in heritage and history.
          <br/>
          It is  home to hundreds of points of interests and historically important sites.
        </p>
      </div>
    <SearchBar/>
    </div>
    </>
  );
};

export default Hero;