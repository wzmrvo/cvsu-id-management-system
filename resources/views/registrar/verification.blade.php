<x-layouts.portal role="registrar" active="verification" title="Review application">
    <x-ui.page-header eyebrow="Registrar · First verification" title="Review application" subtitle="CVSU-ID-2026-00418 · Submitted Nov 19, 2026 · 9:42 AM">
        <x-slot:actions><x-ui.badge status="pending" label="Pending verification" /></x-slot:actions>
    </x-ui.page-header>

    <div class="mb-6 grid gap-6 lg:grid-cols-3">
        @foreach([
            'Student application' => [['Student number','2024-10352'],['Full name','Juan Miguel Dela Cruz Santos'],['Program','BS Information Technology · 3'],['Email','juanmiguel.santos@cvsu.edu.ph']],
            'CvSU student record' => [['Student number','2024-10352'],['Full name','Juan Miguel Dela Cruz Santos'],['Program','BS Information Technology · 3'],['Enrollment status','Enrolled · 1st semester 2026-2027']],
        ] as $title => $rows)
            <x-ui.card :title="$title">
                <dl class="space-y-3 text-sm">
                    @foreach($rows as [$k, $v])
                        <div>
                            <dt class="text-[11px] font-semibold uppercase tracking-wide text-gray-500">{{ $k }}</dt>
                            <dd class="flex items-center gap-2 font-medium">{{ $v }} @if($title === 'CvSU student record')<span class="text-cvsu-green" title="Matches application">✓</span>@endif</dd>
                        </div>
                    @endforeach
                </dl>
            </x-ui.card>
        @endforeach

        <x-ui.card title="Photo review">
            <x-ui.photo class="mx-auto h-44 w-36" />
            <ul class="mt-4 space-y-2 text-sm">
                @foreach(['CvSU uniform', 'Plain white background', 'Clear, front-facing 1x1 photo'] as $c)
                    <li class="flex gap-2"><span class="text-cvsu-green">✓</span>{{ $c }}</li>
                @endforeach
            </ul>
            <x-ui.badge status="approved" label="Compliant photo" class="mt-3" />
        </x-ui.card>
    </div>

    <x-ui.card title="Verification decision">
        <x-ui.textarea label="Remarks" name="remarks" rows="3">Information matches the CvSU student record. Photo meets requirements.</x-ui.textarea>
        <div class="mt-4 flex flex-wrap items-center justify-end gap-3">
            <x-ui.button variant="danger-outline" href="{{ url('/registrar/verification/reject') }}">Reject</x-ui.button>
            <x-ui.button variant="outline" href="{{ url('/registrar/verification/correction') }}">Request corrections</x-ui.button>
            <x-ui.button href="{{ url('/registrar/verification/approved') }}">Approve application →</x-ui.button>
        </div>
    </x-ui.card>
</x-layouts.portal>
