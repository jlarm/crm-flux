<?php

namespace Database\Seeders;

use App\Models\Dealership;
use Illuminate\Database\Seeder;

class DealershipSeeder extends Seeder
{
    public function run(): void
    {
        Dealership::factory()->count(1000)->create();
    }
}
