{{--
    LOGO BI KANTIN
    Dipakai di header dan halaman login.

    Cara pakai:
        <x-logo />             ukuran kecil (header)
        <x-logo size="lg" />   ukuran besar (halaman login)

    Ingin pakai gambar logo sekolah?
    1. Simpan gambarnya di folder public/images, misalnya public/images/logo.png
    2. Ganti isi <span> di bawah dengan:
       <img src="{{ asset('images/logo.png') }}" alt="Logo" class="{{ $ukuran }} object-contain">
--}}
@props(['size' => 'sm'])

@php
    $ukuran = $size === 'lg' ? 'size-12 text-lg' : 'size-8 text-sm';
@endphp

<span {{ $attributes->merge(['class' => "flex shrink-0 items-center justify-center rounded-control bg-primary font-bold text-white {$ukuran}"]) }}>
    BI
</span>
