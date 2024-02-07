<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Adicionar Paciente') }}
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
                    <h1>Novo Paciente</h1>
                    <a href="{{ url()->previous() }}" class="btn btn-primary">Voltar</a>
                    <form action="{{ route('pacientes.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nome_paciente" class="form-label">Nome do Paciente (somente iniciais)</label>
                            <input type="text" class="form-control" id="nome_paciente" name="nome_paciente" required>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="Data_entrada" class="form-label">Data de Entrada</label>
                                    <input type="date" class="form-control" id="Data_entrada" name="Data_entrada" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="Hora_entrada" class="form-label">Hora de Entrada</label>
                                    <input type="time" class="form-control" id="Hora_entrada" name="Hora_entrada" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="idade" class="form-label">Idade</label>
                                    <input type="number" class="form-control" id="idade" name="idade" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="3" min="0" max="999" step="1" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="Classificacao_risco" class="form-label">Classificação de Risco</label>
                                    <select class="form-control" name="Classificacao_risco" required>
                                        <option value="" disabled selected>Selecione</option>
                                        @foreach($classificacoes as $classificacao)
                                            <option value="{{ $classificacao->id }}">{{ $classificacao->cor }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="origem" class="form-label">Origem</label>
                                    <select class="form-control" name="origem" required>
                                        <option value="" disabled selected>Selecione</option>
                                        @foreach($origens as $origem)
                                            <option value="{{ $origem->id }}">{{ $origem->origem }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="Especialidade" class="form-label">Especialidade</label>
                                    <select class="form-control" name="Especialidade" required>
                                        <option value="" disabled selected>Selecione</option>
                                        @foreach($especialidades as $especialidade)
                                            <option value="{{ $especialidade->id }}">{{ $especialidade->especialidade }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="samu" class="form-label">SAMU Contato Prévio</label>
                                    <select class="form-control" id="samu" name="samu" required>
                                        <option value="" disabled selected>Selecione</option>
                                        <option value="1">Sim</option>
                                        <option value="0">Não</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="Sintomas_gripais" class="form-label">Sintomas Gripais</label>
                                    <select class="form-control" id="Sintomas_gripais" name="Sintomas_gripais" required>
                                        <option value="" disabled selected>Selecione</option>
                                        <option value="1">Sim</option>
                                        <option value="0">Não</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="coleta_swab" class="form-label">Coleta Swab</label>
                                    <select class="form-control" id="coleta_swab" name="coleta_swab" required>
                                        <option value="" disabled selected>Selecione</option>
                                        <option value="1">Sim</option>
                                        <option value="0">Não</option>
                                    </select>
                                </div>
                            </div>
                        </div>



                        <div class="mb-3">
                            <label for="observacao" class="form-label">Observação</label>
                            <textarea class="form-control" id="observacao" name="observacao" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                        <a href="{{ url()->previous() }}" class="btn btn-primary">Voltar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>