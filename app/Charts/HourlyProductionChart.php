<?php

namespace App\Charts;

use App\Models\Ritasi;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;

class HourlyProductionChart extends Chart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $hourlyProd = Ritasi::get();
        $data = [
            $hourlyProd->where('date')->count(),
            $hourlyProd->where('codeloader')->count(),
            $hourlyProd->where('sitecode')->count(),
            $hourlyProd->where('adjustment')->count(),
        ];
        $label =[
            'date'
        ];
        return $this->chart->barChart()
            ->setTitle('Hourly Production.')
            ->setSubtitle(date('Y'))
            ->addData($data)
            ->setLabels($label);
    }
}

