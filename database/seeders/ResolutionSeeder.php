<?php

namespace Database\Seeders;

use App\Models\Applicant;
use App\Models\Resolution;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResolutionSeeder extends Seeder
{
    public function run(): void
    {
        $resolutions = Resolution::factory()->count(5000)->create();

        $applicants = Applicant::all();

        $resolutions->each(function (Resolution $resolution) use ($applicants) {
            $randomApplicantUuids = $applicants->random(rand(1, 5))->pluck('id')->all();

            $resolution->applicants()->attach($randomApplicantUuids);
        });
    }
}
