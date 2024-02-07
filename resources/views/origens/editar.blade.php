<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Origem') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container-fluid mx-auto">
            @if (session('message'))
                <div class="flex justify-center items-center m-1 font-medium py-1 px-2 bg-white rounded-md text-green-700 bg-green-100 border border-green-300">
                    {{ session('message') }}
                </div>
            @endif
    
            <div class="bg-white overflow-hidden">
                <div class="p-6">
                    <h1 class="text-2xl font-semibold mb-4">Editar origem</h1>
                    <a href="{{ url()->previous() }}" class="btn btn-primary">Voltar</a>
                    <form action="{{ route('origens.update', $origem->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label for="origem" class="form-label">Origem</label>
                            <input type="text" class="form-control" id="origem" name="origem" value="{{ $origem->origem }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Atualizar</button>
                        <a href="{{ url()->previous() }}" class="btn btn-primary">Voltar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
