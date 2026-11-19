{{-- Global toast stack. Use: x-on:click="$dispatch('toast', { message: '...', type: 'success|error|info' })" --}}
<div x-data="{ items: [], add(d) { const id = Date.now() + Math.random(); this.items.push({ id: id, message: d.message, type: d.type || 'success' }); setTimeout(() => { this.items = this.items.filter(i => i.id !== id) }, 4500) } }"
     x-on:toast.window="add($event.detail)" class="pointer-events-none fixed bottom-20 right-4 z-[60] space-y-2 md:bottom-4" aria-live="polite">
    <template x-for="t in items" :key="t.id">
        <div x-transition class="pointer-events-auto flex w-80 max-w-[calc(100vw-2rem)] items-start gap-3 rounded-lg border bg-white p-3 text-sm shadow-lg"
             :class="t.type === 'error' ? 'border-red-200' : (t.type === 'info' ? 'border-blue-200' : 'border-cvsu-green/30')">
            <span class="mt-1 h-2 w-2 shrink-0 rounded-full" :class="t.type === 'error' ? 'bg-red-600' : (t.type === 'info' ? 'bg-blue-600' : 'bg-cvsu-green')"></span>
            <p class="flex-1" x-text="t.message"></p>
        </div>
    </template>
</div>
