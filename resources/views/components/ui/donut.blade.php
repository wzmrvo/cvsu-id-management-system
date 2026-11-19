{{-- segments: array of [label, value, hex] --}}
@props(['segments' => []])
@php
    $total = array_sum(array_column($segments, 1)) ?: 1; $acc = 0; $stops = [];
    foreach ($segments as [$l, $v, $c]) { $from = $acc / $total * 100; $acc += $v; $to = $acc / $total * 100; $stops[] = "$c {$from}% {$to}%"; }
@endphp
<div class="flex flex-wrap items-center gap-6">
    <div class="relative h-32 w-32 shrink-0 rounded-full" style="background: conic-gradient({{ implode(', ', $stops) }})" role="img" aria-label="Status distribution">
        <div class="absolute inset-4 flex flex-col items-center justify-center rounded-full bg-white"><span class="text-lg font-semibold">{{ $total }}</span><span class="text-[10px] text-gray-500">applications</span></div>
    </div>
    <ul class="space-y-1.5 text-sm">
        @foreach($segments as [$l, $v, $c])
            <li class="flex items-center gap-2"><span class="h-2.5 w-2.5 rounded-sm" style="background: {{ $c }}"></span><span class="text-gray-600">{{ $l }}</span><span class="font-medium">{{ $v }}</span></li>
        @endforeach
    </ul>
</div>
