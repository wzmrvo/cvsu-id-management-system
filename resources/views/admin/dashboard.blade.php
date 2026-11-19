<x-layouts.portal role="admin" active="dashboard" title="Admin dashboard">
    <x-ui.page-header title="Dashboard" subtitle="System accounts and recent activity." :crumbs="[['System administration', null], ['Dashboard', null]]" />
    <div class="mb-6 grid grid-cols-2 gap-4 lg:grid-cols-4">
        <x-ui.stat label="Total accounts" value="1,248" hint="All roles" icon="users" />
        <x-ui.stat label="Registrar / ID personnel" value="6" hint="Active staff accounts" icon="shield" />
        <x-ui.stat label="Actions today" value="318" hint="Logged in the activity log" icon="clock" />
        <x-ui.stat label="Pending reports" value="2" hint="Exports waiting" icon="chart" />
    </div>
    <div class="grid gap-6 lg:grid-cols-3">
        <x-ui.card title="Recent activity" flush class="lg:col-span-2">
            <x-slot:actions><a href="{{ url('/admin/activity') }}" class="text-xs font-semibold text-cvsu-green hover:underline">View all</a></x-slot:actions>
            <x-ui.table :headers="['Time', 'Actor', 'Action']">
                @foreach([['10:35 AM', 'Andrea B. Cruz', 'Updated account'], ['10:20 AM', 'Mario L. Reyes', 'Assigned claiming schedule'], ['10:14 AM', 'Mario L. Reyes', 'Approved application'], ['9:58 AM', 'Mario L. Reyes', 'Requested correction']] as [$t, $a, $act])
                    <tr class="hover:bg-gray-50"><td class="whitespace-nowrap px-4 py-3 text-gray-600">{{ $t }}</td><td class="px-4 py-3 font-medium">{{ $a }}</td><td class="px-4 py-3">{{ $act }}</td></tr>
                @endforeach
            </x-ui.table>
        </x-ui.card>
        <x-ui.card title="Quick actions">
            <div class="grid gap-2">
                <x-ui.button variant="outline" href="{{ url('/admin/users/new') }}"><x-ui.icon name="plus" /> Add user account</x-ui.button>
                <x-ui.button variant="outline" href="{{ url('/admin/reports') }}"><x-ui.icon name="download" /> Export a report</x-ui.button>
                <x-ui.button variant="outline" href="{{ url('/admin/settings') }}"><x-ui.icon name="settings" /> System settings</x-ui.button>
            </div>
        </x-ui.card>
    </div>
</x-layouts.portal>
