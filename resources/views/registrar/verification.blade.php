<x-layouts.portal role="registrar" active="verification" title="First verification">
<div x-data="{ q: '', tab: 'all' }">
    <x-ui.page-header title="First verification" subtitle="Applications waiting for your review." :crumbs="[['Registrar workspace', '/registrar'], ['First verification', null]]" />
    <x-ui.card flush>
        <x-ui.tabs :tabs="['all' => 'All (216)', 'new' => 'New today (52)', 'correction' => 'Resubmitted (9)']" />
        <div class="flex flex-wrap items-center gap-3 border-b border-gray-100 p-4">
            <div class="relative min-w-0 flex-1">
                <x-ui.icon name="search" class="pointer-events-none absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-gray-400" />
                <input type="search" x-model="q" placeholder="Search by name or student number" class="w-full rounded-lg border border-gray-300 py-2 pl-9 pr-3 text-sm focus:border-cvsu-green focus:outline-none focus:ring-2 focus:ring-cvsu-green/25">
            </div>
            <select class="rounded-lg border border-gray-300 px-3 py-2 text-sm" aria-label="College"><option>All colleges</option><option>CEIT</option><option>CAS</option><option>CON</option></select>
            <select class="rounded-lg border border-gray-300 px-3 py-2 text-sm" aria-label="Sort"><option>Oldest first</option><option>Newest first</option></select>
        </div>
        <x-ui.table :headers="['Student number', 'Student name', 'College', 'Course', 'Submitted', 'Status', 'Action']">
            @foreach([
                ['2024-10352', 'Juan Miguel Santos', 'CEIT', 'BS Information Technology', 'Nov 19 · 9:42 AM', 'review'],
                ['2023-08871', 'Alyssa Mae Bautista', 'CEMDS', 'BS Business Administration', 'Nov 19 · 9:15 AM', 'review'],
                ['2024-11204', 'Mark Angelo Reyes', 'CEIT', 'BS Computer Science', 'Nov 19 · 8:58 AM', 'review'],
                ['2022-05512', 'Sophia Anne Mendoza', 'CON', 'BS Nursing', 'Nov 18 · 4:30 PM', 'review'],
                ['2023-04419', 'Carlo Paolo Ramos', 'CAS', 'BS Psychology', 'Nov 18 · 2:10 PM', 'correction'],
            ] as [$num, $n, $col, $c, $t, $st])
                <tr class="hover:bg-gray-50" x-show="q === '' || '{{ strtolower($n . ' ' . $num) }}'.includes(q.toLowerCase())">
                    <td class="whitespace-nowrap px-4 py-3 font-mono text-xs">{{ $num }}</td>
                    <td class="px-4 py-3 font-medium">{{ $n }}</td>
                    <td class="px-4 py-3 text-gray-600">{{ $col }}</td>
                    <td class="px-4 py-3 text-gray-600">{{ $c }}</td>
                    <td class="whitespace-nowrap px-4 py-3 text-gray-600">{{ $t }}</td>
                    <td class="px-4 py-3"><x-ui.badge :status="$st" /></td>
                    <td class="px-4 py-3"><x-ui.button size="sm" variant="outline" href="{{ url('/registrar/verification/review') }}">Review</x-ui.button></td>
                </tr>
            @endforeach
        </x-ui.table>
        <x-ui.pagination :from="1" :to="5" :total="216" />
    </x-ui.card>
</div>
</x-layouts.portal>
