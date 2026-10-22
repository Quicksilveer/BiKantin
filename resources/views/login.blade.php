{{--
    HALAMAN LOGIN  (alamat: /login)
    Semua tampilan login ada di file ini saja.

    Cara mengubah tampilan:
      - Warna  : ganti nama warna di class, misalnya bg-amber-500 -> bg-blue-500
                 (daftar warna: https://tailwindcss.com/docs/colors)
      - Ukuran : text-sm / text-base / text-xl / text-2xl ...
      - Sudut  : rounded-lg / rounded-xl / rounded-2xl / rounded-full
      - Jarak  : p-6 (jarak dalam), gap-4 (jarak antar elemen)

    Setelah mengedit jalankan `npm run build` (atau biarkan `npm run dev` menyala).
--}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Judul di tab browser --}}
    <title>Masuk - {{ config('app.name') }}</title>

    @fonts
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

{{-- LATAR HALAMAN: abu-abu muda, kotak login di tengah layar --}}
<body class="flex min-h-screen items-center justify-center bg-stone-100 px-4 text-stone-900 antialiased">

    {{-- KOTAK PUTIH --}}
    <div class="w-full max-w-sm rounded-2xl border border-stone-200 bg-white p-6 shadow-sm">

        {{-- ===== JUDUL ===== --}}
        <div class="mb-6 flex flex-col items-center gap-2 text-center">
            {{-- Logo. Untuk memakai gambar: simpan di public/images/logo.png lalu ganti <div> ini dengan
                 <img src="{{ asset('images/logo.png') }}" alt="Logo" class="size-12 object-contain"> --}}
            <div class="flex size-12 items-center justify-center rounded-lg bg-amber-500 text-lg font-bold text-white">
                BI
            </div>

            <h1 class="text-xl font-semibold">Masuk ke {{ config('app.name') }}</h1>

            <p class="text-sm text-stone-500">Pesan makanan kantin tanpa antre.</p>
        </div>

        {{-- ===== FORM LOGIN ===== --}}
        <form method="POST" action="{{ route('login.store') }}" class="flex flex-col gap-4">
            @csrf

            {{-- Kolom Username --}}
            <div class="flex flex-col gap-1">
                <label for="username" class="text-sm font-medium">Username</label>
                <input id="username" name="username" type="text" value="{{ old('username') }}"
                    required autofocus autocomplete="username"
                    class="rounded-lg border border-stone-300 px-3 py-2 focus:border-amber-500 focus:ring-2 focus:ring-amber-200 focus:outline-none">
                @error('username')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Kolom Password --}}
            <div class="flex flex-col gap-1">
                <label for="password" class="text-sm font-medium">Password</label>
                <input id="password" name="password" type="password"
                    required autocomplete="current-password"
                    class="rounded-lg border border-stone-300 px-3 py-2 focus:border-amber-500 focus:ring-2 focus:ring-amber-200 focus:outline-none">
                @error('password')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Tombol Masuk --}}
            <button type="submit" class="rounded-lg bg-amber-500 px-4 py-2 font-medium text-white hover:bg-amber-600">
                Masuk
            </button>
        </form>

    </div>
</body>
</html>
