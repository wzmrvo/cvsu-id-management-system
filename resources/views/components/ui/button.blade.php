@props(['variant' => 'primary', 'href' => null, 'type' => 'button', 'size' => 'md', 'busy' => false])
@php
    $variants = [
        'primary' => 'bg-cvsu-green text-white hover:bg-cvsu-green-dark focus-visible:ring-cvsu-green',
        'gold' => 'bg-cvsu-gold text-cvsu-ink hover:brightness-95 focus-visible:ring-cvsu-gold',
        'outline' => 'border border-gray-300 bg-white text-cvsu-ink hover:border-cvsu-green hover:text-cvsu-green focus-visible:ring-cvsu-green',
        'ghost' => 'text-gray-600 hover:bg-gray-100 focus-visible:ring-gray-400',
        'danger' => 'bg-red-700 text-white hover:bg-red-800 focus-visible:ring-red-700',
        'danger-outline' => 'border border-red-200 bg-white text-red-700 hover:bg-red-50 focus-visible:ring-red-600',
        'on-dark' => 'border border-white/30 text-white hover:bg-white/10 focus-visible:ring-white',
    ];
    $sizes = ['md' => 'px-4 py-2 text-sm', 'sm' => 'px-3 py-1.5 text-xs', 'lg' => 'px-5 py-3 text-base'];
    $classes = 'inline-flex items-center justify-center gap-2 rounded-lg font-semibold transition focus:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 '
        . ($sizes[$size] ?? $sizes['md']) . ' ' . ($variants[$variant] ?? $variants['primary']);
    $spinner = '<svg x-show="loading" x-cloak class="h-4 w-4 animate-spin" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="3" opacity=".25"/><path d="M22 12a10 10 0 0 0-10-10" stroke="currentColor" stroke-width="3" stroke-linecap="round"/></svg>';
@endphp
@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }} @if($busy) x-data="{ loading: false }" x-on:click="loading = true" @endif>@if($busy){!! $spinner !!}@endif{{ $slot }}</a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }} @if($busy) x-data="{ loading: false }" x-on:click="loading = true" @endif>@if($busy){!! $spinner !!}@endif{{ $slot }}</button>
@endif
