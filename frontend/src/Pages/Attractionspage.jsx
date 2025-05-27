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
        <div className="attractions-page-container">
            {/* Hero Section */}
            <div className="attractions-header">
                <div className="attractions-hero-content">
                    <h1>Discover Morocco's Hidden Gems</h1>
                    <p>Explore the most breathtaking attractions in every corner of the North — from ancient kasbahs to stunning waterfalls.</p>
                </div>
            </div>
            
            {/* Crown Jewels Section */}
            <div className="attractions-crown-jewels-section">
                <div className="attractions-section-inner">
                    <h1 className="attractions-section-title">Northern Morocco's Crown Jewels</h1>
                    <h2 className="attractions-section-subtitle">To travel is to live</h2>
                    <p className="attractions-section-description">Must-visit destinations in Morocco's magical north that will steal your heart</p>
                    <div className="attractions-divider-line"></div>
                </div>
            </div>

            {/* Attractions Grid */}
            <div className="attractions-container">
                {attractions.map((attraction, index) => (
                    <div
                        className={`attractions-card ${index % 5 === 0 ? 'attractions-card-vertical' : index % 8 === 0 ? 'attractions-card-horizontal' : ''}`}
                        key={attraction.id}
                        style={{ 
                            backgroundImage: `url(${attraction.image || "default-image.jpg"})` 
                        }}
                    >
                        <div className="attractions-card-overlay">
                            <div className="attractions-card-content">
                                <h3>{attraction.name}</h3>
                                {attraction.city && <p className="attractions-city-tag">{attraction.city}</p>}
                                <Link 
                                    to={`/attractions/${attraction.id}`} 
                                    className="attractions-see-more-btn"
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