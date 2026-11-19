@props(['name' => 'Juan Miguel Dela Cruz Santos', 'number' => '2024-10352', 'program' => 'BS Information Technology · 3rd year'])
<div {{ $attributes->class('flex items-center gap-4') }}>
    <x-ui.photo class="h-16 w-14" />
    <div class="min-w-0 flex-1">
        <p class="font-semibold">{{ $name }}</p>
        <p class="text-xs text-gray-500">{{ $number }} · {{ $program }}</p>
    </div>
    {{ $slot }}
</div>
