<x-layouts.portal role="registrar" active="records" title="Records">
<div x-data="{ tab: 'all', q: '' }">
    <x-ui.page-header title="Application records" subtitle="Search the full history of applications." :crumbs="[['Registrar workspace', '/registrar'], ['Records', null]]" />
    <x-ui.card flush>
        <x-ui.tabs :tabs="['all' => 'All', 'claimed' => 'Claimed', 'rejected' => 'Rejected']" />
        <div class="border-b border-gray-100 p-4">
            <div class="relative"><x-ui.icon name="search" class="pointer-events-none absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-gray-400" />
            <input type="search" x-model="q" placeholder="Search by name, student number, or reference" class="w-full rounded-lg border border-gray-300 py-2 pl-9 pr-3 text-sm focus:border-cvsu-green focus:outline-none focus:ring-2 focus:ring-cvsu-green/25"></div>
        </div>
        <x-ui.table :headers="['Student', 'Reference', 'Submitted', 'Status', 'Processed by']">
            @foreach([
                ['Juan Miguel Santos', '2024-10352', 'CVSU-261124-042', 'Nov 19', 'claimed', 'Mario L. Reyes'],
                ['Sophia Anne Mendoza', '2022-05512', 'CVSU-261125-011', 'Nov 17', 'scheduled', 'Mario L. Reyes'],
                ['Carlo Paolo Ramos', '2023-04419', '—', 'Nov 16', 'rejected', 'Mario L. Reyes'],
                ['Rafael M. Garcia', '2023-06377', 'CVSU-261123-017', 'Nov 15', 'missed', 'Mario L. Reyes'],
                ['Bianca R. Flores', '2024-02210', 'CVSU-261123-031', 'Nov 15', 'claimed', 'Mario L. Reyes'],
            ] as [$n, $num, $ref, $d, $st, $by])
                <tr class="hover:bg-gray-50" x-show="(tab === 'all' || tab === '{{ $st }}') && (q === '' || '{{ strtolower($n . ' ' . $num . ' ' . $ref) }}'.includes(q.toLowerCase()))">
                    <td class="px-4 py-3"><p class="font-medium">{{ $n }}</p><p class="text-xs text-gray-500">{{ $num }}</p></td>
                    <td class="px-4 py-3 font-mono text-xs text-gray-600">{{ $ref }}</td><td class="px-4 py-3 text-gray-600">{{ $d }}</td>
                    <td class="px-4 py-3"><x-ui.badge :status="$st" /></td><td class="px-4 py-3 text-gray-600">{{ $by }}</td>
                </tr>
            @endforeach
        </x-ui.table>
        <x-ui.pagination :from="1" :to="5" :total="562" />
    </x-ui.card>
</div>
</x-layouts.portal>
