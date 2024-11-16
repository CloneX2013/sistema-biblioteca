import React, { createContext, useState, useContext, useEffect } from 'react';
import api from '../services/api';

const AuthContext = createContext({});

export function AuthProvider({ children }) {
    const [user, setUser] = useState(null);
    const [loading, setLoading] = useState(true);

    useEffect(() => {
        const token = localStorage.getItem('@App:token');
        const storedUser = localStorage.getItem('@App:user');

        if (token && storedUser) {
            api.defaults.headers.authorization = `Bearer ${token}`;
            setUser(JSON.parse(storedUser));
        }
        setLoading(false);
    }, []);

    const signIn = async (email, password) => {
        try {
            const response = await api.post('/login', { email, password });
            const { token, user } = response.data;

            localStorage.setItem('@App:token', token);
            localStorage.setItem('@App:user', JSON.stringify(user));

            api.defaults.headers.authorization = `Bearer ${token}`;
            setUser(user);
        } catch (error) {
            throw error;
        }
    };

    const signOut = async () => {
        try {
            await api.post('/logout');
        } catch (error) {
            console.error('Logout error:', error);
        } finally {
            localStorage.removeItem('@App:token');
            localStorage.removeItem('@App:user');
            setUser(null);
            delete api.defaults.headers.authorization;
        }
    };

    return (
        <AuthContext.Provider value={{ signed: !!user, user, loading, signIn, signOut }}>
            {children}
        </AuthContext.Provider>
    );
}

export function useAuth() {
    return useContext(AuthContext);
} 