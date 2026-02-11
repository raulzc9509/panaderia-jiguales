<x-guest-layout>

    <div class="bg-jig-card rounded-2xl shadow p-8 border border-jig-line">

        {{-- Logo + nombre --}}
        <div class="flex items-center gap-3 mb-6">
            <img src="{{ asset('img/logo.png') }}" class="h-12 w-auto" alt="Logo">
            <div class="font-semibold text-lg">Panadería Jiguales</div>
        </div>

        <h1 class="text-3xl font-bold mb-6">Bienvenido de nuevo</h1>

        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf

            {{-- Email --}}
            <div>
                <label class="block text-sm mb-1">Email</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-3 flex items-center text-gray-500">
                        {{-- icon email --}}
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8m-18 8h18V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                        </svg>
                    </span>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required autofocus autocomplete="username"
                        class="w-full border border-jig-line rounded-xl p-3 pl-11 bg-white/60 focus:outline-none focus:ring-2 focus:ring-jig-accent"
                        placeholder="Email"
                    >
                </div>

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            {{-- Password --}}
            <div>
                <label class="block text-sm mb-1">Password</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-3 flex items-center text-gray-500">
                        {{-- icon lock --}}
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M12 11c1.1 0 2 .9 2 2v2a2 2 0 11-4 0v-2c0-1.1.9-2 2-2zm6-1V8a6 6 0 10-12 0v2H5v10h14V10h-1zm-8 0V8a2 2 0 114 0v2h-4z" />
                        </svg>
                    </span>

                    <input
                        type="password"
                        name="password"
                        required autocomplete="current-password"
                        class="w-full border border-jig-line rounded-xl p-3 pl-11 bg-white/60 focus:outline-none focus:ring-2 focus:ring-jig-accent"
                        placeholder="Password"
                    >
                </div>

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            {{-- Remember + forgot --}}
            <div class="flex items-center justify-between text-sm">
                <label class="flex items-center gap-2">
                    <input type="checkbox" name="remember" class="rounded border-jig-line text-jig-accent focus:ring-jig-accent">
                    <span>Remember me</span>
                </label>

                @if (Route::has('password.request'))
                    <a class="underline text-jig-text/70 hover:text-jig-text" href="{{ route('password.request') }}">
                        ¿Olvidaste tu contraseña?
                    </a>
                @endif
            </div>

            {{-- Botón --}}
            <button class="w-full bg-jig-accent hover:opacity-90 text-white font-semibold py-3 rounded-xl">
                Login
            </button>
        </form>
    </div>

</x-guest-layout>
