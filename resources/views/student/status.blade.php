@php
    $state = request('state', 'review');
    $events = [
        ['Application submitted', 'Reference CVSU-ID-2026-00418', 'Nov 19, 2026 · 9:42 AM', 'done', ['review', 'correction', 'approved', 'scheduled']],
        ['First verification started', 'Your details and photo are being reviewed.', 'Nov 19, 2026 · 9:50 AM', 'current', ['review']],
        ['Correction requested', 'Photo does not meet the requirements.', 'Nov 19, 2026 · 10:20 AM', 'alert', ['correction']],
        ['First verification started', null, 'Nov 19, 2026 · 9:50 AM', 'done', ['correction', 'approved', 'scheduled']],
        ['Application approved', 'Information and photo passed first verification.', 'Nov 19, 2026 · 10:35 AM', 'done', ['approved', 'scheduled']],
        ['Claiming schedule assigned', 'November 24, 2026 · Batch AM-02', 'Nov 19, 2026 · 10:36 AM', 'done', ['scheduled']],
    ];
    $items = array_values(array_map(fn ($e) => [$e[0], $e[1], $e[2], $e[3]], array_filter($events, fn ($e) => in_array($state, $e[4]))));
    $badge = ['review' => 'review', 'correction' => 'correction', 'approved' => 'approved', 'scheduled' => 'scheduled'][$state] ?? 'review';
@endphp
<x-layouts.portal role="student" active="status" title="My application">
    <x-ui.page-header title="My application" subtitle="CVSU-ID-2026-00418 · Submitted Nov 19, 2026" :crumbs="[['Dashboard', '/student/dashboard'], ['My application', null]]">
        <x-slot:actions>
            <div class="flex flex-wrap items-center gap-1 text-xs">
                <span class="text-gray-400">Prototype view:</span>
                @foreach(['review' => 'In review', 'correction' => 'Correction', 'approved' => 'Approved', 'scheduled' => 'Scheduled'] as $k => $l)
                    <a href="{{ url('/student/status?state=' . $k) }}" @class(['rounded-full px-2.5 py-1 font-medium', 'bg-cvsu-green text-white' => $state === $k, 'bg-white text-gray-600 ring-1 ring-gray-200 hover:bg-gray-50' => $state !== $k])>{{ $l }}</a>
                @endforeach
            </div>
        </x-slot:actions>
    </x-ui.page-header>

    @if($state === 'correction')
        <x-ui.alert variant="warning" class="mb-6" title="Correction needed from the registrar">
            <p>“Please upload a new 1x1 photo wearing your CvSU uniform against a plain white background. Make sure your face is centered and evenly lit.”</p>
            <x-ui.button class="mt-3" size="sm" href="{{ url('/student/application') }}">Revise and resubmit</x-ui.button>
        </x-ui.alert>
    @endif

    <div class="grid gap-6 lg:grid-cols-3">
        <div class="space-y-6 lg:col-span-2">
            <x-ui.card title="Application timeline"><x-ui.timeline :items="$items" /></x-ui.card>
            <x-ui.card title="Submitted details">
                <div class="flex items-start gap-4">
                    <x-ui.photo class="h-24 w-20" />
                    <dl class="grid flex-1 gap-3 text-sm sm:grid-cols-2">
                        <div><dt class="text-xs text-gray-500">Full name</dt><dd class="font-medium">Juan Miguel Dela Cruz Santos</dd></div>
                        <div><dt class="text-xs text-gray-500">Student number</dt><dd class="font-medium">2024-10352</dd></div>
                        <div><dt class="text-xs text-gray-500">Course</dt><dd class="font-medium">BS Information Technology · 3rd year</dd></div>
                        <div><dt class="text-xs text-gray-500">Certificate of Registration</dt><dd class="font-medium">cor_2026_1st-sem.pdf</dd></div>
                    </dl>
                </div>
            </x-ui.card>
        </div>
        <div class="space-y-6">
            <x-ui.card title="Current status">
                <x-ui.badge :status="$badge" />
                <p class="mt-3 text-sm text-gray-500">{{ ['review' => 'The registrar is reviewing your details. No action needed.', 'correction' => 'Fix the items above and resubmit.', 'approved' => 'Waiting for your claiming schedule.', 'scheduled' => 'Your claiming schedule is ready.'][$state] ?? 'The registrar is reviewing your details.' }}</p>
                @if($state === 'scheduled')<x-ui.button class="mt-4" size="sm" href="{{ url('/student/schedule') }}">Open claiming slip</x-ui.button>@endif
            </x-ui.card>
            <x-ui.card title="Application history">
                <ul class="space-y-3 text-sm">
                    <li class="flex justify-between"><span>2026-2027 · New ID</span><x-ui.badge :status="$badge" /></li>
                </ul>
            </x-ui.card>
        </div>
    </div>
</x-layouts.portal>
