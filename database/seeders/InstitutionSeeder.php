<?php

namespace Database\Seeders;

use App\Models\Institution;
use Illuminate\Database\Seeder;

class InstitutionSeeder extends Seeder
{
    public function run(): void
    {
        Institution::create(['name' => 'LatisEducation']);
        Institution::create(['name' => 'TutorIndonesia']);
    }
}
