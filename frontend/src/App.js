import { BrowserRouter, Routes, Route } from 'react-router-dom';
import Homepage from './Components/Homepage/Homepage';
import Nav from './Components/Nav/Navbar';
import Map from './Components/Map/Map';

function App() {
return (
  <BrowserRouter>
    <Nav />
    <Routes>
      <Route path="/" element={<Homepage />} />
      <Route path="/map" element={<Map/>} />
    </Routes>
  </BrowserRouter>
);
}

export default App;
