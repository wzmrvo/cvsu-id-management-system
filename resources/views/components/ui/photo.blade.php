@props(['class' => 'h-20 w-16'])
{{-- Placeholder for the student's 1x1 photo; later: pass the stored photo URL --}}
<img src="{{ asset('images/student-photo.png') }}" alt="Student photo" {{ $attributes->class([$class, 'shrink-0 rounded-lg border border-gray-200 object-cover']) }}>
