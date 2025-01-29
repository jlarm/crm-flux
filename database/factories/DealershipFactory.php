<?php

namespace Database\Factories;

use App\Models\Dealership;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class DealershipFactory extends Factory
{
    protected $model = Dealership::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
