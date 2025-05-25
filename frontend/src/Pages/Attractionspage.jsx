import React, { useState, useEffect } from "react";
import axios from "axios";
import { Link } from "react-router-dom";
import "../style/Attractions.css";

const Attractionspage = () => {
    const [attractions, setAttractions] = useState([]);
    
    useEffect(() => {
        const fetchAttractions = async () => {
            try {
                const response = await axios.get('http://localhost:8000/api/attractions');
                setAttractions(response.data);
            } catch (err) {
                console.error(err);
                alert('Failed to load attractions');
            }
        };
        fetchAttractions();
    }, []);

    return (
        <div className="page-container">
            {/* Hero Section */}
            {/* ... (keep the existing hero section) ... */}
            
            {/* Crown Jewels Section */}
            {/* ... (keep the existing crown jewels section) ... */}

            {/* Attractions Grid */}
            <div className="attractions-container">
                {attractions.map((attraction, index) => (
                    <div
                        className={`card ${index % 5 === 0 ? 'card-vertical' : index % 8 === 0 ? 'card-horizontal' : ''}`}
                        key={attraction.id}
                        style={{ 
                            backgroundImage: `url(${attraction.image || "default-image.jpg"})` 
                        }}
                    >
                        <div className="card-overlay">
                            <div className="card-content">
                                <h3>{attraction.name}</h3>
                                {attraction.city && <p className="city-tag">{attraction.city}</p>}
                                <Link 
                                    to={`/attractions/${attraction.id}`} 
                                    className="see-more-btn"
                                >
                                    See More
                                </Link>
                            </div>
                        </div>
                    </div>
                ))}
            </div>
        </div>
    );
};

export default Attractionspage;