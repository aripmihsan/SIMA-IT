<!DOCTYPE html>
<html lang="id" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMA - Ultimate Premium</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: { sans: ['Inter', 'sans-serif'] },
                    colors: {
                        luxury: {
                            950: '#0a0a0a', 
                            900: '#121212',
                            'gold-dark': '#9a7b22',
                            'gold': '#D4AF37',
                            'gold-light': '#f5e0a3',
                        }
                    },
                    animation: {
                        'blob-slow': 'blob 20s infinite alternate',
                        'pulse-slow': 'pulse 5s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                    },
                    keyframes: {
                        blob: {
                            '0%': { transform: 'translate(0px, 0px) scale(1)' },
                            '100%': { transform: 'translate(50px, -50px) scale(1.1)' },
                        }
                    },
                    boxShadow: {
                        'glass': '0 8px 32px 0 rgba(0, 0, 0, 0.37)',
                        'gold-glow-lg': '0 0 30px -5px rgba(212, 175, 55, 0.4)',
                    }
                }
            }
        }
    </script>
    <style>
        /* Scrollbar */
        ::-webkit-scrollbar { width: 5px; }
        ::-webkit-scrollbar-track { background: #0a0a0a; }
        ::-webkit-scrollbar-thumb { background: #D4AF37; border-radius: 10px; }
        
        /* KELAS KACA PREMIUM */
        .premium-glass {
            background: rgba(18, 18, 18, 0.60);
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(212, 175, 55, 0.15);
            border-top: 1px solid rgba(212, 175, 55, 0.3);
        }
        
        .hover-shine:hover {
             background: rgba(212, 175, 55, 0.05);
             border-color: rgba(212, 175, 55, 0.4);
             box-shadow: 0 0 20px -5px rgba(212, 175, 55, 0.3);
        }

        /* Ambient Light Background */
        .bg-ambient-light {
            position: fixed; top: 0; left: 0; right: 0; bottom: 0; z-index: 0; overflow: hidden; pointer-events: none;
        }
        .light-blob-1 {
            position: absolute; top: -10%; left: -10%; w: 40%; h: 40%;
            background: radial-gradient(circle, rgba(212,175,55,0.2) 0%, rgba(0,0,0,0) 70%);
            filter: blur(80px); animation: blob-slow 15s infinite alternate;
        }
        .light-blob-2 {
            position: absolute; bottom: -10%; right: -10%; w: 50%; h: 50%;
            background: radial-gradient(circle, rgba(154,123,34,0.15) 0%, rgba(0,0,0,0) 70%);
            filter: blur(100px); animation: blob-slow 20s infinite alternate-reverse;
        }
    </style>
</head>
<body class="font-sans antialiased bg-luxury-950 text-gray-300 h-screen overflow-hidden selection:bg-luxury-gold selection:text-black relative">

    <div class="bg-ambient-light">
        <div class="light-blob-1"></div>
        <div class="light-blob-2"></div>
    </div>

    <div class="flex h-screen relative z-10">
        
        <aside class="w-72 premium-glass flex flex-col z-20 relative transition-all duration-300 hidden md:flex">
            <div class="h-24 flex items-center px-8 border-b border-luxury-gold/10 relative">
                <div class="absolute inset-0 bg-gradient-to-r from-luxury-gold/10 to-transparent opacity-50"></div>
                <div class="flex items-center gap-3 relative z-10">
                    <div class="p-2.5 rounded-xl border border-luxury-gold/40 bg-luxury-gold/5 shadow-gold-glow-lg animate-pulse-slow">
                         <svg class="w-7 h-7 text-luxury-gold drop-shadow-[0_0_5px_rgba(212,175,55,0.8)]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                    </div>
                    <div>
                        <h1 class="text-xl font-black tracking-tight text-white">SIMA <span class="text-transparent bg-clip-text bg-gradient-to-r from-luxury-gold to-luxury-gold-light">PRO</span></h1>
                    </div>
                </div>
            </div>
            
            <nav class="flex-1 px-4 py-8 space-y-3 overflow-y-auto relative z-10">
                <a href="{{ route('dashboard') }}" class="group flex items-center gap-4 px-4 py-3.5 rounded-xl bg-gradient-to-r from-luxury-gold/20 to-luxury-gold/5 border border-luxury-gold/30 text-luxury-gold-light shadow-gold-glow-lg transition-all">
                    <svg class="w-6 h-6 drop-shadow" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                    <span class="font-semibold tracking-wide">Dashboard</span>
                </a>

                <a href="#" class="group flex items-center gap-4 px-4 py-3.5 rounded-xl text-gray-400 hover:text-luxury-gold transition-all hover-shine">
                    <svg class="w-6 h-6 group-hover:drop-shadow-[0_0_5px_rgba(212,175,55,0.5)] transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    <span class="font-medium">Data Aset</span>
                </a>

                 <a href="#" class="group flex items-center gap-4 px-4 py-3.5 rounded-xl text-gray-400 hover:text-luxury-gold transition-all hover-shine">
                     <svg class="w-6 h-6 group-hover:drop-shadow-[0_0_5px_rgba(212,175,55,0.5)] transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    <span class="font-medium">Peminjaman</span>
                </a>

                <div class="border-t border-luxury-gold/10 my-4"></div>

                <form method="POST" action="{{ route('logout') }}" id="logout-form" class="hidden">
                    @csrf
                </form>

                <button onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="group flex items-center gap-4 px-4 py-3.5 rounded-xl text-gray-400 hover:text-red-400 hover:bg-red-500/10 transition-all hover-shine w-full">
                    <svg class="w-6 h-6 group-hover:text-red-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                    <span class="font-medium tracking-wide">Logout System</span>
                </button>
            </nav>

            <div class="p-4 border-t border-luxury-gold/10 relative z-10">
                <div class="flex items-center gap-3 p-3 rounded-xl border border-luxury-gold/10 bg-black/20 hover:bg-luxury-gold/10 hover:border-luxury-gold/30 transition cursor-pointer backdrop-blur-md">
                    <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-luxury-gold-dark to-luxury-gold flex items-center justify-center text-black font-bold shadow-lg">
                        {{ substr(Auth::user()->name ?? 'AD', 0, 2) }}
                    </div>
                    <div class="flex-1">
                        <h4 class="text-sm font-bold text-white">{{ Auth::user()->name ?? 'Administrator' }}</h4>
                        <p class="text-xs text-luxury-gold/70">Online • {{ ucfirst(Auth::user()->role ?? 'Admin') }}</p>
                    </div>
                </div>
            </div>
        </aside>

        <main class="flex-1 flex flex-col relative overflow-hidden">
            <header class="h-20 flex items-center justify-between px-10 premium-glass z-10 sticky top-0">
                <h2 class="text-2xl font-bold text-white tracking-tight drop-shadow-sm">
                    @yield('title')
                </h2>
                
                <button class="relative p-3 rounded-full bg-luxury-gold/5 border border-luxury-gold/20 hover:bg-luxury-gold/10 hover:border-luxury-gold/50 hover:shadow-gold-glow-lg transition group">
                    <span class="absolute top-3 right-3 w-2.5 h-2.5 bg-luxury-gold rounded-full animate-pulse"></span>
                    <span class="absolute inset-0 rounded-full bg-luxury-gold opacity-0 group-hover:opacity-20 blur-md transition"></span>
                    <svg class="w-6 h-6 text-luxury-gold/80 group-hover:text-luxury-gold transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                </button>
            </header>

            <div class="flex-1 overflow-auto p-10 scroll-smooth relative">
                 @yield('content')
            </div>
        </main>
    </div>

</body>
</html>