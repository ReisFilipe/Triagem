<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use DB;

class ChartJSController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        
        $atendimentos = Paciente::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
        
        ->groupBy(DB::raw("MONTH(created_at), MONTHNAME(created_at)"))
        ->pluck('count', 'month_name');

 
        $labels = $atendimentos->keys();
        $data = $atendimentos->values();
              
        return view('grafico.index', compact('labels', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function especialidade($startDate, $endDate, $tipoGrafico)
    {


        $mesesEmPortugues = [
            'January' => 'Janeiro',
            'February' => 'Fevereiro',
            'March' => 'Março',
            'April' => 'Abril',
            'May' => 'Maio',
            'June' => 'Junho',
            'July' => 'Julho',
            'August' => 'Agosto',
            'September' => 'Setembro',
            'October' => 'Outubro',
            'November' => 'Novembro',
            'December' => 'Dezembro',
        ];

        $query = Paciente::select(
            DB::raw("COUNT(*) as count"),
            DB::raw("MONTHNAME(created_at) as month_name"),
            'Especialidade'
        )
        ;

    // Aplicar filtro de datas, se fornecido
    if ($startDate && $endDate) {
        $query->whereBetween('created_at', [$startDate, $endDate]);
    }

    $atendimentos = $query
        ->groupBy('Especialidade', DB::raw("MONTH(created_at), MONTHNAME(created_at)"))
        ->get();
    
        $labels = $atendimentos->pluck('month_name')->unique()->map(function ($monthName) use ($mesesEmPortugues) {
            return $mesesEmPortugues[$monthName];
        });
        $datasets = [];
        
        // Agrupar os dados por especialidade para cada mês
        foreach ($atendimentos->groupBy('Especialidade') as $especialidade => $data) {
            $counts = $data->pluck('count');
            $dataset = [
                'label' => $especialidade,
                'data' => $counts,
                #'backgroundColor' => // Defina as cores de fundo aqui,
                #'borderColor' => // Defina as cores da borda aqui,
            ];
            $datasets[] = $dataset;
        }
        
        if($tipoGrafico === 'pizza'){
            return view('grafico.gpizza', compact('labels', 'datasets'));
        }else{
            return view('grafico.gbarra', compact('labels', 'datasets'));
        }
        
    
    }


    public function risco($startDate, $endDate, $tipoGrafico)
    {

        $mesesEmPortugues = [
            'January' => 'Janeiro',
            'February' => 'Fevereiro',
            'March' => 'Março',
            'April' => 'Abril',
            'May' => 'Maio',
            'June' => 'Junho',
            'July' => 'Julho',
            'August' => 'Agosto',
            'September' => 'Setembro',
            'October' => 'Outubro',
            'November' => 'Novembro',
            'December' => 'Dezembro',
        ];

        $query = Paciente::select(
            DB::raw("COUNT(*) as count"),
            DB::raw("MONTHNAME(created_at) as month_name"),
            'Classificacao_risco'
        )
        
        ->groupBy('Classificacao_risco', DB::raw("MONTH(created_at), MONTHNAME(created_at)"));
    
        // Aplica o filtro por data se as datas estiverem presentes
        if ($startDate && $endDate) {
            $query->whereBetween('created_at', [$startDate, $endDate]);
        }
    
        $atendimentos = $query->get();
    
    
        $labels = $atendimentos->pluck('month_name')->unique()->map(function ($monthName) use ($mesesEmPortugues) {
            return $mesesEmPortugues[$monthName];
        });
        $datasets = [];
        
        // Agrupar os dados por Classificacao_risco para cada mês
        foreach ($atendimentos->groupBy('Classificacao_risco') as $filtro => $data) {
            $counts = $data->pluck('count');
            $dataset = [
                'label' => $filtro,
                'data' => $counts,
                #'backgroundColor' => // Defina as cores de fundo aqui,
                #'borderColor' => // Defina as cores da borda aqui,
            ];
            $datasets[] = $dataset;
        }

        if($tipoGrafico === 'pizza'){
            return view('grafico.gpizza', compact('labels', 'datasets'));
        }else{
            return view('grafico.gbarra', compact('labels', 'datasets'));
        }
    
    }

    public function idade($startDate, $endDate, $tipoGrafico)
    {

        $mesesEmPortugues = [
            'January' => 'Janeiro',
            'February' => 'Fevereiro',
            'March' => 'Março',
            'April' => 'Abril',
            'May' => 'Maio',
            'June' => 'Junho',
            'July' => 'Julho',
            'August' => 'Agosto',
            'September' => 'Setembro',
            'October' => 'Outubro',
            'November' => 'Novembro',
            'December' => 'Dezembro',
        ];

        $faixasIdade = [
            '14' => '14 a 23 Anos', 
            '24' => '24 a 33 Anos', 
            '34' => '34 a 43 Anos', 
            '44' => '44 a 53 Anos', 
            '54' => '54 a 63 Anos', 
            '64' => '64 a 73 Anos', 
            '74' => '74 a 83 Anos', 
            '84' => '84 a 93 Anos', 
            '94' => '94 a 100+'
        ];
        
        $query = Paciente::select(
            DB::raw("COUNT(*) as count"),
            DB::raw("MONTHNAME(created_at) as month_name"),
            DB::raw("FLOOR((idade - 14) / 10) * 10 + 14 as idade_faixa")
        )
        
        ->where('idade', '>=', 14)
        ->groupBy('idade_faixa', DB::raw("MONTH(created_at), MONTHNAME(created_at)"));
        
        // Aplicar filtro por período se as datas estiverem presentes
        if ($startDate && $endDate) {
            $query->whereBetween('created_at', [$startDate, $endDate]);
        }
        
        $atendimentos = $query->get();
        
        $labels = $atendimentos->pluck('month_name')->unique()->map(function ($monthName) use ($mesesEmPortugues) {
            return $mesesEmPortugues[$monthName];
        });

        $datasets = [];
        
        foreach ($atendimentos->groupBy('idade_faixa') as $idadeFaixa => $data) {
            $idadeFaixaNome = $faixasIdade[$idadeFaixa]; // Aqui está a substituição
            $counts = $data->pluck('count');
            $dataset = [
                'label' => $idadeFaixaNome,
                'data' => $counts,
                // 'backgroundColor' => // Defina as cores de fundo aqui,
                // 'borderColor' => // Defina as cores da borda aqui,
            ];
            $datasets[] = $dataset;
        }
        
        if ($tipoGrafico === 'pizza') {
            return view('grafico.gpizza', compact('labels', 'datasets', 'mesesEmPortugues'));
        } else {
            return view('grafico.gbarra', compact('labels', 'datasets', 'mesesEmPortugues'));
        }
    
    }

    public function idadepizza($startDate, $endDate, $tipoGrafico)
    {

        $mesesEmPortugues = [
            'January' => 'Janeiro',
            'February' => 'Fevereiro',
            'March' => 'Março',
            'April' => 'Abril',
            'May' => 'Maio',
            'June' => 'Junho',
            'July' => 'Julho',
            'August' => 'Agosto',
            'September' => 'Setembro',
            'October' => 'Outubro',
            'November' => 'Novembro',
            'December' => 'Dezembro',
        ];

        $faixasIdade = [
            '14' => '14 a 23 Anos', 
            '24' => '24 a 33 Anos', 
            '34' => '34 a 43 Anos', 
            '44' => '44 a 53 Anos', 
            '54' => '54 a 63 Anos', 
            '64' => '64 a 73 Anos', 
            '74' => '74 a 83 Anos', 
            '84' => '84 a 93 Anos', 
            '94' => '94 a 100+'
        ];
        
        $query = Paciente::select(
            DB::raw("COUNT(*) as count"),
            DB::raw("FLOOR((idade - 14) / 10) * 10 + 14 as idade_faixa")
        )
        
        ->where('idade', '>=', 14)
        ->groupBy('idade_faixa');
        
        // Aplicar filtro por período se as datas estiverem presentes
        if ($startDate && $endDate) {
            $query->whereBetween('created_at', [$startDate, $endDate]);
        }
        
        $atendimentos = $query->get();
        
        $labels = [
            '14 a 23 Anos', '24 a 33 Anos', '34 a 43 Anos', '44 a 53 Anos', '54 a 63 Anos', '64 a 73 Anos', '74 a 83 Anos', '84 a 93 Anos', '94 a 100+'
        ];

        $datasets = [];
        
        foreach ($atendimentos->groupBy('idade_faixa') as $idadeFaixa => $data) {
            $idadeFaixaNome = $faixasIdade[$idadeFaixa]; // Aqui está a substituição
            $counts = $data->pluck('count');
            $dataset = [
                'label' => $idadeFaixaNome,
                'data' => $counts,
                // 'backgroundColor' => // Defina as cores de fundo aqui,
                // 'borderColor' => // Defina as cores da borda aqui,
            ];
            $datasets[] = $dataset;
        }
        
        if ($tipoGrafico === 'pizza') {
            return view('grafico.gpizza', compact('labels', 'datasets', 'mesesEmPortugues'));
        } else {
            return view('grafico.gbarra', compact('labels', 'datasets', 'mesesEmPortugues'));
        }
    
    }

    public function filtro(Request $request)
    {

        $startDate = $request->start_date;
        $endDate = $request->end_date;
        $relatorio = $request->report_type;
        $tipoGrafico = $request->report_graph;

        if($relatorio ==='especialidade' ){
            return $this->especialidade($startDate, $endDate, $tipoGrafico);
        }else if($relatorio === 'risco'){
            return $this->risco($startDate, $endDate, $tipoGrafico);
        }else{
            if($tipoGrafico === 'pizza'){
                return $this->idadepizza($startDate, $endDate, $tipoGrafico);
            }
            return $this->idade($startDate, $endDate, $tipoGrafico);
        }
        
        
    
    }
}
