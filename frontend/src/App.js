import React from 'react';
import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';
import Homepage from './Components/Homepage/Homepage';
import Nav from './Components/Nav/Navbar';
import Map from './Components/Map/Map';
import HotelReservationList from './Components/Reservations/Hotel/HotelReservationList';
import HotelReservationForm from './Components/Reservations/Hotel/HotelReservationForm';
import './App.css';

function App() {
  return (
    <Router>
      <div className="App">
        <Nav />
        <Routes>
          <Route path="/" element={<Homepage />} />
          <Route path="/map" element={<Map />} />
          <Route path="/reservations/hotel" element={<HotelReservationList />} />
          <Route path="/reservations/hotel/new" element={<HotelReservationForm />} />
          <Route path="/reservations/hotel/:id/edit" element={<HotelReservationForm />} />
        </Routes>
      </div>
    </Router>
  );
}

export default App;
