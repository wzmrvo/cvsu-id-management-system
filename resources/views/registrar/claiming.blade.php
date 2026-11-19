<x-layouts.portal role="registrar" active="claiming" title="Claiming day">
    <x-ui.page-header eyebrow="Registrar · Claiming day" title="A final check. A new beginning." subtitle="Search the claiming reference, then verify the student's photo before printing begins." />
    <x-ui.card class="mb-6">
        <form class="flex flex-wrap items-end gap-3" onsubmit="return false">
            <div class="min-w-0 flex-1"><x-ui.field label="Claiming reference number" name="ref" placeholder="CVSU-261124-042" /></div>
            <x-ui.button href="{{ url('/registrar/claiming/student') }}">Find student →</x-ui.button>
        </form>
    </x-ui.card>
    <x-ui.card>
        <div class="py-6 text-center">
            <p class="text-lg font-semibold">Find a student by their claiming reference.</p>
            <p class="mx-auto mt-1 max-w-md text-sm text-gray-500">Scan the QR code on the student's slip, or type the reference number. Only the student's name, program, schedule, and photo are shown.</p>
            <a href="{{ url('/registrar/claiming/student') }}" class="mt-4 inline-block text-sm font-semibold text-cvsu-green hover:underline">Sample reference: CVSU-261124-042</a>
        </div>
    </x-ui.card>
</x-layouts.portal>
