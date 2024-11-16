<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    public function run()
    {
        $genres = [
            'Romance',
            'Ficção Científica',
            'Fantasia',
            'Drama',
            'Terror',
            'Suspense',
            'Biografia',
            'História',
            'Autoajuda',
            'Técnico',
            'Literatura Brasileira',
            'Literatura Estrangeira',
            'Infantil',
            'Juvenil',
            'Poesia'
        ];

        foreach ($genres as $genre) {
            Genre::create(['name' => $genre]);
        }
    }
} 