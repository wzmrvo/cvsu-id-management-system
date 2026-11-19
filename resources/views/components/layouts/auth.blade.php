@props(['title' => 'Sign in'])
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }} | CvSU Student ID Portal</title>
    <link rel="icon" href="{{ asset('images/cvsu-logo.svg') }}">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        @keyframes cvsu-rise { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: none; } }
        .cvsu-rise { animation: cvsu-rise .6s ease-out both; }
        .cvsu-rise-2 { animation-delay: .12s; }

        /* two campus photos crossfade (16s loop) */
        @keyframes cvsu-fade { 0%, 42% { opacity: 1; } 50%, 92% { opacity: 0; } 100% { opacity: 1; } }
        .cvsu-slide { animation: cvsu-fade 16s ease-in-out infinite; }
        .cvsu-slide-b { animation-delay: -8s; }
        @media (prefers-reduced-motion: reduce) {
            .cvsu-slide { animation: none; }
            .cvsu-slide-b { display: none; }
        }
    </style>
</head>
<body class="bg-white font-sans text-cvsu-ink antialiased">
<a href="#main" class="sr-only focus:not-sr-only focus:absolute focus:left-3 focus:top-3 focus:z-50 focus:rounded-md focus:bg-white focus:px-3 focus:py-2">Skip to content</a>

