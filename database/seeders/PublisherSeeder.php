<?php

namespace Database\Seeders;

use App\Models\Publisher;
use Illuminate\Database\Seeder;

class PublisherSeeder extends Seeder
{
    public function run()
    {
        $publishers = [
            'Companhia das Letras',
            'Rocco',
            'Aleph',
            'Darkside',
            'Intrínseca',
            'Suma',
            'Record',
            'Globo',
            'Sextante',
            'Nova Fronteira',
            'Arqueiro',
            'Martin Claret',
            'Saraiva',
            'Atlas',
            'Moderna'
        ];

        foreach ($publishers as $publisher) {
            Publisher::create(['name' => $publisher]);
        }
    }
} 