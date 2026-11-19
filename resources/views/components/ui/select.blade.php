@props(['label', 'name', 'options' => [], 'selected' => null, 'hint' => null])
<div>
    <label for="{{ $name }}" class="mb-1.5 block text-sm font-medium text-gray-700">{{ $label }}</label>
    <select id="{{ $name }}" name="{{ $name }}" {{ $attributes->class('block w-full rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm focus:border-cvsu-green focus:outline-none focus:ring-2 focus:ring-cvsu-green/25') }}>
        @foreach($options as $opt)
            <option value="{{ $opt }}" @selected($opt === $selected)>{{ $opt }}</option>
        @endforeach
    </select>
    @if($hint)<p class="mt-1 text-xs text-gray-500">{{ $hint }}</p>@endif
</div>
