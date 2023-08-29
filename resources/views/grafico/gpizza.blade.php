
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
                    <h1> <p>Relatório por {{ $_GET['report_type'] }}</p></h1>
                    <a href="{{ route('grafico.index')  }}" class="btn btn-primary"> <i class="bi bi-arrow-return-left"></i> Voltar</a>

                    <div style="width: 40%; margin: 0 auto;">
                        <canvas id="myChart"></canvas>
                    </div>

                    <script>
                        var labels = @json($labels);
                        var datasets = @json($datasets);

                        var ctx = document.getElementById('myChart').getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'pie',
                            data: {
                                labels: labels,
                                datasets: datasets
                            },
                            options: {
                            responsive: true,
                            plugins: {
                            legend: {
                                position: 'top',
                            },
                            title: {
                                display: true,
                                text: 'Chart.js Pie Chart'
                            }
                            }
                        }
                        });
                    </script>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
