@php $steps = ['Submitted', 'First verification', 'Approved', 'Scheduled', 'Claimed']; @endphp
<x-layouts.portal role="student" active="dashboard" title="Dashboard">
    <x-ui.page-header eyebrow="Student workspace" title="Good morning, Juan Miguel." subtitle="Your student ID application, in one place." />

    <div class="mb-6 grid gap-4 lg:grid-cols-3">
        <section class="relative overflow-hidden rounded-2xl bg-cvsu-green p-6 text-white shadow-sm lg:col-span-2 md:p-8">
            <div class="absolute bottom-0 left-0 h-1.5 w-40 bg-cvsu-gold"></div>
            <h2 class="text-2xl font-bold">One application. One official identity.</h2>
            <p class="mt-2 max-w-lg text-sm text-white/80">Complete your details and upload your requirements to begin verification.</p>
            <x-ui.button variant="gold" class="mt-5" href="{{ url('/student/application') }}">Continue application →</x-ui.button>
        </section>
        <section class="rounded-2xl border border-gray-200 border-t-4 border-t-cvsu-gold bg-white p-6 shadow-sm">
            <p class="text-[11px] font-semibold uppercase tracking-widest text-gray-500">Student number</p>
            <p class="mt-2 text-3xl font-bold tracking-tight text-cvsu-green">2024-10352</p>
            <p class="mt-1 text-xs text-gray-500">BS Information Technology · 3rd year</p>
        </section>
    </div>

    <x-ui.card title="Application progress" class="mb-6">
        <div class="hidden sm:block"><x-ui.stepper :steps="$steps" :current="1" /></div>
        <div class="sm:hidden"><x-ui.stepper :steps="$steps" :current="1" vertical /></div>
    </x-ui.card>

    <div class="grid gap-6 lg:grid-cols-2">
        <x-ui.card title="Before you apply">
            <ol class="space-y-4 text-sm">
                @foreach([['01','Verify your personal information','Make sure your name and student number match your CvSU record.'],['02','Prepare proof of enrollment','Upload your current Certificate of Registration.'],['03','Prepare a compliant 1x1 photo','CvSU uniform, plain white background, clear and front-facing.']] as [$n,$t,$d])
                    <li class="flex gap-4"><span class="text-xs font-bold text-cvsu-gold">{{ $n }}</span><div><p class="font-semibold">{{ $t }}</p><p class="text-gray-500">{{ $d }}</p></div></li>
                @endforeach
            </ol>
        </x-ui.card>
        <x-ui.card title="Latest updates">
            <div class="rounded-xl bg-cvsu-green-50 p-4 text-sm">
                <p class="font-semibold text-cvsu-green">Student ID applications are open</p>
                <p class="mt-1 text-gray-600">Submit a clear and complete application to avoid verification delays.</p>
            </div>
            <a href="{{ url('/student/notifications') }}" class="mt-4 inline-block text-sm font-semibold text-cvsu-green hover:underline">View notifications →</a>
        </x-ui.card>
    </div>
</x-layouts.portal>
