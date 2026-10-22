@props(['title' => null])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $title ?? config('app.name') }}</title>

        @fonts

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen bg-stone-100 text-stone-900 antialiased">
        @auth
            <header class="border-b border-stone-200 bg-white">
                <div class="mx-auto flex max-w-6xl items-center justify-between gap-4 px-4 py-3">
                    <a href="{{ auth()->user()->dashboardRoute() }}" class="flex items-center gap-2 font-semibold">
                        <span class="flex size-8 items-center justify-center rounded-lg bg-amber-500 text-white">BI</span>
                        <span>BI Kantin</span>
                    </a>

                    <div class="flex items-center gap-3 text-sm">
                        <span class="hidden text-stone-500 sm:inline">
                            {{ auth()->user()->siswa?->nama ?? auth()->user()->username }}
                            <span class="rounded bg-stone-100 px-1.5 py-0.5 text-xs capitalize">{{ auth()->user()->role }}</span>
                        </span>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="rounded-lg border border-stone-300 px-3 py-1.5 hover:bg-stone-50">
                                Keluar
                            </button>
                        </form>
                    </div>
                </div>
            </header>
        @endauth

        <main class="mx-auto flex max-w-6xl flex-col gap-6 px-4 py-6">
            @if (session('success'))
                <div class="rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-800" role="status">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-800" role="alert">
                    {{ session('error') }}
                </div>
            @endif

            {{ $slot }}
        </main>
    </body>
</html>
