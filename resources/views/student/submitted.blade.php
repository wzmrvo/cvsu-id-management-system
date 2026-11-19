<x-layouts.portal role="student" active="application" title="Application received">
    <div class="mx-auto max-w-xl">
        <x-ui.page-header eyebrow="Application" title="You're one step closer." subtitle="Your application is now in the verification queue." />

        <x-ui.card accent class="mb-6">
            <x-ui.badge status="review" label="Submitted" />
            <h2 class="mt-3 text-xl font-bold">Application received</h2>
            <p class="mt-1 text-sm text-gray-500">The Registrar will evaluate your details with your official CvSU record.</p>
            <div class="mt-5 rounded-xl bg-cvsu-green-50 p-4">
                <p class="text-[11px] font-semibold uppercase tracking-widest text-gray-500">Application reference</p>
                <p class="mt-1 font-mono text-xl font-bold text-cvsu-green">CVSU-ID-2026-00418</p>
            </div>
            <x-ui.button class="mt-5" href="{{ url('/student/dashboard') }}">View application status →</x-ui.button>
        </x-ui.card>

        <x-ui.card title="We'll keep you posted">
            <p class="text-sm text-gray-600">You'll get an SMS or email when your application is approved, needs a correction, or when your claiming schedule is ready.</p>
        </x-ui.card>
    </div>
</x-layouts.portal>
