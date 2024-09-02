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

        // Retorne os dados em JSON para o frontend consumir
        return response()->json($candidaturas);
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
            'area' => 'required',
            'mensagem' => 'nullable',
        ]);
    
        $candidatura = Candidatura::create($request->all());
    
        return response()->json(['message' => 'Candidatura criada com sucesso!', 'data' => $candidatura], 201);
    }
    

    public function show(Candidatura $candidatura)
    {
        return response()->json($candidatura);
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

        return response()->json(['message' => 'Candidatura atualizada com sucesso!', 'data' => $candidatura]);
    }

    public function destroy(Candidatura $candidatura)
    {
        $candidatura->delete();

        return response()->json(['message' => 'Candidatura eliminada com sucesso!']);
    }
}