{{-- photo takes all remaining width, form side is a fixed 30rem (480px) --}}
<div class="min-h-screen lg:grid lg:grid-cols-[minmax(0,3fr)_minmax(0,2fr)]">

    {{-- Mobile banner --}}
    <header class="relative h-44 overflow-hidden border-b-4 border-cvsu-gold bg-cvsu-green-dark lg:hidden">
        <img src="{{ asset('images/layatdiwa-monument.jpg') }}" alt="" class="cvsu-slide absolute inset-0 h-full w-full object-cover object-[50%_62%]" style="filter: saturate(.6) contrast(1.05)">
        <img src="{{ asset('images/i-love-cvsu.jpg') }}" alt="" class="cvsu-slide cvsu-slide-b absolute inset-0 h-full w-full object-cover object-[50%_40%]" style="filter: saturate(.65) contrast(1.05)">
        <div class="absolute inset-0" style="background: rgba(0,107,63,.34)"></div>
        <div class="absolute inset-0" style="background: linear-gradient(to bottom, rgba(0,77,43,.30), rgba(0,77,43,.90))"></div>
        <div class="relative flex h-full items-end gap-3 p-5 text-white">
            <x-ui.logo class="h-11 w-11 rounded-full bg-white p-0.5 ring-2 ring-cvsu-gold" />
            <div class="leading-tight">
                <p class="text-sm font-semibold">Cavite State University</p>
                <p class="text-xs text-cvsu-gold">Student ID Portal</p>
            </div>
        </div>
    </header>

    {{-- Campus hero (desktop) --}}
    <aside class="relative hidden overflow-hidden bg-cvsu-green-dark text-white lg:block">
        <img src="{{ asset('images/layatdiwa-monument.jpg') }}"
             alt="The Laya't Diwa monument at the CvSU Main Campus, surrounded by flags"
             class="cvsu-slide absolute inset-0 h-full w-full object-cover object-[52%_center]"
             style="filter: saturate(.6) contrast(1.05)" fetchpriority="high" decoding="async">
        <img src="{{ asset('images/i-love-cvsu.jpg') }}"
             alt="The I Love CvSU sign in front of the Laya't Diwa monument"
             class="cvsu-slide cvsu-slide-b absolute inset-0 h-full w-full object-cover object-[50%_45%]"
             style="filter: saturate(.65) contrast(1.05)" decoding="async">
        {{-- lighter green tint so the campus stays bright --}}
        <div class="absolute inset-0" style="background: rgba(0,107,63,.32)"></div>
        {{-- top and bottom gradient protects the text, the middle stays clear --}}
        <div class="absolute inset-0" style="background: linear-gradient(to bottom, rgba(0,77,43,.88) 0%, rgba(0,77,43,.50) 26%, rgba(0,77,43,.08) 46%, rgba(0,77,43,.05) 66%, rgba(0,77,43,.78) 86%, rgba(0,77,43,.93) 100%)"></div>
        {{-- right edge dissolves into the white form side --}}
        <div class="absolute inset-y-0 right-0 w-44" style="background: linear-gradient(to right, rgba(255,255,255,0) 0%, rgba(255,255,255,.10) 25%, rgba(255,255,255,.40) 55%, rgba(255,255,255,.80) 82%, #FFFFFF 100%)"></div>

        <div class="relative flex min-h-screen flex-col justify-between p-12 pr-32 xl:p-16 xl:pr-36">
            <div class="cvsu-rise">
                <div class="flex items-center gap-3">
                    <x-ui.logo class="h-12 w-12 rounded-full bg-white p-0.5 ring-2 ring-cvsu-gold" />
                    <div class="leading-tight">
                        <p class="text-sm font-semibold">Cavite State University</p>
                        <p class="text-xs font-medium text-cvsu-gold">Student ID Portal</p>
                    </div>
                </div>
                <div class="mt-14 h-1 w-14 rounded-full bg-cvsu-gold"></div>
                <h2 class="mt-5 max-w-xl text-4xl font-semibold leading-tight tracking-tight xl:text-5xl">Your identity.<br><span class="text-cvsu-gold">Your next chapter.</span></h2>
                <p class="mt-4 max-w-md text-base text-white/85">A simpler, more secure way to apply for your student ID.</p>
            </div>

            <div class="cvsu-rise cvsu-rise-2">
                <ul class="grid max-w-2xl grid-cols-3 gap-6 border-t border-cvsu-gold/50 pt-5 text-sm">
                    @foreach([['Apply online','Details, documents and photo.'],['Get notified','Track every step.'],['Claim with confidence','Schedule and reference number.']] as $i => [$t, $d])
                        <li>
                            <span class="inline-flex h-6 w-6 items-center justify-center rounded-full border border-cvsu-gold text-[11px] font-semibold text-cvsu-gold">{{ $i + 1 }}</span>
                            <p class="mt-2 font-semibold leading-snug">{{ $t }}</p>
                            <p class="mt-0.5 text-[13px] leading-snug text-white/75">{{ $d }}</p>
                        </li>
                    @endforeach
                </ul>
                
            </div>
        </div>
    </aside>

    {{-- Form side: white at the seam, a faint tint toward the edge --}}
    <main id="main" class="relative flex min-h-[calc(100vh-11rem)] flex-col overflow-hidden px-6 py-8 lg:min-h-screen lg:px-8"
          style="background: linear-gradient(to right, #FFFFFF 0%, #FFFFFF 25%, #F3F8F5 100%)">
        {{-- gold glow (top right) and green glow (bottom) --}}
        <div class="pointer-events-none absolute -right-20 -top-20 h-80 w-80 rounded-full" style="background: radial-gradient(circle, rgba(214,169,40,.26), transparent 65%)"></div>
        <div class="pointer-events-none absolute -bottom-32 -right-10 h-80 w-80 rounded-full" style="background: radial-gradient(circle, rgba(0,107,63,.12), transparent 65%)"></div>

        <div class="relative mx-auto flex w-full max-w-md flex-1 flex-col justify-center py-8 cvsu-rise cvsu-rise-2">
            <div class="overflow-hidden rounded-2xl bg-white shadow-xl shadow-green-900/10 ring-1 ring-black/5">
                <div class="h-1.5" style="background: linear-gradient(90deg, #D6A928, #F0D27A 50%, #D6A928)"></div>
                <div class="p-7 sm:p-8">{{ $slot }}</div>
            </div>
        </div>
        <p class="relative flex items-center justify-center gap-2 text-center text-[11px] leading-snug text-gray-500">
            <span class="h-1.5 w-1.5 shrink-0 rounded-full bg-cvsu-gold"></span>
            Web-Based Student ID Application and Information Verification System · Cavite State University
        </p>
    </main>
</div>
<x-ui.toasts />
</body>
</html>