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
                    <h1>Relatório Gráficos</h1>
                    @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="{{ route('grafico.filtro') }}" method="GET">
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <label for="start_date">Data Inicial:</label>
                                <input type="date" name="start_date" id="start_date" class="form-control" required>
                            </div>
                            
                            <div class="col-md-6 mb-2">
                                <label for="end_date">Data Final:</label>
                                <input type="date" name="end_date" id="end_date" class="form-control" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <label for="report_type">Tipo de Relatório:</label>
                                <select name="report_type" id="report_type" class="form-control">
                                    <option value="especialidade">Relatório de Especialidades</option>
                                    <option value="risco">Relatório de Risco</option>
                                    <option value="idade">Relatório de Idade</option>
                                </select>
                            </div>
                            
                            <div class="col-md-6 mb-2">
                                <label for="report_graph">Tipo de Gráfico:</label>
                                <select name="report_graph" id="report_graph" class="form-control">
                                    <option value="barra">Gráfico de Barras</option>
                                    <option value="pizza">Gráfico de Pizza</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group mb-2">
                            <button class="btn btn-success" type="submit">Filtrar</button>
                        </div>

                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
