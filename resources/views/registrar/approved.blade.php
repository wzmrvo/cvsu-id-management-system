<x-layouts.portal role="registrar" active="verification" title="Application approved">
    <x-ui.page-header title="Application approved" subtitle="The student can now be assigned a claiming schedule." :crumbs="[['Registrar workspace', '/registrar'], ['First verification', '/registrar/verification'], ['Approved', null]]" />
    <x-ui.alert variant="success" class="mb-6" title="Approved and recorded">First verification · by Mario L. Reyes · November 19, 2026, 10:35 AM</x-ui.alert>
    <x-ui.card class="mb-6">
        <x-ui.student-summary><x-ui.badge status="approved" /></x-ui.student-summary>
        <div class="mt-4 rounded-lg bg-gray-50 p-4 text-sm"><p class="text-[11px] font-semibold uppercase tracking-wide text-gray-500">Registrar remarks</p><p class="mt-1">Information matches the CvSU student record. Photo meets requirements.</p></div>
    </x-ui.card>
    <div class="flex flex-wrap justify-between gap-3">
        <x-ui.button variant="outline" href="{{ url('/registrar/verification') }}">Back to verification queue</x-ui.button>
        <x-ui.button href="{{ url('/registrar/schedule') }}">Assign claiming schedule <x-ui.icon name="arrow-right" /></x-ui.button>
    </div>
    <x-ui.toast-on-load message="Application approved. The student will be notified (prototype view)." />
</x-layouts.portal>
