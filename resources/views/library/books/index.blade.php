@extends('layouts.library')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Livros</h2>
        <a href="{{ route('books.create') }}" class="btn btn-primary">Novo Livro</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Título</th>
                            <th>Autor</th>
                            <th>Gênero</th>
                            <th>Editora</th>
                            <th>Ano de Lançamento</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($books as $book)
                        <tr>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->author->name }}</td>
                            <td>{{ $book->genre->name }}</td>
                            <td>{{ $book->publisher->name }}</td>
                            <td>{{ $book->release_year }}</td>
                            <td>
                                <a href="{{ route('books.edit', $book) }}" class="btn btn-sm btn-warning">Editar</a>
                                <form action="{{ route('books.destroy', $book) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza?')">Excluir</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <div class="mt-3">
                {{ $books->links() }}
            </div>
        </div>
    </div>
</div>
@endsection 