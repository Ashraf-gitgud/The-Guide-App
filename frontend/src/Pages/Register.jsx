import React, { useState } from "react";
import axios from "axios";
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

    const handleChange = (e) => {
        setFormData({ ...formData, [e.target.name]: e.target.value });
    };

    const handleSubmit = async (e) => {
        e.preventDefault();
        try {
            await axios.post('http://localhost:8000/api/register', formData);
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
                    <option value="driver">Driver</option>
                    <option value="hotel">Hotel Representative</option>
                    <option value="restaurant">Restaurant Owner</option>
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