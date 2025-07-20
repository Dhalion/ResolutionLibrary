<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Organization;
use App\Models\User;

class ApplicantFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'organization_id' => Organization::inRandomOrder()->first()->id ?? Organization::factory(),
            'createdBy' => User::inRandomOrder()->first()->id ?? User::factory(),
        ];
    }
}
