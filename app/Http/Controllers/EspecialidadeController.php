<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Especialidade;

class EspecialidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $especialidades = Especialidade::when($search, function ($query) use ($search) {
            $query->where('especialidade', 'like', '%' . $search . '%');
        })
        ->orderBy('id', 'desc')
        ->paginate(20);

        return view('especialidades.index', compact('especialidades', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('especialidades.adicionar');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'especialidade' => 'required'
        ]);

        Especialidade::create([
            'especialidade' => $validatedData['especialidade']
        ]);

        return redirect()->route('especialidades.index')->with('message', 'especialidade adicionado com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $especialidade = Especialidade::find($id);


        return view('especialidades.visualizar',  compact('especialidade'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $especialidade = Especialidade::find($id);


        return view('especialidades.editar',  compact('especialidade'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'especialidade' => 'required'
        ]);
    
        $especialidade = Especialidade::findOrFail($id);
        $especialidade->update($validatedData);
    
        return redirect()->route('especialidade.index')->with('message', 'Especialidade atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Especialidade::where('id', '=', $id)->delete();
        return redirect()->route('especialidades.index')->with('message', 'Especialidade excluído com sucesso.');
    }
}
