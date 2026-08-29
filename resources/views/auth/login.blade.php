<x-guest-layout>
    <div class="mb-8 text-center">
        <h2 class="font-extrabold text-2xl text-gray-800 tracking-tighter">
            Selamat <span class="text-blue-400">Datang</span>
        </h2>
        <p class="text-sm text-gray-500 font-medium">Silakan masuk ke akun Anda</p>
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-xl" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-xl"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-300" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Ingatkan Saya') }}</span>
            </label>

            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-500 hover:text-blue-600 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-300" href="{{ route('password.request') }}">
                    {{ __('Lupa password?') }}
                </a>
            @endif
        </div>

        <div class="mt-8 flex flex-col items-center">
            <x-primary-button class="w-full justify-center bg-blue-500 hover:bg-blue-600 shadow-lg py-3 rounded-xl mb-6 text-sm font-bold tracking-widest transition duration-300">
                {{ __('LOG IN') }}
            </x-primary-button>

            <p class="text-sm text-gray-500">
                Belum punya akun?
                <a href="{{ route('register') }}" class="text-blue-500 hover:text-blue-600 font-bold transition duration-150 ease-in-out underline decoration-1 underline-offset-2">
                    Daftar di sini
                </a>
            </p>
        </div>
    </form>
</x-guest-layout>
