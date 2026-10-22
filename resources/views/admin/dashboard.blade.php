{{-- DASHBOARD ADMIN  (alamat: /admin) --}}
<x-layout title="Dashboard Admin - {{ config('app.name') }}">
    <div class="kotak">
        <h1>Dashboard Admin</h1>
        <p>Selamat datang, {{ auth()->user()->username }}.</p>
    </div>
</x-layout>
