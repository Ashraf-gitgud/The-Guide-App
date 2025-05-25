import React, { useState } from 'react';
import { NavLink } from 'react-router-dom';
import styles from './Nav.module.css';
import Register from "../../Pages/Register";
import Login from "../../Pages/Login";

const Nav = () => {
  const [isOpen, setIsOpen] = useState(false);
  const toggleNav = () => setIsOpen(!isOpen);

  return (
    <nav className={styles.nav}>
      <div className={styles.navBrand}>
        <NavLink to="/">
          <img src="/images/logo/logo_light.svg" alt="The Guide" />
        </NavLink>
      </div>
      <button className={styles.navToggle} onClick={toggleNav}>
        <span className={styles.navIcon}></span>
      </button>
      <ul className={`${styles.navMenu} ${isOpen ? styles.navMenuOpen : ''}`}>
        <li><NavLink to="/map" className={styles.navLink} activeClassName={styles.active}>Map</NavLink></li>
        <li className={styles.navDivider}></li>
        <li><NavLink to="/about" className={styles.navLink} activeClassName={styles.active}>About</NavLink></li>
        <li className={styles.navDivider}></li>
        <li><NavLink to="/contact" className={styles.navLink} activeClassName={styles.active}>Contact</NavLink></li>
        <li className={styles.navSignUp}>
          <NavLink to="/login" className={styles.navLink} activeClassName={styles.active}>Login / Sign Up</NavLink>
        </li>
      </ul>
    </nav>
  );
};

export default Nav;
