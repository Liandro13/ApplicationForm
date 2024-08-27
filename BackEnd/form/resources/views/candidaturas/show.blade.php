@extends('layout')

@section('content')
<div class="container mt-5">
    <h1>Detalhes da Candidatura</h1>
    <p><strong>Nome:</strong> {{ $candidatura->nome }}</p>
    <p><strong>Email:</strong> {{ $candidatura->email }}</p>
    <p><strong>Telefone:</strong> {{ $candidatura->telefone }}</p>
    <p><strong>Mensagem:</strong> {{ $candidatura->mensagem }}</p>
    <a href="{{ route('candidaturas.index') }}" class="btn btn-secondary">Voltar</a>
</div>
@endsection
