<x-layouts.portal role="student" active="notifications" title="Notifications">
<div x-data="{ tab: 'all' }">
    <x-ui.page-header title="Notifications" subtitle="Updates about your application and claiming schedule." :crumbs="[['Dashboard', '/student/dashboard'], ['Notifications', null]]">
        <x-slot:actions><x-ui.button variant="outline" size="sm" x-on:click="$dispatch('toast', { message: 'Prototype only · nothing was changed.', type: 'info' })">Mark all as read</x-ui.button></x-slot:actions>
    </x-ui.page-header>
    <x-ui.card flush>
        <x-ui.tabs :tabs="['all' => 'All', 'unread' => 'Unread']" />
        <ul class="divide-y divide-gray-100">
            @foreach([
                ['Claiming schedule confirmed', 'Your claiming schedule is November 24, 2026, Batch AM-02. Download your slip.', 'Today · 10:36 AM', true, 'scheduled'],
                ['Application approved', 'Your details and photo passed first verification.', 'Today · 10:35 AM', true, 'approved'],
                ['Correction requested', 'Please replace your photo (CvSU uniform, white background).', 'Today · 10:20 AM', false, 'correction'],
                ['Application received', 'Your application CVSU-ID-2026-00418 is in the verification queue.', 'Nov 19 · 9:42 AM', false, 'review'],
            ] as [$t, $d, $tm, $unread, $badge])
                <li class="flex items-start gap-4 p-4" @if(! $unread) x-show="tab === 'all'" @endif>
                    <span @class(['mt-2 h-2 w-2 shrink-0 rounded-full', 'bg-cvsu-gold' => $unread, 'bg-gray-200' => ! $unread])></span>
                    <div class="min-w-0 flex-1"><p class="text-sm font-medium">{{ $t }}</p><p class="text-sm text-gray-500">{{ $d }}</p><p class="mt-1 text-xs text-gray-400">{{ $tm }} · SMS and email</p></div>
                    <x-ui.badge :status="$badge" class="hidden sm:inline-flex" />
                </li>
            @endforeach
        </ul>
    </x-ui.card>
</div>
</x-layouts.portal>
