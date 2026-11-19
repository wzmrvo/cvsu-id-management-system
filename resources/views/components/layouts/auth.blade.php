@props(['title' => 'Sign in'])
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }} | CvSU Student ID Portal</title>
    <link rel="icon" href="{{ asset('images/cvsu-logo.png') }}">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white font-sans text-cvsu-ink antialiased">
<a href="#main" class="sr-only focus:not-sr-only focus:absolute focus:left-3 focus:top-3 focus:rounded-md focus:bg-white focus:px-3 focus:py-2">Skip to content</a>
<div class="min-h-screen lg:grid lg:grid-cols-[minmax(0,5fr)_minmax(0,6fr)]">

    <aside class="relative hidden flex-col justify-between overflow-hidden bg-cvsu-green-dark p-12 text-white lg:flex">
        <div class="absolute inset-0 opacity-[0.07]" style="background-image: radial-gradient(circle at 1px 1px, #fff 1px, transparent 0); background-size: 22px 22px"></div>
        <div class="relative flex items-center gap-3">
            <x-ui.logo class="h-12 w-12" />
            <div class="leading-tight"><p class="text-sm font-semibold">Cavite State University</p><p class="text-xs text-white/70">Student ID Portal</p></div>
        </div>
        <div class="relative">
            <div class="mb-5 h-0.5 w-12 bg-cvsu-gold"></div>
            <h2 class="text-3xl font-semibold leading-tight tracking-tight">Your identity.<br>Your next chapter.</h2>
            <p class="mt-3 max-w-sm text-sm text-white/75">A simpler, more secure way to apply for your student ID.</p>
            <ul class="mt-10 max-w-sm space-y-5 text-sm">
                @foreach([['Apply online','Submit your details, documents, and photo.'],['Get notified','Track your application at every step.'],['Claim with confidence','Receive your schedule and reference number.']] as $i => [$t, $d])
                    <li class="flex gap-4 border-t border-white/15 pt-4">
                        <span class="text-xs font-semibold text-cvsu-gold">0{{ $i + 1 }}</span>
                        <div><p class="font-medium">{{ $t }}</p><p class="text-white/65">{{ $d }}</p></div>
                    </li>
                @endforeach
            </ul>
        </div>
        <p class="relative text-xs text-white/55">Academic Year 2026-2027</p>
    </aside>

    <main id="main" class="flex min-h-screen flex-col px-6 py-8 sm:px-12">
        <div class="flex items-center gap-2 text-sm font-medium text-gray-600 lg:invisible"><x-ui.logo class="h-7 w-7" /> CvSU Student ID Portal</div>
        <div class="mx-auto flex w-full max-w-sm flex-1 flex-col justify-center py-10">{{ $slot }}</div>
        <p class="text-center text-[11px] text-gray-400">Web-Based Student ID Application and Information Verification System · Cavite State University</p>
    </main>
</div>
<x-ui.toasts />
</body>
</html>
