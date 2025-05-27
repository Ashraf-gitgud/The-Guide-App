import React from 'react';
import { Link } from 'react-router-dom';
import './Footer.css';

const Footer = () => {
  return (
    <footer className="footer">
          <img src="/images/logo/logo_light.svg" alt="The Guide" className="footer-logo" />
      <div className="footer-content">
        <div className="footer-section">
          <h3>About Us</h3>
          <p>The Guide is your trusted source for travel information and recommendations.</p>
        </div>
        <div className="footer-section">
          <h3>Quick Links</h3>
          <ul>
            <li><Link className='link' to='/'>Home</Link></li>
            <li><Link className='link' to='/map'>Map</Link></li>
            <li><Link className='link' to='/contact'>Contact</Link></li>
          </ul>
        </div>

        <div className="footer-section">
          <h3>Connect</h3>
          <div className="social-icons">
            <a href="https://facebook.com" target="_blank" rel="noopener noreferrer"><i className="fab fa-facebook-f"></i></a>
            <a href="https://twitter.com" target="_blank" rel="noopener noreferrer"><i className="fab fa-twitter"></i></a>
            <a href="https://instagram.com" target="_blank" rel="noopener noreferrer"><i className="fab fa-instagram"></i></a>
          </div>
        </div>
      </div>
      <div className="footer-bottom">
        <p><b>
          &copy; 2025 
          The Guide. All rights reserved.
        </b></p>
      </div>
    </footer>
  );
};

export default Footer;
