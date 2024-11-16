<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::paginate(10);
        return view('library.authors.index', compact('authors'));
    }

    public function create()
    {
        return view('library.authors.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'birth_year' => 'required|integer|min:1800|max:' . date('Y'),
            'gender' => 'required|in:M,F,O',
            'nationality' => 'required|max:255'
        ]);

        Author::create($validated);
        return redirect()->route('authors.index')->with('success', 'Autor cadastrado com sucesso!');
    }

    public function edit(Author $author)
    {
        return view('library.authors.edit', compact('author'));
    }

    public function update(Request $request, Author $author)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'birth_year' => 'required|integer|min:1800|max:' . date('Y'),
            'gender' => 'required|in:M,F,O',
            'nationality' => 'required|max:255'
        ]);

        $author->update($validated);
        return redirect()->route('authors.index')->with('success', 'Autor atualizado com sucesso!');
    }

    public function destroy(Author $author)
    {
        $author->delete();
        return redirect()->route('authors.index')->with('success', 'Autor removido com sucesso!');
    }
} 