{{--
    KERANGKA HALAMAN SETELAH LOGIN (dipakai lewat <x-layout>)
    Isi: header (nama aplikasi, nama user, tombol Logout), pesan sukses/error, lalu isi halaman.
--}}
@props(['title' => null])

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900">

    {{-- Header --}}
    @auth
        <header class="border-b border-gray-300 bg-white">
            <div class="mx-auto flex max-w-5xl items-center justify-between px-4 py-2">
                <a href="{{ auth()->user()->dashboardRoute() }}" class="font-bold">{{ config('app.name') }}</a>

                <form method="POST" action="{{ route('logout') }}" class="text-sm">
                    @csrf
                    {{ auth()->user()->siswa?->nama ?? auth()->user()->username }} ({{ auth()->user()->role }})
                    <button type="submit" class="ml-2 border border-gray-400 px-2 py-0.5 hover:bg-gray-100">Logout</button>
                </form>
            </div>
        </header>
    @endauth

    <main class="mx-auto max-w-5xl px-4 py-6">
        {{-- Pesan sukses / error --}}
        @if (session('success'))
            <x-alert type="success">{{ session('success') }}</x-alert>
        @endif

        @if (session('error'))
            <x-alert type="error">{{ session('error') }}</x-alert>
        @endif

        {{-- Isi halaman --}}
        {{ $slot }}
    </main>

</body>
</html>
