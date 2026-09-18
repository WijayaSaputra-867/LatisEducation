<?php

namespace Database\Factories;

use App\Models\Institution;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class StudentFactory extends Factory
{
    protected $model = Student::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'institution_id' => Institution::inRandomOrder()->value('id'),
            'nis' => $this->faker->numberBetween(10000000, 99999999),
            'email' => $this->faker->unique()->safeEmail(),
            'photo' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
