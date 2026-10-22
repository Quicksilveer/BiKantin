{{--
    KARTU (kotak putih bergaris tepi)
    Cara pakai:
        <x-card>
            Isi kartu di sini
        </x-card>

    Tambah class sendiri bila perlu, misalnya lebar maksimal:
        <x-card class="max-w-sm">...</x-card>
--}}
<div {{ $attributes->merge(['class' => 'rounded-card border border-line bg-surface p-6']) }}>
    {{ $slot }}
</div>
