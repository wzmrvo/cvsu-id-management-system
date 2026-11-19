<x-layouts.portal role="registrar" active="claiming" title="Claiming day">
    <x-ui.page-header eyebrow="Registrar · Claiming day" title="A final check. A new beginning." subtitle="Search the claiming reference, then verify the student's photo before printing begins." />
    <x-ui.card class="mb-6">
        <div class="flex flex-wrap items-center justify-between gap-3">
            <div><p class="text-[11px] font-semibold uppercase tracking-widest text-gray-500">Claiming reference number</p><p class="font-mono font-bold">CVSU-261124-042</p></div>
            <x-ui.button variant="outline" size="sm" href="{{ url('/registrar/claiming') }}">Change reference</x-ui.button>
        </div>
    </x-ui.card>
    <x-ui.card class="mb-6">
        <x-ui.student-summary><x-ui.badge status="scheduled" label="Scheduled · AM-02" /></x-ui.student-summary>
        <p class="mt-3 flex gap-2 text-sm text-cvsu-green"><span>✓</span> Student number checked against the record (minimal info check)</p>
    </x-ui.card>

    <x-ui.card eyebrow="Second verification" title="Does the submitted photo match the student?">
        <div class="grid gap-6 sm:grid-cols-3">
            <x-ui.photo class="mx-auto h-48 w-40" />
            <div class="space-y-4 text-sm sm:col-span-2">
                <div class="rounded-xl bg-cvsu-green-50 p-4"><p class="font-semibold text-cvsu-green">Valid</p><p class="text-gray-600">Real, front-facing, clear photo. Proceed to Ready for Printing.</p></div>
                <div class="rounded-xl bg-red-50 p-4"><p class="font-semibold text-red-700">Invalid</p><p class="text-gray-600">Flag for a face-to-face photo. A new photo will be captured on the spot.</p></div>
            </div>
        </div>
        <div class="mt-6 flex flex-wrap justify-end gap-3">
            <x-ui.button variant="danger-outline" href="{{ url('/registrar/claiming/photo-needed') }}">Invalid · Photo needed</x-ui.button>
            <x-ui.button href="{{ url('/registrar/claiming/ready') }}">Valid · Ready for Printing →</x-ui.button>
        </div>
    </x-ui.card>
    <x-ui.alert variant="info" class="mt-6" title="Printing stays in the existing software">This portal only verifies and records. Signature capture and ID printing are done in the existing system.</x-ui.alert>
</x-layouts.portal>
