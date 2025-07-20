<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Organization;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    public function definition(): array
    {
        $name = $this->faker->word();
        $orgs = Organization::inRandomOrder()->first();
        return [
            'name' => $name,
            'tag' => $this->faker->word(),
            'organization_id' => $orgs->id,
            'image' => $this->faker->imageUrl(200, 200, 'business', true),
            'slug' => Str::slug($name),
        ];
    }
}
