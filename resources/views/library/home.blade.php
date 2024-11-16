@extends('layouts.library')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1>Sistema de Biblioteca</h1>
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Gerenciador de Livros</h5>
                        <p class="card-text">Acesse o gerenciamento completo do acervo clicando no botão abaixo.</p>
                        <a href="{{ route('books.index') }}" class="btn btn-primary">Ver Livros Cadastrados</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 