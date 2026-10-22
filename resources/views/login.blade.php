{{--
    HALAMAN LOGIN  (alamat: /login)

    Bagian-bagian halaman:
      1. JUDUL : logo, judul, dan kalimat sambutan
      2. FORM  : kolom username, password, dan tombol Masuk

    Komponen yang dipakai (ada di folder resources/views/components):
      <x-layout>  kerangka halaman     -> components/layout.blade.php
      <x-card>    kotak putih          -> components/card.blade.php
      <x-logo>    logo                 -> components/logo.blade.php
      <x-input>   kolom isian + label  -> components/input.blade.php
      <x-button>  tombol               -> components/button.blade.php

    Warna diatur di resources/css/app.css.
--}}
<x-layout title="Masuk - {{ config('app.name') }}">
    <div class="flex min-h-[80vh] items-center justify-center">
        <x-card class="w-full max-w-sm shadow-sm">

            {{-- ===== 1. JUDUL ===== --}}
            <div class="mb-6 flex flex-col items-center gap-2 text-center">
                <x-logo size="lg" />
                <h1 class="text-xl font-semibold">Masuk ke {{ config('app.name') }}</h1>
                <p class="text-sm text-muted">Pesan makanan kantin tanpa antre.</p>
            </div>

            {{-- ===== 2. FORM ===== --}}
            <form method="POST" action="{{ route('login.store') }}" class="flex flex-col gap-4">
                @csrf

                <x-input name="username" label="Username" required autofocus autocomplete="username" />

                <x-input name="password" label="Password" type="password" required autocomplete="current-password" />

                <x-button>Masuk</x-button>
            </form>

        </x-card>
    </div>
</x-layout>
