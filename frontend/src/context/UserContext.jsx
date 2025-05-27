import React, { createContext, useState, useContext } from 'react';

const UserContext = createContext(null);

export const UserProvider = ({ children }) => {
    const [userId, setUserId] = useState(localStorage.getItem('userId'));

    const setUser = (id) => {
        localStorage.setItem('userId', id);
        setUserId(id);
    };

    const clearUser = () => {
        localStorage.removeItem('userId');
        setUserId(null);
    };

    return (
        <UserContext.Provider value={{ userId, setUser, clearUser }}>
            {children}
        </UserContext.Provider>
    );
};

export const useUser = () => {
    const context = useContext(UserContext);
    if (!context) {
        throw new Error('useUser must be used within a UserProvider');
    }
    return context;
}; 