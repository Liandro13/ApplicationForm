<?php

namespace App\Http\Controllers;

use App\Models\Candidatura;
use Illuminate\Http\Request;

class CandidaturaController extends Controller
{
    public function index(Request $request)
    {
        $query = Candidatura::query();

        // Filtragem e pesquisa
        if ($request->has('search')) {
            $query->where('nome', 'LIKE', "%{$request->search}%")
                  ->orWhere('email', 'LIKE', "%{$request->search}%");
        }

        $candidaturas = $query->paginate(10);

        return view('candidaturas.index', compact('candidaturas'));
    }

    public function create()
    {
        return view('candidaturas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'email' => 'required|email|unique:candidaturas',
            'telefone' => 'required',
            'mensagem' => 'nullable',
        ]);
    
        Candidatura::create($request->all());
    
        return response()->json(['message' => 'Candidatura criada com sucesso!'], 201);
    }
    
    

    public function show(Candidatura $candidatura)
    {
        return view('candidaturas.show', compact('candidatura'));
    }

    public function edit(Candidatura $candidatura)
    {
        return view('candidaturas.edit', compact('candidatura'));
    }

    public function update(Request $request, Candidatura $candidatura)
{
    $validatedData = $request->validate([
        'nome' => 'required',
        'email' => 'required|email|unique:candidaturas,email,' . $candidatura->id,
        'telefone' => 'required',
        'mensagem' => 'required',
    ]);

    $candidatura->update($validatedData);

    return redirect()->route('candidaturas.index')->with('success', 'Candidatura atualizada com sucesso.');
}

    public function destroy(Candidatura $candidatura)
    {
        $candidatura->delete();

        return redirect()->route('candidaturas.index')->with('success', 'Candidatura eliminada com sucesso.');
    }
}


