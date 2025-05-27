import React, { useState, useEffect } from 'react';
import { NavLink, useNavigate } from 'react-router-dom';
import styles from './Nav.module.css';

const Nav = () => {
  const [isOpen, setIsOpen] = useState(false);
  const [isLoggedIn, setIsLoggedIn] = useState(false);
  const [showProfileMenu, setShowProfileMenu] = useState(false);
  const [dashboardPath, setDashboardPath] = useState('/dashboard');
  const navigate = useNavigate();

  useEffect(() => {
    // Check if user is logged in and set dashboard path based on role
    const token = localStorage.getItem('token');
    const role = localStorage.getItem('role');
    setIsLoggedIn(!!token);

    // Set dashboard path based on role
    switch (role) {
      case 'admin':
        setDashboardPath('/dashboard');
        break;
      case 'guide':
        setDashboardPath('/guide');
        break;
      case 'tourist':
        setDashboardPath('/tourist');
        break;
      case 'transporter':
        setDashboardPath('/driver');
        break;
      default:
        setDashboardPath('/dashboard');
    }
  }, []);

  const toggleNav = () => setIsOpen(!isOpen);
  const toggleProfileMenu = () => setShowProfileMenu(!showProfileMenu);

  const handleLogout = () => {
    localStorage.removeItem('token');
    localStorage.removeItem('user_id');
    localStorage.removeItem('role');
    setIsLoggedIn(false);
    setShowProfileMenu(false);
    navigate('/');
  };

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
        </ul>
      </div>
      <div className={styles.navRight}>
        {isLoggedIn ? (
          <div className={styles.profileContainer}>
            <button className={styles.profileButton} onClick={toggleProfileMenu}>
              <i className="fas fa-user-circle"></i>
            </button>
            {showProfileMenu && (
              <ul className={styles.profileMenu}>
                <li>
                  <NavLink to={dashboardPath} className={styles.profileMenuItem}>
                    <i className="fas fa-tachometer-alt"></i> Dashboard
                  </NavLink>
                </li>
                <li>
                  <NavLink to="/" onClick={handleLogout} className={styles.profileMenuItem}>
                    <i className="fas fa-sign-out-alt"></i> Logout
                  </NavLink>
                </li>
              </ul>
            )}
          </div>
        ) : (
          <NavLink to="/login" className={`${styles.navLink} ${styles.navSignUp}`} activeClassName={styles.active}>
            <i className="fas fa-sign-in-alt"></i> Login / Sign Up
          </NavLink>
        )}
      </div>
      <button className={styles.navToggle} onClick={toggleNav}>
        <span className={`${styles.navIcon} ${isOpen ? styles.open : ''}`}></span>
      </button>
    </nav>
  );
};

export default Nav;