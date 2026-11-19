<x-layouts.portal role="student" active="application" title="Application received">
    <div class="mx-auto max-w-xl">
        <x-ui.page-header title="You're one step closer." subtitle="Your application is now in the verification queue." :crumbs="[['Dashboard', '/student/dashboard'], ['ID application', '/student/application'], ['Submitted', null]]" />
        <x-ui.card class="mb-6">
            <x-ui.badge status="review" label="Submitted" />
            <h2 class="mt-3 text-lg font-semibold">Application received</h2>
            <p class="mt-1 text-sm text-gray-500">The registrar will check your details against your official CvSU record and review your photo.</p>
            <div class="mt-4 rounded-lg bg-cvsu-green-50 p-4">
                <p class="text-[11px] font-semibold uppercase tracking-wider text-gray-500">Application reference</p>
                <p class="mt-1 font-mono text-lg font-semibold text-cvsu-green">CVSU-ID-2026-00418</p>
            </div>
            <x-ui.button class="mt-5" href="{{ url('/student/status') }}">View application status <x-ui.icon name="arrow-right" /></x-ui.button>
        </x-ui.card>
        <x-ui.card title="What happens next">
            <x-ui.stepper :steps="['Submitted', 'First verification', 'Approved', 'Scheduled', 'Claimed']" :current="2" vertical />
            <p class="mt-4 text-sm text-gray-500">You will receive an SMS or email when your application is approved, needs a correction, or when your claiming schedule is ready.</p>
        </x-ui.card>
    </div>
    <x-ui.toast-on-load message="Prototype view · this application is not saved yet." type="info" />
</x-layouts.portal>
