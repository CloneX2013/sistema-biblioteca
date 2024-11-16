import React, { useState, useEffect } from 'react';
import api from '../services/api';

function Home() {
    const [data, setData] = useState([]);

    useEffect(() => {
        const fetchData = async () => {
            try {
                const response = await api.get('/items');
                setData(response.data);
            } catch (error) {
                console.error('Error fetching data:', error);
            }
        };

        fetchData();
    }, []);

    return (
        <div>
            <h1>Home</h1>
            {data.map(item => (
                <div key={item.id}>{item.name}</div>
            ))}
        </div>
    );
}

export default Home; 