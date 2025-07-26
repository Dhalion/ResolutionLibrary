<?php

declare(strict_types=1);

namespace App\Livewire\Page\Resolution;

use App\Models\Resolution;
use Livewire\Component;

class ResolutionPage extends Component
{
    public Resolution $resolution;

    public function mount(Resolution $resolution): void
    {
        $this->resolution = $resolution;
    }

    public function render()
    {
        return view('livewire.page.resolution', [
            'resolution' => $this->resolution,
        ]);
    }
}
