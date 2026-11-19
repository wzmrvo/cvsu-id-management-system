@props(['icon' => 'search', 'title', 'text' => null])
<div class="flex flex-col items-center px-4 py-10 text-center">
    <span class="flex h-11 w-11 items-center justify-center rounded-full bg-gray-100 text-gray-500"><x-ui.icon :name="$icon" class="h-5 w-5" /></span>
    <p class="mt-3 text-sm font-semibold">{{ $title }}</p>
    @if($text)<p class="mt-1 max-w-sm text-sm text-gray-500">{{ $text }}</p>@endif
    <div class="mt-4">{{ $slot }}</div>
</div>
