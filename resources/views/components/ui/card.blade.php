@props(['title' => null, 'eyebrow' => null, 'accent' => false, 'flush' => false])
<section {{ $attributes->class(['rounded-2xl border border-gray-200 bg-white shadow-sm', 'border-t-4 border-t-cvsu-gold' => $accent]) }}>
    @if($title || $eyebrow)
        <div class="border-b border-gray-100 px-5 py-4">
            @if($eyebrow)<p class="text-[11px] font-semibold uppercase tracking-widest text-cvsu-green">{{ $eyebrow }}</p>@endif
            @if($title)<h2 class="font-semibold">{{ $title }}</h2>@endif
        </div>
    @endif
    <div @class(['p-5' => ! $flush])>{{ $slot }}</div>
</section>
