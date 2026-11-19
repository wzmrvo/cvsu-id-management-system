<x-layouts.auth title="Create account">
    <h1 class="text-2xl font-bold tracking-tight">Create your student account</h1>
    <p class="mt-1 text-sm text-gray-500">Use the details on your official CvSU student record.</p>

    <form class="mt-8 space-y-4" onsubmit="return false">
        <x-ui.field label="Student number" name="student_number" placeholder="2024-10352" />
        <x-ui.field label="Full name" name="name" placeholder="Juan Miguel Dela Cruz Santos" />
        <x-ui.field label="CvSU email address" name="email" type="email" placeholder="juanmiguel.santos@cvsu.edu.ph" />
        <x-ui.field label="Password" name="password" type="password" placeholder="••••••••" hint="At least 8 characters." />
        <x-ui.field label="Confirm password" name="password_confirmation" type="password" placeholder="••••••••" />
        <label class="flex items-start gap-2 text-xs text-gray-600">
            <input type="checkbox" class="mt-0.5 rounded border-gray-300 text-cvsu-green focus:ring-cvsu-green">
            I agree to the Terms of Use and the Data Privacy Notice of Cavite State University.
        </label>
        <x-ui.button href="{{ url('/student/dashboard') }}" class="w-full">Create account →</x-ui.button>
    </form>

    <p class="mt-6 text-center text-sm text-gray-600">Already have an account?
        <a href="{{ url('/sign-in') }}" class="font-semibold text-cvsu-green hover:underline">Sign in</a>
    </p>
</x-layouts.auth>
