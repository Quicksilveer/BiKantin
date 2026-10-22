{{-- DASHBOARD SISWA  (alamat: /siswa) --}}
<x-layout title="Dashboard Siswa - {{ config('app.name') }}">
    <x-card>
        <h1 class="text-lg font-bold">Dashboard Siswa</h1>
        <p>Halo, {{ $siswa?->nama ?? auth()->user()->username }}.</p>
        @if ($siswa)
            <p class="text-sm text-gray-600">Kelas {{ $siswa->kelas }} &middot; NIS {{ $siswa->nis }}</p>
        @endif
    </x-card>
</x-layout>
