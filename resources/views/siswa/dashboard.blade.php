{{-- DASHBOARD SISWA  (alamat: /siswa) --}}
<x-layout title="Dashboard Siswa - {{ config('app.name') }}">
    <x-card>
        <h1 class="text-2xl font-semibold">Halo, {{ $siswa?->nama ?? auth()->user()->username }}!</h1>
        @if ($siswa)
            <p class="mt-1 text-muted">{{ $siswa->kelas }} &middot; NIS {{ $siswa->nis }}</p>
        @endif
        <p class="mt-1 text-muted">Kamu masuk sebagai <strong>siswa</strong>.</p>
    </x-card>
</x-layout>
