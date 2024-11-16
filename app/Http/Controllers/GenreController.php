<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::paginate(10);
        return view('library.genres.index', compact('genres'));
    }

    public function create()
    {
        return view('library.genres.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255|unique:genres'
        ]);

        Genre::create($validated);
        return redirect()->route('genres.index')->with('success', 'Gênero criado com sucesso!');
    }

    public function edit(Genre $genre)
    {
        return view('library.genres.edit', compact('genre'));
    }

    public function update(Request $request, Genre $genre)
    {
        $validated = $request->validate([
            'name' => 'required|max:255|unique:genres,name,' . $genre->id
        ]);

        $genre->update($validated);
        return redirect()->route('genres.index')->with('success', 'Gênero atualizado com sucesso!');
    }

    public function destroy(Genre $genre)
    {
        $genre->delete();
        return redirect()->route('genres.index')->with('success', 'Gênero removido com sucesso!');
    }
} 