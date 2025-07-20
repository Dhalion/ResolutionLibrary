<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Resolution;
use App\Models\Category;
use App\Models\Organization;

class ResolutionFactory extends Factory
{
    protected $model = Resolution::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'tag' => $this->faker->word(),
            'year' => $this->faker->year(),
            'text' => $this->faker->paragraph(3),
            'status' => $this->faker->randomElement(['draft', 'published', 'archived']),
            'category_id' => Category::inRandomOrder()->first()->id ?? Category::factory(),
            'council_id' => Organization::inRandomOrder()->first()->id ?? Organization::factory(),
        ];
    }
}
