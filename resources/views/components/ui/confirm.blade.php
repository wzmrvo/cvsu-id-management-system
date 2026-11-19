{{-- Confirmation dialog. Trigger: x-on:click="$dispatch('open-modal', 'name')" --}}
@props(['name', 'title', 'message', 'confirmLabel' => 'Confirm', 'href' => '#', 'variant' => 'primary'])
<x-ui.modal :name="$name" :title="$title">
    <p class="text-sm text-gray-600">{{ $message }}</p>
    <div class="mt-6 flex justify-end gap-2">
        <x-ui.button variant="outline" x-on:click="$dispatch('close-modal')">Cancel</x-ui.button>
        <x-ui.button :variant="$variant" :href="$href" busy>{{ $confirmLabel }}</x-ui.button>
    </div>
</x-ui.modal>
