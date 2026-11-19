@props(['variant' => 'success', 'title' => null])
@php
    $styles = [
        'success' => ['border-cvsu-green/20 bg-cvsu-green-50 text-cvsu-green-dark', 'check'],
        'danger' => ['border-red-200 bg-red-50 text-red-800', 'alert'],
        'warning' => ['border-orange-200 bg-orange-50 text-orange-800', 'alert'],
        'info' => ['border-blue-200 bg-blue-50 text-blue-800', 'info'],
        'neutral' => ['border-gray-200 bg-gray-50 text-gray-700', 'info'],
    ];
    [$cls, $icon] = $styles[$variant] ?? $styles['success'];
@endphp
<div role="status" {{ $attributes->class(['flex gap-3 rounded-lg border px-4 py-3 text-sm', $cls]) }}>
    <x-ui.icon :name="$icon" class="mt-0.5 h-4 w-4" />
    <div class="min-w-0">
        @if($title)<p class="font-semibold">{{ $title }}</p>@endif
        <div>{{ $slot }}</div>
    </div>
</div>
