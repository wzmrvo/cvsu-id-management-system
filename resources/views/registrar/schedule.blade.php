<x-layouts.portal role="registrar" active="schedule" title="Claiming schedule">
    <x-ui.page-header eyebrow="Registrar · Claiming schedule" title="Make room for the next step." subtitle="Assign an approved student a date and batch, then generate their claiming reference." />
    <x-ui.card class="mb-6"><x-ui.student-summary><x-ui.badge status="approved" /></x-ui.student-summary></x-ui.card>

    <div class="grid gap-6 lg:grid-cols-3">
        <x-ui.card title="Schedule details" class="lg:col-span-2">
            <form class="space-y-4" onsubmit="return false">
                <x-ui.select label="Claiming date *" name="date" :options="['November 24, 2026', 'November 25, 2026', 'November 26, 2026']" selected="November 24, 2026" />
                <x-ui.select label="Batch *" name="batch" :options="['AM-01 · 8:00–10:00 AM', 'AM-02 · 8:00–10:00 AM', 'PM-01 · 1:00–3:00 PM']" selected="AM-02 · 8:00–10:00 AM" hint="Batch capacity is shown on the right." />
                <x-ui.select label="Claiming location *" name="location" :options="['Registrar\'s Office · ID Processing Desk', 'Main Campus · Student Affairs']" selected="Registrar's Office · ID Processing Desk" />
                <x-ui.button href="{{ url('/registrar/schedule/confirmed') }}">Generate reference &amp; confirm →</x-ui.button>
            </form>
        </x-ui.card>

        <x-ui.card title="Batch capacity">
            <p class="mb-3 text-xs text-gray-500">November 24, 2026</p>
            <div class="space-y-3 text-sm">
                @foreach([['AM-01', 40, 40, false], ['AM-02', 18, 40, true], ['PM-01', 12, 40, false]] as [$b, $n, $max, $sel])
                    <div @class(['rounded-lg p-3', 'bg-cvsu-green-50 ring-1 ring-cvsu-green/30' => $sel])>
                        <div class="flex justify-between font-medium"><span>{{ $b }}</span><span class="text-gray-500">{{ $n }}/{{ $max }}</span></div>
                        <div class="mt-2 h-1.5 rounded-full bg-gray-200"><div class="h-1.5 rounded-full {{ $n >= $max ? 'bg-red-500' : 'bg-cvsu-green' }}" style="width: {{ round($n / $max * 100) }}%"></div></div>
                        @if($n >= $max)<p class="mt-1 text-xs text-red-600">Full</p>@endif
                    </div>
                @endforeach
            </div>
        </x-ui.card>
    </div>
</x-layouts.portal>
