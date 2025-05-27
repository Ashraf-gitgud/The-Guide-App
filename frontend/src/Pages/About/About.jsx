import React from 'react';
import './About.css';

const About = () => {
  return (
    <div className="about-container">
      <div className="image-container">
        <img src="/images/threestooges.jpg" alt="About Us" />
      </div>
      <p className="description">B.F. Salman, M. Moufadal, K.M. Achraf</p>
      <div className="card">
        <h2>About Us</h2>
        <p>
         We're three pals in our final year, teaming up to build a fun project that mixes creativity, tech, and way too many late-night debugging sessions. This is our chance to wrap up our student journey with something we’re excited about—made with passion, caffeine, and a touch of chaos.
        </p>
      </div>
    </div>
  );
};

export default About;