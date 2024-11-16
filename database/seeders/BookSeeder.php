<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run()
    {
        Book::create([
            'title' => 'Dom Casmurro',
            'author' => 'Machado de Assis',
            'isbn' => '9788535910682',
            'published_year' => 1899
        ]);

        Book::create([
            'title' => 'O Pequeno Príncipe',
            'author' => 'Antoine de Saint-Exupéry',
            'isbn' => '9788574063768',
            'published_year' => 1943
        ]);
    }
} 