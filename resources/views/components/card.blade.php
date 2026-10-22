{{--
    KOTAK PUTIH
    <x-card>Isi di sini</x-card>
--}}
<div {{ $attributes->merge(['class' => 'border border-gray-300 bg-white p-4']) }}>
    {{ $slot }}
</div>
