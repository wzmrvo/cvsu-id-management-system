@props(['class' => 'h-10 w-10'])
{{-- Replace public/images/cvsu-logo.png with the official CvSU logo (or change the file name here) --}}
<img src="{{ asset('images/cvsu-logo.png') }}" alt="CvSU logo" {{ $attributes->class([$class, 'shrink-0 object-contain']) }}>
