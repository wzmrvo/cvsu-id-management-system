<x-layouts.auth title="Sign in">
    <h1 class="text-2xl font-semibold tracking-tight">Welcome back, Kabsu!</h1>
    <p class="mt-1 text-sm text-gray-500">Sign in to manage your student ID application.</p>

    <form class="mt-8 space-y-4" onsubmit="return false">
        <x-ui.field label="CvSU email address" name="email" type="email" autocomplete="email" placeholder="juanmiguel.santos@cvsu.edu.ph" />
        <x-ui.field label="Password" name="password" type="password" autocomplete="current-password" placeholder="Enter your password" />
        <div class="flex items-center justify-between text-sm">
            <label class="flex items-center gap-2 text-gray-600"><input type="checkbox" class="rounded border-gray-300 text-cvsu-green focus:ring-cvsu-green"> Keep me signed in</label>
            <a href="{{ url('/forgot-password') }}" class="font-medium text-cvsu-green hover:underline">Forgot password?</a>
        </div>
        <x-ui.button href="{{ url('/student/dashboard') }}" class="w-full" busy>Sign in</x-ui.button>
    </form>

    <p class="mt-6 text-center text-sm text-gray-600">New to the portal? <a href="{{ url('/create-account') }}" class="font-semibold text-cvsu-green hover:underline">Create account</a></p>

    <div class="mt-8 rounded-lg border border-dashed border-gray-300 p-4">
        <p class="text-[11px] font-semibold uppercase tracking-wider text-gray-500">Prototype quick access</p>
        <p class="mt-1 text-xs text-gray-500">Removed once real login and roles are connected.</p>
        <div class="mt-3 grid gap-2 sm:grid-cols-2">
            <x-ui.button variant="outline" size="sm" href="{{ url('/registrar') }}">Registrar / ID Personnel</x-ui.button>
            <x-ui.button variant="outline" size="sm" href="{{ url('/admin') }}">System Administrator</x-ui.button>
        </div>
    </div>
</x-layouts.auth>
