<div class="min-h-screen bg-gray-50 py-10">
    <div class="max-w-3xl mx-auto">
        <div class="mb-8">
            <a href="{{ url()->previous() }}" class="text-blue-500 hover:underline text-sm">&larr; {{ __('Zurück') }}</a>
        </div>
        <div class="bg-white rounded-xl shadow p-8 mb-8">
            <h1 class="text-3xl font-bold mb-2">{{ $category->name ?? '-' }}</h1>
            @if ($category->tag)
                <span
                    class="inline-block bg-blue-100 text-blue-700 text-xs px-2 py-1 rounded mb-2">#{{ $category->tag }}</span>
            @endif
            @if ($category->description)
                <div class="text-gray-600 text-base mb-4">{{ $category->description }}</div>
            @endif
            <div class="text-xs text-gray-400 mb-1">{{ $category->organization->shortName ?? '' }}</div>
        </div>
        <div>
            <h2 class="text-xl font-semibold mb-4">{{ __('Resolutionen dieser Kategorie') }}</h2>
            <div class="space-y-3">
                @forelse($category->resolutions as $resolution)
                    @include('livewire.partials.resolution-card', ['resolution' => $resolution])
                @empty
                    <div class="text-gray-400 text-center py-10">{{ __('no_results') }}</div>
                @endforelse
            </div>
        </div>
    </div>
</div>
