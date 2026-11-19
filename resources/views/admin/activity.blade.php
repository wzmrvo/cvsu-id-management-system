<x-layouts.portal role="admin" active="activity" title="Activity log">
    <x-ui.page-header title="Activity log" subtitle="A read-only history of account changes, decisions and claims." :crumbs="[['System administration', '/admin'], ['Activity log', null]]" />
    <x-ui.card class="mb-6">
        <form class="grid gap-3 sm:grid-cols-3" onsubmit="return false">
            <x-ui.select label="Actor" name="actor" :options="['All users', 'Mario L. Reyes', 'Andrea B. Cruz']" selected="All users" />
            <x-ui.select label="Action" name="action" :options="['All actions', 'Verification', 'Scheduling', 'Claiming', 'Account']" selected="All actions" />
            <x-ui.select label="Date" name="date" :options="['November 2026', 'October 2026']" selected="November 2026" />
        </form>
    </x-ui.card>
    <x-ui.card title="Recent activity" flush>
        <x-ui.table :headers="['Date / time', 'Actor', 'Action', 'Record / details']">
            @foreach([
                ['Nov 19, 10:35 AM', 'Andrea B. Cruz', 'Updated account', 'mario.reyes@cvsu.edu.ph'],
                ['Nov 19, 10:36 AM', 'Mario L. Reyes', 'Assigned claiming schedule', 'CVSU-261124-042 · AM-02'],
                ['Nov 19, 10:35 AM', 'Mario L. Reyes', 'Approved application', 'CVSU-ID-2026-00418'],
                ['Nov 19, 9:58 AM', 'Mario L. Reyes', 'Requested correction', 'CVSU-ID-2026-00402'],
                ['Nov 19, 9:42 AM', 'Juan Miguel Santos', 'Submitted application', 'CVSU-ID-2026-00418'],
                ['Nov 18, 4:30 PM', 'Mario L. Reyes', 'Marked as claimed', 'CVSU-261124-031'],
            ] as [$t, $a, $act, $rec])
                <tr class="hover:bg-gray-50"><td class="whitespace-nowrap px-4 py-3 text-gray-600">{{ $t }}</td><td class="px-4 py-3 font-medium">{{ $a }}</td><td class="px-4 py-3">{{ $act }}</td><td class="px-4 py-3 font-mono text-xs text-gray-600">{{ $rec }}</td></tr>
            @endforeach
        </x-ui.table>
        <x-ui.pagination :from="1" :to="6" :total="318" />
    </x-ui.card>
</x-layouts.portal>
