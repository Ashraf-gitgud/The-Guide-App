import React, { useState } from "react";
import axios from "axios";
import "../style/Login.css";
import { Link, useNavigate } from 'react-router-dom';

const Login = () => {
    const [login, setLogin] = useState({
        email: '',
        password: ''
    });
    const [error, setError] = useState('');
    const navigate = useNavigate();
    
    const handleChange = (e) => {
        setLogin({...login, [e.target.name] : e.target.value})
    }
    
    const handleSubmit = async (e) => {
        e.preventDefault();
        try {
            const response = await axios.post("http://localhost:8000/api/login", login);

            if (response.data && response.data.user) {
                // Store the token
                localStorage.setItem('token', response.data.access_token);
                // Store the user ID
                localStorage.setItem('user_id', response.data.user.user_id);
                navigate('/');

            }
        } catch(err) {
            console.log(err);
            setError(err.response?.data?.message || "Failed to login");
        }
    }

    return (
        <div className="login-container">
            <form onSubmit={handleSubmit} className="login-form">
                <h2 className="form-title">Explore Morocco</h2>
                <p className="form-subtitle">Sign in to your account</p>
                
                {error && <div className="error-message">{error}</div>}
                
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
                    <a type="button" href="/login/" className="form-link">Forgot password?</a>
                    <span className="form-divider">|</span>
                    <Link to="/register" className="form-link">Create account</Link>
                </div>
            </form>
        </div>
    )
}

export default Login;