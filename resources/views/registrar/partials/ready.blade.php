<x-layouts.portal role="registrar" active="claiming" title="Ready for printing">
    <x-ui.page-header title="Ready for printing" subtitle="Second verification is complete. Continue in the existing printing software."
        :crumbs="[['Registrar workspace', '/registrar'], ['Claiming day', '/registrar/claiming'], ['Ready for printing', null]]" />
    <x-ui.alert variant="success" class="mb-6" :title="$alertTitle">{{ $alertText }}</x-ui.alert>

    <div class="grid gap-6 lg:grid-cols-3">
        <div class="space-y-6 lg:col-span-2">
            <x-ui.card>
                <x-ui.student-summary><x-ui.badge status="ready" /></x-ui.student-summary>
                <p class="mt-4 font-mono text-sm font-semibold">CVSU-261124-042 · November 24, 2026 · AM-02</p>
                <ol class="mt-4 space-y-2.5 text-sm">
                    @foreach(['Print the ID using the existing software (the student signs on the signature device).', 'Confirm that the physical ID has been handed to the student.', 'Record the release by selecting “Mark as Claimed”.'] as $i => $t)
                        <li class="flex gap-3"><span class="flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-cvsu-green-50 text-xs font-semibold text-cvsu-green">{{ $i + 1 }}</span>{{ $t }}</li>
                    @endforeach
                </ol>
            </x-ui.card>
            <div class="flex flex-wrap justify-between gap-3">
                <x-ui.button variant="outline" href="{{ url('/registrar/claiming') }}">Back to claiming search</x-ui.button>
                <x-ui.button x-data x-on:click="$dispatch('open-modal', 'mark-claimed')"><x-ui.icon name="check" /> Mark as Claimed</x-ui.button>
            </div>
        </div>

        <x-ui.card title="Verified ID data" x-data="{ copied: false }">
            <dl class="space-y-3 text-sm">
                @foreach([['Full name', 'Juan Miguel Dela Cruz Santos'], ['Student number', '2024-10352'], ['Course · year', 'BS Information Technology · 3rd'], ['College', 'CEIT'], ['Photo', $photoNote]] as [$k, $v])
                    <div><dt class="text-xs text-gray-500">{{ $k }}</dt><dd class="font-medium">{{ $v }}</dd></div>
                @endforeach
            </dl>
            <x-ui.button variant="outline" size="sm" class="mt-4" x-on:click="copied = true; $dispatch('toast', { message: 'Prototype only · data would be copied for the printing software.', type: 'info' })"><x-ui.icon name="copy" /> Copy data</x-ui.button>
            <p class="mt-3 text-xs text-gray-500">How data and photos reach the printing software is still being confirmed with CvSU staff.</p>
        </x-ui.card>
    </div>

    <x-ui.confirm name="mark-claimed" title="Mark this ID as claimed?" message="Confirm that the ID was printed and handed to the student. The reference number becomes invalid and this action is recorded with your name." confirm-label="Mark as Claimed" :href="url('/registrar/claiming/claimed')" />
</x-layouts.portal>
