@props(['variant' => 'success', 'title' => null])
@php
    $styles = [
        'success' => 'border-cvsu-green/20 bg-cvsu-green-50 text-cvsu-green',
        'danger'  => 'border-red-200 bg-red-50 text-red-700',
        'warning' => 'border-cvsu-gold/40 bg-cvsu-gold-50 text-yellow-900',
        'info'    => 'border-gray-200 bg-gray-50 text-gray-700',
    ];
    $icons = [
        'success' => 'M5 13l4 4L19 7',
        'danger'  => 'M12 9v3.75m0 3.75h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z',
        'warning' => 'M12 9v3.75m0 3.75h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z',
        'info'    => 'M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z',
    ];
@endphp
<div {{ $attributes->class(['flex gap-3 rounded-xl border px-4 py-3 text-sm', $styles[$variant] ?? $styles['success']]) }}>
    <svg class="mt-0.5 h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $icons[$variant] ?? $icons['success'] }}"/></svg>
    <div class="min-w-0">
        @if($title)<p class="font-semibold">{{ $title }}</p>@endif
        <div @class(['opacity-90' => $title])>{{ $slot }}</div>
    </div>
</div>
