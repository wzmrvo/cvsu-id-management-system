@props(['title', 'subtitle' => null, 'crumbs' => []])
<div class="mb-6">
    @if(count($crumbs))
        <nav aria-label="Breadcrumb" class="mb-2 flex flex-wrap items-center gap-1 text-xs text-gray-500">
            @foreach($crumbs as [$label, $url])
                @if(! $loop->first)<x-ui.icon name="chevron-right" class="h-3 w-3 text-gray-400" />@endif
                @if($url)<a href="{{ url($url) }}" class="hover:text-cvsu-green hover:underline">{{ $label }}</a>
                @else<span class="font-medium text-gray-700" aria-current="page">{{ $label }}</span>@endif
            @endforeach
        </nav>
    @endif
    <div class="flex flex-wrap items-end justify-between gap-3">
        <div class="min-w-0">
            <h1 class="text-xl font-semibold tracking-tight md:text-2xl">{{ $title }}</h1>
            @if($subtitle)<p class="mt-1 max-w-2xl text-sm text-gray-500">{{ $subtitle }}</p>@endif
        </div>
        @isset($actions)<div class="flex flex-wrap gap-2">{{ $actions }}</div>@endisset
    </div>
</div>
