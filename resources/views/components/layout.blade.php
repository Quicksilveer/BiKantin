{{--
    KERANGKA HALAMAN SETELAH LOGIN
    Dipakai di halaman lain dengan:
        <x-layout title="Judul Tab">
            ...isi halaman...
        </x-layout>

    Isinya: header (nama aplikasi, nama user, tombol Logout), pesan sukses/error, lalu isi halaman.
    Gaya tampilannya ada di public/css/style.css.
--}}
@props(['title' => null])

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? config('app.name') }}</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    {{-- Header --}}
    <div class="header">
        <div class="header-isi">
            <a class="header-judul" href="{{ auth()->user()->dashboardRoute() }}">{{ config('app.name') }}</a>

            <form class="header-user" method="POST" action="{{ route('logout') }}">
                @csrf
                {{ auth()->user()->siswa?->nama ?? auth()->user()->username }} ({{ auth()->user()->role }})
                <button class="tombol-garis" type="submit">Logout</button>
            </form>
        </div>
    </div>

    <div class="isi">
        {{-- Pesan sukses / error --}}
        @if (session('success'))
            <div class="pesan pesan-sukses">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="pesan pesan-error">{{ session('error') }}</div>
        @endif

        {{-- Isi halaman --}}
        {{ $slot }}
    </div>

</body>
</html>
