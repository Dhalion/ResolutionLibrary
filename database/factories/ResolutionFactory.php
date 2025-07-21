<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Resolution;
use App\Models\Category;

class ResolutionFactory extends Factory
{
    protected $model = Resolution::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'tag' => $this->faker->optional(0.8)->word(),
            'year' => $this->faker->year(),
            'text' => $this->faker->paragraphs(3, true),
            'status' => $this->faker->randomElement(['draft', 'published', 'archived']),
            'category_id' => Category::inRandomOrder()->first()?->id,
        ];
    }
}
