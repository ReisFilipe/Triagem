<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use App\Models\Classificacao;
use App\Models\Origem;
use App\Models\Especialidade;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $pacientes = Paciente::with(['classificacao', 'origem', 'especialidade'])
        ->when($search, function ($query) use ($search) {
            $query->where('nome_paciente', 'like', '%' . $search . '%');
        })
        ->orderBy('id', 'desc')
        ->paginate(20);

        return view('pacientes.index', compact('pacientes', 'search'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classificacoes = Classificacao::all();

        $origens = Origem::all();

        $especialidades = Especialidade::all();

        return view('pacientes.adicionar', [
            'classificacoes' => $classificacoes,
            'origens' => $origens,
            'especialidades' => $especialidades,
        ]);
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
        ], [
            'nome_paciente.required' => 'O nome do paciente é obrigatório.',
            'Data_entrada.required' => 'A data de entrada é obrigatória.',
            'Data_entrada.date' => 'A data de entrada deve ser uma data válida.',
            'Hora_entrada.required' => 'A hora de entrada é obrigatória.',
            'idade.required' => 'A idade é obrigatória.',
            'idade.integer' => 'A idade deve ser um número inteiro.',
        ]);

        Paciente::create([
            'nome_paciente' => $validatedData['nome_paciente'],
            'Data_entrada' => $validatedData['Data_entrada'],
            'Hora_entrada' => $validatedData['Hora_entrada'],
            'idade' => $validatedData['idade'],
            'Classificacao_risco' => $validatedData['Classificacao_risco'],
            'origem_paciente' => $validatedData['origem'],
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
        $paciente = Paciente::with(['classificacao', 'origem', 'especialidade'])->find($id);
        $classificacoes = Classificacao::all();

        $origens = Origem::all();

        $especialidades = Especialidade::all();

        return view('pacientes.visualizar',  compact('paciente', 'classificacoes', 'origens', 'especialidades'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $paciente = Paciente::with(['classificacao', 'origem', 'especialidade'])->find($id);
        $classificacoes = Classificacao::all();

        $origens = Origem::all();

        $especialidades = Especialidade::all();

        return view('pacientes.editar',  compact('paciente', 'classificacoes', 'origens', 'especialidades'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
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
    
        $paciente = Paciente::findOrFail($id);
        $paciente->update($validatedData);
    
        return redirect()->route('pacientes.index')->with('message', 'Paciente atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Paciente::where('id', '=', $id)->delete();
        return redirect()->route('pacientes.index')->with('message', 'Paciente excluído com sucesso.');
    }
}
