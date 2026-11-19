{{-- errorWhen: optional Alpine expression (e.g. "tried && !f.contact") that shows errorText --}}
@props(['label', 'name', 'type' => 'text', 'hint' => null, 'errorWhen' => null, 'errorText' => 'This field is required.'])
<div>
    <label for="{{ $name }}" class="mb-1.5 block text-sm font-medium text-gray-700">{{ $label }}</label>
    <input id="{{ $name }}" name="{{ $name }}" type="{{ $type }}"
        {{ $attributes->class([
            'block w-full rounded-lg border bg-white px-3 py-2 text-sm placeholder:text-gray-400 focus:outline-none focus:ring-2',
            'border-gray-300 focus:border-cvsu-green focus:ring-cvsu-green/25' => ! $errors->has($name),
            'border-red-500 focus:ring-red-200' => $errors->has($name),
        ]) }}>
    @if($hint)<p class="mt-1 text-xs text-gray-500">{{ $hint }}</p>@endif
    @if($errorWhen)<p x-show="{{ $errorWhen }}" x-cloak class="mt-1 text-xs text-red-600">{{ $errorText }}</p>@endif
    @error($name)<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
</div>
