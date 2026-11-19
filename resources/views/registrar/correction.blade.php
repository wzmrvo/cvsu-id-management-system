<x-layouts.portal role="registrar" active="verification" title="Request a correction">
    <x-ui.page-header eyebrow="Registrar · First verification" title="Request a correction" subtitle="Tell the student exactly what to fix before resubmitting the application." />
    <x-ui.card class="max-w-3xl">
        <x-ui.student-summary><x-ui.badge status="correction" /></x-ui.student-summary>
        <form class="mt-6 space-y-4" onsubmit="return false">
            <x-ui.select label="Reason *" name="reason" :options="['Photo requirements not met', 'Incorrect personal information', 'Missing or unreadable document']" selected="Photo requirements not met" />
            <x-ui.textarea label="Remarks to student *" name="remarks" rows="4">Please upload a new 1x1 photo wearing your CvSU uniform against a plain white background. Make sure your face is centered and evenly lit.</x-ui.textarea>
            <p class="text-xs text-gray-500">The student will be notified and can resubmit. This action is recorded in the activity log.</p>
            <div class="flex justify-between gap-3">
                <x-ui.button variant="outline" href="{{ url('/registrar/verification') }}">Cancel</x-ui.button>
                <x-ui.button href="{{ url('/registrar/verification/correction-sent') }}">Send correction request</x-ui.button>
            </div>
        </form>
    </x-ui.card>
</x-layouts.portal>
