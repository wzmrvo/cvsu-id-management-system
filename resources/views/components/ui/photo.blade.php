@props(['class' => 'h-20 w-16'])
{{-- Placeholder for the student's submitted 1x1 photo. Later: pass the stored photo URL. --}}
<img src="{{ asset('images/student-photo.svg') }}" alt="Submitted student photo" {{ $attributes->class([$class, 'shrink-0 rounded-lg border border-gray-200 bg-white object-cover']) }}>
