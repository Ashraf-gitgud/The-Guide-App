<<<<<<< HEAD
import React from 'react';
import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';
import Homepage from './Components/Homepage/Homepage';
=======
import { BrowserRouter, Routes, Route } from 'react-router-dom';
import Homepage from './Pages/Homepage/Homepage';
import Attractiondetails from './Pages/Attractiondetails/Attractiondetails';
>>>>>>> the_guide_app_frontend
import Nav from './Components/Nav/Navbar';
import Footer from './Components/Footer/Footer';
import Map from './Components/Map/Map';
<<<<<<< HEAD
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
=======
import Login from './Pages/Login';
import Register from './Pages/Register';
import Attractions from './Pages/Attractionspage'
import Hotelpage from './Pages/Hotelpage/Hotelpage'
import Restaurantpage from './Pages/Restaurantpage/Restaurantpage'

function App() {
return (
  <BrowserRouter>
    <Nav />
    <Routes>
      <Route path="/" element={<Homepage />} />
      <Route path="/map" element={<Map/>} />
      <Route path="/login" element={<Login/>} />
      <Route path="/register" element={<Register/>} />
      <Route path="/attractions" element={<Attractions/>} />
      <Route path="/attractions/:id" element={<Attractiondetails/>} />
      <Route path="/hotels/:id" element={<Hotelpage/>} />
      <Route path="/restaurants/:id" element={<Restaurantpage/>} />
    </Routes>
    <Footer />
  </BrowserRouter>
);
>>>>>>> the_guide_app_frontend
}

export default App;
