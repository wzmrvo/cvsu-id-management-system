<x-layouts.portal role="registrar" active="schedule" title="Claiming schedule">
<div x-data="{ sel: 0, students: [{ n: 'Juan Miguel Dela Cruz Santos', num: '2024-10352' }, { n: 'Alyssa Mae Bautista', num: '2023-08871' }, { n: 'Mark Angelo Reyes', num: '2024-11204' }] }">
    <x-ui.page-header title="Assign claiming schedule" subtitle="Pick an approved student, choose a date and batch, then generate the claiming reference."
        :crumbs="[['Registrar workspace', '/registrar'], ['Claiming schedule', null]]" />
    <div class="grid gap-6 lg:grid-cols-3">
        <x-ui.card title="Approved · unscheduled (84)" flush>
            <ul class="divide-y divide-gray-100 text-sm">
                <template x-for="(s, i) in students" :key="s.num">
                    <li>
                        <button type="button" class="flex w-full items-center gap-3 px-4 py-3 text-left hover:bg-gray-50" :class="sel === i && 'bg-cvsu-green-50'" x-on:click="sel = i">
                            <span class="flex h-5 w-5 items-center justify-center rounded-full border" :class="sel === i ? 'border-cvsu-green bg-cvsu-green text-white' : 'border-gray-300'"><span x-show="sel === i">✓</span></span>
                            <span><span class="block font-medium" x-text="s.n"></span><span class="block text-xs text-gray-500" x-text="s.num"></span></span>
                        </button>
                    </li>
                </template>
            </ul>
        </x-ui.card>

        <x-ui.card title="Schedule details">
            <form class="space-y-4" onsubmit="return false">
                <div class="rounded-lg bg-gray-50 p-3 text-sm"><p class="text-xs text-gray-500">Selected student</p><p class="font-medium" x-text="students[sel].n"></p></div>
                <x-ui.select label="Claiming date *" name="date" :options="['November 24, 2026', 'November 25, 2026', 'November 26, 2026']" selected="November 24, 2026" />
                <x-ui.select label="Batch *" name="batch" :options="['AM-01 · 8:00–10:00 AM (full)', 'AM-02 · 8:00–10:00 AM', 'PM-01 · 1:00–3:00 PM']" selected="AM-02 · 8:00–10:00 AM" />
                <x-ui.select label="Claiming location *" name="location" :options="['Registrar\'s Office · ID Processing Desk', 'Main Campus · Student Affairs']" selected="Registrar's Office · ID Processing Desk" />
                <x-ui.button class="w-full" href="{{ url('/registrar/schedule/confirmed') }}" busy>Generate reference &amp; confirm</x-ui.button>
            </form>
        </x-ui.card>

        <x-ui.card title="Batch capacity · Nov 24">
            <div class="space-y-3 text-sm">
                @foreach([['AM-01', 40, 40, false], ['AM-02', 18, 40, true], ['PM-01', 12, 40, false]] as [$b, $n, $max, $sel])
                    <div @class(['rounded-lg p-3', 'bg-cvsu-green-50 ring-1 ring-cvsu-green/25' => $sel])>
                        <div class="flex justify-between font-medium"><span>{{ $b }}</span><span class="text-gray-500">{{ $n }}/{{ $max }}</span></div>
                        <div class="mt-2 h-1.5 rounded-full bg-gray-200"><div class="h-1.5 rounded-full {{ $n >= $max ? 'bg-red-500' : 'bg-cvsu-green' }}" style="width: {{ round($n / $max * 100) }}%"></div></div>
                        @if($n >= $max)<p class="mt-1 text-xs text-red-600">Full</p>@endif
                    </div>
                @endforeach
            </div>
        </x-ui.card>
    </div>
</div>
</x-layouts.portal>
