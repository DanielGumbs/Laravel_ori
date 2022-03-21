<?php

use App\Http\Livewire\Educations;
use App\Http\Livewire\Teachers;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/educations', Educations::class)->name('educations.index');

Route::get('/teachers', Teachers::class)->name('teachers.index');

Route::get('/view_educations/{id}', \App\Http\Livewire\ViewEducations::class)->name('view_educations.index');

Route::get('/larapexchart', \App\Http\Livewire\charts\LarapexChart::class)->name('charts.index');

Route::get('/chart-js', \App\Http\Livewire\charts\ChartJS::class)->name('chart-js.index');

Route::get('/livewirchart', \App\Http\Livewire\charts\LivewireChart::class)->name('LivewirePieChart.index');

Route::get('/pie_chart', \App\Http\Livewire\charts\HighChart::class)->name('pie_chart.index');

Route::get('/c3chart', \App\Http\Livewire\charts\C3Chart::class)->name('C3chart.index');


