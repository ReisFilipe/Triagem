<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Origem;

class OrigemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $origens = Origem::when($search, function ($query) use ($search) {
            $query->where('origem', 'like', '%' . $search . '%');
        })
        ->orderBy('id', 'desc')
        ->paginate(20);

        return view('origens.index', compact('origens', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('origens.adicionar');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'origem' => 'required'
        ]);

        Origem::create([
            'origem' => $validatedData['origem']
        ]);

        return redirect()->route('origens.index')->with('message', 'Origem adicionado com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $origem = Origem::find($id);


        return view('origens.visualizar',  compact('origem'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $origem = Origem::find($id);


        return view('origens.editar',  compact('origem'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'origem' => 'required'
        ]);
    
        $origem = Origem::findOrFail($id);
        $origem->update($validatedData);
    
        return redirect()->route('origens.index')->with('message', 'Origem atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Origem::where('id', '=', $id)->delete();
        return redirect()->route('origens.index')->with('message', 'Origem excluído com sucesso.');
    }
}
