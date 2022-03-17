<?php

namespace App\Http\Livewire\charts;
use App\Charts\EducationsDateChart;
use App\Charts\MonthlyUsersChart;
use App\Models\Category;
use App\Models\Chart;
use App\Models\Education;
use App\Models\Teacher;
use ArielMejiaDev\LarapexCharts\LineChart;
use ArielMejiaDev\LarapexCharts\PieChart;
use Livewire\Component;
use function view;

class LarapexChart extends Component
{
    public $teacher_id;
    public $category_id;
    public $teachers;
    public $search1;
    public $teacher_grafiek, $category_grafiek;

    public function render(MonthlyUsersChart $chart_teacher, EducationsDateChart $chart_education) {
        return view('livewire.charts.larapex_chart', [
            'teachers' => Teacher::all()->sortBy('name'),
            'categories' => Category::all()->sortBy('category_name'),
            'chart_teacher' => $chart_teacher->build($this->category_grafiek),
            'chart_education' => $chart_education->build(),
            ]);
    }

    public function updated() {
        $this->render(new MonthlyUsersChart(new PieChart()), new EducationsDateChart(new LineChart()));
    }
}
