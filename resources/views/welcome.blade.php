<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Medika App</title>
    
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600,800&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased font-sans bg-gradient-to-b from-blue-100 via-blue-50 to-white min-h-screen flex flex-col items-center justify-center text-slate-800 overflow-hidden relative">

    <div class="absolute top-1/4 left-1/4 w-[600px] h-[600px] bg-blue-400/10 rounded-full blur-[120px] pointer-events-none"></div>

    @if (Route::has('login'))
        <div class="fixed top-0 right-0 p-6 text-right z-10">
            @auth
                <a href="{{ url('/dashboard') }}" class="font-bold text-lg bg-blue-600/10 text-blue-700 px-6 py-2 rounded-full backdrop-blur-md hover:bg-blue-600/20 transition border border-blue-200/50">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="font-bold text-lg px-6 py-2 text-slate-700 hover:text-blue-600 transition">Log in</a>
                <a href="{{ route('register') }}" class="ml-4 font-bold text-lg bg-blue-600 text-white px-8 py-2 rounded-full shadow-lg hover:bg-blue-700 transition shadow-blue-200">Register</a>
            @endauth
        </div>
    @endif

    <div class="text-center px-4 z-10">
        <div class="flex justify-center mb-10">
            <div class="p-4 bg-white/80 rounded-[2.5rem] backdrop-blur-sm border border-white shadow-xl">
                <img src="{{ asset('images/logo-medika.png') }}" alt="Logo" class="h-32 w-auto filter drop-shadow-md">
            </div>
        </div>

        <h1 class="font-extrabold text-6xl md:text-8xl tracking-tighter leading-none mb-4 text-slate-900">
            MEDIKA <span class="text-blue-600">APP</span>
        </h1>
        
        <p class="text-sm md:text-base font-bold text-slate-500 max-w-2xl mx-auto uppercase tracking-[0.5em] mb-12">
            Sistem Informasi Manajemen Data Kesehatan
        </p>

        <div class="flex flex-col sm:flex-row gap-6 justify-center">
            <a href="{{ route('login') }}" class="bg-blue-600 text-white font-extrabold px-12 py-5 rounded-2xl shadow-[0_15px_30px_rgba(37,99,235,0.3)] hover:bg-blue-700 hover:-translate-y-1 transition-all duration-300 uppercase tracking-wider">
                MULAI SEKARANG
            </a>
        </div>
    </div>

</body>
</html>