{{-- 1x1 photo upload with instant preview and basic technical checks (type, size, square, resolution).
     Background / uniform are judged by the registrar, not the browser. Dispatches "photo-change". --}}
@props(['name' => 'photo'])
<div x-data="{
        src: null, checks: [], ok: false, fileName: null,
        pick(e) {
            const f = e.target.files[0];
            if (!f) { return; }
            this.fileName = f.name; this.checks = []; this.ok = false;
            const typeOk = ['image/jpeg', 'image/png'].includes(f.type);
            const sizeOk = f.size <= 2 * 1024 * 1024;
            this.src = URL.createObjectURL(f);
            const img = new Image();
            img.onload = () => {
                const square = Math.abs(img.width / img.height - 1) <= 0.02;
                const big = Math.min(img.width, img.height) >= 300;
                this.checks = [
                    { label: 'JPG or PNG file', ok: typeOk },
                    { label: 'Under 2 MB', ok: sizeOk },
                    { label: 'Square 1x1 framing (' + img.width + ' x ' + img.height + ' px)', ok: square },
                    { label: 'At least 300 x 300 px', ok: big },
                ];
                this.ok = this.checks.every(c => c.ok);
                this.$dispatch('photo-change', { name: f.name, ok: this.ok, src: this.src });
            };
            img.src = this.src;
        }
    }" class="grid gap-4 sm:grid-cols-2">
    <div>
        <label for="{{ $name }}" class="mb-1.5 block text-sm font-medium text-gray-700">Your 1x1 photo *</label>
        <label for="{{ $name }}" class="relative flex aspect-square w-full max-w-xs cursor-pointer flex-col items-center justify-center overflow-hidden rounded-lg border-2 border-dashed border-gray-300 bg-gray-50 text-center text-sm text-gray-600 transition hover:border-cvsu-green focus-within:ring-2 focus-within:ring-cvsu-green/30">
            <template x-if="src"><img :src="src" alt="Photo preview" class="absolute inset-0 h-full w-full object-cover"></template>
            <template x-if="!src"><span class="flex flex-col items-center px-4"><x-ui.icon name="camera" class="mb-2 h-6 w-6 text-cvsu-green" /><span class="font-medium text-cvsu-green">Upload photo</span><span class="mt-1 text-xs text-gray-500">JPG or PNG · up to 2 MB</span></span></template>
            <input id="{{ $name }}" name="{{ $name }}" type="file" accept="image/png,image/jpeg" class="sr-only" x-on:change="pick($event)">
        </label>
        <p x-show="src" x-cloak class="mt-2 text-xs text-gray-500">Click the photo to replace it. <span x-text="fileName" class="font-medium"></span></p>
    </div>
    <div class="space-y-4">
        <div>
            <p class="text-sm font-medium text-gray-700">Instant checks</p>
            <ul class="mt-2 space-y-1.5 text-sm">
                <template x-if="checks.length === 0"><li class="text-gray-500">Upload a photo to run the checks.</li></template>
                <template x-for="c in checks" :key="c.label">
                    <li class="flex items-start gap-2" :class="c.ok ? 'text-cvsu-green' : 'text-red-700'">
                        <span x-text="c.ok ? '✓' : '✗'" class="font-bold"></span><span x-text="c.label"></span>
                    </li>
                </template>
            </ul>
        </div>
        <div class="rounded-lg bg-cvsu-green-50 p-3 text-sm">
            <p class="font-semibold text-cvsu-green-dark">Photo requirements</p>
            <ul class="mt-1.5 space-y-1 text-gray-700">
                <li>• 1x1, front-facing, clear and well lit</li>
                <li>• Wear your CvSU uniform</li>
                <li>• Plain white background</li>
            </ul>
            <p class="mt-2 text-xs text-gray-500">The registrar checks the uniform and background during verification.</p>
        </div>
    </div>
</div>
