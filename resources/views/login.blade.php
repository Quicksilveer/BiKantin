<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - BI Kantin</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #f3f3f3;
            color: #222222;
            font-family: Arial, sans-serif;
            font-size: 15px;
        }

        .kotak-login {
            width: 100%;
            max-width: 320px;
            margin: 100px auto 0;
            padding: 24px;
            background: #ffffff;
            border: 1px solid #cccccc;
        }

        h1 {
            margin: 0 0 16px;
            font-size: 20px;
        }

        label {
            display: block;
            margin-bottom: 4px;
            font-size: 14px;
        }

        .kolom-input {
            width: 100%;
            padding: 6px 8px;
            margin-bottom: 12px;
            border: 1px solid #999999;
            font-size: 15px;
        }

        .error {
            margin: -8px 0 12px;
            color: #dc2626;
            font-size: 13px;
        }

        .tombol {
            width: 100%;
            padding: 8px 16px;
            border: none;
            background: #2563eb;
            color: #ffffff;
            font-size: 15px;
            cursor: pointer;
        }

        .tombol:hover {
            background: #1d4ed8;
        }
    </style>
</head>
<body>

    <div class="kotak-login">
        <h1>Login BI Kantin</h1>

        <form method="POST" action="{{ route('login.store') }}">
            @csrf

            <label for="username">Username</label>
            <input class="kolom-input" id="username" name="username" type="text" value="{{ old('username') }}" required autofocus>
            @if ($errors->has('username'))
                <p class="error">{{ $errors->first('username') }}</p>
            @endif

            <label for="password">Password</label>
            <input class="kolom-input" id="password" name="password" type="password" required>
            @if ($errors->has('password'))
                <p class="error">{{ $errors->first('password') }}</p>
            @endif

            <button class="tombol" type="submit">Login</button>
        </form>
    </div>

</body>
</html>
