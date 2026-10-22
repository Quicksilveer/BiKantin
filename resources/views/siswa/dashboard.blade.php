{{-- DASHBOARD SISWA  (alamat: /siswa) --}}
<x-layout title="Dashboard Siswa - {{ config('app.name') }}">
    <div class="kotak">
        <h1>Dashboard Siswa</h1>
        <p>Halo, {{ $siswa?->nama ?? auth()->user()->username }}.</p>
        @if ($siswa)
            <p class="keterangan">Kelas {{ $siswa->kelas }} &middot; NIS {{ $siswa->nis }}</p>
        @endif
    </div>
</x-layout>
