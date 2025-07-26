<?php

namespace Database\Seeders;

use App\Models\Applicant;
use App\Models\Category;
use App\Models\Resolution;
use Illuminate\Database\Seeder;

class ResolutionSeeder extends Seeder
{
    public function run(): void
    {
        $categoriesCount = Category::count();
        $applicantsCount = Applicant::count();

        if ($categoriesCount === 0) {
            $this->command->warn('No categories found. Skipping resolution seeding.');

            return;
        }

        if ($applicantsCount === 0) {
            $this->command->warn('No applicants found. Skipping resolution seeding.');

            return;
        }

        $this->command->info("Creating 100 resolutions with {$categoriesCount} categories and {$applicantsCount} applicants...");

        $resolutions = Resolution::factory()->count(100)->create();

        $applicants = Applicant::all();

        $resolutions->each(function (Resolution $resolution) use ($applicants) {
            $randomApplicantUuids = $applicants->random(rand(1, 3))->pluck('id')->all();
            $resolution->applicants()->attach($randomApplicantUuids);
        });

        $this->command->info('Resolutions created and linked to applicants successfully!');
    }
}
