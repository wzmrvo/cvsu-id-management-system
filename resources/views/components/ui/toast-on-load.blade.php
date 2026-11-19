@props(['message', 'type' => 'success'])
<div x-data x-init="setTimeout(() => $dispatch('toast', { message: @js($message), type: '{{ $type }}' }), 150)" class="hidden"></div>
