<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Classificação de pacientes') }}
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
                    <h1>Lista de Pacientes</h1>
    
                    <a href="{{ route('pacientes.create') }}" class="btn btn-primary">Novo Paciente</a>
                    <hr>
                    <div class="table-responsive">
                        <div class="mb-4">
                            <form action="{{ route('pacientes.index') }}" method="GET">
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
                                    <th>Nome</th>
                                    <th>Data de Entrada</th>
                                    <th>Hora de Entrada</th>
                                    <th>Idade</th>
                                    <th>Classificação de Risco</th>
                                    <th>Origem</th>
                                    <th>SAMU</th>
                                    <th>Especialidade</th>
                                    <th>Sintomas Gripais</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pacientes as $paciente)
                                
                                    <tr>
                                        <td>{{ $paciente->nome_paciente }}</td>
                                        <td>{{ date('d/m/Y', strtotime($paciente->Data_entrada)) }}</td>
                                        <td>{{ $paciente->Hora_entrada }}</td>
                                        <td>{{ $paciente->idade }}</td>
                                        <td>{{ $paciente->classificacao->cor }}</td>
                                        <td>{{ $paciente->origem->origem }}</td>
                                        <td>{{ $paciente->samu ? 'Sim' : 'Não' }}</td>
                                        <td>{{ $paciente->especialidade->especialidade }}</td>
                                        <td>{{ $paciente->Sintomas_gripais ? 'Sim' : 'Não' }}</td>
                                        <td>
                                            <a href="{{ route('pacientes.show', $paciente->id) }}" class="btn btn-info">Ver</a>
                                            <a href="{{ route('pacientes.edit', $paciente->id) }}" class="btn btn-primary">Editar</a>
                                            <form action="{{ route('pacientes.destroy', $paciente->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este paciente?')">Excluir</button>
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
                                    {{ $pacientes->onEachSide(2)->links() }}
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
