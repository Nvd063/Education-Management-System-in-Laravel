<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Management System</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600,800&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* 1. The Floating Blobs Animation */
        @keyframes float {
            0% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
            100% { transform: translate(0px, 0px) scale(1); }
        }
        .blob {
            animation: float 7s infinite ease-in-out;
        }
        .delay-1 { animation-delay: 0s; }
        .delay-2 { animation-delay: 2s; }
        .delay-3 { animation-delay: 4s; }

        /* 2. Slide Up Entrance Animation */
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-slide-up {
            animation: slideUp 0.8s ease-out forwards;
            opacity: 0; /* Start hidden */
        }
        
        /* Staggered delays for text */
        .slide-delay-1 { animation-delay: 0.2s; }
        .slide-delay-2 { animation-delay: 0.4s; }
        .slide-delay-3 { animation-delay: 0.6s; }

        /* 3. Gradient Text Flow */
        .text-gradient {
            background: linear-gradient(to right, #2563eb, #9333ea);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
</head>
<body class="antialiased bg-gray-50 text-gray-800 relative overflow-hidden h-screen">

    <div class="absolute top-0 left-0 w-full h-full overflow-hidden -z-10">
        <div class="absolute top-[-10%] left-[-10%] w-96 h-96 bg-purple-300 rounded-full mix-blend-multiply filter blur-3xl opacity-70 blob delay-1"></div>
        <div class="absolute top-[-10%] right-[-10%] w-96 h-96 bg-blue-300 rounded-full mix-blend-multiply filter blur-3xl opacity-70 blob delay-2"></div>
        <div class="absolute bottom-[-20%] left-[20%] w-96 h-96 bg-pink-300 rounded-full mix-blend-multiply filter blur-3xl opacity-70 blob delay-3"></div>
    </div>

    <div class="relative w-full h-full flex flex-col">

        <nav class="flex justify-between items-center p-6 bg-white/30 backdrop-blur-md border-b border-white/20 z-50">
            <div class="text-2xl font-extrabold tracking-tight text-gray-900">
                School<span class="text-blue-600">Sys</span>
            </div>

            <div class="space-x-4">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-medium text-gray-700 hover:text-blue-600 transition">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="font-medium text-gray-700 hover:text-blue-600 transition">Log in</a>
                    @endauth
                @endif
            </div>
        </nav>

        <div class="flex-1 flex flex-col items-center justify-center text-center px-4 relative z-10">
            
            <div class="animate-slide-up slide-delay-1 mb-6 inline-flex items-center px-3 py-1 rounded-full border border-blue-200 bg-blue-50 text-blue-600 text-xs font-medium uppercase tracking-wide">
                <span class="w-2 h-2 mr-2 bg-blue-600 rounded-full animate-pulse"></span>
                System Live v1.0
            </div>

            <h1 class="animate-slide-up slide-delay-2 text-5xl md:text-7xl font-extrabold text-gray-900 tracking-tight mb-6">
                Education Management <br>
                <span class="text-gradient">Reimagined.</span>
            </h1>
            
            <p class="animate-slide-up slide-delay-3 text-lg md:text-xl text-gray-600 mb-10 max-w-2xl mx-auto leading-relaxed">
                Experience the next generation of student tracking. 
                Fast, secure, and designed for the future of education.
            </p>

            <div class="animate-slide-up slide-delay-3 flex flex-col sm:flex-row gap-4">
                @auth
                    <a href="{{ url('/dashboard') }}" 
                       class="group relative px-8 py-3 bg-blue-600 text-white text-lg font-bold rounded-full shadow-lg overflow-hidden transition-all hover:scale-105 hover:shadow-blue-500/50">
                        <span class="absolute inset-0 w-full h-full bg-white/20 group-hover:translate-x-full transition-transform duration-500 ease-out -translate-x-full skew-x-12"></span>
                        <span class="relative">Access Dashboard</span>
                    </a>
                @else
                    <a href="{{ route('register') }}" 
                       class="group relative px-8 py-3 bg-gray-900 text-white text-lg font-bold rounded-full shadow-lg overflow-hidden transition-all hover:scale-105 hover:shadow-xl">
                        <span class="absolute inset-0 w-full h-full bg-white/20 group-hover:translate-x-full transition-transform duration-500 ease-out -translate-x-full skew-x-12"></span>
                        <span class="relative">Get Started Free</span>
                    </a>

                    <a href="{{ route('login') }}" 
                       class="px-8 py-3 bg-white/50 backdrop-blur-sm border border-white/50 text-gray-700 text-lg font-bold rounded-full shadow-sm hover:bg-white transition hover:scale-105">
                        Login
                    </a>
                @endauth
            </div>
        </div>

        <footer class="animate-slide-up slide-delay-3 py-6 text-center text-gray-500 text-sm bg-white/30 backdrop-blur-md border-t border-white/20">
            &copy; {{ date('Y') }} Student Management System. Built with Laravel.
        </footer>
    </div>
</body>
</html>