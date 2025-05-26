import axios from 'axios';

const axiosInstance = axios.create({
    baseURL: 'http://localhost:8000/api',
    headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json'
    }
});

// Add request interceptor to include the token
axiosInstance.interceptors.request.use(
    (config) => {
        // Get token from localStorage
        const token = localStorage.getItem('auth_token');
        
        // If token exists, add it to the headers
        if (token) {
            config.headers.Authorization = `Bearer ${token}`;
        }
        
        return config;
    },
    (error) => {
        return Promise.reject(error);
    }
);

// Add response interceptor to handle token expiration
axiosInstance.interceptors.response.use(
    (response) => response,
    (error) => {
        if (error.response?.status === 401) {
            // Token is invalid or expired
            localStorage.removeItem('auth_token');
        }
        return Promise.reject(error);
    }
);

export default axiosInstance; 