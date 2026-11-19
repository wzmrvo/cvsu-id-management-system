@props(['role' => 'student', 'active' => null, 'title' => 'Portal'])
@php
    $navs = [
        'student' => [
            'dashboard'     => ['Dashboard', 'Home', '/student/dashboard', 'home'],
            'application'   => ['ID application', 'Apply', '/student/application', 'doc'],
            'schedule'      => ['Claiming schedule', 'Schedule', '/student/schedule', 'cal'],
            'notifications' => ['Notifications', 'Updates', '/student/notifications', 'bell'],
        ],
        'registrar' => [
            'overview'     => ['Overview', 'Overview', '/registrar', 'home'],
            'verification' => ['First verification', 'Verify', '/registrar/verification', 'doc'],
            'schedule'     => ['Claiming schedule', 'Schedule', '/registrar/schedule', 'cal'],
            'claiming'     => ['Claiming day', 'Claiming', '/registrar/claiming', 'shield'],
        ],
        'admin' => [
            'users'    => ['User accounts', 'Users', '/admin/users', 'users'],
            'reports'  => ['Reports & exports', 'Reports', '/admin/reports', 'chart'],
            'activity' => ['Activity log', 'Activity', '/admin/activity', 'clock'],
        ],
    ];
    $people = [
        'student'   => ['Juan Miguel Santos', 'Student · 2024-10352'],
        'registrar' => ['Mario L. Reyes', 'Registrar / ID Personnel'],
        'admin'     => ['Andrea B. Cruz', 'System administrator'],
    ];
    $workspaces = ['student' => 'Student workspace', 'registrar' => 'Registrar workspace', 'admin' => 'System administration'];
    $icons = [
        'home'   => 'M2.25 12l8.954-8.955a1.126 1.126 0 011.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25',
        'doc'    => 'M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z',
        'cal'    => 'M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5',
        'bell'   => 'M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0',
        'users'  => 'M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z',
        'chart'  => 'M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z',
        'shield' => 'M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z',
        'clock'  => 'M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z',
    ];
    $nav = $navs[$role];
    $person = $people[$role];
@endphp
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
<body class="bg-cvsu-bg font-sans text-cvsu-ink antialiased">
<div class="min-h-screen md:flex" x-data="{ open: false }">

    <div x-show="open" x-cloak @click="open = false" class="fixed inset-0 z-30 bg-black/50 md:hidden"></div>

    {{-- Sidebar (30% dark green) --}}
    <aside :class="open ? 'translate-x-0' : '-translate-x-full'"
           class="fixed inset-y-0 left-0 z-40 flex w-64 flex-col bg-cvsu-green text-white transition-transform md:sticky md:top-0 md:h-screen md:translate-x-0">
        <div class="h-1 bg-cvsu-gold"></div>
        <div class="flex items-center gap-3 border-b border-white/10 px-5 py-5">
            <x-ui.logo class="h-11 w-11" />
            <div class="leading-tight">
                <p class="text-[10px] font-semibold uppercase tracking-widest text-cvsu-gold">Student ID Portal</p>
                <p class="text-sm font-semibold">Cavite State University</p>
            </div>
        </div>

        <nav class="flex-1 space-y-1 overflow-y-auto px-3 py-4 text-sm">
            @foreach($nav as $key => [$label, $short, $href, $icon])
                <a href="{{ url($href) }}" @class([
                    'flex items-center gap-3 rounded-lg px-3 py-2.5 transition',
                    'bg-white/15 font-semibold text-white' => $active === $key,
                    'text-white/80 hover:bg-white/10 hover:text-white' => $active !== $key,
                ])>
                    <svg class="h-4 w-4 shrink-0 {{ $active === $key ? 'text-cvsu-gold' : '' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $icons[$icon] }}"/></svg>
                    {{ $label }}
                </a>
            @endforeach
        </nav>

        <div class="space-y-3 border-t border-white/10 p-5 text-xs">
            <div>
                <p class="font-semibold">Need assistance?</p>
                <p class="text-white/70">registrar@cvsu.edu.ph</p>
                <p class="text-white/70">Main Campus · Indang, Cavite</p>
            </div>
            <a href="{{ url('/sign-in') }}" class="inline-block font-medium text-white/90 underline-offset-4 hover:underline">Sign out</a>
        </div>
    </aside>

    <div class="flex min-w-0 flex-1 flex-col">
        {{-- Top bar (white) --}}
        <header class="sticky top-0 z-20 flex h-14 items-center gap-3 border-b border-gray-200 bg-white px-4 md:px-8">
            <button class="rounded-lg p-1.5 hover:bg-gray-100 md:hidden" @click="open = true" aria-label="Open menu">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" d="M4 6h16M4 12h16M4 18h16"/></svg>
            </button>
            <x-ui.logo class="h-8 w-8 md:hidden" />
            <p class="text-sm text-gray-500"><span class="hidden md:inline">CvSU / </span><span class="font-medium text-cvsu-ink">{{ $workspaces[$role] }}</span></p>
            <div class="ml-auto flex items-center gap-4">
                <span class="hidden rounded-full bg-cvsu-green-50 px-3 py-1 text-xs font-medium text-cvsu-green sm:inline">Academic year 2026-2027</span>
                <div class="flex items-center gap-2">
                    <span class="flex h-8 w-8 items-center justify-center rounded-full bg-cvsu-gold text-xs font-bold text-cvsu-ink">{{ strtoupper(substr($person[0], 0, 1)) }}</span>
                    <div class="hidden text-xs leading-tight sm:block">
                        <p class="font-semibold">{{ $person[0] }}</p>
                        <p class="text-gray-500">{{ $person[1] }}</p>
                    </div>
                </div>
            </div>
        </header>

        <main @class(['mx-auto w-full max-w-6xl flex-1 px-4 py-6 md:px-8 md:py-8', 'pb-24 md:pb-8' => $role === 'student'])>
            {{ $slot }}
        </main>
    </div>

    {{-- Student mobile bottom tabs --}}
    @if($role === 'student')
        <nav class="fixed inset-x-0 bottom-0 z-20 grid grid-cols-4 border-t border-gray-200 bg-white md:hidden">
            @foreach($nav as $key => [$label, $short, $href, $icon])
                <a href="{{ url($href) }}" @class(['flex flex-col items-center gap-1 py-2.5 text-[11px]', 'font-semibold text-cvsu-green' => $active === $key, 'text-gray-500' => $active !== $key])>
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $icons[$icon] }}"/></svg>
                    {{ $short }}
                </a>
            @endforeach
        </nav>
    @endif
</div>
</body>
</html>
