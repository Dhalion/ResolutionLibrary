<?php

namespace Database\Factories;

use App\Models\Organization;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

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
