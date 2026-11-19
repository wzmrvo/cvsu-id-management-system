<x-layouts.portal role="registrar" active="claiming" title="Face-to-face photo needed">
    <x-ui.page-header title="Face-to-face photo needed" subtitle="Do not continue to printing until a new photo is captured."
        :crumbs="[['Registrar workspace', '/registrar'], ['Claiming day', '/registrar/claiming'], ['Photo needed', null]]" />
    <x-ui.alert variant="danger" class="mb-6" title="Photo flagged during second verification">The submitted photo cannot be used. Capture a new photo at the ID desk.</x-ui.alert>
    <x-ui.card class="max-w-3xl">
        <x-ui.student-summary><x-ui.badge status="flagged" /></x-ui.student-summary>
        <div class="mt-5"><x-ui.textarea label="Reported details" name="details" rows="3">Identity cannot be confidently matched. Capture a new compliant photo at the ID desk.</x-ui.textarea></div>
        <p class="mt-2 text-xs text-gray-500">The new photo is captured in the existing printing software and is not saved back to this portal. The record is only marked as modified.</p>
        <div class="mt-6 flex flex-wrap justify-between gap-3">
            <x-ui.button variant="outline" href="{{ url('/registrar/claiming/student') }}">Back to second verification</x-ui.button>
            <x-ui.button href="{{ url('/registrar/claiming/ready-after-photo') }}" busy>Photo captured · Ready for printing <x-ui.icon name="arrow-right" /></x-ui.button>
        </div>
    </x-ui.card>
</x-layouts.portal>
