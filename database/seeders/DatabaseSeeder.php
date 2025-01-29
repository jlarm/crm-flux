<?php

namespace Database\Seeders;

use App\Models\Dealership;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Joe Lohr',
            'email' => 'jlohr@autorisknow.com',
            'password' => bcrypt('password'),
            'is_admin' => true,
        ]);

        User::create([
            'name' => 'John Doe',
            'email' => 'jdoe@autorisknow.com',
            'password' => bcrypt('password'),
        ]);

        $users = User::factory()->count(10)->create();
        $dealerships = Dealership::factory()->count(1000)->create();

        $users->each(function ($user) use ($dealerships) {
            $user->dealerships()->attach(
                $dealerships->random(rand(1, 20))->pluck('id')->toArray()
            );
        });
    }
}
