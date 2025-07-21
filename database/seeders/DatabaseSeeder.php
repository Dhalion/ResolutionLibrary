<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->command->info('🌱 Starting database seeding...');

        // Create test user first
        $this->command->info('👤 Creating test user...');
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        $this->command->info("✅ Test user created: test@example.com");

        // Seed in correct dependency order
        $this->command->info('🏢 Seeding organizations...');
        $this->call(OrganizationSeeder::class);

        $this->command->info('📂 Seeding categories...');
        $this->call(CategorySeeder::class);

        $this->command->info('👥 Seeding applicants...');
        $this->call(ApplicantSeeder::class);

        $this->command->info('📋 Seeding resolutions...');
        $this->call(ResolutionSeeder::class);

        $this->command->info('🎉 Database seeding completed successfully!');
    }
}
