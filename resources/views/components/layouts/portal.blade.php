@props(['role' => 'student', 'active' => null, 'title' => 'Portal'])
@php
    // [label, short label (mobile tab), url, icon, show in mobile tabs]
    $navs = [
        'student' => [
            'dashboard' => ['Dashboard', 'Home', '/student/dashboard', 'dashboard', true],
            'application' => ['ID application', 'Apply', '/student/application', 'file', true],
            'status' => ['My application', 'Status', '/student/status', 'clipboard', false],
            'schedule' => ['Claiming schedule', 'Schedule', '/student/schedule', 'calendar', true],
            'notifications' => ['Notifications', 'Updates', '/student/notifications', 'bell', true],
            'profile' => ['Profile', 'Profile', '/student/profile', 'user', false],
        ],
        'registrar' => [
            'overview' => ['Overview', 'Overview', '/registrar', 'dashboard', false],
            'verification' => ['First verification', 'Verify', '/registrar/verification', 'file', false],
            'schedule' => ['Claiming schedule', 'Schedule', '/registrar/schedule', 'calendar', false],
            'claiming' => ['Claiming day', 'Claiming', '/registrar/claiming', 'shield', false],
            'noshows' => ['No-shows & reschedules', 'No-shows', '/registrar/no-shows', 'user-x', false],
            'records' => ['Records', 'Records', '/registrar/records', 'folder', false],
        ],
        'admin' => [
            'dashboard' => ['Dashboard', 'Home', '/admin', 'dashboard', false],
            'users' => ['User accounts', 'Users', '/admin/users', 'users', false],
            'roles' => ['Roles & permissions', 'Roles', '/admin/roles', 'lock', false],
            'reports' => ['Reports & exports', 'Reports', '/admin/reports', 'chart', false],
            'activity' => ['Activity log', 'Activity', '/admin/activity', 'clock', false],
            'settings' => ['Settings', 'Settings', '/admin/settings', 'settings', false],
        ],
    ];
    $people = [
        'student' => ['Juan Miguel Santos', 'Student · 2024-10352', '/student/profile'],
        'registrar' => ['Mario L. Reyes', 'Registrar / ID Personnel', '/registrar'],
        'admin' => ['Andrea B. Cruz', 'System administrator', '/admin/settings'],
    ];
    $workspaces = ['student' => 'Student workspace', 'registrar' => 'Registrar workspace', 'admin' => 'System administration'];
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
<a href="#main" class="sr-only focus:not-sr-only focus:absolute focus:left-3 focus:top-3 focus:z-50 focus:rounded-md focus:bg-white focus:px-3 focus:py-2">Skip to content</a>
<div class="min-h-screen md:flex"
     x-data="{ open: false, collapsed: (() => { try { return localStorage.getItem('cvsu-sidebar') === '1' } catch (e) { return false } })() }"
     x-init="$watch('collapsed', v => { try { localStorage.setItem('cvsu-sidebar', v ? '1' : '0') } catch (e) {} })">

    <div x-show="open" x-cloak x-on:click="open = false" class="fixed inset-0 z-30 bg-slate-900/50 md:hidden" x-transition.opacity></div>

    {{-- Sidebar --}}
    <aside class="fixed inset-y-0 left-0 z-40 flex w-64 flex-col bg-cvsu-green text-white transition-all duration-200 md:sticky md:top-0 md:h-screen md:translate-x-0"
           :class="[open ? 'translate-x-0' : '-translate-x-full', collapsed ? 'md:w-[72px]' : 'md:w-64']">
        <div class="flex items-center gap-3 border-b border-white/10 px-4 py-4" :class="collapsed && 'md:justify-center'">
            <x-ui.logo class="h-10 w-10 rounded-full bg-white p-0.5" />
            <div class="min-w-0 leading-tight" :class="collapsed && 'md:hidden'">
                <p class="truncate text-sm font-semibold">Cavite State University</p>
                <p class="text-[11px] text-cvsu-gold">Student ID Portal</p>
            </div>
        </div>

        <nav class="flex-1 space-y-0.5 overflow-y-auto px-3 py-4 text-sm" aria-label="Main">
            @foreach($nav as $key => [$label, $short, $href, $icon, $tab])
                <a href="{{ url($href) }}" title="{{ $label }}" @if($active === $key) aria-current="page" @endif
                   @class([
                       'relative flex items-center gap-3 rounded-lg px-3 py-2.5 transition',
                       'bg-white/15 font-semibold text-white' => $active === $key,
                       'text-white/80 hover:bg-white/10 hover:text-white' => $active !== $key,
                   ]) :class="collapsed && 'md:justify-center md:px-0'">
                    @if($active === $key)<span class="absolute left-0 top-2 h-6 w-1 rounded-r bg-cvsu-gold"></span>@endif
                    <x-ui.icon :name="$icon" class="h-[18px] w-[18px]" />
                    <span :class="collapsed && 'md:hidden'">{{ $label }}</span>
                </a>
            @endforeach
        </nav>

        <div class="border-t border-white/10 p-3 text-xs" :class="collapsed && 'md:hidden'">
            <p class="px-1 font-medium">Need assistance?</p>
            <p class="px-1 text-white/65">registrar@cvsu.edu.ph · Indang, Cavite</p>
        </div>
        <div class="border-t border-white/10 p-3">
            <a href="{{ url('/sign-in') }}" title="Sign out" class="flex items-center gap-3 rounded-lg px-3 py-2 text-sm text-white/80 transition hover:bg-white/10 hover:text-white" :class="collapsed && 'md:justify-center md:px-0'">
                <x-ui.icon name="logout" class="h-[18px] w-[18px]" /><span :class="collapsed && 'md:hidden'">Sign out</span>
            </a>
        </div>
    </aside>

    <div class="flex min-w-0 flex-1 flex-col">
        <header class="sticky top-0 z-20 flex h-14 items-center gap-2 border-b border-gray-200 bg-white px-3 md:px-6">
            <button type="button" class="rounded-lg p-2 text-gray-600 hover:bg-gray-100 md:hidden" x-on:click="open = true" aria-label="Open menu"><x-ui.icon name="menu" class="h-5 w-5" /></button>
            <button type="button" class="hidden rounded-lg p-2 text-gray-500 hover:bg-gray-100 md:block" x-on:click="collapsed = !collapsed" aria-label="Collapse sidebar"><x-ui.icon name="panel" class="h-5 w-5" /></button>
            <p class="truncate text-sm text-gray-500"><span class="hidden sm:inline">CvSU / </span><span class="font-medium text-cvsu-ink">{{ $workspaces[$role] }}</span></p>

            <div class="ml-auto flex items-center gap-1 sm:gap-2">
                <span class="hidden rounded-full bg-cvsu-green-50 px-3 py-1 text-xs font-medium text-cvsu-green lg:inline">Academic year 2026-2027</span>

                {{-- Notifications --}}
                <div class="relative" x-data="{ o: false }" x-on:click.outside="o = false" x-on:keydown.escape.window="o = false">
                    <button type="button" class="relative rounded-lg p-2 text-gray-600 hover:bg-gray-100" x-on:click="o = !o" aria-label="Notifications" :aria-expanded="o">
                        <x-ui.icon name="bell" class="h-5 w-5" /><span class="absolute right-1.5 top-1.5 h-2 w-2 rounded-full bg-cvsu-gold ring-2 ring-white"></span>
                    </button>
                    <div x-show="o" x-cloak x-transition class="absolute right-0 mt-2 w-80 max-w-[calc(100vw-1.5rem)] overflow-hidden rounded-xl border border-gray-200 bg-white shadow-lg">
                        <p class="border-b border-gray-100 px-4 py-3 text-sm font-semibold">Notifications</p>
                        <ul class="divide-y divide-gray-100 text-sm">
                            @foreach([['Claiming schedule confirmed','Nov 24 · Batch AM-02','10:35 AM'],['Application approved','First verification complete','10:20 AM'],['Application received','CVSU-ID-2026-00418','9:42 AM']] as [$t,$d,$tm])
                                <li class="px-4 py-3"><p class="font-medium">{{ $t }}</p><p class="text-xs text-gray-500">{{ $d }} · {{ $tm }}</p></li>
                            @endforeach
                        </ul>
                        <a href="{{ url($role === 'student' ? '/student/notifications' : ($role === 'registrar' ? '/registrar/no-shows' : '/admin/activity')) }}" class="block border-t border-gray-100 px-4 py-2.5 text-center text-xs font-semibold text-cvsu-green hover:bg-gray-50">View all</a>
                    </div>
                </div>

                {{-- Profile --}}
                <div class="relative" x-data="{ o: false }" x-on:click.outside="o = false" x-on:keydown.escape.window="o = false">
                    <button type="button" class="flex items-center gap-2 rounded-lg p-1.5 hover:bg-gray-100" x-on:click="o = !o" :aria-expanded="o">
                        <span class="flex h-8 w-8 items-center justify-center rounded-full bg-cvsu-green text-xs font-semibold text-white">{{ strtoupper(substr($person[0], 0, 1)) }}</span>
                        <span class="hidden text-left text-xs leading-tight sm:block"><span class="block font-semibold">{{ $person[0] }}</span><span class="text-gray-500">{{ $person[1] }}</span></span>
                        <x-ui.icon name="chevron-down" class="hidden h-3.5 w-3.5 text-gray-400 sm:block" />
                    </button>
                    <div x-show="o" x-cloak x-transition class="absolute right-0 mt-2 w-52 overflow-hidden rounded-xl border border-gray-200 bg-white py-1 text-sm shadow-lg">
                        <a href="{{ url($person[2]) }}" class="block px-4 py-2 hover:bg-gray-50">{{ $role === 'student' ? 'Profile' : 'My workspace' }}</a>
                        <a href="{{ url('/sign-in') }}" class="block px-4 py-2 text-red-700 hover:bg-red-50">Sign out</a>
                    </div>
                </div>
            </div>
        </header>

        <main id="main" @class(['mx-auto w-full max-w-6xl flex-1 px-4 py-6 md:px-6 md:py-8', 'pb-24 md:pb-8' => $role === 'student'])>
            {{ $slot }}
        </main>
        <footer class="border-t border-gray-200 bg-white px-6 py-3 text-center text-[11px] text-gray-400 @if($role === 'student') mb-14 md:mb-0 @endif">
            Prototype with sample data · &copy; {{ date('Y') }} Cavite State University
        </footer>
    </div>

    @if($role === 'student')
        <nav class="fixed inset-x-0 bottom-0 z-20 grid grid-cols-4 border-t border-gray-200 bg-white md:hidden" aria-label="Quick navigation">
            @foreach(array_filter($nav, fn ($n) => $n[4]) as $key => [$label, $short, $href, $icon, $tab])
                <a href="{{ url($href) }}" @class(['flex flex-col items-center gap-1 py-2.5 text-[11px]', 'font-semibold text-cvsu-green' => $active === $key, 'text-gray-500' => $active !== $key])>
                    <x-ui.icon :name="$icon" class="h-5 w-5" />{{ $short }}
                </a>
            @endforeach
        </nav>
    @endif
</div>
<x-ui.toasts />
</body>
</html>
