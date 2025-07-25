<?php

declare(strict_types=1);

namespace App\Livewire\Page\MainPage\Components;

use App\Models\Category;
use Livewire\Component;

/**
 * Zeigt alle Kategorien als Cards an
 * Nutzt das Partial category-card.blade.php für jede Kategorie
 */
class CategoryCardsView extends Component
{
    public function render()
    {
        $categories = Category::with('organization')->get();

        return view('livewire.category-cards-view', [
            'categories' => $categories,
        ]);
    }
}
