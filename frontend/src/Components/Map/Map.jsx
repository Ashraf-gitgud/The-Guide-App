import React, { useState, useEffect, useRef } from 'react';
import { MapContainer, TileLayer, Marker, Popup } from 'react-leaflet';
import { Link } from "react-router-dom";
import 'leaflet/dist/leaflet.css';
import styles from './Map.module.css';
import L from 'leaflet';
import axios from 'axios';

const hotelIcon = L.icon({
  iconUrl: '/images/markers/bed.png',
  iconSize: [32, 32],
  iconAnchor: [14, 28],
  popupAnchor: [0, -28],
});

const restaurantIcon = L.icon({
  iconUrl: '/images/markers/fork.png',
  iconSize: [32, 32],
  iconAnchor: [14, 28],
  popupAnchor: [0, -28],
});

const attractionIcon = L.icon({
  iconUrl: '/images/markers/location.png',
  iconSize: [32, 32],
  iconAnchor: [14, 28],
  popupAnchor: [0, -28],
});

delete L.Icon.Default.prototype._getIconUrl;
L.Icon.Default.mergeOptions({
  iconRetinaUrl: 'https://unpkg.com/leaflet@1.9.4/dist/images/marker-icon-2x.png',
  iconUrl: 'https://unpkg.com/leaflet@1.9.4/dist/images/marker-icon.png',
  shadowUrl: 'https://unpkg.com/leaflet@1.9.4/dist/images/marker-shadow.png',
});

const Map = () => {
  const [locations, setLocations] = useState([]);
  const [mapCenter, setMapCenter] = useState([35.759465, -5.833954]);
  const [mapZoom, setMapZoom] = useState(10);
  const [searchQuery, setSearchQuery] = useState('');
  const [suggestions, setSuggestions] = useState([]);
  const mapRef = useRef();

  useEffect(() => {
    const fetchLocations = async () => {
      try {
        const [hotelsRes, restaurantsRes, attractionsRes] = await Promise.all([
          axios.get(`${process.env.REACT_APP_API_URL}/hotels`),
          axios.get(`${process.env.REACT_APP_API_URL}/restaurants`),
          axios.get(`${process.env.REACT_APP_API_URL}/attractions`),
        ]);

        const parsePosition = (position) => {
          try {
            if (typeof position === 'string') {
              const parsed = JSON.parse(position);
              if (Array.isArray(parsed) && parsed.length === 2 && typeof parsed[0] === 'number' && typeof parsed[1] === 'number') {
                return parsed;
              }
            }
            console.warn('Invalid position format:', position);
            return null;
          } catch (error) {
            console.error('Error parsing position:', position, error);
            return null;
          }
        };

        const hotels = hotelsRes.data
          .map(hotel => ({
            ...hotel,
            type: 'hotel',
            position: parsePosition(hotel.position),
          }))
          .filter(hotel => hotel.position);

        const restaurants = restaurantsRes.data
          .map(restaurant => ({
            ...restaurant,
            type: 'restaurant',
            position: parsePosition(restaurant.position),
          }))
          .filter(restaurant => restaurant.position);

        const attractions = attractionsRes.data
          .map(attraction => ({
            ...attraction,
            type: 'attraction',
            position: parsePosition(attraction.position),
          }))
          .filter(attraction => attraction.position);

        const allLocations = [...hotels, ...restaurants, ...attractions];
        console.log('Processed locations:', allLocations);
        setLocations(allLocations);
      } catch (error) {
        console.error('Error fetching locations:', error);
      }
    };

    fetchLocations();
  }, []);

  const handleSearch = (e) => {
    const query = e.target.value;
    setSearchQuery(query);
    if (query) {
      const filtered = locations
        .filter(loc => loc.name.toLowerCase().includes(query.toLowerCase()))
        .slice(0, 3);
      setSuggestions(filtered);
    } else {
      setSuggestions([]);
    }
  };

  const handleSelectLocation = (position) => {
    setMapCenter(position);
    setMapZoom(14);
    setSearchQuery('');
    setSuggestions([]);
    if (mapRef.current) {
      mapRef.current.flyTo(position, 14);
    }
  };

  return (
    <div className={styles.mapContainer}>
      <div className={styles.searchContainer}>
        <input
          type="text"
          value={searchQuery}
          onChange={handleSearch}
          placeholder="Search locations..."
          className={styles.searchInput}
        />
        {suggestions.length > 0 && (
          <ul className={styles.suggestions}>
            {suggestions.map((loc) => (
              <li
                key={`${loc.type}-${loc.id}`}
                onClick={() => handleSelectLocation(loc.position)}
                className={styles.suggestionItem}
              >
                {loc.name} ({loc.type})
              </li>
            ))}
          </ul>
        )}
      </div>
      <MapContainer 
        center={mapCenter} 
        zoom={mapZoom} 
        className={styles.map}
        ref={mapRef}
      >
        <TileLayer
          attribution='© <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
          url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"
        />
        {locations.map((location) => {
          let icon;
          switch (location.type) {
            case 'hotel':
              icon = hotelIcon;
              break;
            case 'restaurant':
              icon = restaurantIcon;
              break;
            case 'attraction':
              icon = attractionIcon;
              break;
            default:
              icon = null;
          }
          return (
            <Marker 
              key={`${location.type}-${location.id}`} 
              position={location.position}
              icon={icon}
            >
              <Popup>
                {location.image && (
                  <img src={location.image} alt={location.name} style={{ width: '100%', maxHeight: '150px', objectFit: 'cover' }} />
                )}
                <h3>{location.name}</h3>
                <p>Type: {location.type}</p>
                <p>Opening Hours: {location.social_hours || 'N/A'}</p>
                <p>Rating: {location.rating || 'N/A'}</p>
                {location.type !== 'attraction' && (
                  <p>Phone: {location.phone_number || 'N/A'}</p>
                )}
              </Popup>
            </Marker>
          );
        })}
      </MapContainer>
    </div>
  );
};

export default Map;
