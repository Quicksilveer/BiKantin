{{-- DASHBOARD ADMIN  (alamat: /admin) --}}
<x-layout title="Dashboard Admin - {{ config('app.name') }}">
    <x-card>
        <h1 class="text-lg font-bold">Dashboard Admin</h1>
        <p>Selamat datang, {{ auth()->user()->username }}.</p>
    </x-card>
</x-layout>
