<div class="min-h-screen bg-gray-50">
    <livewire:page.main-page.components.search-box wire:model="search" />

    @if ($search)
        <livewire:page.main-page.components.search-results-view :search="$search" />
    @else
        <livewire:page.main-page.components.category-cards-view />
    @endif
</div>
