<div class="category-card">
    <div class="text-xs text-gray-400 mb-1">{{ $category->organization->shortName ?? '' }}</div>
    <div class="font-bold text-lg mb-2">{{ $category->name }}</div>
    @if ($category->tag)
        <span class="category-card__tag">#{{ $category->tag }}</span>
    @endif
    @if ($category->description)
        <div class="text-gray-600 text-sm mb-2">{{ $category->description }}</div>
    @endif
</div>
