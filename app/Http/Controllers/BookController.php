<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use App\Models\Publisher;
use App\Models\Author;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with(['author', 'genre', 'publisher'])->paginate(10);
        return view('library.books.index', compact('books'));
    }

    public function create()
    {
        $authors = Author::all();
        $genres = Genre::all();
        $publishers = Publisher::all();
        return view('library.books.create', compact('authors', 'genres', 'publishers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'author_id' => 'required|exists:authors,id',
            'genre_id' => 'required|exists:genres,id',
            'publisher_id' => 'required|exists:publishers,id',
            'release_year' => 'required|integer|min:1000|max:' . (date('Y') + 1)
        ]);

        Book::create($validated);
        return redirect()->route('books.index')->with('success', 'Livro cadastrado com sucesso!');
    }

    public function edit(Book $book)
    {
        $authors = Author::all();
        $genres = Genre::all();
        $publishers = Publisher::all();
        return view('library.books.edit', compact('book', 'authors', 'genres', 'publishers'));
    }

    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'author_id' => 'required|exists:authors,id',
            'genre_id' => 'required|exists:genres,id',
            'publisher_id' => 'required|exists:publishers,id',
            'release_year' => 'required|integer|min:1000|max:' . (date('Y') + 1)
        ]);

        $book->update($validated);
        return redirect()->route('books.index')->with('success', 'Livro atualizado com sucesso!');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Livro removido com sucesso!');
    }
} 