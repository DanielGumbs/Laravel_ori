<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class  DatabaseSeeder extends Seeder
{
    public function run()
    {
        $educations = App\Models\Education::factory(10)->create();
    }
}
