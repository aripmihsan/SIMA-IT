<!DOCTYPE html>
<html lang="id" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMA IT - Asset Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;700;900&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: { 
                        sans: ['"Inter"', 'sans-serif'],
                        display: ['"Outfit"', 'sans-serif'],
                    },
                    colors: {
                        luxury: {
                            950: '#050505', // Background Utama (Hitam Pekat)
                            900: '#0f0f0f', // Sidebar (Hitam Elegan)
                            800: '#18181b', // Card
                            'gold': '#D4AF37', // Emas Utama
                            'gold-light': '#FCD34D', // Emas Terang
                            'gold-dark': '#B49328', // Emas Gelap
                        }
                    },
                    boxShadow: {
                        'gold-glow': '0 0 20px -5px rgba(212, 175, 55, 0.4)',
                        'gold-sm': '0 0 10px rgba(212, 175, 55, 0.2)',
                    },
                    animation: {
                        'pulse-slow': 'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                    }
                }
            }
        }
    </script>
    <style>
        /* Custom Scrollbar Emas */
        ::-webkit-scrollbar { width: 5px; }
        ::-webkit-scrollbar-track { background: #050505; }
        ::-webkit-scrollbar-thumb { background: #333; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #D4AF37; }

        /* Style Menu Aktif Kapsul Emas */
        .sidebar-item-active {
            background: linear-gradient(90deg, #D4AF37 0%, #B49328 100%);
            color: #000;
            font-weight: 700;
            box-shadow: 0 0 15px rgba(212, 175, 55, 0.4);
        }
        
        .sidebar-item-inactive {
            color: #9ca3af; /* Gray-400 */
        }
        .sidebar-item-inactive:hover {
            color: #D4AF37;
            background: rgba(255, 255, 255, 0.05);
        }
    </style>
</head>
<body class="font-sans antialiased bg-luxury-950 text-gray-300 h-screen overflow-hidden selection:bg-luxury-gold selection:text-black">

    <div class="fixed top-0 left-0 w-full h-full overflow-hidden -z-10 pointer-events-none">
        <div class="absolute top-[-10%] left-[-10%] w-[40%] h-[40%] bg-luxury-gold/5 rounded-full blur-[120px]"></div>
        <div class="absolute bottom-[-10%] right-[-10%] w-[30%] h-[30%] bg-luxury-gold/5 rounded-full blur-[100px]"></div>
    </div>

    <div class="flex h-screen">
        
        <aside class="w-72 bg-luxury-900 border-r border-luxury-gold/10 flex flex-col z-20 hidden md:flex transition-all duration-300">
            
            <div class="h-28 flex items-center px-7 relative">
                <div class="flex items-center gap-4">
                    <div class="relative group">
                        <div class="absolute -inset-2 bg-luxury-gold/40 rounded-full blur opacity-20 group-hover:opacity-60 transition duration-500"></div>
                        <div class="relative w-12 h-12 rounded-2xl bg-gradient-to-br from-[#1a1a1a] to-black border border-luxury-gold/30 flex items-center justify-center shadow-2xl group-hover:scale-105 transition-transform duration-300">
                            <svg class="w-7 h-7 text-luxury-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                        </div>
                        <div class="absolute -bottom-1 -right-1 w-3 h-3 bg-green-500 border-2 border-black rounded-full animate-pulse"></div>
                    </div>
                    
                    <div>
                        <h1 class="text-3xl font-display font-black text-white tracking-tighter leading-none">
                            SIMA <span class="text-transparent bg-clip-text bg-gradient-to-tr from-luxury-gold via-yellow-200 to-luxury-gold">IT</span>
                        </h1>
                        <p class="text-[10px] font-bold text-luxury-gold/50 tracking-[0.25em] uppercase mt-1">Asset Control</p>
                    </div>
                </div>
            </div>

            <nav class="flex-1 px-4 py-4 space-y-2 overflow-y-auto scrollbar-hide">
                
                <p class="px-4 text-[10px] font-bold text-gray-600 uppercase tracking-widest mb-2 mt-2">Menu Utama</p>

                <a href="{{ route('dashboard') }}" class="group flex items-center gap-3 px-4 py-3.5 rounded-xl text-sm transition-all duration-300 {{ request()->routeIs('dashboard') ? 'sidebar-item-active' : 'sidebar-item-inactive' }}">
                    <svg class="w-5 h-5 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                    Dashboard
                </a>

                <a href="{{ route('assets.index') }}" class="group flex items-center gap-3 px-4 py-3.5 rounded-xl text-sm transition-all duration-300 {{ request()->routeIs('assets*') ? 'sidebar-item-active' : 'sidebar-item-inactive' }}">
                    <svg class="w-5 h-5 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                    Data Aset
                </a>

                <a href="{{ route('allocations.index') }}" class="group flex items-center gap-3 px-4 py-3.5 rounded-xl text-sm transition-all duration-300 {{ request()->routeIs('allocations*') ? 'sidebar-item-active' : 'sidebar-item-inactive' }}">
                    <svg class="w-5 h-5 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    Peminjaman
                </a>

                @if(Auth::user()->role == 'admin')
                    <div class="border-t border-luxury-gold/10 my-6 mx-4"></div>
                    <p class="px-4 text-[10px] font-bold text-gray-600 uppercase tracking-widest mb-2">Master Data</p>

                    <a href="{{ route('categories.index') }}" class="group flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition-all duration-300 {{ request()->routeIs('categories*') ? 'text-luxury-gold bg-luxury-gold/10 border-l-2 border-luxury-gold' : 'text-gray-500 hover:text-luxury-gold hover:bg-luxury-gold/5' }}">
                        <span class="w-5 text-center font-serif text-lg leading-none opacity-50 group-hover:opacity-100">#</span>
                        Kategori
                    </a>

                    <a href="{{ route('locations.index') }}" class="group flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition-all duration-300 {{ request()->routeIs('locations*') ? 'text-luxury-gold bg-luxury-gold/10 border-l-2 border-luxury-gold' : 'text-gray-500 hover:text-luxury-gold hover:bg-luxury-gold/5' }}">
                        <span class="w-5 text-center font-serif text-lg leading-none opacity-50 group-hover:opacity-100">#</span>
                        Lokasi
                    </a>

                    <a href="{{ route('suppliers.index') }}" class="group flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition-all duration-300 {{ request()->routeIs('suppliers*') ? 'text-luxury-gold bg-luxury-gold/10 border-l-2 border-luxury-gold' : 'text-gray-500 hover:text-luxury-gold hover:bg-luxury-gold/5' }}">
                        <span class="w-5 text-center font-serif text-lg leading-none opacity-50 group-hover:opacity-100">#</span>
                        Supplier
                    </a>

                    <p class="px-4 text-[10px] font-bold text-gray-600 uppercase tracking-widest mb-2 mt-6">Management</p>

                    <a href="{{ route('users.index') }}" class="group flex items-center gap-3 px-4 py-3.5 rounded-xl text-sm transition-all duration-300 {{ request()->routeIs('users*') ? 'sidebar-item-active' : 'sidebar-item-inactive' }}">
                        <svg class="w-5 h-5 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                        Karyawan
                    </a>
                @endif

            </nav>

            <div class="p-5 border-t border-luxury-gold/10 bg-[#080808]">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-gradient-to-br from-luxury-gold to-luxury-gold-dark p-[2px] shadow-gold-sm">
                        <div class="w-full h-full rounded-full bg-black flex items-center justify-center font-bold text-luxury-gold text-xs">
                            {{ substr(Auth::user()->name, 0, 2) }}
                        </div>
                    </div>
                    
                    <div class="flex-1 overflow-hidden">
                        <h4 class="text-sm font-bold text-white truncate">{{ Auth::user()->name }}</h4>
                        <div class="flex items-center gap-1.5 mt-0.5">
                            <span class="w-1.5 h-1.5 rounded-full bg-green-500 animate-pulse"></span>
                            <p class="text-[10px] text-gray-400 uppercase tracking-wider font-semibold">{{ ucfirst(Auth::user()->role) }}</p>
                        </div>
                    </div>
                    
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="p-2 text-gray-500 hover:text-red-400 hover:bg-red-500/10 rounded-lg transition-colors" title="Logout">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        <main class="flex-1 flex flex-col relative overflow-hidden bg-luxury-950">
            <header class="h-20 flex items-center justify-between px-8 border-b border-luxury-gold/5 bg-luxury-950/80 backdrop-blur-md sticky top-0 z-10">
                <h2 class="text-xl font-bold text-white tracking-tight flex items-center gap-3">
                    <span class="w-1.5 h-6 bg-luxury-gold rounded-full shadow-gold-glow"></span>
                    @yield('title')
                </h2>
                
                <div class="flex items-center gap-4">
                    <span class="text-xs text-gray-500 bg-white/5 px-3 py-1.5 rounded-full font-mono border border-white/5">{{ date('d M Y') }}</span>
                    <div class="relative cursor-pointer group">
                        <div class="w-9 h-9 rounded-full bg-white/5 flex items-center justify-center text-gray-400 border border-white/10 group-hover:border-luxury-gold/50 group-hover:text-luxury-gold transition-all">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                        </div>
                        <span class="absolute top-0 right-0 w-2.5 h-2.5 bg-red-500 border-2 border-luxury-950 rounded-full"></span>
                    </div>
                </div>
            </header>

            <div class="flex-1 overflow-auto p-8 scroll-smooth relative">
                 @yield('content')
            </div>
        </main>
    </div>

</body>
</html>