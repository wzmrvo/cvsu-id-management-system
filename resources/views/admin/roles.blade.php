<x-layouts.portal role="admin" active="roles" title="Roles & permissions">
    <x-ui.page-header title="Roles and permissions" subtitle="What each role can do in the system. Students can never reach staff or admin screens." :crumbs="[['System administration', '/admin'], ['Roles & permissions', null]]" />
    <x-ui.card flush>
        <x-ui.table :headers="['Permission', 'Student', 'Registrar / ID Personnel', 'System Administrator']">
            @foreach([
                ['Submit and track own ID application', true, false, false],
                ['View own claiming schedule and slip', true, false, false],
                ['First verification (approve, correct, reject)', false, true, false],
                ['Assign claiming date and batch', false, true, false],
                ['Second verification and mark as claimed', false, true, false],
                ['Manage no-shows and reschedules', false, true, false],
                ['Manage user accounts and roles', false, false, true],
                ['View reports and export', false, false, true],
                ['View activity log (read-only)', false, false, true],
            ] as [$p, $a, $b, $c])
                <tr class="hover:bg-gray-50"><td class="px-4 py-3">{{ $p }}</td>
                    @foreach([$a, $b, $c] as $v)<td class="px-4 py-3">@if($v)<span class="inline-flex h-5 w-5 items-center justify-center rounded-full bg-cvsu-green-50 text-cvsu-green"><x-ui.icon name="check" class="h-3.5 w-3.5" /></span>@else<span class="text-gray-300">—</span>@endif</td>@endforeach
                </tr>
            @endforeach
        </x-ui.table>
    </x-ui.card>
    <p class="mt-4 text-xs text-gray-500">Permissions are fixed in this version. Custom roles may be added later.</p>
</x-layouts.portal>
