import React, { useState, useEffect } from 'react';
import { MapContainer, TileLayer, Marker, Popup } from 'react-leaflet';
import 'leaflet/dist/leaflet.css';
import styles from './Map.module.css';
import L from 'leaflet';

// Fix for default marker icon
delete L.Icon.Default.prototype._getIconUrl;
L.Icon.Default.mergeOptions({
  iconRetinaUrl: require('leaflet/dist/images/marker-icon-2x.png'),
  iconUrl: require('leaflet/dist/images/marker-icon.png'),
  shadowUrl: require('leaflet/dist/images/marker-shadow.png'),
});

const Map = () => {
  const [locations, setLocations] = useState([]);
  const [mapCenter, setMapCenter] = useState([35.759465, -5.833954]); // Morocco center
  const [mapZoom, setMapZoom] = useState(6);

  useEffect(() => {
    // Placeholder for API call
    // In the future, replace this with your actual API call
    const fetchLocations = async () => {
      // Simulating API response
      const mockLocations = [
        { id: 1, name: "Tangier", position: [35.759465, -5.833954] }
      ];
      setLocations(mockLocations);
    };

    fetchLocations();
  }, []);

  return (
    <div className={styles.mapContainer}>
      <MapContainer 
        center={mapCenter} 
        zoom={mapZoom} 
        className={styles.map}
      >
        <TileLayer
          attribution='&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
          url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"
        />
        {locations.map((location) => (
          <Marker key={location.id} position={location.position}>
            <Popup>{location.name}</Popup>
          </Marker>
        ))}
      </MapContainer>
    </div>
  );
};

export default Map;
