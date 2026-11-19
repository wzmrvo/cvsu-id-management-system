@props(['labels' => [], 'values' => []])
@php $max = max($values) ?: 1; @endphp
<div class="flex h-40 items-end gap-2" role="img" aria-label="Bar chart">
    @foreach($values as $i => $v)
        <div class="flex flex-1 flex-col items-center gap-1">
            <span class="text-[11px] font-medium text-gray-600">{{ $v }}</span>
            <div class="w-full rounded-t-md bg-cvsu-green/85 transition hover:bg-cvsu-green" style="height: {{ round($v / $max * 100) }}%"></div>
            <span class="text-[11px] text-gray-500">{{ $labels[$i] }}</span>
        </div>
    @endforeach
</div>
