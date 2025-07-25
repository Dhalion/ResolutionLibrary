<?php

declare(strict_types=1);

namespace App\Livewire\Page\MainPage;

use Livewire\Attributes\On;
use Livewire\Component;

class PageMain extends Component
{
    public string $search = '';

    #[On('searchUpdated')]
    public function setSearch($term)
    {
        $this->search = $term;
    }

    public function render()
    {
        return view('livewire.page.main', [
            'search' => $this->search,
        ]);
    }
}
