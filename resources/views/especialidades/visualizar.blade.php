<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Visualizar Especialidade') }}
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
                    <h1 class="text-2xl font-semibold mb-4">Editar Especialidade</h1>
                    <a href="{{ url()->previous() }}" class="btn btn-primary">Voltar</a>

                        <div class="mb-3">
                            <label for="especialidade" class="form-label">Especialidade</label>
                            <input type="text" class="form-control" id="especialidade" name="especialidade" value="{{ $especialidade->especialidade }}" disabled>
                        </div>

                        <a href="{{ url()->previous() }}" class="btn btn-primary">Voltar</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
