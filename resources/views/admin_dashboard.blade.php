@extends('layouts.master')

@section('title', 'Executive Dashboard')

@section('content')
    <div class="mb-10 p-8 rounded-3xl premium-glass relative overflow-hidden flex items-center justify-between group animate-fade-in-up">
        <div class="absolute inset-0 bg-gradient-to-r from-luxury-gold/20 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-700 pointer-events-none"></div>
        <div class="absolute -top-24 -right-24 w-48 h-48 bg-luxury-gold opacity-20 blur-[80px] rounded-full group-hover:opacity-40 transition-opacity duration-700"></div>

        <div class="relative z-10">
            <h1 class="text-3xl font-black text-white mb-2 tracking-tight">Welcome Back, <span class="text-transparent bg-clip-text bg-gradient-to-r from-luxury-gold via-luxury-gold-light to-luxury-gold drop-shadow-[0_0_10px_rgba(212,175,55,0.3)]">Administrator</span></h1>
            <p class="text-gray-300 text-lg">Sistem beroperasi pada efisiensi puncak.</p>
        </div>
        
        <button class="relative px-8 py-3 bg-gradient-to-b from-luxury-gold to-luxury-gold-dark text-black font-bold rounded-xl shadow-lg hover:shadow-gold-glow-lg transform hover:scale-105 active:scale-95 transition-all overflow-hidden group/btn">
            <span class="relative z-10 flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                Input Aset Baru
            </span>
            <div class="absolute inset-0 h-full w-full scale-0 rounded-xl transition-all duration-300 group-hover/btn:scale-100 group-hover/btn:bg-white/30"></div>
        </button>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-10">
        
        <div class="premium-glass p-8 rounded-[2rem] relative overflow-hidden group hover:-translate-y-2 transition-all duration-500 hover:shadow-gold-glow-lg hover:border-luxury-gold/60">
             <div class="absolute -right-10 -top-10 w-40 h-40 bg-luxury-gold opacity-10 blur-[60px] rounded-full group-hover:opacity-30 transition-all duration-500 group-hover:scale-125"></div>
             
             <div class="relative z-10">
                <div class="flex justify-between items-start mb-4">
                    <p class="text-gray-400 text-sm font-bold uppercase tracking-widest">Total Aset</p>
                    <div class="p-2 bg-luxury-gold/10 rounded-lg text-luxury-gold border border-luxury-gold/20 group-hover:bg-luxury-gold group-hover:text-black transition-colors duration-500 shadow-gold-glow-lg">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                    </div>
                </div>
                <h3 class="text-5xl font-black text-transparent bg-clip-text bg-gradient-to-b from-luxury-gold-light to-luxury-gold-dark drop-shadow-[0_0_15px_rgba(212,175,55,0.4)]">120</h3>
            </div>
        </div>

        <div class="premium-glass p-8 rounded-[2rem] relative overflow-hidden group hover:-translate-y-2 transition-all duration-500 hover:shadow-gold-glow-lg hover:border-luxury-gold/60">
             <div class="absolute -right-10 -top-10 w-40 h-40 bg-luxury-gold-dark opacity-10 blur-[60px] rounded-full group-hover:opacity-30 transition-all duration-500 group-hover:scale-125"></div>
             
             <div class="relative z-10">
                <div class="flex justify-between items-start mb-4">
                    <p class="text-gray-400 text-sm font-bold uppercase tracking-widest">Sedang Dipinjam</p>
                    <div class="p-2 bg-luxury-gold/10 rounded-lg text-luxury-gold border border-luxury-gold/20 group-hover:bg-luxury-gold group-hover:text-black transition-colors duration-500 shadow-gold-glow-lg">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                </div>
                <h3 class="text-5xl font-black text-transparent bg-clip-text bg-gradient-to-b from-luxury-gold-light to-luxury-gold-dark drop-shadow-[0_0_15px_rgba(212,175,55,0.4)]">45</h3>
            </div>
        </div>

        <div class="premium-glass p-8 rounded-[2rem] relative overflow-hidden group hover:-translate-y-2 transition-all duration-500 hover:shadow-gold-glow-lg hover:border-luxury-gold/60">
             <div class="absolute -right-10 -top-10 w-40 h-40 bg-luxury-gold-light opacity-10 blur-[60px] rounded-full group-hover:opacity-30 transition-all duration-500 group-hover:scale-125"></div>
             
             <div class="relative z-10">
                <div class="flex justify-between items-start mb-4">
                    <p class="text-gray-400 text-sm font-bold uppercase tracking-widest">Tersedia</p>
                    <div class="p-2 bg-luxury-gold/10 rounded-lg text-luxury-gold border border-luxury-gold/20 group-hover:bg-luxury-gold group-hover:text-black transition-colors duration-500 shadow-gold-glow-lg">
                         <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                </div>
                <h3 class="text-5xl font-black text-transparent bg-clip-text bg-gradient-to-b from-luxury-gold-light to-luxury-gold-dark drop-shadow-[0_0_15px_rgba(212,175,55,0.4)]">75</h3>
            </div>
        </div>

    </div>

    <div class="premium-glass rounded-[2rem] overflow-hidden relative group">
        <div class="absolute inset-0 bg-gradient-to-b from-luxury-gold/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-700 pointer-events-none"></div>
        
        <div class="p-8 border-b border-luxury-gold/10 flex justify-between items-center relative z-10">
            <h3 class="text-xl font-bold text-white tracking-tight">Aktivitas Terkini</h3>
            <a href="#" class="px-4 py-2 rounded-full text-xs font-bold text-luxury-gold border border-luxury-gold/30 hover:bg-luxury-gold hover:text-black transition-all">Lihat Semua Log</a>
        </div>
        <div class="p-8 relative z-10">
            <div class="space-y-6">
                <div class="flex items-center gap-5 p-4 rounded-2xl hover:bg-white/5 transition-all border border-transparent hover:border-luxury-gold/20 cursor-pointer group/item">
                    <div class="w-12 h-12 rounded-full bg-luxury-900 border-2 border-luxury-gold/50 flex items-center justify-center shadow-gold-glow-lg group-hover/item:scale-110 transition-transform">
                        <svg class="w-6 h-6 text-luxury-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    </div>
                    <div class="flex-1">
                        <p class="text-base font-medium text-gray-200"><span class="text-luxury-gold font-bold drop-shadow-sm">Budi Santoso</span> baru saja meminjam <span class="text-white font-semibold">Macbook Pro M2</span></p>
                        <p class="text-sm text-gray-500 mt-1">Baru saja</p>
                    </div>
                </div>
                 <div class="flex items-center gap-5 p-4 rounded-2xl hover:bg-white/5 transition-all border border-transparent hover:border-luxury-gold/20 cursor-pointer group/item">
                    <div class="w-12 h-12 rounded-full bg-luxury-900 border-2 border-luxury-gold/50 flex items-center justify-center shadow-gold-glow-lg group-hover/item:scale-110 transition-transform">
                        <svg class="w-6 h-6 text-luxury-gold-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                    </div>
                    <div class="flex-1">
                        <p class="text-base font-medium text-gray-200"><span class="text-luxury-gold font-bold drop-shadow-sm">Siti Aminah</span> memperbarui status <span class="text-white font-semibold">Server Rack 2U</span></p>
                        <p class="text-sm text-gray-500 mt-1">2 Jam yang lalu</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection