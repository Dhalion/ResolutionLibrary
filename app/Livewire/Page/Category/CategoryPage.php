<?php

declare(strict_types=1);

namespace App\Livewire\Page\Category;

use App\Models\Category;
use Livewire\Component;

class CategoryPage extends Component
{
    public Category $category;

    public function mount(Category $category)
    {
        $this->category = $category;
    }

    public function render()
    {
        return view('livewire.page.category', [
            'category' => $this->category,
        ]);
    }
}
