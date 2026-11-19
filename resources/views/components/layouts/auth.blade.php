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
<div class="min-h-screen lg:grid lg:grid-cols-2">

    {{-- Hero (30% dark green) --}}
    <aside class="hidden flex-col justify-between bg-cvsu-green p-12 text-white lg:flex">
        <div class="flex items-center gap-3">
            <x-ui.logo class="h-12 w-12" />
            <p class="text-[11px] font-semibold uppercase tracking-widest text-white/80">Cavite State University</p>
        </div>
        <div>
            <div class="mb-6 h-1 w-14 bg-cvsu-gold"></div>
            <h2 class="text-4xl font-bold leading-tight tracking-tight">Your identity.<br>Your next chapter.</h2>
            <p class="mt-4 max-w-md text-sm text-white/75">A simpler, more secure way to apply for your student ID.</p>
            <ul class="mt-10 max-w-md space-y-6 text-sm">
                @foreach([['01','Apply online','Submit your details, documents, and photo.'],['02','Get notified','Track your application every step of the way.'],['03','Claim with confidence','Receive your schedule and reference number.']] as [$n,$t,$d])
                    <li class="flex gap-4 border-t border-white/15 pt-4">
                        <span class="text-xs font-bold text-cvsu-gold">{{ $n }}</span>
                        <div><p class="font-semibold">{{ $t }}</p><p class="text-white/70">{{ $d }}</p></div>
                    </li>
                @endforeach
            </ul>
        </div>
        <p class="text-xs text-white/60">From Academic Year 2026-2027 · Kabsu</p>
    </aside>

    {{-- Form side (60% white) --}}
    <main class="flex min-h-screen flex-col px-6 py-8 sm:px-12">
        <div class="flex items-center gap-2 text-sm font-medium text-gray-600">
            <x-ui.logo class="h-7 w-7" /> CvSU Student ID Portal
        </div>
        <div class="mx-auto flex w-full max-w-md flex-1 flex-col justify-center py-10">
            {{ $slot }}
        </div>
        <p class="text-center text-[11px] text-gray-400">Web-Based Student ID Application and Information Verification System · Cavite State University</p>
    </main>
</div>
</body>
</html>
