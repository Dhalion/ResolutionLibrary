<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Organization;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition(): array
    {
        $name = $this->faker->words(2, true);
        $tag = $this->faker->optional(0.7)->lexify('???');

        // Generate slug based on whether we have a tag
        $slug = $tag ? Str::slug($tag . " - " . $name) : Str::slug($name);

        return [
            'name' => $name,
            'tag' => $tag,
            'slug' => $slug,
            'organization_id' => Organization::inRandomOrder()->first()?->id ?? Organization::factory(),
        ];
    }

    public function forOrganization(Organization $organization): static
    {
        return $this->state(fn(array $attributes) => [
            'organization_id' => $organization->getKey(),
        ]);
    }

    public function withTag(string $tag): static
    {
        return $this->state(function (array $attributes) use ($tag) {
            $slug = Str::slug($tag . " - " . $attributes['name']);
            return [
                'tag' => $tag,
                'slug' => $slug,
            ];
        });
    }
}
