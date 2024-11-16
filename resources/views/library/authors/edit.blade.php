@extends('layouts.library')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Editar Autor</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('authors.update', $author) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                           id="name" name="name" value="{{ old('name', $author->name) }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="birth_year" class="form-label">Ano de Nascimento</label>
                    <input type="number" class="form-control @error('birth_year') is-invalid @enderror" 
                           id="birth_year" name="birth_year" value="{{ old('birth_year', $author->birth_year) }}" required>
                    @error('birth_year')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="gender" class="form-label">Sexo</label>
                    <select class="form-select @error('gender') is-invalid @enderror" 
                            id="gender" name="gender" required>
                        <option value="">Selecione</option>
                        <option value="M" {{ old('gender', $author->gender) == 'M' ? 'selected' : '' }}>Masculino</option>
                        <option value="F" {{ old('gender', $author->gender) == 'F' ? 'selected' : '' }}>Feminino</option>
                        <option value="O" {{ old('gender', $author->gender) == 'O' ? 'selected' : '' }}>Outro</option>
                    </select>
                    @error('gender')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="nationality" class="form-label">Nacionalidade</label>
                    <input type="text" class="form-control @error('nationality') is-invalid @enderror" 
                           id="nationality" name="nationality" value="{{ old('nationality', $author->nationality) }}" required>
                    @error('nationality')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('authors.index') }}" class="btn btn-secondary">Voltar</a>
                    <button type="submit" class="btn btn-primary">Atualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection 