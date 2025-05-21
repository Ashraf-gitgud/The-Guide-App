import React, { useState } from 'react';
import styles from './Nav.module.css';

const Nav = () => {
  const [isOpen, setIsOpen] = useState(false);

  const toggleNav = () => {
    setIsOpen(!isOpen);
  };

  return (
    <nav className={styles.nav}>
      <div className={styles.navBrand}>
        <a href="/">The Guide</a>
      </div>
      <button className={styles.navToggle} onClick={toggleNav}>
        <span className={styles.navIcon}></span>
      </button>
      <ul className={`${styles.navMenu} ${isOpen ? styles.navMenuOpen : ''}`}>
        <li><a href="/" className={styles.navLink}>Map</a></li>
        <li><a href="/" className={styles.navLink}>About</a></li>
        <li><a href="/" className={styles.navLink}>Contact</a></li>
        <li><a href="/" className={styles.navLink}>Login/Sign Up</a></li>
      </ul>
    </nav>
  );
};

export default Nav;