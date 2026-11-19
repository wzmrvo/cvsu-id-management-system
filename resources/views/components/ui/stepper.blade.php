{{-- steps: labels; current: 1-based active index (0 = none started, count+1 = all done); vertical: list layout --}}
@props(['steps' => [], 'current' => 1, 'vertical' => false])
@if($vertical)
<ol class="space-y-3">
    @foreach($steps as $i => $label)
        @php $n = $i + 1; $done = $n < $current; $active = $n === $current; @endphp
        <li class="flex items-center gap-3" @if($active) aria-current="step" @endif>
            <span @class(['flex h-7 w-7 shrink-0 items-center justify-center rounded-full text-xs font-semibold', 'bg-cvsu-green text-white' => $done, 'border-2 border-cvsu-green bg-white text-cvsu-green' => $active, 'bg-gray-100 text-gray-500' => $n > $current])>
                @if($done)<x-ui.icon name="check" class="h-3.5 w-3.5" />@else{{ $n }}@endif
            </span>
            <span @class(['text-sm', 'font-semibold' => $active, 'text-gray-500' => $n > $current])>{{ $label }}</span>
        </li>
    @endforeach
</ol>
@else
<ol class="flex items-start">
    @foreach($steps as $i => $label)
        @php $n = $i + 1; $done = $n < $current; $active = $n === $current; @endphp
        <li class="relative flex flex-1 flex-col items-center text-center" @if($active) aria-current="step" @endif>
            @if(! $loop->first)<span @class(['absolute right-1/2 top-4 h-0.5 w-full -translate-y-1/2', 'bg-cvsu-green' => $n <= $current, 'bg-gray-200' => $n > $current])></span>@endif
            <span @class(['relative z-10 flex h-8 w-8 items-center justify-center rounded-full text-xs font-semibold', 'bg-cvsu-green text-white' => $done, 'border-2 border-cvsu-green bg-white text-cvsu-green ring-4 ring-cvsu-green/10' => $active, 'bg-gray-100 text-gray-500' => $n > $current])>
                @if($done)<x-ui.icon name="check" />@else{{ $n }}@endif
            </span>
            <span @class(['mt-2 px-1 text-[11px] leading-tight sm:text-xs', 'font-semibold text-cvsu-green' => $done || $active, 'text-gray-500' => $n > $current])>{{ $label }}</span>
        </li>
    @endforeach
</ol>
@endif
