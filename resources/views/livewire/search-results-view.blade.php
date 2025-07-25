<div class="max-w-2xl mx-auto mt-10">
    <h2 class="text-xl font-semibold mb-6 text-center text-gray-700">
        {{ __('search_results_for', ['query' => $search]) }}
    </h2>

    @if ($resolutions)
        <div>
            <h3 class="font-bold text-gray-600 mb-2">{{ __('resolutions') }}</h3>
            <div class="space-y-3">
                @foreach ($resolutions as $resolution)
                    @include('livewire.partials.resolution-card', ['resolution' => $resolution])
                @endforeach
            </div>
        </div>
    @endif

    @if (empty($resolutions) || (is_countable($resolutions) && count($resolutions) === 0))
        <div class="text-gray-400 text-center py-10">{{ __('no_results') }}</div>
    @endif
</div>
