<x-layouts.portal role="admin" active="settings" title="Settings">
    <x-ui.page-header title="System settings" subtitle="Defaults used by scheduling and photo checks. Values shown are placeholders." :crumbs="[['System administration', '/admin'], ['Settings', null]]" />
    <div class="grid max-w-4xl gap-6">
        <x-ui.card title="Claiming batches">
            <form class="grid gap-4 sm:grid-cols-3" onsubmit="return false">
                <x-ui.field label="Default batch capacity" name="capacity" type="number" value="40" />
                <x-ui.field label="Reschedule limit" name="limit" type="number" value="2" hint="To be confirmed with the registrar." />
                <x-ui.select label="Default location" name="loc" :options="['Registrar\'s Office · ID Processing Desk', 'Main Campus · Student Affairs']" selected="Registrar's Office · ID Processing Desk" />
            </form>
        </x-ui.card>
        <x-ui.card title="Photo requirements">
            <ul class="space-y-2 text-sm">
                @foreach(['1x1 (square) framing', 'Wear the CvSU uniform', 'Plain white background', 'Clear and front-facing'] as $r)<li class="flex gap-2"><x-ui.icon name="check" class="mt-0.5 h-4 w-4 text-cvsu-green" />{{ $r }}</li>@endforeach
            </ul>
            <p class="mt-3 text-xs text-gray-500">Shown to students and used by the registrar's checklist.</p>
        </x-ui.card>
        <div><x-ui.button x-data x-on:click="$dispatch('toast', { message: 'Prototype only · settings are not saved yet.', type: 'info' })">Save settings</x-ui.button></div>
    </div>
</x-layouts.portal>
