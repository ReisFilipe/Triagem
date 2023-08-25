<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $query = Paciente::orderBy('id', 'desc');
        
        $pacientes = $query->paginate(20);
        return view('pacientes.index')->with('pacientes', $pacientes)->with('search', $search);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pacientes.adicionar');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome_paciente' => 'required',
            'Data_entrada' => 'required|date',
            'Hora_entrada' => 'required',
            'idade' => 'required|integer',
            'Classificacao_risco' => 'required',
            'origem' => 'required',
            'samu' => 'required|boolean',
            'Especialidade' => 'required',
            'Sintomas_gripais' => 'required|boolean',
            'coleta_swab' => 'required|boolean',
            'observacao' => 'nullable',
        ]);

        Paciente::create([
            'nome_paciente' => $validatedData['nome_paciente'],
            'Data_entrada' => $validatedData['Data_entrada'],
            'Hora_entrada' => $validatedData['Hora_entrada'],
            'idade' => $validatedData['idade'],
            'Classificacao_risco' => $validatedData['Classificacao_risco'],
            'origem' => $validatedData['origem'],
            'samu' => $validatedData['samu'],
            'Especialidade' => $validatedData['Especialidade'],
            'Sintomas_gripais' => $validatedData['Sintomas_gripais'],
            'coleta_swab' => $validatedData['coleta_swab'],
            'observacao' => $validatedData['observacao'],
        ]);

        return redirect()->route('pacientes.index')->with('message', 'Paciente adicionado com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
      //  Paciente::where('id', '=', $id)->delete();
      
    }
}
