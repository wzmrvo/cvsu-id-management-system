<x-layouts.portal role="registrar" active="overview" title="Registrar overview">
    <x-ui.page-header title="Overview" subtitle="Verification, scheduling and ID releases at a glance." :crumbs="[['Registrar workspace', null], ['Overview', null]]">
        <x-slot:actions><x-ui.button href="{{ url('/registrar/verification') }}">Start first verification <x-ui.icon name="arrow-right" /></x-ui.button></x-slot:actions>
    </x-ui.page-header>

    <div class="mb-6 grid grid-cols-2 gap-4 lg:grid-cols-4">
        <x-ui.stat label="Pending verification" value="216" hint="Waiting for review" icon="file" />
        <x-ui.stat label="Approved · unscheduled" value="84" hint="Ready to be scheduled" icon="check" />
        <x-ui.stat label="Scheduled" value="146" hint="Upcoming claiming days" icon="calendar" />
        <x-ui.stat label="Claimed" value="104" hint="IDs released" icon="shield" />
    </div>

    <div class="mb-6 grid gap-6 lg:grid-cols-3">
        <x-ui.card title="Applications received · last 7 days" class="lg:col-span-2">
            <x-ui.bar-chart :labels="['Nov 13','Nov 14','Nov 15','Nov 16','Nov 17','Nov 18','Nov 19']" :values="[42, 58, 31, 12, 64, 71, 52]" />
        </x-ui.card>
        <x-ui.card title="Status distribution">
            <x-ui.donut :segments="[['Pending verification', 216, '#2563EB'], ['Needs correction', 38, '#EA580C'], ['Scheduled', 146, '#006B3F'], ['Claimed', 104, '#94A3B8']]" />
        </x-ui.card>
    </div>

    <div class="mb-6 grid gap-6 lg:grid-cols-3">
        <x-ui.card title="Verification queue" flush class="lg:col-span-2">
            <x-slot:actions><a href="{{ url('/registrar/verification') }}" class="text-xs font-semibold text-cvsu-green hover:underline">View all</a></x-slot:actions>
            <x-ui.table :headers="['Student', 'Course', 'Submitted', 'Status', '']">
                @foreach([['Juan Miguel Santos','2024-10352','BS Information Technology','Nov 19 · 9:42 AM'],['Alyssa Mae Bautista','2023-08871','BS Business Administration','Nov 19 · 9:15 AM'],['Mark Angelo Reyes','2024-11204','BS Computer Science','Nov 19 · 8:58 AM'],['Sophia Anne Mendoza','2022-05512','BS Nursing','Nov 18 · 4:30 PM']] as [$n, $num, $c, $t])
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3"><p class="font-medium">{{ $n }}</p><p class="text-xs text-gray-500">{{ $num }}</p></td>
                        <td class="px-4 py-3 text-gray-600">{{ $c }}</td>
                        <td class="whitespace-nowrap px-4 py-3 text-gray-600">{{ $t }}</td>
                        <td class="px-4 py-3"><x-ui.badge status="review" /></td>
                        <td class="px-4 py-3 text-right"><a href="{{ url('/registrar/verification/review') }}" class="font-semibold text-cvsu-green hover:underline">Review</a></td>
                    </tr>
                @endforeach
            </x-ui.table>
        </x-ui.card>

        <div class="space-y-6">
            <x-ui.card title="Batch capacity · Nov 24">
                <div class="space-y-3 text-sm">
                    @foreach([['AM-01', 40, 40], ['AM-02', 18, 40], ['PM-01', 12, 40]] as [$b, $n, $max])
                        <div><div class="flex justify-between"><span class="font-medium">{{ $b }}</span><span class="text-gray-500">{{ $n }}/{{ $max }}@if($n >= $max) · Full @endif</span></div>
                        <div class="mt-1.5 h-1.5 rounded-full bg-gray-100"><div class="h-1.5 rounded-full {{ $n >= $max ? 'bg-red-500' : 'bg-cvsu-green' }}" style="width: {{ round($n / $max * 100) }}%"></div></div></div>
                    @endforeach
                </div>
            </x-ui.card>
            <x-ui.card title="Needs attention">
                <ul class="space-y-3 text-sm">
                    <li class="flex justify-between gap-3"><span>Oldest pending application</span><span class="shrink-0 text-gray-500">2 days</span></li>
                    <li class="flex justify-between gap-3"><span>Reschedule requests</span><a href="{{ url('/registrar/no-shows') }}" class="shrink-0 font-semibold text-cvsu-green hover:underline">3 open</a></li>
                    <li class="flex justify-between gap-3"><span>Missed yesterday</span><span class="shrink-0 text-gray-500">5 students</span></li>
                </ul>
            </x-ui.card>
        </div>
    </div>

    <x-ui.alert variant="info" title="Reminder">Second verification happens at the claiming desk. Signature capture and ID printing stay in the existing software.</x-ui.alert>
</x-layouts.portal>
