    <div class="min-h-screen bg-gray-50 py-10">
        <div class="max-w-3xl mx-auto">
            <div class="mb-8">
                <a href="{{ url()->previous() }}" class="text-blue-500 hover:underline text-sm">&larr;
                    {{ __('Zurück') }}</a>
            </div>
            <div class="bg-white rounded-xl shadow p-8 mb-8">
                <h1 class="text-3xl font-bold mb-2">{{ $resolution->title ?? '-' }}</h1>
                @if ($resolution->tag)
                    <span
                        class="inline-block bg-green-100 text-green-700 text-xs px-2 py-1 rounded mb-2">#{{ $resolution->tag }}</span>
                @endif
                @if ($resolution->year)
                    <div class="text-gray-600 text-base mb-4">{{ $resolution->year }}</div>
                @endif
                <div class="text-xs text-gray-400 mb-1">{{ $resolution->category?->name ?? '' }}</div>
            </div>
            <div>
                <h2 class="text-xl font-semibold mb-4">{{ __('Resolutionstext') }}</h2>
                <div class="space-y-3">
                    <div class="p-4 bg-white rounded shadow">
                        <div class="text-sm text-gray-600">{{ $resolution->text }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
