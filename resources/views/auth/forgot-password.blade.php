<x-layouts.auth title="Forgot password">
    <h1 class="text-2xl font-semibold tracking-tight">Reset your password</h1>
    <p class="mt-1 text-sm text-gray-500">Enter your CvSU email and we'll send you a reset link.</p>
    <form class="mt-8 space-y-4" onsubmit="return false">
        <x-ui.field label="CvSU email address" name="email" type="email" placeholder="juanmiguel.santos@cvsu.edu.ph" />
        <x-ui.button class="w-full" x-data x-on:click="$dispatch('toast', { message: 'Prototype only · no email is sent yet.', type: 'info' })">Send reset link</x-ui.button>
    </form>
    <p class="mt-6 text-center text-sm"><a href="{{ url('/sign-in') }}" class="font-semibold text-cvsu-green hover:underline">← Back to sign in</a></p>
</x-layouts.auth>
