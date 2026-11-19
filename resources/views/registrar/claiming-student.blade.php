<x-layouts.portal role="registrar" active="claiming" title="Second verification">
<div x-data="{
        go(u) { window.location.href = u },
        key(e) {
            if (['INPUT', 'TEXTAREA', 'SELECT'].includes(e.target.tagName)) { return }
            if (e.key === 'v' || e.key === 'V') { this.go('{{ url('/registrar/claiming/ready') }}') }
            if (e.key === 'i' || e.key === 'I') { this.go('{{ url('/registrar/claiming/photo-needed') }}') }
        }
    }" x-on:keydown.window="key($event)">
    <x-ui.page-header title="Second verification" subtitle="Compare the student's face with the submitted photo, then do a quick information check."
        :crumbs="[['Registrar workspace', '/registrar'], ['Claiming day', '/registrar/claiming'], ['CVSU-261124-042', null]]">
        <x-slot:actions><x-ui.button variant="outline" size="sm" href="{{ url('/registrar/claiming') }}">Change reference</x-ui.button></x-slot:actions>
    </x-ui.page-header>

    <div class="grid gap-6 lg:grid-cols-3">
        <div class="space-y-6 lg:col-span-1">
            <x-ui.card>
                <x-ui.student-summary><x-ui.badge status="scheduled" label="Scheduled · AM-02" /></x-ui.student-summary>
                <dl class="mt-4 space-y-2 border-t border-gray-100 pt-4 text-sm">
                    <div class="flex justify-between"><dt class="text-gray-500">Reference</dt><dd class="font-mono text-xs font-semibold">CVSU-261124-042</dd></div>
                    <div class="flex justify-between"><dt class="text-gray-500">Date</dt><dd class="font-medium">Nov 24, 2026</dd></div>
                    <div class="flex justify-between"><dt class="text-gray-500">College</dt><dd class="font-medium">CEIT</dd></div>
                </dl>
            </x-ui.card>
            <x-ui.card title="Minimal information check">
                <div class="space-y-2.5 text-sm">
                    @foreach(['Name matches the valid ID shown', 'Student number matches the record'] as $l)
                        <label class="flex items-start gap-2.5"><input type="checkbox" checked class="mt-0.5 h-4 w-4 rounded border-gray-300 text-cvsu-green focus:ring-cvsu-green"><span>{{ $l }}</span></label>
                    @endforeach
                </div>
            </x-ui.card>
        </div>

        <x-ui.card eyebrow="Second verification" title="Does the submitted photo match the student?" class="lg:col-span-2">
            <div class="grid gap-6 sm:grid-cols-[auto_1fr]">
                <x-ui.photo class="mx-auto h-56 w-44" />
                <div class="space-y-3 text-sm">
                    <div class="rounded-lg border border-cvsu-green/25 bg-cvsu-green-50 p-4"><p class="font-semibold text-cvsu-green-dark">Valid</p><p class="text-gray-600">Real, front-facing, clear photo. Skip the face-to-face photo and continue to printing.</p></div>
                    <div class="rounded-lg border border-red-200 bg-red-50 p-4"><p class="font-semibold text-red-700">Invalid</p><p class="text-gray-600">Flag for a face-to-face photo. It is captured at the desk in the existing software and is not saved here.</p></div>
                </div>
            </div>
            <div class="mt-6 flex flex-wrap items-center justify-between gap-3 border-t border-gray-100 pt-4">
                <p class="text-xs text-gray-500">Shortcuts: <kbd class="rounded border border-gray-300 bg-gray-50 px-1.5 py-0.5 font-mono">V</kbd> valid · <kbd class="rounded border border-gray-300 bg-gray-50 px-1.5 py-0.5 font-mono">I</kbd> invalid</p>
                <div class="flex flex-wrap gap-2">
                    <x-ui.button variant="danger-outline" href="{{ url('/registrar/claiming/photo-needed') }}">Invalid · Photo needed</x-ui.button>
                    <x-ui.button href="{{ url('/registrar/claiming/ready') }}">Valid · Ready for printing <x-ui.icon name="arrow-right" /></x-ui.button>
                </div>
            </div>
        </x-ui.card>
    </div>
    <x-ui.alert variant="info" class="mt-6" title="Printing stays in the existing software">This portal verifies and records. Signature capture and ID printing are done in the existing system, and never before the student is present.</x-ui.alert>
</div>
</x-layouts.portal>
