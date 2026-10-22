{{--
    TOMBOL
    Cara pakai:
        <x-button>Simpan</x-button>                     tombol utama (oranye)
        <x-button variant="outline">Batal</x-button>    tombol bergaris tepi
        <x-button type="button">Klik</x-button>         tombol yang tidak mengirim form

    Warna tombol utama diatur di resources/css/app.css (--color-primary).
--}}
@props(['variant' => 'primary', 'type' => 'submit'])

@php
    $gaya = match ($variant) {
        'outline' => 'border border-line-strong bg-surface text-ink hover:bg-page',
        default => 'bg-primary text-white hover:bg-primary-hover',
    };
@endphp

<button type="{{ $type }}" {{ $attributes->merge(['class' => "rounded-control px-4 py-2 font-medium transition-colors {$gaya}"]) }}>
    {{ $slot }}
</button>
