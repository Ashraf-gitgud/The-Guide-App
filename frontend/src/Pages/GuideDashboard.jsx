import React, { useEffect, useState } from "react";
import axios from "axios";
import "../style/GuideDashboard.css";

const GuideDashboard = () => {
    const [guide, setGuide] = useState({});
    const [reservations, setReservations] = useState([]);
    const [loading, setLoading] = useState(true);
    const token = localStorage.getItem("token");

    useEffect(() => {
        fetchDashboard();
    }, []);

    const fetchDashboard = async () => {
        try {
            const res = await axios.get("http://localhost:8000/api/guide/dashboard", {
                headers: { Authorization: `Bearer ${token}` },
            });
            setGuide(res.data.guide);
            setReservations(res.data.reservations);
        } catch (err) {
            console.error(err);
            alert("Failed to load dashboard");
        } finally {
            setLoading(false);
        }
    };

    const handleAccept = async (id) => {
        try {
            await axios.post(`http://localhost:8000/api/guide/reservations/${id}/accept`, {}, {
                headers: { Authorization: `Bearer ${token}` },
            });
            fetchDashboard(); // Refresh
        } catch (err) {
            console.error(err);
            alert("Failed to accept reservation");
        }
    };

    const handleRefuse = async (id) => {
        try {
            await axios.post(`http://localhost:8000/api/guide/reservations/${id}/refuse`, {}, {
                headers: { Authorization: `Bearer ${token}` },
            });
            fetchDashboard(); // Refresh
        } catch (err) {
            console.error(err);
            alert("Failed to refuse reservation");
        }
    };

    const handleDelete = async (id) => {
        try {
            await axios.delete(`http://localhost:8000/api/guide/reservations/${id}`, {
                headers: { Authorization: `Bearer ${token}` },
            });
            fetchDashboard(); // Refresh
        } catch (err) {
            console.error(err);
            alert("Failed to delete reservation");
        }
    };

    const getStatusClass = (status) => {
        switch(status) {
            case 'pending': return 'status-pending';
            case 'accepted': return 'status-accepted';
            case 'refused': return 'status-refused';
            default: return '';
        }
    };

    if (loading) return (
        <div className="loading-container">
            <p className="loading-text">Loading dashboard...</p>
        </div>
    );

    return (
        <div className="guide-dashboard">
            <div className="dashboard-header">
                <h1 className="dashboard-title">Guide Dashboard</h1>
                <div className="profile-section">
                    <img src={guide.profile_picture} alt="Profile" className="profile-image" />
                    <h2 className="guide-name">{guide.name}</h2>
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

export default GuideDashboard;