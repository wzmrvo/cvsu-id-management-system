<x-layouts.portal role="registrar" active="verification" title="Reject application">
    <x-ui.page-header title="Reject application" subtitle="Confirm the reason and remarks before rejecting." :crumbs="[['Registrar workspace', '/registrar'], ['First verification', '/registrar/verification'], ['Review', '/registrar/verification/review'], ['Reject', null]]" />
    <x-ui.card class="max-w-3xl">
        <x-ui.student-summary><x-ui.badge status="rejected" /></x-ui.student-summary>
        <form class="mt-6 space-y-4" onsubmit="return false">
            <x-ui.select label="Reason *" name="reason" :options="['Student record could not be verified', 'Not currently enrolled', 'Duplicate application']" selected="Student record could not be verified" />
            <x-ui.textarea label="Remarks to student *" name="remarks" rows="4">The enrollment record could not be verified. Please contact the Registrar's Office with your current Certificate of Registration before applying again.</x-ui.textarea>
            <p class="text-xs text-gray-500">The student will receive the reason. This action is recorded in the activity log.</p>
            <div class="flex justify-between gap-3">
                <x-ui.button variant="outline" href="{{ url('/registrar/verification/review') }}">Cancel</x-ui.button>
                <x-ui.button variant="danger" x-data x-on:click="$dispatch('open-modal', 'confirm-reject')">Reject application</x-ui.button>
            </div>
        </form>
    </x-ui.card>
    <x-ui.confirm name="confirm-reject" title="Reject this application?" message="The student will be notified with your remarks. They will need to apply again." confirm-label="Confirm rejection" variant="danger" :href="url('/registrar/verification/rejected')" />
</x-layouts.portal>
