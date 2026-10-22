<x-layout title="Masuk - BI Kantin">
    <div class="flex min-h-[80vh] items-center justify-center">
        <div class="w-full max-w-sm rounded-2xl border border-stone-200 bg-white p-6 shadow-sm">
            <div class="mb-6 flex flex-col items-center gap-2 text-center">
                <span class="flex size-12 items-center justify-center rounded-xl bg-amber-500 text-lg font-bold text-white">BI</span>
                <h1 class="text-xl font-semibold">Masuk ke BI Kantin</h1>
                <p class="text-sm text-stone-500">Pesan makanan kantin tanpa antre.</p>
            </div>

            <form method="POST" action="{{ route('login.store') }}" class="flex flex-col gap-4">
                @csrf

                <div class="flex flex-col gap-1">
                    <label for="username" class="text-sm font-medium">Username</label>
                    <input id="username" name="username" type="text" value="{{ old('username') }}" required autofocus autocomplete="username"
                        class="rounded-lg border border-stone-300 px-3 py-2 focus:border-amber-500 focus:ring-2 focus:ring-amber-200 focus:outline-none">
                    @error('username')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col gap-1">
                    <label for="password" class="text-sm font-medium">Password</label>
                    <input id="password" name="password" type="password" required autocomplete="current-password"
                        class="rounded-lg border border-stone-300 px-3 py-2 focus:border-amber-500 focus:ring-2 focus:ring-amber-200 focus:outline-none">
                    @error('password')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="rounded-lg bg-amber-500 px-4 py-2 font-medium text-white hover:bg-amber-600">
                    Masuk
                </button>
            </form>
        </div>
    </div>
</x-layout>
