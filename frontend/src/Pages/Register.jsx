import React, { useState } from "react";
import axios from "axios";
import { useNavigate } from "react-router-dom";
import "../style/Register.css";

const Register = () => {
   const [formData, setFormData] = useState({
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
        role: '',
        profile: ''
    });

    const navigate = useNavigate();

    const handleChange = (e) => {
        setFormData({ ...formData, [e.target.name]: e.target.value });
    };

    const handleSubmit = async (e) => {
        e.preventDefault();
        try {
            const response = await axios.post(`${process.env.REACT_APP_API_URL}/register`, formData,
                {
                headers: {
                    "Content-Type": "multipart/form-data",
                },
                }
            );

            // Store the token
            localStorage.setItem("token", response.data.access_token);
            
            // Redirect to profile completion
            navigate("/completeprofile");
            alert('Registered successfully!');
        } catch (err) {
            console.error(err);
            alert('Registration failed');
        }
    };

    return (
        <div className="register-container">
            <form onSubmit={handleSubmit} className="register-form">
                <h2 className="form-title">Join Our GUIDE Community</h2>
                <p className="form-subtitle">Create your account to explore Morocco</p>
                
                <input 
                    name="name" 
                    onChange={handleChange} 
                    placeholder="Full Name" 
                    className="form-input"
                    required 
                />
                
                <input 
                    name="email" 
                    onChange={handleChange} 
                    placeholder="Email Address" 
                    className="form-input"
                    required 
                />
                
                <input 
                    name="password" 
                    onChange={handleChange} 
                    placeholder="Password" 
                    type="password" 
                    className="form-input"
                    required 
                />
                
                <input 
                    name="password_confirmation" 
                    onChange={handleChange} 
                    placeholder="Confirm Password" 
                    type="password" 
                    className="form-input"
                    required 
                />
                
                <select 
                    name="role" 
                    onChange={handleChange} 
                    className="form-select"
                    required
                >
                    <option value="">Select Your Role</option>
                    <option value="tourist">Tourist</option>
                    <option value="guide">Tour Guide</option>
                    <option value="transporter">Driver</option>
                    <option value="hotel">Hotel</option>
                    <option value="restaurant">Restaurant</option>
                </select>
                
                <div className="file-upload-wrapper">
                    <label className="file-upload-label">
                        <span>Profile Picture</span>
                        <input 
                            type="file" 
                            name="profile" 
                            onChange={handleChange} 
                            className="file-upload-input"
                            required
                        />
                    </label>
                </div>
                
                <button type="submit" className="form-button">
                    Create Account
                </button>
                
                <div className="form-footer">
                    <span>Already have an account?</span>
                    <a href="/login" className="form-link">Sign In</a>
                </div>
            </form>
        </div>
    );
};

export default Register;