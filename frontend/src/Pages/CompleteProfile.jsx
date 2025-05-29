import React, { useState, useEffect } from "react";
import axios from "axios";
import { useNavigate } from "react-router-dom";
import "../style/CompleteProfile.css";

const CompleteProfile = () => {
  const [userRole, setUserRole] = useState(null);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState(null);
  const [showHint, setShowHint] = useState(false);
  const navigate = useNavigate();

  // Form states for different roles
  const [touristForm, setTourisForm] = useState({
    phone_number: "",

  });

  const [driverForm, setDriverForm] = useState({
    carte_nationale: "",
    driver_license: "",
    phone_number: "",
    rating: 0,
  });

  const [hotelForm, setHotelForm] = useState({
    phone_number: "",
    adress: "",
    hotel_rating: 0,
    rating: 0,
    position: "",
  });

  const [restaurantForm, setRestaurantForm] = useState({
    phone_number: "",
    adress: "",
    restaurant_rating: 0,
    rating: 0,
    position: "",
  });

  const [guideForm, setGuideForm] = useState({
    carte_nationale: "",
    license_guide: "",
    phone_number: "",
    rating: 0,
  });

  useEffect(() => {
    const fetchUserRole = async () => {
      try {
        const response = await axios.get(`${process.env.REACT_APP_API_URL}/me`, {
          headers: {
            Authorization: `Bearer ${localStorage.getItem("token")}`,
          },
        });
        setUserRole(response.data.role);
        setLoading(false);
      } catch (err) {
        setError("Failed to fetch user role");
        setLoading(false);
      }
    };

    fetchUserRole();
  }, []);

  const handleTourisChange = (e) => {
    setTourisForm({ ...touristForm, [e.target.name]: e.target.value });
  };

  const handleDriverChange = (e) => {
    setDriverForm({ ...driverForm, [e.target.name]: e.target.value });
  };

  const handleHotelChange = (e) => {
    const { name, value } = e.target;
    setHotelForm(prev => {
      const newValue = name === 'position' ? `[${value}]` : value;
      return { ...prev, [name]: newValue };
    });
  };

  const handleRestaurantChange = (e) => {
    const { name, value } = e.target;
    setRestaurantForm(prev => {
      const newValue = name === 'position' ? `[${value}]` : value;
      return { ...prev, [name]: newValue };
    });
  };

  const handleGuideChange = (e) => {
    setGuideForm({ ...guideForm, [e.target.name]: e.target.value });
  };

  const handleSubmit = async (e) => {
    e.preventDefault();
    try {
      let formData;
      switch (userRole) {
        case "tourist":
          formData = touristForm;
          break;
        case "transporter":
          formData = driverForm;
          break;
        case "hotel":
          formData = hotelForm;
          break;
        case "restaurant":
          formData = restaurantForm;
          break;
        case "guide":
          formData = guideForm;
          break;
        default:
          return;
      }

      await axios.post(
        `${process.env.REACT_APP_API_URL}/complete-registration`,
        formData,
        {
          headers: {
            Authorization: `Bearer ${localStorage.getItem("token")}`,
          },
        }
      );

      alert("Profile completed successfully! Pending admin approval.");
      navigate("/");
    } catch (err) {
      console.error(err);
      alert("Failed to complete profile");
    }
  };

  if (loading) return <div>Loading...</div>;
  if (error) return <div>{error}</div>;

  return (
    <div className="profile-completion-container">
      <h2>Complete Your Profile</h2>
      <p>Please provide additional information based on your role</p>

      <form onSubmit={handleSubmit}>

        {userRole === "tourist" && (
          <div className="tourist-form">
            <h3>Tourist Information</h3>
            <input
              name="phone_number"
              value={touristForm.phone_number}
              onChange={handleTourisChange}
              placeholder="Phone Number"
              required
            />
          </div>
        )}

        {userRole === "transporter" && (
          <div className="driver-form">
            <h3>Driver Information</h3>
            <input
              name="carte_nationale"
              value={driverForm.carte_nationale}
              onChange={handleDriverChange}
              placeholder="National ID"
              required
            />
            <input
              name="driver_license"
              value={driverForm.driver_license}
              onChange={handleDriverChange}
              placeholder="Driver License"
              required
            />
            <input
              name="phone_number"
              value={driverForm.phone_number}
              onChange={handleDriverChange}
              placeholder="Phone Number"
              required
            />
            <input
              name="rating"
              type="number"
              min="1"
              max="5"
              value={driverForm.rating}
              onChange={handleDriverChange}
              placeholder="Rating (1-5)"
            />
          </div>
        )}

        {userRole === "hotel" && (
          <div className="hotel-form">
            <h3>Hotel Information</h3>
            <input
              name="phone_number"
              value={hotelForm.phone_number}
              onChange={handleHotelChange}
              placeholder="Phone Number"
              required
            />
            <input
              name="adress"
              value={hotelForm.adress}
              onChange={handleHotelChange}
              placeholder="Address"
              required
            />
            <input
              name="hotel_rating"
              type="number"
              min="1"
              max="5"
              value={hotelForm.hotel_rating}
              onChange={handleHotelChange}
              placeholder="Hotel Rating (1-5)"
              required
            />
            <input
              name="rating"
              type="number"
              min="1"
              max="5"
              value={hotelForm.rating}
              onChange={handleHotelChange}
              placeholder="Rating (1-5)"
            />
            <div className="input-with-hint">
              <input
                name="position"
                value={hotelForm.position}
                onChange={handleHotelChange}
                onFocus={() => setShowHint(true)}
                onBlur={() => setShowHint(false)}
                placeholder="Position"
              />
              {showHint && (
                <small className="hint-text">Enter GPS coordinates like <code>35.6895, -0.1234</code> u can copy them from google maps</small>
              )}
            </div>
          </div>
        )}

        {userRole === "restaurant" && (
          <div className="restaurant-form">
            <h3>Restaurant Information</h3>
            <input
              name="phone_number"
              value={restaurantForm.phone_number}
              onChange={handleRestaurantChange}
              placeholder="Phone Number"
              required
            />
            <input
              name="adress"
              value={restaurantForm.adress}
              onChange={handleRestaurantChange}
              placeholder="Address"
              required
            />
            <input
              name="restaurant_rating"
              type="number"
              min="1"
              max="5"
              value={restaurantForm.restaurant_rating}
              onChange={handleRestaurantChange}
              placeholder="Restaurant Rating (1-5)"
              required
            />
            <input
              name="rating"
              type="number"
              min="1"
              max="5"
              value={restaurantForm.rating}
              onChange={handleRestaurantChange}
              placeholder="Rating (1-5)"
            />
           <div className="input-with-hint">
              <input
                name="position"
                value={restaurantForm.position}
                onChange={handleRestaurantChange}
                onFocus={() => setShowHint(true)}
                onBlur={() => setShowHint(false)}
                placeholder="Position"
              />
              {showHint && (
                <small className="hint-text">Enter GPS coordinates like <code>35.6895, -0.1234</code>  u can copy them from google maps</small>
              )}
            </div>
          </div>
        )}

        {userRole === "guide" && (
          <div className="guide-form">
            <h3>Guide Information</h3>
            <input
              name="carte_nationale"
              value={guideForm.carte_nationale}
              onChange={handleGuideChange}
              placeholder="National ID"
              required
            />
            <input
              name="license_guide"
              value={guideForm.license_guide}
              onChange={handleGuideChange}
              placeholder="Guide License"
              required
            />
            <input
              name="phone_number"
              value={guideForm.phone_number}
              onChange={handleGuideChange}
              placeholder="Phone Number"
              required
            />
            <input
              name="rating"
              type="number"
              min="1"
              max="5"
              value={guideForm.rating}
              onChange={handleGuideChange}
              placeholder="Rating (1-5)"
            />
          </div>
        )}

        <button type="submit" className="submit-button">
          Complete Registration
        </button>
      </form>
    </div>
  );
};

export default CompleteProfile;