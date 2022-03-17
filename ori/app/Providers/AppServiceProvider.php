<?php

namespace App\Providers;

use App\Charts\C3chart;
use ConsoleTVs\Charts\Registrar as Charts;
use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use PhpParser\Builder;

class AppServiceProvider extends ServiceProvider
{
    public function boot(Charts $charts)
    {




        $charts->register([C3chart::class]
        );

    }


}
