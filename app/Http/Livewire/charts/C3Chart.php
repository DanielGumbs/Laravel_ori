<?php

namespace App\Http\Livewire\charts;
use App\Models\Chart;
use Livewire\Component;
use function view;

class C3Chart extends Component
{
    public $teachers;

    public function render() {
        return view('livewire.charts.c3_chart');
    }
}
