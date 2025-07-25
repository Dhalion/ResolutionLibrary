<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 px-4 pb-8">
    @foreach ($categories as $category)
        @include('livewire.partials.category-card', ['category' => $category])
    @endforeach
</div>
