<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
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

                    <form action="{{ route('pacientes.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nome_paciente" class="form-label">Nome do Paciente</label>
                            <input type="text" class="form-control" id="nome_paciente" name="nome_paciente">
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="Data_entrada" class="form-label">Data de Entrada</label>
                                    <input type="date" class="form-control" id="Data_entrada" name="Data_entrada">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="Hora_entrada" class="form-label">Hora de Entrada</label>
                                    <input type="time" class="form-control" id="Hora_entrada" name="Hora_entrada">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="idade" class="form-label">Idade</label>
                                    <input type="number" class="form-control" id="idade" name="idade">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="Classificacao_risco" class="form-label">Classificação de Risco</label>
                                    <select class="form-control" id="Classificacao_risco" name="Classificacao_risco">
                                        <option value="VERDE">VERDE</option>
                                        <option value="AMARELO">AMARELO</option>
                                        <option value="VERMELHO">VERMELHO</option>
                                        <option value="LARANJA">LARANJA</option>
                                        <option value="AZUL">AZUL</option>
                                        <option value="BRANCO">BRANCO</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="origem" class="form-label">Origem</label>
                                    <select class="form-control" id="origem" name="origem">
                                        <option value="DOMICÍLIO">DOMICÍLIO</option>
                                        <option value="OUTRO SERVIÇO">OUTRO SERVIÇO</option>
                                        <option value="OUTRO MUNICIPIO">OUTRO MUNICIPIO</option>
                                        <option value="UPA">UPA</option>
                                        <option value="HM">HM</option>
                                        <option value="CONSULTÓRIO">CONSULTÓRIO</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="Especialidade" class="form-label">Especialidade</label>
                                    <select class="form-control" id="Especialidade" name="Especialidade">
                                        <option value="CLINICA MÉDICA">CLINICA MÉDICA</option>
                                        <option value="ONCOLOGIA">ONCOLOGIA</option>
                                        <option value="NEFROLOGIA">NEFROLOGIA</option>
                                        <option value="CARDIOLOGIA">CARDIOLOGIA</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="samu" class="form-label">SAMU</label>
                                    <select class="form-control" id="samu" name="samu">
                                        <option value="1">Sim</option>
                                        <option value="0">Não</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="Sintomas_gripais" class="form-label">Sintomas Gripais</label>
                                    <select class="form-control" id="Sintomas_gripais" name="Sintomas_gripais">
                                        <option value="1">Sim</option>
                                        <option value="0">Não</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="coleta_swab" class="form-label">Coleta Swab</label>
                                    <select class="form-control" id="coleta_swab" name="coleta_swab">
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
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>