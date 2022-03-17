<?php

namespace App\Http\Livewire\charts;
use App\Models\Chart;
use App\Models\Teacher;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use Asantibanez\LivewireCharts\Models\ColumnChartModelolumnChartModel;
use Asantibanez\LivewireCharts\Models\PieChartModel;
use Livewire\Component;
use function view;

class LivewireChart extends Component
{

    public function render()
    {
        $teachers = Teacher::all();

        $counted_teachers = $teachers->count();

        $colors = [];

        $months = ['January', 'February', 'March', 'April', 'May', 'June'];
        $random_numbers = [10, 20, 15, 12, 9, 24];
        $colors2 = ['#365B15', '#656D80', '#2E8EAF', '#BE232E', '#E8F035', '#852946'];

            for ($i = 0; $i < $counted_teachers + 1 ; $i++) {
                $colors[] = substr(str_shuffle('AABBCCDDEEFF00112233445566778899AABBCCDDEEFF00112233445566778899AABBCCDDEEFF00112233445566778899'), 0, 6);
            }

        $pieChartModel =
            (new PieChartModel())
                ->setTitle('Hoeveel opleidingen per docent');
                    foreach ($teachers as $i => $teacher) {
                        $pieChartModel->addSlice($teacher->name, $teacher->educations->count(), '#' . $colors[$i]);
                    }

        $columnChartModel =
            (new ColumnChartModel())
                ->setTitle('Hoeveel Opleidingen per maand');
                    for ($s = 0; $s < 4 + 1 ; $s++) {
                        $columnChartModel->addColumn($months[$s], $random_numbers[$s] ,$colors2[$s]);
                    }
        ;

        return view('livewire.charts.livewire_chart', ['pieChartModel' => $pieChartModel, 'columnChartModel' => $columnChartModel]);

    }

}
