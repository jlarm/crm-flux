<?php

namespace Database\Factories;

use App\Enum\DevStatus;
use App\Enum\Rating;
use App\Enum\State;
use App\Enum\Status;
use App\Enum\Type;
use App\Models\Dealership;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class DealershipFactory extends Factory
{
    protected $model = Dealership::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->company(),
            'address' => $this->faker->address(),
            'city' => $this->faker->city(),
            'state' => $this->faker->randomElement(State::class),
            'zip_code' => $this->faker->postcode(),
            'phone' => $this->faker->numerify('###-###-####'),
            'email' => $this->faker->unique()->safeEmail(),
            'current_solution_name' => 'KPA',
            'current_solution_use' => 'Compliance',
            'status' => $this->faker->randomElement(Status::class),
            'rating' => $this->faker->randomElement(Rating::class),
            'type' => $this->faker->randomElement(Type::class),
            'in_development' => $this->faker->boolean(),
            'dev_status' => $this->faker->randomElement(DevStatus::class),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }

    public function configure(): DealershipFactory
    {
        return $this->afterCreating(function (Dealership $dealership) {
            $dealership->users()->attach(User::inRandomOrder()->first());
        });
    }
}
