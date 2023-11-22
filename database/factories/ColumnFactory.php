<?php

namespace Database\Factories;

use App\Models\ColumnTitle;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ColumnFactory extends Factory
{
    protected $model = ColumnTitle::class;

    public function definition(): array
    {
        return [
//            'name' => $this->name;
//            'color' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
