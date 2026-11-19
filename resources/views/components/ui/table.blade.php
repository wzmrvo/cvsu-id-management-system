@props(['headers' => []])
<div class="overflow-x-auto">
    <table class="w-full text-left text-sm">
        <thead>
            <tr class="border-b border-gray-200 text-[11px] uppercase tracking-wide text-gray-500">
                @foreach($headers as $h)<th class="whitespace-nowrap px-4 py-3 font-semibold">{{ $h }}</th>@endforeach
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">{{ $slot }}</tbody>
    </table>
</div>
