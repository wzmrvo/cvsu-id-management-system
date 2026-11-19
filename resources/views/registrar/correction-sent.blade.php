<x-layouts.portal role="registrar" active="verification" title="Correction request sent">
    <x-ui.page-header eyebrow="Registrar · First verification" title="Correction request sent" />
    <x-ui.card class="max-w-3xl">
        <x-ui.alert variant="success" title="Student notified">Juan Miguel Dela Cruz Santos · CVSU-ID-2026-00418</x-ui.alert>
        <p class="mt-4 text-sm"><span class="text-gray-500">Status:</span> <x-ui.badge status="correction" /></p>
        <p class="mt-3 text-sm text-gray-600">Please upload a new 1x1 photo wearing your CvSU uniform against a plain white background. Make sure your face is centered and evenly lit.</p>
        <x-ui.button class="mt-6" href="{{ url('/registrar') }}">Back to verification queue</x-ui.button>
    </x-ui.card>
</x-layouts.portal>
