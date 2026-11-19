{{-- Generic file input. Dispatches "file-change" with {name} so a parent x-data can react. --}}
@props(['label', 'name', 'hint' => null, 'accept' => null])
<div x-data="{ fileName: null }">
    <label class="mb-1.5 block text-sm font-medium text-gray-700">{{ $label }}</label>
    <label for="{{ $name }}" class="flex cursor-pointer flex-col items-center justify-center rounded-lg border-2 border-dashed border-gray-300 bg-gray-50 px-4 py-6 text-center text-sm text-gray-600 transition hover:border-cvsu-green hover:bg-cvsu-green-50/50 focus-within:ring-2 focus-within:ring-cvsu-green/30">
        <x-ui.icon name="upload" class="mb-2 h-5 w-5 text-cvsu-green" />
        <template x-if="!fileName"><span class="font-medium text-cvsu-green">Click to upload</span></template>
        <template x-if="fileName"><span class="flex items-center gap-1 font-medium text-cvsu-green"><span x-text="fileName"></span></span></template>
        @if($hint)<span class="mt-1 text-xs text-gray-500">{{ $hint }}</span>@endif
        <input id="{{ $name }}" name="{{ $name }}" type="file" @if($accept) accept="{{ $accept }}" @endif class="sr-only"
               x-on:change="fileName = $event.target.files[0] ? $event.target.files[0].name : null; $dispatch('file-change', { name: fileName })">
    </label>
</div>
