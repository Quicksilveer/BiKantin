{{--
    KOLOM INPUT + LABEL + PESAN ERROR
    Cara pakai:
        <x-input name="username" label="Username" />
        <x-input name="password" label="Password" type="password" />

    Atribut lain (required, autofocus, placeholder, dll) bisa langsung ditambahkan:
        <x-input name="username" label="Username" placeholder="contoh: budi_siswa" required />

    Pesan error validasi otomatis muncul di bawah kolom.
--}}
@props(['name', 'label', 'type' => 'text'])

<div class="flex flex-col gap-1">
    <label for="{{ $name }}" class="text-sm font-medium text-ink">{{ $label }}</label>

    <input
        id="{{ $name }}"
        name="{{ $name }}"
        type="{{ $type }}"
        {{-- Isi lama dikembalikan saat ada error, kecuali untuk password --}}
        @if ($type !== 'password') value="{{ old($name) }}" @endif
        {{ $attributes->merge(['class' => 'rounded-control border border-line-strong bg-surface px-3 py-2 text-ink focus:border-primary focus:ring-2 focus:ring-primary-soft focus:outline-none']) }}
    >

    @error($name)
        <p class="text-sm text-danger">{{ $message }}</p>
    @enderror
</div>
