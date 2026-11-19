<x-layouts.auth title="Sign in">
    <h1 class="text-2xl font-bold tracking-tight">Welcome back, Kabsuhenyos!</h1>
    <p class="mt-1 text-sm text-gray-500">Sign in to manage your student ID application.</p>

    <form class="mt-8 space-y-4" onsubmit="return false">
        <x-ui.field label="CvSU email address" name="email" type="email" placeholder="juanmiguel.santos@cvsu.edu.ph" />
        <x-ui.field label="Password" name="password" type="password" placeholder="••••••••" />
        <div class="flex items-center justify-between text-sm">
            <label class="flex items-center gap-2 text-gray-600">
                <input type="checkbox" class="rounded border-gray-300 text-cvsu-green focus:ring-cvsu-green"> Keep me signed in
            </label>
            <a href="#" class="font-medium text-cvsu-green hover:underline">Forgot password?</a>
        </div>
        <x-ui.button href="{{ url('/student/dashboard') }}" class="w-full">Sign in →</x-ui.button>
    </form>

    <p class="mt-6 text-center text-sm text-gray-600">New to the portal?
        <a href="{{ url('/create-account') }}" class="font-semibold text-cvsu-green hover:underline">Create account</a>
    </p>

    <div class="mt-8 border-t border-gray-200 pt-6">
        <p class="text-[11px] font-semibold uppercase tracking-widest text-gray-500">Quick access for reviewers</p>
        <div class="mt-3 grid gap-3 sm:grid-cols-2">
            <x-ui.button variant="outline" size="sm" href="{{ url('/registrar') }}">Registrar / ID Personnel</x-ui.button>
            <x-ui.button variant="outline" size="sm" href="{{ url('/admin/users') }}">System Administrator</x-ui.button>
        </div>
    </div>
</x-layouts.auth>
