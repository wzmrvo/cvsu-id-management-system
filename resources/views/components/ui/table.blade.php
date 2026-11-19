@props(['headers' => []])
<div class="overflow-x-auto">
    <table class="w-full text-left text-sm">
        <thead class="bg-gray-50">
            <tr class="text-[11px] uppercase tracking-wide text-gray-500">
                @foreach($headers as $h)<th scope="col" class="whitespace-nowrap px-4 py-2.5 font-semibold">{{ $h }}</th>@endforeach
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">{{ $slot }}</tbody>
    </table>
</div>
