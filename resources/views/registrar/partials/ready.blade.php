<x-layouts.portal role="registrar" active="claiming" title="Ready for Printing">
    <x-ui.page-header eyebrow="Registrar · Claiming day" title="Ready for Printing" subtitle="Second verification is complete. Continue in the existing printing software." />
    <x-ui.alert variant="success" class="mb-6" :title="$alertTitle">{{ $alertText }}</x-ui.alert>
    <x-ui.card class="mb-6">
        <x-ui.student-summary><x-ui.badge status="ready" /></x-ui.student-summary>
        <p class="mt-4 font-mono text-sm font-bold">CVSU-261124-042 · November 24, 2026 · AM-02</p>
        <ol class="mt-4 space-y-2 text-sm">
            <li class="flex gap-3"><span class="text-xs font-bold text-cvsu-gold">01</span> Print the ID using the existing software.</li>
            <li class="flex gap-3"><span class="text-xs font-bold text-cvsu-gold">02</span> Confirm that the physical ID has been handed to the student.</li>
            <li class="flex gap-3"><span class="text-xs font-bold text-cvsu-gold">03</span> Record the release by selecting "Mark as Claimed."</li>
        </ol>
    </x-ui.card>
    <div class="flex flex-wrap justify-between gap-3">
        <x-ui.button variant="outline" href="{{ url('/registrar/claiming') }}">Back to claiming search</x-ui.button>
        <x-ui.button href="{{ url('/registrar/claiming/claimed') }}">Mark as Claimed →</x-ui.button>
    </div>
</x-layouts.portal>
