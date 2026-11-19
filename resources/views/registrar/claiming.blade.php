<x-layouts.portal role="registrar" active="claiming" title="Claiming day">
    <x-ui.page-header title="Claiming day" subtitle="Scan the student's QR or type the claiming reference. The scan only looks up the record." :crumbs="[['Registrar workspace', '/registrar'], ['Claiming day', null]]" />
    <x-ui.card class="mb-6">
        <form class="flex flex-wrap items-end gap-3" onsubmit="return false">
            <div class="min-w-0 flex-1"><x-ui.field label="Claiming reference number" name="ref" placeholder="CVSU-261124-042" autofocus /></div>
            <x-ui.button href="{{ url('/registrar/claiming/student') }}" busy><x-ui.icon name="search" /> Find student</x-ui.button>
            <x-ui.button variant="outline" x-data x-on:click="$dispatch('toast', { message: 'Prototype only · QR scanning will use the device camera or a scanner.', type: 'info' })"><x-ui.icon name="qr" /> Scan QR</x-ui.button>
        </form>
    </x-ui.card>
    <x-ui.card>
        <x-ui.empty-state icon="qr" title="Find a student by their claiming reference" text="Only the student's name, course, schedule and photo are shown, so you can do the second verification.">
            <a href="{{ url('/registrar/claiming/student') }}" class="text-sm font-semibold text-cvsu-green hover:underline">Try the sample reference: CVSU-261124-042</a>
        </x-ui.empty-state>
    </x-ui.card>
</x-layouts.portal>
