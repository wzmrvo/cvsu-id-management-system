@php $isNew = $isNew ?? false; @endphp
<x-layouts.portal role="admin" active="users" :title="$isNew ? 'Add a user account' : 'Manage account access'">
    <x-ui.page-header :title="$isNew ? 'Add a user account' : 'Manage account access'" subtitle="Assign only the access needed for the person's responsibilities."
        :crumbs="[['System administration', '/admin'], ['User accounts', '/admin/users'], [$isNew ? 'Add account' : 'Edit account', null]]" />
    <x-ui.card class="max-w-2xl">
        <form class="space-y-4" onsubmit="return false">
            <x-ui.field label="Full name *" name="name" :value="$isNew ? 'Daniel R. Mercado' : 'Mario L. Reyes'" />
            <x-ui.field label="CvSU email address *" name="email" type="email" :value="$isNew ? 'daniel.mercado@cvsu.edu.ph' : 'mario.reyes@cvsu.edu.ph'" />
            <x-ui.select label="Role *" name="role" :options="['Student', 'Registrar / ID Personnel', 'System Administrator']" selected="Registrar / ID Personnel" />
            <x-ui.select label="Account status *" name="status" :options="['Active', 'Inactive']" selected="Active" />
            <p class="text-xs text-gray-500">{{ $isNew ? 'A setup link will be sent to the new CvSU email.' : 'Role changes are recorded in the activity log.' }}</p>
            <div class="flex justify-between gap-3 pt-2">
                <x-ui.button variant="outline" href="{{ url('/admin/users') }}">Cancel</x-ui.button>
                <x-ui.button href="{{ url('/admin/users?saved=' . ($isNew ? 'created' : 'updated')) }}" busy>{{ $isNew ? 'Create account' : 'Save changes' }}</x-ui.button>
            </div>
        </form>
    </x-ui.card>
</x-layouts.portal>
