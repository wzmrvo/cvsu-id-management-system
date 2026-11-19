<x-layouts.portal role="registrar" active="noshows" title="No-shows & reschedules">
<div x-data="{ tab: 'requests' }">
    <x-ui.page-header title="No-shows and reschedules" subtitle="Students who missed their slot and their reschedule requests." :crumbs="[['Registrar workspace', '/registrar'], ['No-shows & reschedules', null]]" />
    <x-ui.alert variant="info" class="mb-6">When a student is marked as missed, their old QR code stops working. A reschedule creates a new slip and QR. The reschedule limit is still to be confirmed with the registrar.</x-ui.alert>
    <x-ui.card flush>
        <x-ui.tabs :tabs="['requests' => 'Reschedule requests (3)', 'missed' => 'Missed (5)']" />
        <div x-show="tab === 'requests'">
            <x-ui.table :headers="['Student', 'Original slot', 'Reason', 'Requested', 'Action']">
                @foreach([['Alyssa Mae Bautista', '2023-08871', 'Nov 24 · AM-02', 'Class conflict', 'Nov 24 · 9:10 AM'], ['Mark Angelo Reyes', '2024-11204', 'Nov 24 · AM-02', 'Illness', 'Nov 24 · 8:40 AM'], ['Carlo Paolo Ramos', '2023-04419', 'Nov 23 · PM-01', 'Emergency', 'Nov 23 · 3:30 PM']] as [$n, $num, $slot, $why, $t])
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3"><p class="font-medium">{{ $n }}</p><p class="text-xs text-gray-500">{{ $num }}</p></td>
                        <td class="whitespace-nowrap px-4 py-3 text-gray-600">{{ $slot }}</td><td class="px-4 py-3 text-gray-600">{{ $why }}</td><td class="whitespace-nowrap px-4 py-3 text-gray-600">{{ $t }}</td>
                        <td class="px-4 py-3"><div class="flex gap-2">
                            <x-ui.button size="sm" x-on:click="$dispatch('toast', { message: 'Prototype only · reschedule approval is not saved.', type: 'info' })">Approve</x-ui.button>
                            <x-ui.button size="sm" variant="outline" x-on:click="$dispatch('toast', { message: 'Prototype only · request was not declined.', type: 'info' })">Decline</x-ui.button>
                        </div></td>
                    </tr>
                @endforeach
            </x-ui.table>
        </div>
        <div x-show="tab === 'missed'" x-cloak>
            <x-ui.table :headers="['Student', 'Slot', 'Status', 'QR']">
                @foreach([['Rafael M. Garcia', 'Nov 23 · AM-01'], ['Daniel R. Mercado', 'Nov 23 · AM-01'], ['Sofia L. Navarro', 'Nov 23 · PM-01'], ['Paolo A. Tan', 'Nov 23 · PM-01'], ['Bianca R. Flores', 'Nov 23 · PM-01']] as [$n, $slot])
                    <tr class="hover:bg-gray-50"><td class="px-4 py-3 font-medium">{{ $n }}</td><td class="px-4 py-3 text-gray-600">{{ $slot }}</td><td class="px-4 py-3"><x-ui.badge status="missed" /></td><td class="px-4 py-3 text-gray-500">Revoked</td></tr>
                @endforeach
            </x-ui.table>
        </div>
    </x-ui.card>
</div>
</x-layouts.portal>
