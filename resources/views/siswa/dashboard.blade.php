<x-layout title="Dashboard Siswa - BI Kantin">
    <div class="rounded-2xl border border-stone-200 bg-white p-6">
        <h1 class="text-2xl font-semibold">Halo, {{ $siswa?->nama ?? auth()->user()->username }}!</h1>
        @if ($siswa)
            <p class="mt-1 text-stone-500">{{ $siswa->kelas }} &middot; NIS {{ $siswa->nis }}</p>
        @endif
        <p class="mt-1 text-stone-500">Kamu masuk sebagai <strong>siswa</strong>.</p>
    </div>
</x-layout>
