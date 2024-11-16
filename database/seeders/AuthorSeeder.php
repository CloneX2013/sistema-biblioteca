<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    public function run()
    {
        $authors = [
            [
                'name' => 'Machado de Assis',
                'birth_year' => 1839,
                'gender' => 'M',
                'nationality' => 'Brasileiro'
            ],
            [
                'name' => 'Clarice Lispector',
                'birth_year' => 1920,
                'gender' => 'F',
                'nationality' => 'Brasileira'
            ],
            [
                'name' => 'Jorge Amado',
                'birth_year' => 1912,
                'gender' => 'M',
                'nationality' => 'Brasileiro'
            ]
        ];

        foreach ($authors as $author) {
            Author::create($author);
        }
    }
} 