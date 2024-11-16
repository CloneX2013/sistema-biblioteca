@extends('layouts.library')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Autores</h2>
        <a href="{{ route('authors.create') }}" class="btn btn-primary">Novo Autor</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Ano de Nascimento</th>
                        <th>Sexo</th>
                        <th>Nacionalidade</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($authors as $author)
                    <tr>
                        <td>{{ $author->name }}</td>
                        <td>{{ $author->birth_year }}</td>
                        <td>
                            @if($author->gender == 'M')
                                Masculino
                            @elseif($author->gender == 'F')
                                Feminino
                            @else
                                Outro
                            @endif
                        </td>
                        <td>{{ $author->nationality }}</td>
                        <td>
                            <a href="{{ route('authors.edit', $author) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('authors.destroy', $author) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $authors->links() }}
        </div>
    </div>
</div>
@endsection 