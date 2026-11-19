{{-- QR placeholder. Later: generate a real QR for the claiming reference (e.g. simplesoftwareio/simple-qrcode) --}}
@props(['class' => 'h-36 w-36'])
<div {{ $attributes->class([$class, 'flex flex-col items-center justify-center rounded-xl border-2 border-dashed border-cvsu-green/40 bg-cvsu-green-50 text-center text-xs text-cvsu-green']) }}>
    <span class="text-2xl font-bold">QR</span>
    <span>Staff will scan this</span>
</div>
