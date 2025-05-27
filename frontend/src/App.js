import { BrowserRouter, Routes, Route } from 'react-router-dom';
import Homepage from './Pages/Homepage/Homepage';
import Attractiondetails from './Pages/Attractiondetails/Attractiondetails';
import Nav from './Components/Nav/Navbar';
import Footer from './Components/Footer/Footer';
import Map from './Components/Map/Map';
import HotelReservationList from './Components/Reservations/Hotel/HotelReservationList';
import HotelReservationForm from './Components/Reservations/Hotel/HotelReservationForm';
import Login from './Pages/Login';
import Register from './Pages/Register';
import Attractions from './Pages/Attractionspage'
import Hotelpage from './Pages/Hotelpage/Hotelpage'
import Restaurantpage from './Pages/Restaurantpage/Restaurantpage'
import './App.css';

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
          <Route path="/reservations/hotel" element={<HotelReservationList />} />
          <Route path="/reservations/hotel/:hotel_id/new" element={<HotelReservationForm />} />
          <Route path="/reservations/hotel/:id/edit" element={<HotelReservationForm />} />
        </Routes>
        <Footer />
      </BrowserRouter>
  );
}

export default App;
