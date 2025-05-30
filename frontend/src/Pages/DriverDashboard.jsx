import React, { useEffect, useState } from "react";
import { useNavigate } from "react-router";
import axios from "axios";
import "../style/DriverDashboard.css"

const DriverDashboard = () => {
  const [driver, setDriver] = useState({});
  const [reservations, setReservations] = useState([]);
  const [loading, setLoading] = useState(true);
  const token = localStorage.getItem("token");
  const navigate = useNavigate();

  useEffect(() => {
    fetchDashboard();
  }, []);

  const fetchDashboard = async () => {
    try {
      const res = await axios.get(`${process.env.REACT_APP_API_URL}/driver/reservations`, {
        headers: { Authorization: `Bearer ${token}` },
      });
      setDriver(res.data.driver);
      setReservations(res.data.reservations);
    } catch (err) {
      console.log(err);
      alert("Failed to load dashboard");
      navigate("/");
    } finally {
      setLoading(false);
    }
  };

  const handleAccept = async (id) => {
    try {
      await axios.post(
        `${process.env.REACT_APP_API_URL}/driver/reservations/${id}/accept`,
        {},
        {
          headers: { Authorization: `Bearer ${token}` },
        }
      );
      fetchDashboard();
    } catch (err) {
      console.error(err);
      alert("Failed to accept reservation");
    }
  };

  const handleDelete = async (id) => {
    try {
      await axios.delete(`${process.env.REACT_APP_API_URL}/driver/reservations/${id}`, {
        headers: { Authorization: `Bearer ${token}` },
      });
      fetchDashboard();
    } catch (err) {
      console.error(err);
      alert("Failed to delete reservation");
    }
  };

  const getStatusClass = (status) => {
    switch (status) {
      case "pending":
        return "status-pending";
      case "confirmed":
        return "status-confirmed";
      case "cancelled":
        return "status-cancelled";
      default:
        return "";
    }
  };

  if (loading)
    return (
      <div className="loading-container">
        <p className="loading-dots">
          <div class="dot"></div>
          <div class="dot"></div>
          <div class="dot"></div>
        </p>
      </div>
    );

  return (
    <div className="driver-dashboard">
      <div className="dashboard-header">
        <h1 className="dashboard-title">Driver Dashboard</h1>
        <div className="profile-section">
                <img src={driver.profile_picture} alt="Profile" className="profile-image" />
                <h2 className="guide-name">{driver.name}</h2>
        </div>
      </div>

      <div className="dashboard-content">
        <h3 className="reservations-title">Reservations</h3>
        {reservations.length === 0 ? (
          <p className="no-reservations">No reservations yet.</p>
        ) : (
          <div className="reservations-container">
            {reservations.map((res) => (
              <div key={res.id} className="reservation-card">
                <p className="reservation-text">
                  <strong>Passenger:</strong> {res?.user?.name ?? "Unknown"}
                </p>
                <p className="reservation-text">
                  <strong>Date:</strong> {res.date}
                </p>
                <p className="reservation-text">
                  <strong>Status:</strong>{" "}
                  <span className={getStatusClass(res.status)}> {res.status}</span>
                </p>
                <p className="reservation-text">
                  <strong>Details:</strong> {res.details ?? "N/A"}
                </p>

                <div className="button-group">
                  {res.status === "pending" && (
                    <button onClick={() => handleAccept(res.id)} className="accept-button">
                      ✅ Accept
                    </button>
                  )}
                  <button onClick={() => handleDelete(res.id)} className="delete-button">
                    🗑️ Delete
                  </button>
                </div>
              </div>
            ))}
          </div>
        )}
      </div>
    </div>
  );
};

export default DriverDashboard;
