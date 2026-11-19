{{-- items: array of [title, text, time, tone] where tone = done|current|alert|upcoming --}}
@props(['items' => []])
<ol class="relative space-y-5 border-l border-gray-200 pl-6">
    @foreach($items as [$title, $text, $time, $tone])
        <li class="relative">
            <span @class(['absolute -left-[31px] top-0.5 flex h-4 w-4 items-center justify-center rounded-full ring-4 ring-white',
                'bg-cvsu-green' => $tone === 'done', 'bg-blue-600' => $tone === 'current', 'bg-orange-500' => $tone === 'alert', 'bg-gray-300' => $tone === 'upcoming'])></span>
            <p class="text-sm font-medium">{{ $title }}</p>
            @if($text)<p class="text-sm text-gray-500">{{ $text }}</p>@endif
            @if($time)<p class="mt-0.5 text-xs text-gray-400">{{ $time }}</p>@endif
        </li>
    @endforeach
</ol>
