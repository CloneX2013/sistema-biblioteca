import React from 'react';
import { BrowserRouter, Routes, Route, Navigate } from 'react-router-dom';
import { AuthProvider } from '../contexts/AuthContext';
import { Toaster } from 'react-hot-toast';
import Login from '../pages/Login';
import Tasks from '../pages/Tasks';
import { useAuth } from '../contexts/AuthContext';

// Componente para rotas protegidas
const PrivateRoute = ({ children }) => {
    const { signed, loading } = useAuth();
    
    if (loading) {
        return <div>Loading...</div>;
    }
    
    if (!signed) {
        return <Navigate to="/login" />;
    }
    
    return children;
};

// Componente para rotas públicas (redireciona se já estiver logado)
const PublicRoute = ({ children }) => {
    const { signed } = useAuth();
    
    if (signed) {
        return <Navigate to="/tasks" />;
    }
    
    return children;
};

function AppRoutes() {
    return (
        <Routes>
            <Route path="/login" element={
                <PublicRoute>
                    <Login />
                </PublicRoute>
            } />
            
            <Route path="/tasks" element={
                <PrivateRoute>
                    <Tasks />
                </PrivateRoute>
            } />
            
            {/* Redireciona / para /tasks */}
            <Route path="/" element={<Navigate to="/tasks" replace />} />
            
            {/* Rota 404 */}
            <Route path="*" element={<Navigate to="/tasks" replace />} />
        </Routes>
    );
}

export default function App() {
    return (
        <AuthProvider>
            <BrowserRouter>
                <AppRoutes />
                <Toaster position="top-right" />
            </BrowserRouter>
        </AuthProvider>
    );
} 