<?php

declare(strict_types=1);

namespace App\Livewire\Page\MainPage\Components;

use App\Models\Resolution;
use Livewire\Attributes\Url;
use Livewire\Component;

class SearchResultsView extends Component
{
    #[Url]
    public string $search = '';

    public function render()
    {
        $resolutions = [];
        if (mb_strlen($this->search) >= 3) {
            $resolutions = Resolution::search($this->search)->take(10)->get();
        }

        return view('livewire.search-results-view', [
            'resolutions' => $resolutions,
            'search' => $this->search,
        ]);
    }
}
