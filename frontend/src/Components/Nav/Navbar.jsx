import React, { useState } from 'react';
import { NavLink } from 'react-router-dom';
import styles from './Nav.module.css';

const Nav = () => {
  const [isOpen, setIsOpen] = useState(false);
  const toggleNav = () => setIsOpen(!isOpen);

  return (
    <nav className={styles.nav}>
      <div className={styles.navLeft}>
        <div className={styles.navBrand}>
          <NavLink to="/">
            <img src="/images/logo/logo_light.svg" alt="The Guide" />
          </NavLink>
        </div>
        <ul className={`${styles.navMenu} ${isOpen ? styles.navMenuOpen : ''}`}>
          <li><NavLink to="/" className={styles.navLink} activeClassName={styles.active}><i className="fas fa-home"></i> Home</NavLink></li>
          <li><NavLink to="/map" className={styles.navLink} activeClassName={styles.active}><i className="fas fa-map-marked-alt"></i> Map</NavLink></li>
          <li><NavLink to="/about" className={styles.navLink} activeClassName={styles.active}><i className="fas fa-info-circle"></i> About</NavLink></li>
          <li><NavLink to="/contact" className={styles.navLink} activeClassName={styles.active}><i className="fas fa-envelope"></i> Contact</NavLink></li>
          <li className={styles.mobileOnly}>
            <NavLink to="/login" className={`${styles.navLink} ${styles.navSignUp}`} activeClassName={styles.active}><i className="fas fa-user"></i> Login / Sign Up</NavLink>
          </li>
        </ul>
      </div>
      <div className={styles.navRight}>
        <NavLink to="/login" className={`${styles.navLink} ${styles.navSignUp}`} activeClassName={styles.active}><i className="fas fa-user"></i> Login / Sign Up</NavLink>
      </div>
      <button className={styles.navToggle} onClick={toggleNav}>
        <span className={`${styles.navIcon} ${isOpen ? styles.open : ''}`}></span>
      </button>
    </nav>
  );
};

export default Nav;
