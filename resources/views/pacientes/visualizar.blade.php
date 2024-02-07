<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Visualizar') }}
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
                    <h1 class="text-2xl font-semibold mb-4">Editar Paciente</h1>
                    <a href="{{ url()->previous() }}" class="btn btn-primary">Voltar</a>

                        <div class="mb-3">
                            <label for="nome_paciente" class="form-label">Nome do Paciente</label>
                            <input type="text" class="form-control" id="nome_paciente" name="nome_paciente" value="{{ $paciente->nome_paciente }}" disabled>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="Data_entrada" class="form-label">Data de Entrada</label>
                                    <input type="date" class="form-control" id="Data_entrada" name="Data_entrada" value="{{ $paciente->Data_entrada }}" disabled>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="Hora_entrada" class="form-label">Hora de Entrada</label>
                                    <input type="time" class="form-control" id="Hora_entrada" name="Hora_entrada" value="{{ $paciente->Hora_entrada }}" disabled>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="idade" class="form-label">Idade</label>
                                    <input type="number" class="form-control" id="idade" name="idade" value="{{ $paciente->idade }}" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="Classificacao_risco" class="form-label">Classificação de Risco</label>
                                    <select class="form-control" name="Classificacao_risco">
                                        @foreach($classificacoes as $classificacao)
                                            <option value="{{ $classificacao->id }}" {{ $paciente->classificacao->id == $classificacao->id ? 'selected' : '' }} disabled>
                                                {{ $classificacao->cor }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="origem" class="form-label">Origem</label>
                                    <select class="form-control" id="origem" name="origem">
                                        @foreach($origens as $origem)
                                            <option value="{{ $origem->id }}" {{ $paciente->origem->id == $origem->id ? 'selected' : '' }} disabled>
                                                {{ $origem->origem }}
                                            </option>
                                        @endforeach
                                
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="Especialidade" class="form-label">Especialidade</label>
                                    <select class="form-control" id="Especialidade" name="Especialidade">
                                        @foreach($especialidades as $especialidade)
                                            <option value="{{ $especialidade->id }}" {{ $paciente->especialidade->id == $especialidade->id ? 'selected' : '' }} disabled>
                                                {{ $especialidade->especialidade }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="samu" class="form-label">SAMU</label>
                                    <select class="form-control" id="samu" name="samu" disabled>
                                        <option value="1" {{ $paciente->samu ? 'selected' : '' }}>Sim</option>
                                        <option value="0" {{ !$paciente->samu ? 'selected' : '' }}>Não</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="Sintomas_gripais" class="form-label">Sintomas Gripais</label>
                                    <select class="form-control" id="Sintomas_gripais" name="Sintomas_gripais" disabled>
                                        <option value="1" {{ $paciente->Sintomas_gripais ? 'selected' : '' }}>Sim</option>
                                        <option value="0" {{ !$paciente->Sintomas_gripais ? 'selected' : '' }}>Não</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="coleta_swab" class="form-label">Coleta Swab</label>
                                    <select class="form-control" id="coleta_swab" name="coleta_swab" disabled>
                                        <option value="1" {{ $paciente->coleta_swab ? 'selected' : '' }}>Sim</option>
                                        <option value="0" {{ !$paciente->coleta_swab ? 'selected' : '' }}>Não</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="observacao" class="form-label">Observação</label>
                            <textarea class="form-control" id="observacao" name="observacao" rows="3" disabled>{{ $paciente->observacao }}</textarea>
                        </div>

                        <a href="{{ url()->previous() }}" class="btn btn-primary">Voltar</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
