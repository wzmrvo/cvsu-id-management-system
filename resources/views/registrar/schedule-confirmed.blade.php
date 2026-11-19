<x-layouts.portal role="registrar" active="schedule" title="Schedule confirmed">
    <x-ui.page-header title="Schedule confirmed" subtitle="The student is notified and can download the claiming slip." :crumbs="[['Registrar workspace', '/registrar'], ['Claiming schedule', '/registrar/schedule'], ['Confirmed', null]]" />
    <x-ui.alert variant="success" class="mb-6" title="Claiming schedule assigned">SMS and email notification sent (prototype view).</x-ui.alert>
    <div class="grid gap-6 lg:grid-cols-3">
        <x-ui.card class="lg:col-span-2">
            <x-ui.student-summary><x-ui.badge status="scheduled" /></x-ui.student-summary>
            <div class="mt-5 rounded-lg bg-cvsu-green-50 p-4">
                <p class="text-[11px] font-semibold uppercase tracking-wider text-gray-500">Claiming reference</p>
                <p class="mt-1 font-mono text-2xl font-semibold text-cvsu-green">CVSU-261124-042</p>
                <p class="mt-2 text-sm font-medium">November 24, 2026 · Batch AM-02 · 8:00–10:00 AM</p>
                <p class="text-sm text-gray-600">Registrar's Office · ID Processing Desk · Main Campus</p>
            </div>
            <div class="mt-4 flex flex-wrap gap-3">
                <x-ui.button variant="outline" href="{{ url('/student/schedule') }}">View student appointment</x-ui.button>
                <x-ui.button variant="outline" href="{{ url('/registrar/schedule') }}">Schedule next student</x-ui.button>
            </div>
        </x-ui.card>
        <x-ui.card title="Claiming slip"><div class="flex justify-center"><x-ui.qr class="h-36 w-36" /></div></x-ui.card>
    </div>
</x-layouts.portal>
