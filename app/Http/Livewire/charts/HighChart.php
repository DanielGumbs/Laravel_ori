<?php

namespace App\Http\Livewire\charts;
use App\Models\Teacher;
use Livewire\Component;
use function view;

class HighChart extends Component
{

    public function render()
    {
        $teachers = Teacher::all();

        $dataPoints = [];
        $userData = [];


        foreach($teachers as $row) {
            $userData[$row->name] = $row->educations->count();
            $dataPoints[] = [
                "name" => $row->name,
                "y" => $row->educations->count()
            ];
        }

        return view("livewire.charts.high_chart", [
            "data" => json_encode($dataPoints),  "userData" => json_encode($userData)
        ]);
    }
}
