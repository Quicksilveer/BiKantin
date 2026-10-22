{{--
    TOMBOL
    <x-button>Simpan</x-button>
    <x-button variant="outline">Batal</x-button>
--}}
@props(['variant' => 'primary', 'type' => 'submit'])

<button type="{{ $type }}" {{ $attributes->merge(['class' => 'px-4 py-2 '.($variant === 'outline' ? 'border border-gray-400 bg-white hover:bg-gray-100' : 'bg-blue-600 text-white hover:bg-blue-700')]) }}>
    {{ $slot }}
</button>
