<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Candidatura;
use Illuminate\Http\Request;

class CandidaturaApiController extends Controller
{
    public function index()
    {
        $candidaturas = Candidatura::paginate(10);
        return response()->json($candidaturas);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required',
            'email' => 'required|email|unique:candidaturas',
            'telefone' => 'required',
            'area' => 'required',
            'mensagem' => 'nullable',
        ]);

        $candidatura = Candidatura::create($validatedData);
        return response()->json(['message' => 'Candidatura criada com sucesso!', 'data' => $candidatura], 201);
    }

    public function show(Candidatura $candidatura)
    {
        return response()->json($candidatura);
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

    public function checkEmail(Request $request)
    {
        $email = $request->query('email');

        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return response()->json(['error' => 'Invalid email provided'], 400);
        }

        $exists = Candidatura::where('email', $email)->exists();

        return response()->json(['exists' => $exists]);
    }
}
