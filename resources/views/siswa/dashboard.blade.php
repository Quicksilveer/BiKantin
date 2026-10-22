<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Siswa - BI Kantin</title>

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

        .keterangan {
            color: #666666;
            font-size: 14px;
        }
    </style>
</head>
<body>
    @php
        $namaSiswa = $siswa?->nama ?? auth()->user()->username;
    @endphp

    <div class="header">
        <span class="header-judul">BI Kantin</span>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            {{ $namaSiswa }} (siswa)
            <button class="tombol-logout" type="submit">Logout</button>
        </form>
    </div>

    <div class="isi">
        <div class="kotak">
            <h1>Dashboard Siswa</h1>
            <p>Halo, {{ $namaSiswa }}.</p>
            @if ($siswa)
                <p class="keterangan">Kelas {{ $siswa->kelas }} &middot; NIS {{ $siswa->nis }}</p>
            @endif
        </div>
    </div>

</body>
</html>
