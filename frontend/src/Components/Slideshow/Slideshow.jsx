import React, { useState, useEffect } from 'react';
import styles from './Slideshow.module.css';

const slides = [
  { image: '/images/chefchaouen.jpg', title: 'Chefchaouen', desc: 'The Blue Pearl' },
  { image: '/images/asilah.jpg', title: 'Asilah', desc: 'The White City' },
  { image: '/images/tetouan.jpg', title: 'Tetouan', desc:'The Andalusian Soul' },
  { image: '/images/tangier.jpg', title: 'Tangier', desc: 'The Bride of The North' }
];

const Slideshow = () => {
  const [currentSlide, setCurrentSlide] = useState(0);

  useEffect(() => {
    const timer = setInterval(() => {
      setCurrentSlide((prevSlide) => (prevSlide + 1) % slides.length);
    }, 5000);
    return () => clearInterval(timer);
  }, []);

  return (
    <div className={styles.container}> 
    <div className={styles.slideshow}>
      {slides.map((slide, index) => (
        <div
          key={index}
          className={`${styles.slide} ${index === currentSlide ? styles.active : ''}`}
          style={{ backgroundImage: `url(${slide.image})` }}
        >
          <h1>{slide.title}</h1>
          <h3>{slide.desc}</h3>
        </div>
      ))}
      <div className={styles.dots}>
        {slides.map((_, index) => (
          <span
            key={index}
            className={`${styles.dot} ${index === currentSlide ? styles.active : ''}`}
            onClick={() => setCurrentSlide(index)}
          ></span>
        ))}
      </div>
    </div>
    </div>
  );
};

export default Slideshow;
