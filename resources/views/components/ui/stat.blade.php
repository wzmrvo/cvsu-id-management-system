@props(['label', 'value', 'hint' => null, 'icon' => null])
<div class="rounded-xl border border-gray-200 bg-white p-4 shadow-xs">
    <div class="flex items-center justify-between">
        <p class="text-xs font-medium text-gray-500">{{ $label }}</p>
        @if($icon)<span class="flex h-8 w-8 items-center justify-center rounded-lg bg-cvsu-green-50 text-cvsu-green"><x-ui.icon :name="$icon" /></span>@endif
    </div>
    <p class="mt-2 text-2xl font-semibold tracking-tight">{{ $value }}</p>
    @if($hint)<p class="mt-0.5 text-xs text-gray-500">{{ $hint }}</p>@endif
</div>
