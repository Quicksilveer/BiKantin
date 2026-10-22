{{-- DASHBOARD ADMIN  (alamat: /admin) --}}
<x-layout title="Dashboard Admin - {{ config('app.name') }}">
    <x-card>
        <h1 class="text-2xl font-semibold">Dashboard Admin</h1>
        <p class="mt-1 text-muted">Selamat datang, {{ auth()->user()->username }}. Kamu masuk sebagai <strong>admin</strong>.</p>
    </x-card>
</x-layout>
