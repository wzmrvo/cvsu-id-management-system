@props(['variant' => 'primary', 'href' => null, 'type' => 'button', 'size' => 'md'])
@php
    $variants = [
        'primary'  => 'bg-cvsu-green text-white hover:bg-cvsu-green-dark focus-visible:ring-cvsu-green',
        'gold'     => 'bg-cvsu-gold text-cvsu-ink hover:brightness-95 focus-visible:ring-cvsu-gold',
        'outline'  => 'border border-gray-300 bg-white text-cvsu-ink hover:border-cvsu-green hover:text-cvsu-green focus-visible:ring-cvsu-green',
        'danger'   => 'bg-red-700 text-white hover:bg-red-800 focus-visible:ring-red-700',
        'danger-outline' => 'border border-red-200 bg-red-50 text-red-700 hover:bg-red-100 focus-visible:ring-red-600',
        'on-dark'  => 'border border-white/30 text-white hover:bg-white/10 focus-visible:ring-white',
    ];
    $sizes = ['md' => 'px-4 py-2.5 text-sm', 'sm' => 'px-3 py-1.5 text-xs'];
    $classes = 'inline-flex items-center justify-center gap-2 rounded-lg font-semibold transition focus:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 '
             . ($sizes[$size] ?? $sizes['md']) . ' ' . ($variants[$variant] ?? $variants['primary']);
@endphp
@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>{{ $slot }}</a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }}>{{ $slot }}</button>
@endif
