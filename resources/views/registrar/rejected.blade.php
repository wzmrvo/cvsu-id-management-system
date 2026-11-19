<x-layouts.portal role="registrar" active="verification" title="Rejection recorded">
    <x-ui.page-header title="Rejection recorded" :crumbs="[['Registrar workspace', '/registrar'], ['First verification', '/registrar/verification'], ['Rejected', null]]" />
    <x-ui.card class="max-w-3xl">
        <x-ui.alert variant="danger" title="Application rejected · student notified">Juan Miguel Dela Cruz Santos · CVSU-ID-2026-00418</x-ui.alert>
        <p class="mt-4 text-sm"><span class="text-gray-500">Status:</span> <x-ui.badge status="rejected" /></p>
        <p class="mt-3 text-sm text-gray-600">The enrollment record could not be verified. The reason has been sent to the student.</p>
        <x-ui.button class="mt-6" href="{{ url('/registrar/verification') }}">Back to verification queue</x-ui.button>
    </x-ui.card>
    <x-ui.toast-on-load message="Rejection recorded (prototype view)." type="info" />
</x-layouts.portal>
