import React, { useState } from "react";
import axios from "axios";
import "../style/Login.css";
import { BrowserRouter, Routes, Route ,Link } from 'react-router-dom';

const Login = () => {
    const [login, setLogin] = useState({
        email: '',
        password: ''
    });
    
    const handleChange = (e) => {
        setLogin({...login, [e.target.name] : e.target.value})
    }
    
    const handleSubmit = async (e) => {
        e.preventDefault();
        try {
            const response = await axios.post("http://localhost:8000/api/login", login);
            const token = response.data.access_token; 
            if (token) {
                localStorage.setItem('token', token);
                localStorage.setItem('user_id', response.data.user.user_id);
                localStorage.setItem('role', response.data.user.role);
                alert("Logged in successfully!");
            } else {
                alert("No token received");
            }
        } catch(err) {
            console.log(err);
            alert("Failed to login");
        }
    }

    return (
        <div className="login-container">
            <form onSubmit={handleSubmit} className="login-form">
                <h2 className="form-title">Explore Morocco</h2>
                <p className="form-subtitle">Sign in to your account</p>
                
                <input 
                    name="email" 
                    onChange={handleChange} 
                    placeholder="Email" 
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
                
                <button type="submit" className="form-button">
                    Login
                </button>
                
                <div className="form-footer">
                    <a href="#" className="form-link">Forgot password?</a>
                    <span className="form-divider">|</span>
                    <Link to ="/register" className="form-link">Create account</Link>
                </div>
            </form>
        </div>
    )
}

export default Login;