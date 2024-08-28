@extends('layout')

@section('content')
<div class="container mt-5">
    <h1>Criar Nova Candidatura</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('candidaturas.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" name="nome" class="form-control" value="{{ old('nome') }}">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}">
        </div>
        <div class="mb-3">
            <label for="telefone" class="form-label">Telefone:</label>
            <input type="text" name="telefone" class="form-control" value="{{ old('telefone') }}">
        </div>
        <div class="mb-3">
            <label for="area" class="form-label">Área:</label>
            <select name="area" class="form-control">
                <option value="">Selecione uma área</option>
                <option value="desenvolvimento">Desenvolvimento</option>
                <option value="design">Design</option>
                <option value="marketing">Marketing</option>
                <!-- Add more options as needed -->
            </select>
        </div>        
        <div class="mb-3">
            <label for="mensagem" class="form-label">Mensagem:</label>
            <textarea name="mensagem" class="form-control">{{ old('mensagem') }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        
    </form>
</div>
@endsection
