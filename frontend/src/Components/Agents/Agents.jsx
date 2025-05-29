import React, { useState, useEffect } from 'react';
import Slider from 'react-slick';
import axios from 'axios';
import "slick-carousel/slick/slick.css";
import "slick-carousel/slick/slick-theme.css";
import './Agents.css';

const AgentCard = ({ name, email, phone, rating, profile }) => {
  return (
    <div className="agent-card">
      <img src={profile} alt={name} className="agent-image" />
      <span className="agent-name">{name}</span>
      <div className="agent-info">
        <p><strong><b>Phone:</b></strong> {phone}</p>
        <p><strong><b>Rating:</b></strong> {rating}/5</p>
      </div>
    </div>
  );
};

const Agents = () => {
  const [drivers, setDrivers] = useState([]);
  const [guides, setGuides] = useState([]);
  const [users, setUsers] = useState({});

  useEffect(() => {
    const fetchData = async () => {
      try {
        const [driversRes, guidesRes, usersRes] = await Promise.all([
          axios.get(`${process.env.REACT_APP_API_URL}/drivers`),
          axios.get(`${process.env.REACT_APP_API_URL}/guides`),
          axios.get(`${process.env.REACT_APP_API_URL}/users`)
        ]);

        setDrivers(driversRes.data);
        setGuides(guidesRes.data);

        const usersMap = {};
        usersRes.data.forEach(user => {
          usersMap[user.user_id] = user;
        });
        setUsers(usersMap);
      } catch (error) {
        console.error('Error fetching data:', error);
      }
    };

    fetchData();
  }, []);

  const sliderSettings = {
    dots: true,
    infinite: true,
    speed: 5000,
    arrows: false,
    slidesToShow: 5,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 0,
    pauseOnHover: true,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
    ]
  };

  return (
    <div className="agents-container">
      <h2>Check our available agents</h2>

      <h3>Our Drivers</h3>
      <Slider {...sliderSettings}>
        {drivers.map((driver) => (
          <AgentCard
            key={driver.driver_id}
            name={driver.full_name}
            email={driver.email}
            phone={driver.phone_number}
            rating={driver.rating}
            profile={users[driver.user_id]?.profile}
          />
        ))}
      </Slider>

      <h3>Our Tour Guides</h3>
      <Slider {...sliderSettings}>
        {guides.map((guide) => (
          <AgentCard
            key={guide.guide_id}
            name={guide.full_name}
            email={guide.email}
            phone={guide.phone_number}
            rating={guide.rating}
            profile={users[guide.user_id]?.profile}
          />
        ))}
      </Slider>
    </div>
  );
};

export default Agents;
