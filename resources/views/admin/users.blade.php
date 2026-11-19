@php $saved = request('saved'); @endphp
<x-layouts.portal role="admin" active="users" title="User accounts">
<div x-data="{ q: '', role: 'All roles' }">
    <x-ui.page-header title="User accounts" subtitle="Manage accounts and keep student information available only to authorized users." :crumbs="[['System administration', '/admin'], ['User accounts', null]]">
        <x-slot:actions><x-ui.button href="{{ url('/admin/users/new') }}"><x-ui.icon name="plus" /> Add user account</x-ui.button></x-slot:actions>
    </x-ui.page-header>

    @if($saved === 'updated')<x-ui.toast-on-load message="Account changes saved (prototype view · not stored)." type="info" />@endif
    @if($saved === 'created')<x-ui.toast-on-load message="Account created (prototype view · not stored)." type="info" />@endif

    <x-ui.card flush>
        <div class="flex flex-wrap items-center gap-3 border-b border-gray-100 p-4">
            <div class="relative min-w-0 flex-1"><x-ui.icon name="search" class="pointer-events-none absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-gray-400" />
            <input type="search" x-model="q" placeholder="Search by name, student number, or email" class="w-full rounded-lg border border-gray-300 py-2 pl-9 pr-3 text-sm focus:border-cvsu-green focus:outline-none focus:ring-2 focus:ring-cvsu-green/25"></div>
            <select x-model="role" class="rounded-lg border border-gray-300 px-3 py-2 text-sm" aria-label="Role filter"><option>All roles</option><option>Student</option><option>Registrar / ID Personnel</option><option>System Administrator</option></select>
        </div>
        <x-ui.table :headers="['Name / email', 'Role', 'Status', 'Last active', 'Actions']">
            @foreach([
                ['Juan Miguel Santos', 'juanmiguel.santos@cvsu.edu.ph', 'Student', 'active', 'Today · 10:35 AM'],
                ['Mario L. Reyes', 'mario.reyes@cvsu.edu.ph', 'Registrar / ID Personnel', 'active', 'Today · 10:20 AM'],
                ['Andrea B. Cruz', 'andrea.cruz@cvsu.edu.ph', 'System Administrator', 'active', 'Today · 10:01 AM'],
                ['Rafael M. Garcia', 'rafael.garcia@cvsu.edu.ph', 'Student', 'inactive', 'Nov 12 · 4:18 PM'],
                ['Alyssa Mae Bautista', 'alyssa.bautista@cvsu.edu.ph', 'Student', 'active', 'Today · 9:15 AM'],
            ] as [$n, $e, $r, $st, $last])
                <tr class="hover:bg-gray-50" x-show="(role === 'All roles' || role === '{{ $r }}') && (q === '' || '{{ strtolower($n . ' ' . $e) }}'.includes(q.toLowerCase()))">
                    <td class="px-4 py-3"><p class="font-medium">{{ $n }}</p><p class="text-xs text-gray-500">{{ $e }}</p></td>
                    <td class="px-4 py-3 text-gray-600">{{ $r }}</td>
                    <td class="px-4 py-3"><x-ui.badge :status="$st" /></td>
                    <td class="whitespace-nowrap px-4 py-3 text-gray-600">{{ $last }}</td>
                    <td class="px-4 py-3"><div class="flex gap-2"><x-ui.button size="sm" variant="outline" href="{{ url('/admin/users/edit') }}">Edit</x-ui.button>
                        <x-ui.button size="sm" variant="ghost" x-on:click="$dispatch('open-modal', 'deactivate')">{{ $st === 'active' ? 'Deactivate' : 'Activate' }}</x-ui.button></div></td>
                </tr>
            @endforeach
        </x-ui.table>
        <x-ui.pagination :from="1" :to="5" :total="1248" />
    </x-ui.card>

    <x-ui.modal name="deactivate" title="Change account status?">
        <p class="text-sm text-gray-600">The user will lose or regain access to the system. This action is recorded in the activity log.</p>
        <div class="mt-6 flex justify-end gap-2">
            <x-ui.button variant="outline" x-on:click="$dispatch('close-modal')">Cancel</x-ui.button>
            <x-ui.button x-on:click="$dispatch('close-modal'); $dispatch('toast', { message: 'Prototype only · status was not changed.', type: 'info' })">Confirm</x-ui.button>
        </div>
    </x-ui.modal>
</div>
</x-layouts.portal>
