<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Classificação de Especialidades') }}
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
                    <h1>Lista de Especialidades</h1>
    
                    <a href="{{ route('especialidades.create') }}" class="btn btn-primary">Nova Especialidade</a>
                    <hr>
                    <div class="table-responsive">
                        <div class="mb-4">
                            <form action="{{ route('especialidades.index') }}" method="GET">
                                <div class="flex items-center">
                                    <input type="text" name="search" class="form-control" placeholder="Pesquisar por nome...">
                                    <button type="submit" class="btn btn-primary ml-2">Pesquisar</button>
                                </div>
                            </form>
                        </div>
                    </div>
    
                    <div class="table-responsive">
                        
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>especialidade</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($especialidades as $especialidade)
                                
                                    <tr>
                                        <td>{{ $especialidade->id }}</td>
                                        <td>{{ $especialidade->especialidade }}</td>
                                        <td>
                                            <a href="{{ route('especialidades.show', $especialidade->id) }}" class="btn btn-info">Ver</a>
                                            <a href="{{ route('especialidades.edit', $especialidade->id) }}" class="btn btn-primary">Editar</a>
                                            <form action="{{ route('especialidades.destroy', $especialidade->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este Especialidade?')">Excluir</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <section class="pagination">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    {{ $especialidades->onEachSide(2)->links() }}
                                </div>
                            </div>
                    
                            <hr>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>



</x-app-layout>
