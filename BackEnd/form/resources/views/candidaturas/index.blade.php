@extends('layout')

@section('content')
<div class="container mt-5">
    <h1>Gestão de Candidaturas</h1>

    <form method="GET" action="{{ route('candidaturas.index') }}" class="mb-4">
        <input type="text" name="search" class="form-control" placeholder="Pesquisar por nome ou email" value="{{ request('search') }}">
    </form>

    <a href="{{ route('candidaturas.create') }}" class="btn btn-primary mb-3">Adicionar Nova Candidatura</a>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($candidaturas as $candidatura)
                <tr>
                    <td>{{ $candidatura->id }}</td>
                    <td>{{ $candidatura->nome }}</td>
                    <td>{{ $candidatura->email }}</td>
                    <td>{{ $candidatura->telefone }}</td>
                    <td>
                        <a href="{{ route('candidaturas.show', $candidatura->id) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('candidaturas.edit', $candidatura->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('candidaturas.destroy', $candidatura->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $candidaturas->links() }}
</div>
@endsection
