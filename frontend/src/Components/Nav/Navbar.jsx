import React, { useState, useEffect, useRef } from 'react';
import { NavLink, useNavigate, useLocation } from 'react-router-dom';
import styles from './Nav.module.css';

const Nav = () => {
  const [isOpen, setIsOpen] = useState(false);
  const [isLoggedIn, setIsLoggedIn] = useState(false);
  const [showProfileMenu, setShowProfileMenu] = useState(false);
  const [dashboardPath, setDashboardPath] = useState('/dashboard');
  const navigate = useNavigate();
  const location = useLocation();
  const profileMenuRef = useRef(null);

  useEffect(() => {
    const token = localStorage.getItem('token');
    const role = localStorage.getItem('role');
    setIsLoggedIn(!!token);

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
      case 'hotel':
        setDashboardPath('/hotel');
        break;
      case 'restaurant':
        setDashboardPath('/restaurant');
        break;
      default:
        setDashboardPath('/dashboard');
    }

    const handleClickOutside = (event) => {
      if (profileMenuRef.current && !profileMenuRef.current.contains(event.target)) {
        setShowProfileMenu(false);
      }
    };

    document.addEventListener('mousedown', handleClickOutside);

    return () => {
      document.removeEventListener('mousedown', handleClickOutside);
    };
  }, []);

  // Close menus when route changes
  useEffect(() => {
    setIsOpen(false);
    setShowProfileMenu(false);
  }, [location]);

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

  const handleNavLinkClick = () => {
    setIsOpen(false);
  };

  const handleProfileMenuItemClick = () => {
    setShowProfileMenu(false);
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
          <li><NavLink to="/" className={styles.navLink} activeClassName={styles.active} onClick={handleNavLinkClick}><i className="fas fa-home"></i> Home</NavLink></li>
          <li><NavLink to="/map" className={styles.navLink} activeClassName={styles.active} onClick={handleNavLinkClick}><i className="fas fa-map-marked-alt"></i> Map</NavLink></li>
          <li><NavLink to="/about" className={styles.navLink} activeClassName={styles.active} onClick={handleNavLinkClick}><i className="fas fa-info-circle"></i> About</NavLink></li>
          <li><NavLink to="/contact" className={styles.navLink} activeClassName={styles.active} onClick={handleNavLinkClick}><i className="fas fa-envelope"></i> Contact</NavLink></li>
          <li><NavLink to="/faq" className={styles.navLink} activeClassName={styles.active} onClick={handleNavLinkClick}><i className="fa fa-question-circle"></i> F.A.Q</NavLink></li>
        </ul>
      </div>
      <div className={styles.navRight}>
        {isLoggedIn ? (
          <div className={styles.profileContainer} ref={profileMenuRef}>
            <button className={styles.profileButton} onClick={toggleProfileMenu}>
              <i className="fas fa-user-circle"></i>
            </button>
            {showProfileMenu && (
              <ul className={styles.profileMenu}>
                <li>
                  <NavLink to={dashboardPath} className={styles.profileMenuItem} onClick={handleProfileMenuItemClick}>
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
          <NavLink to="/login" className={`${styles.navLink} ${styles.navSignUp}`} activeClassName={styles.active} onClick={handleNavLinkClick}>
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
