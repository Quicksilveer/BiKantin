{{--
    KOTAK PESAN
    <x-alert type="success">Berhasil disimpan.</x-alert>
    <x-alert type="error">Terjadi kesalahan.</x-alert>
--}}
@props(['type' => 'success'])

<div {{ $attributes->merge(['class' => 'mb-4 border px-3 py-2 text-sm '.($type === 'error' ? 'border-red-400 bg-red-50 text-red-700' : 'border-green-400 bg-green-50 text-green-700')]) }}>
    {{ $slot }}
</div>
