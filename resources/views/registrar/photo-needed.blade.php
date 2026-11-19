<x-layouts.portal role="registrar" active="claiming" title="Face-to-face photo needed">
    <x-ui.page-header eyebrow="Registrar · Claiming day" title="Face-to-face photo needed" subtitle="Do not proceed to Ready for Printing until a new photo is captured." />
    <x-ui.alert variant="danger" class="mb-6" title="Photo flagged during Second Verification">The submitted photo cannot be used. A new photo must be captured at the ID desk.</x-ui.alert>
    <x-ui.card>
        <x-ui.student-summary><x-ui.badge status="flagged" /></x-ui.student-summary>
        <div class="mt-5"><x-ui.textarea label="Reported details" name="details" rows="3">Identity cannot be confidently matched. Capture a new compliant photo at the ID desk.</x-ui.textarea></div>
        <p class="mt-2 text-xs text-gray-500">The new photo is captured in the existing printing software and is not saved back to this portal. The record is only marked as modified.</p>
        <div class="mt-6 flex flex-wrap justify-between gap-3">
            <x-ui.button variant="outline" href="{{ url('/registrar/claiming/student') }}">Back to Second Verification</x-ui.button>
            <x-ui.button href="{{ url('/registrar/claiming/ready-after-photo') }}">Photo captured · Ready for Printing →</x-ui.button>
        </div>
    </x-ui.card>
</x-layouts.portal>
