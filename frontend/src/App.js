import { BrowserRouter, Routes, Route } from 'react-router-dom';
import Homepage from './Pages/Homepage/Homepage';
import Attractiondetails from './Pages/Attractiondetails/Attractiondetails';
import Nav from './Components/Nav/Navbar';
import Footer from './Components/Footer/Footer';
import Map from './Components/Map/Map';
import Login from './Pages/Login';
import Register from './Pages/Register';
import Attractions from './Pages/Attractionspage'
import AttractionPage from './Pages/Attractiondetails/Attractiondetails';

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
    </Routes>
    <Footer />
  </BrowserRouter>
);
}

export default App;
