@php $saved = request('saved'); @endphp
<x-layouts.portal role="admin" active="users" title="User accounts">
    <x-ui.page-header eyebrow="System admin · User accounts" title="The right access for every role." subtitle="Manage accounts and keep student information accessible only to authorized users.">
        <x-slot:actions><x-ui.button href="{{ url('/admin/users/new') }}">+ Add user account</x-ui.button></x-slot:actions>
    </x-ui.page-header>

    <x-ui.card flush class="mb-6">
        <div class="flex flex-wrap items-center gap-3 border-b border-gray-100 p-4">
            <input type="search" placeholder="Search by name, student number, or email" class="min-w-0 flex-1 rounded-lg border border-gray-300 px-3 py-2 text-sm focus:border-cvsu-green focus:outline-none focus:ring-2 focus:ring-cvsu-green/25">
            <span class="rounded-full bg-gray-100 px-3 py-1 text-xs text-gray-600">All roles</span>
        </div>
        <x-ui.table :headers="['Name / email', 'Role', 'Status', 'Last active', 'Action']">
            @foreach([
                ['Juan Miguel Santos', 'juanmiguel.santos@cvsu.edu.ph', 'Student', 'active', 'Today · 10:35 AM'],
                ['Mario L. Reyes', 'mario.reyes@cvsu.edu.ph', 'Registrar / ID Personnel', 'active', 'Today · 10:20 AM'],
                ['Andrea B. Cruz', 'andrea.cruz@cvsu.edu.ph', 'System Administrator', 'active', 'Today · 10:01 AM'],
                ['Rafael M. Garcia', 'rafael.garcia@cvsu.edu.ph', 'Student', 'inactive', 'Nov 12 · 4:18 PM'],
                ['Alyssa Mae Bautista', 'alyssa.bautista@cvsu.edu.ph', 'Student', 'active', 'Today · 9:15 AM'],
            ] as [$n, $e, $role, $status, $last])
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3"><p class="font-medium">{{ $n }}</p><p class="text-xs text-gray-500">{{ $e }}</p></td>
                    <td class="px-4 py-3 text-gray-600">{{ $role }}</td>
                    <td class="px-4 py-3"><x-ui.badge :status="$status" /></td>
                    <td class="whitespace-nowrap px-4 py-3 text-gray-600">{{ $last }}</td>
                    <td class="px-4 py-3"><a href="{{ url('/admin/users/edit') }}" class="font-semibold text-cvsu-green hover:underline">Edit →</a></td>
                </tr>
            @endforeach
        </x-ui.table>
    </x-ui.card>

    <h2 class="mb-3 font-semibold">Role permissions</h2>
    <div class="mb-6 grid gap-4 md:grid-cols-3">
        @foreach([
            ['Student', 'Apply for an ID, track progress, and view their own claiming schedule.'],
            ['Registrar / ID Personnel', 'Verify applications, assign batches, perform second verification, and record claims.'],
            ['System Administrator', 'Manage accounts and roles, review the activity log, export reports.'],
        ] as [$r, $d])
            <x-ui.card accent><p class="font-semibold text-cvsu-green">{{ $r }}</p><p class="mt-1 text-sm text-gray-500">{{ $d }}</p></x-ui.card>
        @endforeach
    </div>

    @if($saved === 'updated')<x-ui.alert>Account changes saved. The action has been recorded in the activity log.</x-ui.alert>@endif
    @if($saved === 'created')<x-ui.alert>Account created. A setup invitation was sent to the new user's CvSU email.</x-ui.alert>@endif
</x-layouts.portal>
