@php
    $filtered = request()->boolean('filtered');
    $exported = request()->boolean('exported');
    $stats = $filtered ? [['Total applications', '42'], ['Approved', '0'], ['Scheduled', '42'], ['Claimed', '0']]
                       : [['Total applications', '562'], ['Approved', '84'], ['Scheduled', '146'], ['Claimed', '104']];
    $rows = $filtered ? [['Juan Miguel Santos', 'Nov 19, 2026', 'scheduled', 'AM-02', 'CVSU-261124-042'], ['Mark Angelo Reyes', 'Nov 17, 2026', 'scheduled', 'AM-02', 'CVSU-261124-043'], ['Alyssa Mae Bautista', 'Nov 17, 2026', 'scheduled', 'AM-02', 'CVSU-261124-044']]
                      : [['Juan Miguel Santos', 'Nov 19, 2026', 'claimed', 'AM-02', 'CVSU-261124-042'], ['Alyssa Mae Bautista', 'Nov 18, 2026', 'pending', '—', '—'], ['Mark Angelo Reyes', 'Nov 17, 2026', 'approved', '—', '—'], ['Sophia Anne Mendoza', 'Nov 17, 2026', 'scheduled', 'PM-01', 'CVSU-261125-011'], ['Carlo Paolo Ramos', 'Nov 16, 2026', 'rejected', '—', '—']];
@endphp
<x-layouts.portal role="admin" active="reports" title="Reports & exports">
    <x-ui.page-header eyebrow="System admin · Reports" title="From applications to insights." subtitle="Filter by status, date, and batch. Export what you need.">
        <x-slot:actions><x-ui.button href="{{ url('/admin/reports?exported=1' . ($filtered ? '&filtered=1' : '')) }}">+ Export CSV</x-ui.button></x-slot:actions>
    </x-ui.page-header>

    <x-ui.card class="mb-6">
        <form class="grid items-end gap-3 sm:grid-cols-2 lg:grid-cols-4" onsubmit="return false">
            <x-ui.select label="Status" name="status" :options="['All statuses', 'Scheduled', 'Approved', 'Claimed']" :selected="$filtered ? 'Scheduled' : 'All statuses'" />
            <x-ui.select label="Date range" name="range" :options="['Nov 1–30, 2026', 'Oct 1–31, 2026']" selected="Nov 1–30, 2026" />
            <x-ui.select label="Batch" name="batch" :options="['All batches', 'AM-02', 'PM-01']" :selected="$filtered ? 'AM-02' : 'All batches'" />
            <x-ui.button href="{{ url('/admin/reports?filtered=1') }}">Apply filters</x-ui.button>
        </form>
    </x-ui.card>

    <div class="mb-6 grid grid-cols-2 gap-4 lg:grid-cols-4">
        @foreach($stats as [$l, $v])<x-ui.stat :label="$l" :value="$v" />@endforeach
    </div>

    <x-ui.card title="Application records" flush>
        <x-ui.table :headers="['Student', 'Application date', 'Status', 'Batch', 'Reference']">
            @foreach($rows as [$n, $d, $s, $b, $r])
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3 font-medium">{{ $n }}</td>
                    <td class="whitespace-nowrap px-4 py-3 text-gray-600">{{ $d }}</td>
                    <td class="px-4 py-3"><x-ui.badge :status="$s" /></td>
                    <td class="px-4 py-3 text-gray-600">{{ $b }}</td>
                    <td class="px-4 py-3 font-mono text-xs text-gray-600">{{ $r }}</td>
                </tr>
            @endforeach
        </x-ui.table>
    </x-ui.card>

    @if($exported)
        <x-ui.alert class="mt-6" title="Export prepared · Prototype preview">{{ $filtered ? '42 records · Nov 1–30, 2026 · AM-02' : '562 records · Nov 1–30, 2026' }} · application_report.csv</x-ui.alert>
    @endif
    <p class="mt-6 text-xs text-gray-500">Reports contain personal information. Handle exports under the CvSU Data Privacy policy.</p>
</x-layouts.portal>
