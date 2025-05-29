import { useEffect, useState } from "react";
import axios from "axios";
import '../style/Admindashboard.css';

const API = process.env.REACT_APP_API_URL;
const token = localStorage.getItem('token');

export default function Admindashboard() {
  const [data, setData] = useState(null);
  const [loading, setLoading] = useState(true);

  const fetchDashboard = async () => {
    try {
      const res = await axios.get(`${API}/admin/dashboard`, {
        headers: {
          Authorization: `Bearer ${token}`
        }
      });
      setData(res.data);
      setLoading(false);
    } catch (err) {
      console.error(err);
    }
  };

  useEffect(() => {
    fetchDashboard();
  }, []);

  const handleAction = async (type, id, action) => {
    try {
      const url = `${API}/admin/${action}-account`;
      await axios.post(url, { type, id }, {
        headers: {
          Authorization: `Bearer ${token}`
        }
      });
      fetchDashboard();
    } catch (err) {
      console.error(err);
    }
  };

  if (loading || !data) return <div className="dashboard-container">Loading...</div>;

  const renderList = (list, type) => (
    <div className="list-section">
      <h3 className="list-title">{type}s</h3>
      {list.length === 0 ? (
        <p className="list-empty">No pending {type}s.</p>
      ) : (
        <ul className="list">
          {list.map((item) => (
            <li key={item.id || item[`${type}_id`]} className="list-item">
              <div className="list-item-info">
                <p>{item.full_name || item.name}</p>
                <p>{item.email}</p>
              </div>
              <div className="button-group">
                <button
                  className="btn-approve"
                  onClick={() => handleAction(type, item[`${type}_id`], "approve")}
                >
                  Approve
                </button>
                <button
                  className="btn-refuse"
                  onClick={() => handleAction(type, item[`${type}_id`], "remove")}
                >
                  Refuse
                </button>
              </div>
            </li>
          ))}
        </ul>
      )}
    </div>
  );

  return (
    <div className="dashboard-container">
      <h1 className="dashboard-title">Admin Dashboard</h1>
      <div className="stats-grid">
        <div className="stats-card">
          <h2>Total Users</h2>
          <p>{data.total_users}</p>
        </div>
        <div className="stats-card">
          <h2>Total Reviews</h2>
          <p>{data.total_reviews}</p>
        </div>
      </div>

      {renderList(data.pending_accounts.guides, "guide")}
      {renderList(data.pending_accounts.drivers, "driver")}
      {renderList(data.pending_accounts.hotels, "hotel")}
      {renderList(data.pending_accounts.restaurants, "restaurant")}
    </div>
  );
}
