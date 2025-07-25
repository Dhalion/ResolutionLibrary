<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CompileTheme extends Command
{
    protected $signature = 'theme:compile';

    protected $description = 'Generates a static CSS file with theme variables from the config.';

    public function handle()
    {
        $config = config('theme');
        $css = view('theme.theme-style-template', [
            'primary' => $config['primary_color'],
            'secondary' => $config['secondary_color'],
        ])->render();

        $path = public_path('theme.css');

        file_put_contents($path, $css);
        $this->info("Theme-CSS has been generated: {$path}");
    }
}
