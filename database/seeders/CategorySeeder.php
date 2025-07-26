<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Organization;
use App\Models\SeoUrl;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        // Get all existing organizations
        $organizations = Organization::all();

        if ($organizations->isEmpty()) {
            $this->command->info('No organizations found. Creating default organizations...');
            $organizations = Organization::factory(3)->create();
        }

        $this->command->info("Creating categories for {$organizations->count()} organizations...");

        // Create categories for each organization
        $categories = [
            ['name' => 'Environment', 'tag' => 'ENV'],
            ['name' => 'Education', 'tag' => 'EDU'],
            ['name' => 'Health', 'tag' => 'HLT'],
            ['name' => 'Economy', 'tag' => 'ECO'],
            ['name' => 'Technology', 'tag' => 'TEC'],
            ['name' => 'Social Affairs', 'tag' => 'SOC'],
            ['name' => 'Culture', 'tag' => 'CUL'],
            ['name' => 'Politics', 'tag' => 'POL'],
            ['name' => 'Sports', 'tag' => 'SPT'],
            ['name' => 'Travel', 'tag' => 'TRV'],
            ['name' => 'Food', 'tag' => 'FOD'],
            ['name' => 'Lifestyle', 'tag' => 'LIF'],
            ['name' => 'Entertainment', 'tag' => 'ENT'],
            ['name' => 'Business', 'tag' => 'BUS'],
            ['name' => 'Science', 'tag' => 'SCI'],
        ];

        foreach ($organizations as $organization) {

            foreach ($categories as $categoryData) {
                Category::factory()
                    ->forOrganization($organization)
                    ->withTag($categoryData['tag'])
                    ->create([
                        'name' => $categoryData['name'],
                    ]);
            }

            // Add some additional random categories
            Category::factory()
                ->count(rand(2, 4))
                ->forOrganization($organization)
                ->create();
        }

        $this->command->info('Categories created successfully!');
    }
}
