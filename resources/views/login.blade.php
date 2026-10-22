{{--
    HALAMAN LOGIN  (alamat: /login)
    Gaya tampilannya ada di public/css/style.css (bagian "4. FORM" dan "6. HALAMAN LOGIN").
--}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - {{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <div class="kotak-login">
        <h1>Login {{ config('app.name') }}</h1>

        <form method="POST" action="{{ route('login.store') }}">
            @csrf

            <label for="username">Username</label>
            <input class="kolom-input" id="username" name="username" type="text" value="{{ old('username') }}" required autofocus>
            @error('username')
                <p class="error-kolom">{{ $message }}</p>
            @enderror

            <label for="password">Password</label>
            <input class="kolom-input" id="password" name="password" type="password" required>
            @error('password')
                <p class="error-kolom">{{ $message }}</p>
            @enderror

            <button class="tombol" type="submit">Login</button>
        </form>
    </div>

</body>
</html>
