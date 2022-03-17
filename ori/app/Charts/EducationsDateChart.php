<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class EducationsDateChart
{
    protected $chart_education;

    public function __construct(LarapexChart $chart_education)
    {
        $this->chart_education = $chart_education;
    }


    public function build(): \ArielMejiaDev\LarapexCharts\AreaChart
    {
        return $this->chart_education->areaChart()
            ->setTitle('Hoeveel Opleidingen per maand')
            ->setSubtitle('1 = 1 opleiding')
            ->addData('Opleidingen', [70, 29, 77, 28, 55, 45])
            ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June']);
    }
}
