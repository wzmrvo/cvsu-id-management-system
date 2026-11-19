@props(['eyebrow' => null, 'title', 'subtitle' => null])
<div class="mb-6 flex flex-wrap items-end justify-between gap-4">
    <div class="min-w-0">
        @if($eyebrow)<p class="text-[11px] font-semibold uppercase tracking-widest text-cvsu-green">{{ $eyebrow }}</p>@endif
        <h1 class="mt-1 text-2xl font-bold tracking-tight md:text-3xl">{{ $title }}</h1>
        @if($subtitle)<p class="mt-1 max-w-2xl text-sm text-gray-500">{{ $subtitle }}</p>@endif
    </div>
    @isset($actions)<div class="flex flex-wrap gap-2">{{ $actions }}</div>@endisset
</div>
