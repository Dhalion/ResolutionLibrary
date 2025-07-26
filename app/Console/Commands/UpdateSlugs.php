<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Models\Category;
use App\Models\Resolution;
use Illuminate\Console\Command;

class UpdateSlugs extends Command
{
    protected $signature = 'slugs:update';
    protected $description = 'Aktualisiert die Slugs für alle Kategorien und Resolutionen.';

    public function handle(): int
    {
        $categoryCount = Category::count();
        $this->info('==============================');
        $this->info('Updating slugs for categories');
        $this->info('==============================');
        $bar = $this->output->createProgressBar($categoryCount);
        $bar->start();
        Category::chunk(100, function ($categories) use ($bar) {
            foreach ($categories as $category) {
                $baseSlug = $category->generateSlug();
                $slug = $baseSlug;
                $count = 1;
                while (Category::where('slug', $slug)->where('id', '!=', $category->id)->exists()) {
                    $slug = $baseSlug . '-' . $count;
                    $count++;
                }
                $category->slug = $slug;
                $category->save();
                $bar->advance();
            }
        });
        $bar->finish();
        $this->newLine();
        $this->info('Category slugs updated.');

        $resolutionCount = Resolution::count();
        $this->info('==============================');
        $this->info('Updating slugs for resolutions');
        $this->info('==============================');
        $bar = $this->output->createProgressBar($resolutionCount);
        $bar->start();
        Resolution::chunk(100, function ($resolutions) use ($bar) {
            foreach ($resolutions as $resolution) {
                $baseSlug = $resolution->generateSlug();
                $slug = $baseSlug;
                $count = 1;
                while (Resolution::where('slug', $slug)->where('id', '!=', $resolution->id)->exists()) {
                    $slug = $baseSlug . '-' . $count;
                    $count++;
                }
                $resolution->slug = $slug;
                $resolution->save();
                $bar->advance();
            }
        });
        $bar->finish();
        $this->newLine();
        $this->info('Resolution slugs updated.');

        $this->info('==============================');
        $this->info('All slugs updated successfully.');
        $this->info('==============================');
        return 0;
    }
}
