<x-layouts.portal role="student" active="notifications" title="Notifications">
    <x-ui.page-header eyebrow="Notifications" title="Your latest updates." subtitle="Stay in the loop, every step of the way." />
    <x-ui.card flush>
        <ul class="divide-y divide-gray-100">
            @foreach([
                ['Claiming schedule confirmed', 'Your claiming schedule is November 24, 2026, Batch AM-02.', 'Today · 10:35 AM', 'scheduled'],
                ['Application approved', 'Your details and photo passed first verification.', 'Today · 10:20 AM', 'approved'],
                ['Application received', 'Your application CVSU-ID-2026-00418 is in the verification queue.', 'Nov 19 · 9:42 AM', 'review'],
            ] as [$t, $d, $time, $status])
                <li class="flex items-start gap-4 p-5">
                    <span class="mt-1.5 h-2 w-2 shrink-0 rounded-full bg-cvsu-gold"></span>
                    <div class="min-w-0 flex-1">
                        <p class="font-semibold">{{ $t }}</p>
                        <p class="text-sm text-gray-500">{{ $d }}</p>
                        <p class="mt-1 text-xs text-gray-400">{{ $time }} · via SMS and email</p>
                    </div>
                    <x-ui.badge :status="$status" class="hidden sm:inline-flex" />
                </li>
            @endforeach
        </ul>
    </x-ui.card>
</x-layouts.portal>
