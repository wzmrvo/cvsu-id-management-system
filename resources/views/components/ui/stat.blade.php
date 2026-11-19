@props(['label', 'value', 'hint' => null])
<div class="rounded-2xl border border-gray-200 bg-white p-5 shadow-sm">
    <p class="text-xs font-medium text-gray-500">{{ $label }}</p>
    <p class="mt-2 text-3xl font-bold tracking-tight text-cvsu-green">{{ $value }}</p>
    @if($hint)<p class="mt-1 text-xs text-gray-500">{{ $hint }}</p>@endif
</div>
