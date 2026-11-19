<x-layouts.portal role="student" active="profile" title="Profile">
    <x-ui.page-header title="Profile and account" subtitle="Your details come from your CvSU student record." :crumbs="[['Dashboard', '/student/dashboard'], ['Profile', null]]" />
    <div class="grid gap-6 lg:grid-cols-3">
        <x-ui.card title="Student information" class="lg:col-span-2">
            <dl class="grid gap-4 text-sm sm:grid-cols-2">
                @foreach([['Full name','Juan Miguel Dela Cruz Santos'],['Student number','2024-10352'],['College','College of Engineering and Information Technology'],['Course · year','BS Information Technology · 3rd year'],['CvSU email','juanmiguel.santos@cvsu.edu.ph'],['Contact number','0917 000 0000']] as [$k, $v])
                    <div><dt class="text-xs text-gray-500">{{ $k }}</dt><dd class="font-medium">{{ $v }}</dd></div>
                @endforeach
            </dl>
            <p class="mt-4 text-xs text-gray-500">Wrong details? Contact the Registrar's Office to update your student record.</p>
        </x-ui.card>
        <x-ui.card title="Notification preferences">
            <div class="space-y-3 text-sm">
                @foreach(['SMS notifications', 'Email notifications'] as $l)
                    <label class="flex items-center justify-between gap-3"><span>{{ $l }}</span><input type="checkbox" checked class="h-4 w-4 rounded border-gray-300 text-cvsu-green focus:ring-cvsu-green"></label>
                @endforeach
            </div>
        </x-ui.card>
        <x-ui.card title="Change password" class="lg:col-span-3">
            <form class="grid max-w-3xl gap-4 sm:grid-cols-3" onsubmit="return false">
                <x-ui.field label="Current password" name="current" type="password" />
                <x-ui.field label="New password" name="new" type="password" />
                <x-ui.field label="Confirm new password" name="confirm" type="password" />
                <div class="sm:col-span-3"><x-ui.button x-data x-on:click="$dispatch('toast', { message: 'Prototype only · password not changed.', type: 'info' })">Update password</x-ui.button></div>
            </form>
        </x-ui.card>
    </div>
</x-layouts.portal>
