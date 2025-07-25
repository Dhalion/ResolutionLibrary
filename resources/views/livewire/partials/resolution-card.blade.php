<div class="bg-white rounded-xl shadow p-4 border border-gray-100">
    <div class="text-xs text-gray-400 mb-1">Jahr: {{ $resolution->year ?? '-' }}</div>
    <div class="font-bold text-base mb-1">{{ $resolution->title }}</div>
    @if ($resolution->tag)
        <span
            class="inline-block bg-green-100 text-green-700 text-xs px-2 py-1 rounded mb-2">#{{ $resolution->tag }}</span>
    @endif
    <div class="text-gray-600 text-sm line-clamp-2">{{ Str::limit($resolution->text, 120) }}</div>
</div>
