<x-layouts.portal role="registrar" active="verification" title="Review application">
<div x-data="{ c: { info: false, record: false, photo: false, docs: false }, get all() { return this.c.info && this.c.record && this.c.photo && this.c.docs } }">
    <x-ui.page-header title="Review application" subtitle="CVSU-ID-2026-00418 · Submitted Nov 19, 2026 · 9:42 AM"
        :crumbs="[['Registrar workspace', '/registrar'], ['First verification', '/registrar/verification'], ['Review', null]]">
        <x-slot:actions><x-ui.badge status="review" /></x-slot:actions>
    </x-ui.page-header>

    <div class="grid gap-6 lg:grid-cols-3">
        {{-- Main --}}
        <div class="space-y-6 lg:col-span-2">
            <x-ui.card title="Student application vs CvSU student record">
                <x-ui.table :headers="['Field', 'Submitted by student', 'CvSU record', 'Result']">
                    @foreach([
                        ['Student number', '2024-10352', '2024-10352', 'match'],
                        ['Last name', 'Santos', 'Santos', 'match'],
                        ['First name', 'Juan Miguel', 'Juan Miguel', 'match'],
                        ['Middle name', 'Dela Cruz', 'De la Cruz', 'check'],
                        ['Course · year', 'BS Information Technology · 3rd', 'BS Information Technology · 3rd', 'match'],
                        ['Enrollment status', '—', 'Enrolled · 1st sem 2026-2027', 'match'],
                    ] as [$f, $a, $r, $res])
                        <tr @class(['bg-amber-50/60' => $res === 'check'])>
                            <td class="px-4 py-2.5 text-gray-500">{{ $f }}</td>
                            <td class="px-4 py-2.5 font-medium">{{ $a }}</td>
                            <td class="px-4 py-2.5 font-medium">{{ $r }}</td>
                            <td class="px-4 py-2.5"><x-ui.badge :status="$res" /></td>
                        </tr>
                    @endforeach
                </x-ui.table>
                <p class="mt-3 text-xs text-gray-500">“Check” means the spelling or format differs slightly. You decide whether it is acceptable.</p>
            </x-ui.card>

            <x-ui.card title="Uploaded documents">
                <ul class="divide-y divide-gray-100 text-sm">
                    <li class="flex items-center justify-between py-2.5"><span class="flex items-center gap-2"><x-ui.icon name="file" class="text-gray-400" /> Certificate of Registration · cor_2026_1st-sem.pdf</span><button type="button" class="text-xs font-semibold text-cvsu-green hover:underline" x-on:click="$dispatch('toast', { message: 'Prototype only · document preview will open here.', type: 'info' })">Preview</button></li>
                </ul>
            </x-ui.card>
        </div>

        {{-- Side --}}
        <div class="space-y-6">
            <x-ui.card title="Submitted photo">
                <button type="button" class="group relative mx-auto block" x-on:click="$dispatch('open-modal', 'photo-zoom')" aria-label="Zoom photo">
                    <x-ui.photo class="h-52 w-44" />
                    <span class="absolute bottom-2 right-2 flex items-center gap-1 rounded-md bg-white/90 px-2 py-1 text-xs font-medium shadow-sm group-hover:bg-white"><x-ui.icon name="zoom" class="h-3.5 w-3.5" /> Zoom</span>
                </button>
                <p class="mt-3 text-center text-xs text-gray-500">Photo: IMG_0421.jpg · 600 x 600 px</p>
            </x-ui.card>

            <x-ui.card title="Verification checklist">
                <div class="space-y-3 text-sm">
                    @foreach(['info' => 'Personal information is complete', 'record' => 'Matches the CvSU student record', 'photo' => 'Photo: CvSU uniform, plain white background, clear and front-facing', 'docs' => 'Certificate of Registration is valid'] as $k => $l)
                        <label class="flex items-start gap-2.5"><input type="checkbox" x-model="c.{{ $k }}" class="mt-0.5 h-4 w-4 rounded border-gray-300 text-cvsu-green focus:ring-cvsu-green"><span>{{ $l }}</span></label>
                    @endforeach
                </div>
                <p x-show="!all" class="mt-3 text-xs text-gray-500">Approval unlocks after all checks are ticked. Nothing is approved automatically.</p>
            </x-ui.card>

            <x-ui.card title="Decision">
                <x-ui.textarea label="Remarks" name="remarks" rows="3">Information matches the CvSU student record. Photo meets requirements.</x-ui.textarea>
                <div class="mt-4 grid gap-2">
                    <x-ui.button x-bind:disabled="!all" x-on:click="$dispatch('open-modal', 'approve')"><x-ui.icon name="check" /> Approve application</x-ui.button>
                    <x-ui.button variant="outline" href="{{ url('/registrar/verification/correction') }}">Request correction</x-ui.button>
                    <x-ui.button variant="danger-outline" href="{{ url('/registrar/verification/reject') }}">Reject</x-ui.button>
                </div>
            </x-ui.card>

            <x-ui.card title="Review history">
                <x-ui.timeline :items="[['Application submitted', null, 'Nov 19 · 9:42 AM', 'done'], ['Assigned to Mario L. Reyes', null, 'Nov 19 · 9:50 AM', 'current']]" />
            </x-ui.card>
        </div>
    </div>

    <x-ui.confirm name="approve" title="Approve this application?" message="The student will be notified, and you can then assign a claiming schedule. This action is recorded with your name." confirm-label="Approve" :href="url('/registrar/verification/approved')" />
    <x-ui.modal name="photo-zoom" title="Submitted photo" max-width="max-w-lg"><x-ui.photo class="mx-auto h-96 w-80 max-w-full" /></x-ui.modal>
</div>
</x-layouts.portal>
