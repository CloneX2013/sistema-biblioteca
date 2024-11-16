@extends('layouts.library')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Novo Autor</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('authors.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                           id="name" name="name" value="{{ old('name') }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="birth_year" class="form-label">Ano de Nascimento</label>
                    <input type="number" class="form-control @error('birth_year') is-invalid @enderror" 
                           id="birth_year" name="birth_year" value="{{ old('birth_year') }}" required>
                    @error('birth_year')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="gender" class="form-label">Sexo</label>
                    <select class="form-select @error('gender') is-invalid @enderror" 
                            id="gender" name="gender" required>
                        <option value="">Selecione</option>
                        <option value="M" {{ old('gender') == 'M' ? 'selected' : '' }}>Masculino</option>
                        <option value="F" {{ old('gender') == 'F' ? 'selected' : '' }}>Feminino</option>
                        <option value="O" {{ old('gender') == 'O' ? 'selected' : '' }}>Outro</option>
                    </select>
                    @error('gender')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="nationality" class="form-label">Nacionalidade</label>
                    <input type="text" class="form-control @error('nationality') is-invalid @enderror" 
                           id="nationality" name="nationality" value="{{ old('nationality') }}" required>
                    @error('nationality')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('authors.index') }}" class="btn btn-secondary">Voltar</a>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection 