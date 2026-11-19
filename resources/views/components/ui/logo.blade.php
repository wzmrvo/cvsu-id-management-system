@props(['class' => 'h-10 w-10'])
{{-- Replace public/images/cvsu-logo.png with the official CvSU logo supplied by the client. --}}
<img src="{{ asset('images/cvsu-logo.png') }}" alt="Cavite State University logo" {{ $attributes->class([$class, 'shrink-0 object-contain']) }}>
