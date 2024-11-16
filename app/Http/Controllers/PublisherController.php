<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    public function index()
    {
        $publishers = Publisher::paginate(10);
        return view('library.publishers.index', compact('publishers'));
    }

    public function create()
    {
        return view('library.publishers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255|unique:publishers'
        ]);

        Publisher::create($validated);
        return redirect()->route('publishers.index')->with('success', 'Editora criada com sucesso!');
    }

    public function edit(Publisher $publisher)
    {
        return view('library.publishers.edit', compact('publisher'));
    }

    public function update(Request $request, Publisher $publisher)
    {
        $validated = $request->validate([
            'name' => 'required|max:255|unique:publishers,name,' . $publisher->id
        ]);

        $publisher->update($validated);
        return redirect()->route('publishers.index')->with('success', 'Editora atualizada com sucesso!');
    }

    public function destroy(Publisher $publisher)
    {
        $publisher->delete();
        return redirect()->route('publishers.index')->with('success', 'Editora removida com sucesso!');
    }
} 