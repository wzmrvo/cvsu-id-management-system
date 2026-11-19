{{-- Open from anywhere with: x-on:click="$dispatch('open-modal', '{{ $name }}')" ; close with $dispatch('close-modal') --}}
@props(['name', 'title', 'maxWidth' => 'max-w-md'])
<div x-data="{ show: false }" x-on:open-modal.window="if ($event.detail === '{{ $name }}') show = true"
     x-on:close-modal.window="show = false" x-on:keydown.escape.window="show = false"
     x-show="show" x-cloak class="fixed inset-0 z-50 flex items-center justify-center p-4" role="dialog" aria-modal="true" aria-labelledby="{{ $name }}-title">
    <div class="fixed inset-0 bg-slate-900/50" x-on:click="show = false" x-transition.opacity></div>
    <div class="relative w-full {{ $maxWidth }} rounded-xl bg-white p-6 shadow-xl" x-show="show" x-transition>
        <div class="mb-4 flex items-start justify-between gap-4">
            <h2 id="{{ $name }}-title" class="text-base font-semibold">{{ $title }}</h2>
            <button type="button" class="rounded-md p-1 text-gray-400 hover:bg-gray-100 hover:text-gray-700" x-on:click="show = false" aria-label="Close"><x-ui.icon name="x" /></button>
        </div>
        {{ $slot }}
    </div>
</div>
