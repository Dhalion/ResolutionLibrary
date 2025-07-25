<?php

declare(strict_types=1);

namespace App\Livewire\Page\MainPage\Components;

use App\Livewire\Page\MainPage\PageMain;
use Livewire\Component;

class SearchBox extends Component
{
    public string $search = '';

    public function updatedSearch($value)
    {
        $this->dispatch('searchUpdated', term: $value)
            ->to(PageMain::class);
    }

    public function render()
    {
        return view('livewire.search-box');
    }
}
