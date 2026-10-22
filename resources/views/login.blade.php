{{--
    HALAMAN LOGIN  (alamat: /login)
    Semua tampilan login ada di file ini.
    Setelah mengedit jalankan `npm run build` (atau biarkan `npm run dev` menyala).
--}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - {{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900">

    <div class="mx-auto mt-24 w-full max-w-xs border border-gray-300 bg-white p-6">
        <h1 class="mb-4 text-lg font-bold">Login {{ config('app.name') }}</h1>

        <form method="POST" action="{{ route('login.store') }}">
            @csrf

            {{-- Username --}}
            <label for="username" class="block text-sm">Username</label>
            <input id="username" name="username" type="text" value="{{ old('username') }}" required autofocus
                class="mb-1 w-full border border-gray-400 px-2 py-1">
            @error('username')
                <p class="text-sm text-red-600">{{ $message }}</p>
            @enderror

            {{-- Password --}}
            <label for="password" class="mt-3 block text-sm">Password</label>
            <input id="password" name="password" type="password" required
                class="mb-1 w-full border border-gray-400 px-2 py-1">
            @error('password')
                <p class="text-sm text-red-600">{{ $message }}</p>
            @enderror

            {{-- Tombol --}}
            <button type="submit" class="mt-4 w-full bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">
                Login
            </button>
        </form>
    </div>

</body>
</html>
