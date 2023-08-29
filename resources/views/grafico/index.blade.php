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
    
                    <form action="{{ route('grafico.filtro') }}" method="GET">
                        <label for="start_date">Data Inicial:</label>
                        <input type="date" name="start_date" id="start_date">
                        <label for="end_date">Data Final:</label>
                        <input type="date" name="end_date" id="end_date">
                    
                        <!-- Combobox para seleção do tipo de relatório -->
                        <label for="report_type">Selecionar Relatório:</label>
                        <select name="report_type" id="report_type">
                            <option value="especialidade">Relatório de Especialidades</option>
                            <option value="risco">Relatório de Risco</option>
                            <option value="idade">Relatório de Idade</option>
                        </select>

                        <!-- Combobox para seleção do tipo de relatório -->
                        <label for="report_graph">Selecionar Tipo:</label>
                        <select name="report_graph" id="report_graph">
                            <option value="barra">Relatório de Barra</option>
                            <option value="pizza">Relatório de Pizza</option>
                        </select>
                        
                        <button class="btn btn-outline-success" type="submit">Filtrar</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
