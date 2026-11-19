<x-layouts.portal role="student" active="schedule" title="Claiming schedule">
    <x-ui.page-header eyebrow="Claiming schedule" title="Your appointment." subtitle="Bring your schedule and reference number when you claim your ID." />

    <div class="grid gap-6 lg:grid-cols-3">
        <x-ui.card accent class="lg:col-span-2">
            <div class="flex flex-col gap-6 sm:flex-row sm:items-center">
                <div class="flex-1 space-y-4">
                    <x-ui.badge status="scheduled" />
                    <div>
                        <p class="text-2xl font-bold tracking-tight text-cvsu-green">November 24, 2026</p>
                        <p class="text-sm text-gray-500">Tuesday · Batch AM-02 · 8:00 – 10:00 AM</p>
                    </div>
                    <div>
                        <p class="text-[11px] font-semibold uppercase tracking-widest text-gray-500">Claiming reference</p>
                        <p class="font-mono text-lg font-bold">CVSU-261124-042</p>
                    </div>
                    <div class="text-sm">
                        <p class="font-semibold">Juan Miguel Dela Cruz Santos</p>
                        <p class="text-gray-500">2024-10352 · Registrar's Office · ID Processing Desk</p>
                    </div>
                </div>
                <x-ui.qr class="mx-auto h-40 w-40" />
            </div>
            <div class="mt-5 flex flex-wrap gap-3 border-t border-gray-100 pt-4">
                <x-ui.button href="#">Download PDF</x-ui.button>
                <x-ui.button variant="outline" href="#">Request reschedule</x-ui.button>
            </div>
        </x-ui.card>

        <x-ui.card title="Before you claim">
            <ul class="space-y-3 text-sm">
                @foreach(['Bring your claiming slip (PDF or printed)', 'Wear your CvSU uniform', 'Bring a valid ID for verification', 'Arrive within your batch time'] as $item)
                    <li class="flex gap-3"><span class="mt-0.5 text-cvsu-gold">✓</span>{{ $item }}</li>
                @endforeach
            </ul>
        </x-ui.card>
    </div>
</x-layouts.portal>
