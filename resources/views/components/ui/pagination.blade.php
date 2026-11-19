{{-- Static pagination for the prototype. Replace with $paginator->links() later. --}}
@props(['from' => 1, 'to' => 5, 'total' => 216])
<div class="flex flex-wrap items-center justify-between gap-3 border-t border-gray-100 px-4 py-3 text-xs text-gray-500">
    <p>Showing <span class="font-medium text-gray-700">{{ $from }}–{{ $to }}</span> of <span class="font-medium text-gray-700">{{ $total }}</span></p>
    <div class="flex items-center gap-1">
        <button type="button" disabled class="rounded-md border border-gray-200 p-1.5 opacity-40" aria-label="Previous page"><x-ui.icon name="chevron-left" class="h-3.5 w-3.5" /></button>
        <button type="button" class="rounded-md bg-cvsu-green px-2.5 py-1 font-medium text-white" aria-current="page">1</button>
        <button type="button" class="rounded-md border border-gray-200 px-2.5 py-1 hover:bg-gray-50">2</button>
        <button type="button" class="rounded-md border border-gray-200 px-2.5 py-1 hover:bg-gray-50">3</button>
        <button type="button" class="rounded-md border border-gray-200 p-1.5 hover:bg-gray-50" aria-label="Next page"><x-ui.icon name="chevron-right" class="h-3.5 w-3.5" /></button>
    </div>
</div>
