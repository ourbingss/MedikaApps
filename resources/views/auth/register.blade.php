<x-guest-layout>
    <div class="mb-8 text-center">
        <h2 class="font-extrabold text-2xl text-gray-800 tracking-tighter">
            Buat <span class="text-blue-400">Akun Baru</span>
        </h2>
        <p class="text-sm text-gray-500 font-medium">Daftar untuk mengakses Medika-App</p>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div>
            <x-input-label for="name" :value="__('Nama Lengkap')" />
            <x-text-input id="name" class="block mt-1 w-full border-gray-300 focus:border-blue-500 focus:ring-blue-300 rounded-xl" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full border-gray-300 focus:border-blue-500 focus:ring-blue-300 rounded-xl" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full border-gray-300 focus:border-blue-500 focus:ring-blue-300 rounded-xl"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full border-gray-300 focus:border-blue-300 focus:ring-blue-500 rounded-xl"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="mt-8 flex flex-col items-center">
            <x-primary-button class="w-full justify-center bg-blue-500 hover:bg-blue-600 shadow-lg py-3 rounded-xl mb-6 text-sm font-bold tracking-widest transition duration-300">
                {{ __('DAFTAR SEKARANG') }}
            </x-primary-button>

            <p class="text-sm text-gray-500">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="text-blue-500 hover:text-blue-600 font-bold transition duration-150 ease-in-out underline decoration-1 underline-offset-2">
                    Login di sini
                </a>
            </p>
        </div>
    </form>
</x-guest-layout>
