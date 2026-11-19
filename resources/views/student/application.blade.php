<x-layouts.portal role="student" active="application" title="ID application">
    <x-ui.page-header eyebrow="ID application" title="Let's make it official." subtitle="Required details are marked with an asterisk (*)." />

    <form class="space-y-6" onsubmit="return false">
        <x-ui.card eyebrow="01" title="Personal information">
            <div class="grid gap-4 sm:grid-cols-2">
                <x-ui.field label="Student number *" name="student_number" value="2024-10352" />
                <x-ui.select label="Program / year level *" name="program" :options="['BS Information Technology · 3rd year', 'BS Computer Science · 3rd year', 'BS Nursing · 2nd year']" selected="BS Information Technology · 3rd year" />
                <x-ui.field label="Last name *" name="last_name" value="Santos" />
                <x-ui.field label="First name *" name="first_name" value="Juan Miguel" />
                <x-ui.field label="Middle name" name="middle_name" value="Dela Cruz" />
                <x-ui.field label="Contact number *" name="contact" placeholder="09XX XXX XXXX" hint="Used for SMS schedule notices." />
            </div>
        </x-ui.card>

        <x-ui.card eyebrow="02" title="Requirements">
            <x-ui.upload label="Certificate of Registration (proof of enrollment) *" name="cor" hint="PDF, JPG or PNG · up to 5 MB" />
        </x-ui.card>

        <x-ui.card eyebrow="03" title="1x1 photo">
            <div class="grid gap-6 sm:grid-cols-2">
                <x-ui.upload label="Upload your 1x1 photo *" name="photo" hint="JPG or PNG · square · up to 2 MB" />
                <div class="rounded-xl bg-cvsu-green-50 p-4 text-sm">
                    <p class="font-semibold text-cvsu-green">Photo requirements</p>
                    <ul class="mt-2 space-y-2 text-gray-700">
                        @foreach(['Wear your CvSU uniform', 'Plain white background', 'Clear, front-facing, no filters', 'Square (1x1) framing'] as $r)
                            <li class="flex gap-2"><span class="text-cvsu-gold">✓</span>{{ $r }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </x-ui.card>

        <div class="flex flex-wrap justify-end gap-3">
            <x-ui.button variant="outline" href="{{ url('/student/dashboard') }}">Save for later</x-ui.button>
            <x-ui.button href="{{ url('/student/submitted') }}">Submit application →</x-ui.button>
        </div>
    </form>
</x-layouts.portal>
