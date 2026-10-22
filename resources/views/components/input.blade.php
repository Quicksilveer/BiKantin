{{--
    KOLOM INPUT + LABEL + PESAN ERROR
    <x-input name="nama_menu" label="Nama Menu" />
    <x-input name="harga" label="Harga" type="number" />
--}}
@props(['name', 'label', 'type' => 'text'])

<div class="mb-3">
    <label for="{{ $name }}" class="block text-sm">{{ $label }}</label>
    <input id="{{ $name }}" name="{{ $name }}" type="{{ $type }}"
        @if ($type !== 'password') value="{{ old($name) }}" @endif
        {{ $attributes->merge(['class' => 'w-full border border-gray-400 px-2 py-1']) }}>
    @error($name)
        <p class="text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>
