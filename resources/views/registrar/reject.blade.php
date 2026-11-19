<x-layouts.portal role="registrar" active="verification" title="Reject application">
    <x-ui.page-header eyebrow="Registrar · First verification" title="Reject application" subtitle="Confirm the reason and remarks before rejecting this application." />
    <x-ui.card class="max-w-3xl">
        <x-ui.student-summary><x-ui.badge status="rejected" /></x-ui.student-summary>
        <form class="mt-6 space-y-4" onsubmit="return false">
            <x-ui.select label="Reason *" name="reason" :options="['Student record could not be verified', 'Not currently enrolled', 'Duplicate application']" selected="Student record could not be verified" />
            <x-ui.textarea label="Remarks to student *" name="remarks" rows="4">The enrollment record could not be verified. Please contact the Registrar's Office with your current Certificate of Registration before applying again.</x-ui.textarea>
            <p class="text-xs text-gray-500">The student will receive the rejection reason. This action is recorded in the activity log.</p>
            <div class="flex justify-between gap-3">
                <x-ui.button variant="outline" href="{{ url('/registrar/verification') }}">Cancel</x-ui.button>
                <x-ui.button variant="danger" href="{{ url('/registrar/verification/rejected') }}">Confirm rejection</x-ui.button>
            </div>
        </form>
    </x-ui.card>
</x-layouts.portal>
