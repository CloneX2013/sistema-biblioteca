import './bootstrap';
import '../css/app.css';

import React from 'react';
import { createRoot } from 'react-dom/client';
import { BrowserRouter } from 'react-router-dom';

// Remover qualquer lógica de autenticação
const App = () => {
    return (
        <BrowserRouter>
            <div>
                {/* Seu conteúdo aqui */}
            </div>
        </BrowserRouter>
    );
};

const root = createRoot(document.getElementById('app'));
root.render(<App />); 