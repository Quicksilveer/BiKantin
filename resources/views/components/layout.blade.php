{{--
    KERANGKA HALAMAN (dipakai semua halaman lewat <x-layout>)

    Isinya dari atas ke bawah:
      1. <head>     : judul tab browser, font, CSS & JS
      2. HEADER     : logo + nama user + tombol Keluar (hanya tampil setelah login)
      3. PESAN      : kotak hijau/merah dari session('success') / session('error')
      4. ISI        : isi halaman masing-masing ({{ $slot }})

    Cara pakai di halaman lain:
        <x-layout title="Judul Tab">
            ...isi halaman...
        </x-layout>
--}}
@props(['title' => null])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    {{-- ===== 1. HEAD ===== --}}
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $title ?? config('app.name') }}</title>

        @fonts

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="min-h-screen bg-page text-ink antialiased">
        {{-- ===== 2. HEADER (hanya setelah login) ===== --}}
        @auth
            <header class="border-b border-line bg-surface">
                <div class="mx-auto flex max-w-6xl items-center justify-between gap-4 px-4 py-3">
                    <a href="{{ auth()->user()->dashboardRoute() }}" class="flex items-center gap-2 font-semibold">
                        <span class="flex size-8 shrink-0 items-center justify-center rounded-control bg-primary text-sm font-bold text-white">BI</span>
                        <span>{{ config('app.name') }}</span>
                    </a>

                    <div class="flex items-center gap-3 text-sm">
                        <span class="hidden text-muted sm:inline">
                            {{ auth()->user()->siswa?->nama ?? auth()->user()->username }}
                            <span class="rounded bg-page px-1.5 py-0.5 text-xs capitalize">{{ auth()->user()->role }}</span>
                        </span>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-button variant="outline" class="px-3 py-1.5 text-sm">Keluar</x-button>
                        </form>
                    </div>
                </div>
            </header>
        @endauth

        <main class="mx-auto flex max-w-6xl flex-col gap-6 px-4 py-6">
            {{-- ===== 3. PESAN ===== --}}
            @if (session('success'))
                <x-alert type="success">{{ session('success') }}</x-alert>
            @endif

            @if (session('error'))
                <x-alert type="error">{{ session('error') }}</x-alert>
            @endif

            {{-- ===== 4. ISI HALAMAN ===== --}}
            {{ $slot }}
        </main>
    </body>
</html>
