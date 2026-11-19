<x-layouts.portal role="registrar" active="overview" title="Registrar overview">
    <x-ui.page-header eyebrow="Registrar overview" title="A clear view of every application." subtitle="Manage verification, appointments, and ID releases from one workspace.">
        <x-slot:actions><x-ui.button href="{{ url('/registrar/verification') }}">Start first verification →</x-ui.button></x-slot:actions>
    </x-ui.page-header>

    <div class="mb-6 grid grid-cols-2 gap-4 lg:grid-cols-4">
        <x-ui.stat label="Pending verification" value="216" hint="Waiting for review" />
        <x-ui.stat label="Approved · unscheduled" value="84" hint="Ready to be scheduled" />
        <x-ui.stat label="Scheduled" value="146" hint="Upcoming claiming days" />
        <x-ui.stat label="Claimed" value="104" hint="IDs released" />
    </div>

    <x-ui.card title="Verification queue" flush class="mb-6">
        <x-ui.table :headers="['Student / number', 'Program', 'Submitted', 'Status', 'Action']">
            @foreach([
                ['Juan Miguel Santos', '2024-10352', 'BS Information Technology', 'Nov 19, 9:42 AM'],
                ['Alyssa Mae Bautista', '2023-08871', 'BS Business Administration', 'Nov 19, 9:15 AM'],
                ['Mark Angelo Reyes', '2024-11204', 'BS Computer Science', 'Nov 19, 8:58 AM'],
                ['Sophia Anne Mendoza', '2022-05512', 'BS Nursing', 'Nov 18, 4:30 PM'],
            ] as [$name, $num, $prog, $time])
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3"><p class="font-medium">{{ $name }}</p><p class="text-xs text-gray-500">{{ $num }}</p></td>
                    <td class="px-4 py-3 text-gray-600">{{ $prog }}</td>
                    <td class="whitespace-nowrap px-4 py-3 text-gray-600">{{ $time }}</td>
                    <td class="px-4 py-3"><x-ui.badge status="pending" /></td>
                    <td class="px-4 py-3"><a href="{{ url('/registrar/verification') }}" class="font-semibold text-cvsu-green hover:underline">Review →</a></td>
                </tr>
            @endforeach
        </x-ui.table>
    </x-ui.card>

    <x-ui.alert variant="success" title="Today's reminder">
        Second verification happens at the claiming desk. Printing stays in the existing software.
    </x-ui.alert>
</x-layouts.portal>
