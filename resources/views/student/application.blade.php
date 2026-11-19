<x-layouts.portal role="student" active="application" title="ID application">
<div x-data="{
        step: 1, tried: false,
        f: { student_number: '2024-10352', last_name: 'Santos', first_name: 'Juan Miguel', middle_name: 'Dela Cruz', birthdate: '2004-03-14', contact: '', email: 'juanmiguel.santos@cvsu.edu.ph', college: 'College of Engineering and Information Technology', course: 'BS Information Technology', year: '3rd year', address: '' },
        cor: null, photo: null, agree: false,
        canNext() {
            if (this.step === 1) { return !!(this.f.last_name && this.f.first_name && this.f.contact) }
            if (this.step === 2) { return !!this.cor }
            if (this.step === 3) { return !!(this.photo && this.photo.ok) }
            return true
        },
        next() { this.tried = true; if (this.canNext()) { this.step++; this.tried = false; window.scrollTo({ top: 0, behavior: 'smooth' }) } },
        back() { this.step--; this.tried = false }
    }">
    <x-ui.page-header title="Apply for your student ID" subtitle="Four short steps. Fields marked * are required."
        :crumbs="[['Dashboard', '/student/dashboard'], ['ID application', null]]">
        <x-slot:actions><x-ui.badge status="draft" label="Application type: New ID" /><span class="rounded-full bg-gray-100 px-2.5 py-0.5 text-xs text-gray-500" title="Not available yet">Replacement ID · coming soon</span></x-slot:actions>
    </x-ui.page-header>

    <x-ui.card class="mb-6">
        <ol class="grid grid-cols-4 gap-2 text-center text-xs" aria-label="Form steps">
            @foreach(['Personal information', 'Requirements', '1x1 photo', 'Review & submit'] as $i => $l)
                <li>
                    <span class="mx-auto flex h-8 w-8 items-center justify-center rounded-full text-xs font-semibold"
                          :class="step > {{ $i + 1 }} ? 'bg-cvsu-green text-white' : (step === {{ $i + 1 }} ? 'border-2 border-cvsu-green bg-white text-cvsu-green' : 'bg-gray-100 text-gray-500')">
                        <span x-show="step > {{ $i + 1 }}"><x-ui.icon name="check" /></span><span x-show="step <= {{ $i + 1 }}">{{ $i + 1 }}</span>
                    </span>
                    <span class="mt-1.5 block leading-tight" :class="step >= {{ $i + 1 }} ? 'font-medium text-cvsu-ink' : 'text-gray-500'">{{ $l }}</span>
                </li>
            @endforeach
        </ol>
    </x-ui.card>

    <form onsubmit="return false" class="max-w-3xl">
        {{-- Step 1 --}}
        <x-ui.card title="Step 1 · Personal information" x-show="step === 1">
            <div class="grid gap-4 sm:grid-cols-2">
                <x-ui.field label="Student number *" name="student_number" x-model="f.student_number" readonly hint="From your account. Cannot be changed." />
                <x-ui.field label="Date of birth *" name="birthdate" type="date" x-model="f.birthdate" />
                <x-ui.field label="Last name *" name="last_name" x-model="f.last_name" error-when="tried && !f.last_name" />
                <x-ui.field label="First name *" name="first_name" x-model="f.first_name" error-when="tried && !f.first_name" />
                <x-ui.field label="Middle name" name="middle_name" x-model="f.middle_name" />
                <x-ui.field label="Contact number *" name="contact" x-model="f.contact" placeholder="09XX XXX XXXX" hint="Used for SMS notices about your schedule." error-when="tried && !f.contact" />
                <div class="sm:col-span-2"><x-ui.field label="CvSU email address *" name="email" type="email" x-model="f.email" /></div>
                <x-ui.select label="College *" name="college" x-model="f.college" :options="['College of Engineering and Information Technology', 'College of Arts and Sciences', 'College of Nursing']" />
                <x-ui.select label="Course *" name="course" x-model="f.course" :options="['BS Information Technology', 'BS Computer Science', 'BS Nursing']" />
                <x-ui.select label="Year level *" name="year" x-model="f.year" :options="['1st year', '2nd year', '3rd year', '4th year']" />
                <x-ui.field label="Home address" name="address" x-model="f.address" placeholder="Barangay, Municipality, Province" />
            </div>
        </x-ui.card>

        {{-- Step 2 --}}
        <x-ui.card title="Step 2 · Requirements" x-show="step === 2" x-cloak>
            <div x-on:file-change="cor = $event.detail.name">
                <x-ui.upload label="Certificate of Registration (proof of enrollment) *" name="cor" accept=".pdf,.jpg,.jpeg,.png" hint="PDF, JPG or PNG · up to 5 MB" />
            </div>
            <p x-show="tried && !cor" x-cloak class="mt-2 text-xs text-red-600">Please upload your Certificate of Registration.</p>
        </x-ui.card>

        {{-- Step 3 --}}
        <x-ui.card title="Step 3 · 1x1 photo" x-show="step === 3" x-cloak>
            <div x-on:photo-change="photo = $event.detail"><x-ui.photo-upload /></div>
            <p x-show="tried && !(photo && photo.ok)" x-cloak class="mt-3 text-xs text-red-600">Upload a photo that passes all instant checks to continue.</p>
        </x-ui.card>

        {{-- Step 4 --}}
        <x-ui.card title="Step 4 · Review and confirm" x-show="step === 4" x-cloak>
            <dl class="grid gap-x-6 gap-y-3 text-sm sm:grid-cols-2">
                <div><dt class="text-xs text-gray-500">Student number</dt><dd class="font-medium" x-text="f.student_number"></dd></div>
                <div><dt class="text-xs text-gray-500">Full name</dt><dd class="font-medium" x-text="f.first_name + ' ' + f.middle_name + ' ' + f.last_name"></dd></div>
                <div><dt class="text-xs text-gray-500">Course · year level</dt><dd class="font-medium" x-text="f.course + ' · ' + f.year"></dd></div>
                <div><dt class="text-xs text-gray-500">College</dt><dd class="font-medium" x-text="f.college"></dd></div>
                <div><dt class="text-xs text-gray-500">Contact</dt><dd class="font-medium" x-text="f.contact || '—'"></dd></div>
                <div><dt class="text-xs text-gray-500">Email</dt><dd class="font-medium" x-text="f.email"></dd></div>
                <div><dt class="text-xs text-gray-500">Certificate of Registration</dt><dd class="font-medium" x-text="cor || 'Not uploaded'"></dd></div>
                <div><dt class="text-xs text-gray-500">1x1 photo</dt><dd class="flex items-center gap-2 font-medium"><template x-if="photo"><img :src="photo.src" alt="" class="h-10 w-10 rounded object-cover"></template><span x-text="photo ? photo.name : 'Not uploaded'"></span></dd></div>
            </dl>
            <div class="mt-4 flex gap-4 text-sm"><button type="button" class="font-medium text-cvsu-green hover:underline" x-on:click="step = 1">Edit details</button><button type="button" class="font-medium text-cvsu-green hover:underline" x-on:click="step = 3">Replace photo</button></div>
            <label class="mt-5 flex items-start gap-2 rounded-lg bg-gray-50 p-3 text-sm text-gray-700">
                <input type="checkbox" x-model="agree" class="mt-0.5 rounded border-gray-300 text-cvsu-green focus:ring-cvsu-green">
                I confirm that the information and documents I submitted are true and correct.
            </label>
        </x-ui.card>

        <div class="mt-5 flex items-center justify-between gap-3">
            <div><x-ui.button variant="outline" x-show="step > 1" x-on:click="back()">Back</x-ui.button></div>
            <div class="flex gap-2">
                <x-ui.button variant="ghost" x-on:click="$dispatch('toast', { message: 'Prototype only · drafts are not saved yet.', type: 'info' })">Save draft</x-ui.button>
                <x-ui.button x-show="step < 4" x-on:click="next()">Continue <x-ui.icon name="arrow-right" /></x-ui.button>
                <x-ui.button x-show="step === 4" x-cloak x-bind:disabled="!agree" x-on:click="$dispatch('open-modal', 'submit-application')">Submit application</x-ui.button>
            </div>
        </div>
    </form>

    <x-ui.confirm name="submit-application" title="Submit your application?" message="Once submitted, the registrar will start the verification. You can still fix things later if a correction is requested." confirm-label="Yes, submit" :href="url('/student/submitted')" />
</div>
</x-layouts.portal>
