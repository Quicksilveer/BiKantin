<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Admin - BI Kantin</title>

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

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 16px;
            background: #ffffff;
            border-bottom: 1px solid #cccccc;
        }

        .header-judul {
            font-weight: bold;
        }

        .tombol-logout {
            margin-left: 8px;
            padding: 3px 10px;
            border: 1px solid #999999;
            background: #ffffff;
            cursor: pointer;
        }

        .tombol-logout:hover {
            background: #eeeeee;
        }

        .isi {
            max-width: 960px;
            margin: 0 auto;
            padding: 20px 16px;
        }

        .kotak {
            padding: 16px;
            background: #ffffff;
            border: 1px solid #cccccc;
        }

        h1 {
            margin: 0 0 12px;
            font-size: 20px;
        }
    </style>
</head>
<body>

    <div class="header">
        <span class="header-judul">BI Kantin</span>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            {{ auth()->user()->username }} (admin)
            <button class="tombol-logout" type="submit">Logout</button>
        </form>
    </div>

    <div class="isi">
        <div class="kotak">
            <h1>Dashboard Admin</h1>
            <p>Selamat datang, {{ auth()->user()->username }}.</p>
        </div>
    </div>

</body>
</html>
