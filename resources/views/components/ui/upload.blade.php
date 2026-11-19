@props(['label', 'name', 'hint' => null])
<div>
    <label class="mb-1.5 block text-sm font-medium text-gray-700">{{ $label }}</label>
    <label for="{{ $name }}" class="flex cursor-pointer flex-col items-center justify-center rounded-xl border-2 border-dashed border-cvsu-green/30 bg-cvsu-green-50/50 px-4 py-6 text-center text-sm text-gray-600 transition hover:border-cvsu-green hover:bg-cvsu-green-50">
        <svg class="mb-2 h-6 w-6 text-cvsu-green" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5"/></svg>
        <span class="font-medium text-cvsu-green">Click to upload</span>
        @if($hint)<span class="mt-1 text-xs text-gray-500">{{ $hint }}</span>@endif
        <input id="{{ $name }}" name="{{ $name }}" type="file" class="sr-only">
    </label>
</div>
