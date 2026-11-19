@props(['title' => null, 'eyebrow' => null, 'flush' => false])
<section {{ $attributes->class(['rounded-xl border border-gray-200 bg-white shadow-xs']) }}>
    @if($title || $eyebrow || isset($actions))
        <div class="flex items-center justify-between gap-3 border-b border-gray-100 px-5 py-3.5">
            <div class="min-w-0">
                @if($eyebrow)<p class="text-[11px] font-semibold uppercase tracking-wider text-cvsu-green">{{ $eyebrow }}</p>@endif
                @if($title)<h2 class="text-sm font-semibold">{{ $title }}</h2>@endif
            </div>
            @isset($actions)<div class="flex shrink-0 items-center gap-2">{{ $actions }}</div>@endisset
        </div>
    @endif
    <div @class(['p-5' => ! $flush])>{{ $slot }}</div>
</section>
