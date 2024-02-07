<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Adicionar Especialidade') }}
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
                <div class="">
                    <h1>Novo Especialidade</h1>
                    <a href="{{ url()->previous() }}" class="btn btn-primary">Voltar</a>
                    <form action="{{ route('especialidades.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="especialidade" class="form-label">Especialidade</label>
                            <input type="text" class="form-control" id="especialidade" name="especialidade">
                        </div>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                        <a href="{{ url()->previous() }}" class="btn btn-primary">Voltar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>