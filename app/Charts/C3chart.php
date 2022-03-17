<?php

namespace App\Charts;
use App\Models\Category;
use App\Models\Education;
use App\Models\Teacher;
use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Redirect,Response;
Use DB;
use ConsoleTVs\Charts\BaseChart;
use Chartisan\PHP\Chartisan;

class C3chart extends BaseChart
{
    public function handler(Request $request): Chartisan
    {
        return Chartisan::build()
            ->labels(['First', 'Second', 'Third'])
            ->dataset('Sample', [1, 2, 3])
            ->dataset('Sample 2', [3, 2, 1]);
    }
}
