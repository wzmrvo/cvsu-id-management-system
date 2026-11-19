@props(['lines' => 3])
<div class="animate-pulse space-y-3" aria-hidden="true">
    @for($i = 0; $i < $lines; $i++)<div class="h-3 rounded bg-gray-200" style="width: {{ 100 - ($i * 12) }}%"></div>@endfor
</div>
