@props(['label', 'name', 'rows' => 4, 'hint' => null])
<div>
    <label for="{{ $name }}" class="mb-1.5 block text-sm font-medium text-gray-700">{{ $label }}</label>
    <textarea id="{{ $name }}" name="{{ $name }}" rows="{{ $rows }}" {{ $attributes->class('block w-full rounded-lg border border-gray-300 bg-white px-3 py-2.5 text-sm placeholder:text-gray-400 focus:border-cvsu-green focus:outline-none focus:ring-2 focus:ring-cvsu-green/25') }}>{{ $slot }}</textarea>
    @if($hint)<p class="mt-1 text-xs text-gray-500">{{ $hint }}</p>@endif
</div>
