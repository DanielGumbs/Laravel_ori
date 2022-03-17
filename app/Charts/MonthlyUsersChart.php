<?php

namespace App\Charts;

use App\Models\Education;
use App\Models\Teacher;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class MonthlyUsersChart
{
    protected $chart_teacher;
    public $teachers;
    public $plucked, $plucked_education;
    public $educations_count = [];
    public $category_grafiek;

    public function __construct(LarapexChart $chart_teacher)
    {
        $this->chart_teacher = $chart_teacher;
    }

    public function build($category_grafiek): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $this->category_grafiek = $category_grafiek;
        $teachers = Teacher::all();
        $plucked = $teachers->pluck('name')->toArray();

        foreach ($teachers as $teacher) {
            $educations_count[] = $teacher->educations
                ->when($this->category_grafiek, function ($query) {
                    return $query->where('category_id', $this->category_grafiek);
                })->count();
        }

        return $this->chart_teacher->pieChart()
            ->setTitle('Hoeveel opleidingen per docent')
            ->setSubtitle('1 = 1 opleiding')
            ->addData($educations_count)
            ->setLabels($plucked);
    }
}
