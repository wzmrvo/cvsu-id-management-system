@php
    $state = request('state', 'review');
    $steps = ['Submitted', 'First verification', 'Approved', 'Scheduled', 'Claimed'];
    $states = [
        'new' => ['current' => 0, 'badge' => 'draft', 'title' => 'Start your ID application', 'text' => 'Complete your details, upload your requirements and a 1x1 photo. It takes about 10 minutes.', 'cta' => ['Start application', '/student/application']],
        'review' => ['current' => 2, 'badge' => 'review', 'title' => 'Your application is being reviewed', 'text' => 'The registrar is checking your details and photo. Nothing to do right now. We will notify you of the result.', 'cta' => ['View application status', '/student/status']],
        'correction' => ['current' => 2, 'badge' => 'correction', 'title' => 'A correction is needed', 'text' => 'The registrar asked you to replace your photo. Update it and resubmit to continue.', 'cta' => ['Fix and resubmit', '/student/status?state=correction']],
        'approved' => ['current' => 3, 'badge' => 'approved', 'title' => 'Approved. Waiting for your schedule', 'text' => 'The registrar will assign your claiming date and batch. You will get an SMS or email.', 'cta' => ['View application status', '/student/status']],
        'scheduled' => ['current' => 4, 'badge' => 'scheduled', 'title' => 'Your claiming schedule is ready', 'text' => 'Download your claiming slip and bring it on November 24, 2026 (Batch AM-02).', 'cta' => ['Open claiming slip', '/student/schedule']],
        'claimed' => ['current' => 6, 'badge' => 'claimed', 'title' => 'You have claimed your ID', 'text' => 'Your student ID was released on November 24, 2026. Keep it safe.', 'cta' => ['View application history', '/student/status']],
    ];
    $s = $states[$state] ?? $states['review'];
@endphp
<x-layouts.portal role="student" active="dashboard" title="Dashboard">
    <x-ui.page-header title="Good morning, Juan Miguel." subtitle="Here is where your student ID application stands.">
        <x-slot:actions>
            <div class="flex flex-wrap items-center gap-1 text-xs">
                <span class="text-gray-400">Prototype view:</span>
                @foreach(['new' => 'New', 'review' => 'In review', 'correction' => 'Correction', 'approved' => 'Approved', 'scheduled' => 'Scheduled', 'claimed' => 'Claimed'] as $k => $l)
                    <a href="{{ url('/student/dashboard?state=' . $k) }}" @class(['rounded-full px-2.5 py-1 font-medium', 'bg-cvsu-green text-white' => $state === $k, 'bg-white text-gray-600 ring-1 ring-gray-200 hover:bg-gray-50' => $state !== $k])>{{ $l }}</a>
                @endforeach
            </div>
        </x-slot:actions>
    </x-ui.page-header>

    <div class="mb-6 grid gap-4 lg:grid-cols-3">
        <section class="rounded-xl border border-gray-200 border-l-4 border-l-cvsu-gold bg-white p-6 shadow-xs lg:col-span-2">
            <div class="flex items-center gap-2"><p class="text-[11px] font-semibold uppercase tracking-wider text-cvsu-green">Your next step</p><x-ui.badge :status="$s['badge']" /></div>
            <h2 class="mt-2 text-lg font-semibold">{{ $s['title'] }}</h2>
            <p class="mt-1 max-w-lg text-sm text-gray-500">{{ $s['text'] }}</p>
            <x-ui.button class="mt-4" href="{{ url($s['cta'][1]) }}">{{ $s['cta'][0] }} <x-ui.icon name="arrow-right" /></x-ui.button>
        </section>
        <section class="rounded-xl border border-gray-200 bg-white p-6 shadow-xs">
            <p class="text-[11px] font-semibold uppercase tracking-wider text-gray-500">Student number</p>
            <p class="mt-2 text-2xl font-semibold tracking-tight text-cvsu-green">2024-10352</p>
            <p class="mt-1 text-xs text-gray-500">BS Information Technology · 3rd year</p>
            <p class="mt-1 text-xs text-gray-500">College of Engineering and Information Technology</p>
        </section>
    </div>

    <x-ui.card title="Application progress" class="mb-6">
        <div class="hidden sm:block"><x-ui.stepper :steps="$steps" :current="$s['current']" /></div>
        <div class="sm:hidden"><x-ui.stepper :steps="$steps" :current="$s['current']" vertical /></div>
    </x-ui.card>

    <div class="grid gap-6 lg:grid-cols-2">
        <x-ui.card title="Recent activity">
            <x-ui.timeline :items="[
                ['Application submitted', 'CVSU-ID-2026-00418', 'Nov 19, 2026 · 9:42 AM', 'done'],
                ['First verification started', 'Assigned to the registrar', 'Nov 19, 2026 · 9:50 AM', 'current'],
            ]" />
        </x-ui.card>
        <x-ui.card title="Before you apply">
            <ol class="space-y-4 text-sm">
                @foreach([['Verify your personal information','Your name and student number must match your CvSU record.'],['Prepare proof of enrollment','Your current Certificate of Registration.'],['Prepare a compliant 1x1 photo','CvSU uniform, plain white background, clear and front-facing.']] as $i => [$t, $d])
                    <li class="flex gap-3"><span class="flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-cvsu-green-50 text-xs font-semibold text-cvsu-green">{{ $i + 1 }}</span><div><p class="font-medium">{{ $t }}</p><p class="text-gray-500">{{ $d }}</p></div></li>
                @endforeach
            </ol>
        </x-ui.card>
    </div>
</x-layouts.portal>
