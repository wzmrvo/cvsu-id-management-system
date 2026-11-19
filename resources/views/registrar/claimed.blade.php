<x-layouts.portal role="registrar" active="claiming" title="ID successfully claimed">
    <x-ui.page-header eyebrow="Registrar · Claiming day" title="ID successfully claimed" subtitle="The release has been recorded in the application history." />
    <x-ui.card accent class="mb-6">
        <x-ui.badge status="claimed" />
        <h2 class="mt-3 text-2xl font-bold">Another Kabsu, ready to go.</h2>
        <p class="font-semibold">Juan Miguel Dela Cruz Santos</p>
        <p class="text-sm text-gray-500">2024-10352 · CVSU-261124-042</p>
        <dl class="mt-5 grid gap-4 border-t border-gray-100 pt-4 text-sm sm:grid-cols-3">
            <div><dt class="text-[11px] font-semibold uppercase tracking-wide text-gray-500">Claimed on</dt><dd class="font-medium">November 24, 2026 · 11:20 AM</dd></div>
            <div><dt class="text-[11px] font-semibold uppercase tracking-wide text-gray-500">Released by</dt><dd class="font-medium">Mario L. Reyes · Registrar / ID Personnel</dd></div>
            <div><dt class="text-[11px] font-semibold uppercase tracking-wide text-gray-500">Verification</dt><dd class="font-medium">First and Second Verification completed</dd></div>
        </dl>
    </x-ui.card>
    <div class="flex flex-wrap gap-3">
        <x-ui.button href="{{ url('/registrar/claiming') }}">Find next student →</x-ui.button>
        <x-ui.button variant="outline" href="{{ url('/registrar') }}">Back to overview</x-ui.button>
    </div>
</x-layouts.portal>
