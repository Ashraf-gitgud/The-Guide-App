import { BrowserRouter, Routes, Route } from "react-router-dom";
import Homepage from "./Pages/Homepage/Homepage";
import Attractiondetails from "./Pages/Attractiondetails/Attractiondetails";
import Nav from "./Components/Nav/Navbar";
import Footer from "./Components/Footer/Footer";
import Map from "./Components/Map/Map";
import HotelReservationForm from "./Components/Reservations/Hotel/HotelReservationForm";
import Login from "./Pages/Login";
import Register from "./Pages/Register";
import Attractions from "./Pages/Attractionspage";
import Hotelpage from "./Pages/Hotelpage/Hotelpage";
import About from "./Pages/About/About";
import Contact from "./Pages/Contact/Contact";
import Faq from "./Pages/Faq/Faq";
import Restaurantpage from "./Pages/Restaurantpage/Restaurantpage";
import Admindashboard from "./Pages/Admindashboard";
import GuideDashboard from "./Pages/GuideDashboard";
import DriverDashboard from "./Pages/DriverDashboard";
import HotelDashboard from "./Pages/HotelDashboard";
import RestaurantDashboard from "./Pages/RestaurantDashboard";
import CompleteProfile from "./Pages/CompleteProfile";
import "./App.css";
import RestaurantReservationForm from "./Components/Reservations/Restaurant/RestaurantReservationForm";
import GuideReservationForm from "./Components/Reservations/Guide/GuideReservationForm";
import DriverReservationForm from "./Components/Reservations/Driver/DriverReservationForm";
import TouristDashboard from "./Pages/dashboard/TouristDashboard";

function App() {
  return (
    <BrowserRouter>
      <Nav />
      <Routes>
        <Route path="/" element={<Homepage />} />
        <Route path="/map" element={<Map />} />
        <Route path="/about" element={<About />} />
        <Route path="/contact" element={<Contact />} />
        <Route path="/faq" element={<Faq />} />
        <Route path="/login" element={<Login />} />
        <Route path="/register" element={<Register />} />
        <Route path="/completeprofile" element={<CompleteProfile />} />
        <Route path="/dashboard" element={<Admindashboard />} />
        <Route path="/guide" element={<GuideDashboard />} />
        <Route path="/driver" element={<DriverDashboard />} />
        <Route path="/hotel" element={<HotelDashboard />} />
        <Route path="/restaurant" element={<RestaurantDashboard />} />
        <Route path="/attractions" element={<Attractions />} />
        <Route path="/attractions/:id" element={<Attractiondetails />} />
        <Route path="/hotels/:id" element={<Hotelpage />} />
        <Route path="/restaurants/:id" element={<Restaurantpage />} />
        <Route path="/reservations/hotel/:hotel_id/new" element={<HotelReservationForm />} />
        <Route path="/reservations/hotel/:id/edit" element={<HotelReservationForm />} />
        <Route path="/reservations/restaurant/:restaurant_id/new" element={<RestaurantReservationForm />} />
        <Route path="/reservations/restaurant/:id/edit" element={<RestaurantReservationForm />} />  
        <Route path="/reservations/guide/:place_id/new" element={<GuideReservationForm />} />
        <Route path="/reservations/guide/:id/edit" element={<GuideReservationForm />} />
        <Route path="/reservations/driver/:place_id/new" element={<DriverReservationForm />} />
        <Route path="/reservations/driver/:id/edit" element={<DriverReservationForm />} />
        <Route path="/tourist" element={<TouristDashboard />} />
      </Routes>
      <Footer />
    </BrowserRouter>
  );
}

export default App;