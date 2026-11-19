{{-- SAMPLE QR drawing (not scannable). Later: generate a real QR for the claiming reference
     (e.g. simplesoftwareio/simple-qrcode) and render it here. --}}
@props(['value' => 'CVSU-261124-042', 'class' => 'h-36 w-36'])
@php
    $n = 25; mt_srand(crc32($value)); $cells = [];
    for ($y = 0; $y < $n; $y++) {
        for ($x = 0; $x < $n; $x++) {
            $finder = ($x < 8 && $y < 8) || ($x >= $n - 8 && $y < 8) || ($x < 8 && $y >= $n - 8);
            if (! $finder && mt_rand(0, 99) < 48) { $cells[] = [$x, $y]; }
        }
    }
@endphp
<figure {{ $attributes->class('inline-block text-center') }}>
    <svg viewBox="0 0 25 25" class="{{ $class }} rounded-lg border border-gray-200 bg-white p-1.5" shape-rendering="crispEdges" role="img" aria-label="Sample QR code for {{ $value }}">
        @foreach([[0,0],[18,0],[0,18]] as [$fx, $fy])
            <rect x="{{ $fx }}" y="{{ $fy }}" width="7" height="7" fill="#0F172A"/><rect x="{{ $fx + 1 }}" y="{{ $fy + 1 }}" width="5" height="5" fill="#fff"/><rect x="{{ $fx + 2 }}" y="{{ $fy + 2 }}" width="3" height="3" fill="#0F172A"/>
        @endforeach
        @foreach($cells as [$cx, $cy])<rect x="{{ $cx }}" y="{{ $cy }}" width="1" height="1" fill="#0F172A"/>@endforeach
    </svg>
    <figcaption class="mt-1.5 text-[11px] text-gray-400">Sample QR · not scannable</figcaption>
</figure>
