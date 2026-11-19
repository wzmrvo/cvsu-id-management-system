{{-- Tab bar bound to an Alpine variable on a parent x-data (default: tab) --}}
@props(['tabs' => [], 'model' => 'tab'])
<div class="flex gap-1 overflow-x-auto border-b border-gray-200" role="tablist">
    @foreach($tabs as $key => $label)
        <button type="button" role="tab" x-on:click="{{ $model }} = '{{ $key }}'" :aria-selected="{{ $model }} === '{{ $key }}'"
                :class="{{ $model }} === '{{ $key }}' ? 'border-cvsu-green text-cvsu-green' : 'border-transparent text-gray-500 hover:text-gray-800'"
                class="-mb-px whitespace-nowrap border-b-2 px-4 py-2.5 text-sm font-medium">{{ $label }}</button>
    @endforeach
</div>
