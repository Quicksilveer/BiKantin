{{--
    KOTAK PESAN (berhasil / error)
    Cara pakai:
        <x-alert type="success">Data berhasil disimpan.</x-alert>
        <x-alert type="error">Terjadi kesalahan.</x-alert>

    Warna diatur di resources/css/app.css (--color-success dan --color-danger).
--}}
@props(['type' => 'success'])

@php
    $gaya = $type === 'error'
        ? 'border-danger/30 bg-danger-soft text-danger'
        : 'border-success/30 bg-success-soft text-success';
@endphp

<div role="{{ $type === 'error' ? 'alert' : 'status' }}" {{ $attributes->merge(['class' => "rounded-control border px-4 py-3 text-sm {$gaya}"]) }}>
    {{ $slot }}
</div>
