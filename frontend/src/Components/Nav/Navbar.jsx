import React, { useState } from 'react';
import { Link } from 'react-router-dom';
import styles from './Nav.module.css';

const Nav = () => {
  const [isOpen, setIsOpen] = useState(false);

  const toggleNav = () => setIsOpen(!isOpen);

  return (
    <nav className={styles.nav}>
      <div className={styles.navBrand}>
        <Link to="/">The Guide</Link>
      </div>
      <button className={styles.navToggle} onClick={toggleNav}>
        <span className={styles.navIcon}></span>
      </button>
      <ul className={`${styles.navMenu} ${isOpen ? styles.navMenuOpen : ''}`}>
        <li><Link to="/map" className={styles.navLink}>Map</Link></li>
        <li><Link to="/about" className={styles.navLink}>About</Link></li>
        <li><Link to="/contact" className={styles.navLink}>Contact</Link></li>
        <li><Link to="/login" className={styles.navLink}>Login/Sign Up</Link></li>
      </ul>
    </nav>
  );
};

export default Nav;
