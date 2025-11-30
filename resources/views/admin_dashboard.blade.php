@extends('layouts.master')

@section('title', Auth::user()->role == 'admin' ? 'Executive Dashboard' : 'My Dashboard')

@section('content')

    <div class="mb-10 relative group">
        <div class="absolute -inset-1 bg-gradient-to-r from-luxury-gold/30 to-purple-600/30 rounded-[2.5rem] blur opacity-30 group-hover:opacity-50 transition duration-1000"></div>
        
        <div class="relative p-8 md:p-10 rounded-[2.5rem] bg-[#0a0a0a] border border-luxury-gold/10 overflow-hidden flex flex-col md:flex-row items-center justify-between gap-6">
            
            <div class="absolute top-0 right-0 w-64 h-64 bg-luxury-gold/5 rounded-full blur-[80px] pointer-events-none"></div>

            <div class="relative z-10 text-center md:text-left">
                <div class="flex items-center justify-center md:justify-start gap-3 mb-2">
                    <span class="px-3 py-1 rounded-full bg-luxury-gold/10 border border-luxury-gold/20 text-[10px] font-bold text-luxury-gold uppercase tracking-widest">
                        {{ date('d F Y') }}
                    </span>
                </div>
                <h1 class="text-3xl md:text-4xl font-black text-white tracking-tight leading-tight">
                    Halo, <span class="text-transparent bg-clip-text bg-gradient-to-r from-luxury-gold via-yellow-200 to-luxury-gold">{{ Auth::user()->name }}</span>
                </h1>
                <p class="text-gray-400 mt-2 text-sm md:text-base max-w-xl">
                    @if(Auth::user()->role == 'admin')
                        Pantau seluruh aset perusahaan, status peminjaman, dan nilai inventaris secara real-time.
                    @else
                        Kelola inventaris aset yang Anda gunakan. Pastikan semua barang dalam kondisi baik.
                    @endif
                </p>
            </div>

            @if(Auth::user()->role == 'admin')
                <a href="{{ route('assets.create') }}" class="group relative px-8 py-4 bg-gradient-to-b from-luxury-gold to-luxury-gold-dark rounded-2xl font-black text-black shadow-[0_0_20px_rgba(212,175,55,0.3)] hover:scale-105 active:scale-95 transition-all duration-300">
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                        <span>TAMBAH ASET</span>
                    </div>
                </a>
            @else
                <div class="px-8 py-4 bg-white/5 border border-white/10 rounded-2xl text-center">
                    <p class="text-xs text-gray-500 uppercase tracking-widest">Status Akun</p>
                    <p class="text-lg font-bold text-green-400 flex items-center justify-center gap-2 mt-1">
                        <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                        Aktif
                    </p>
                </div>
            @endif
        </div>
    </div>

    @if(Auth::user()->role == 'admin')
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
            <div class="p-1 rounded-[2rem] bg-gradient-to-b from-white/10 to-transparent hover:from-luxury-gold/30 transition duration-500 group">
                <div class="h-full bg-[#0f0f0f] rounded-[1.9rem] p-6 relative overflow-hidden">
                    <div class="flex justify-between items-start mb-8">
                        <div class="p-3 bg-luxury-gold/10 rounded-2xl text-luxury-gold">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                        </div>
                        <span class="text-xs font-bold bg-white/5 text-gray-400 px-2 py-1 rounded-lg">+{{ \App\Models\Asset::whereDate('created_at', today())->count() }} Hari Ini</span>
                    </div>
                    <h3 class="text-5xl font-black text-white tracking-tighter group-hover:text-luxury-gold transition-colors">
                        {{ \App\Models\Asset::count() }}
                    </h3>
                    <p class="text-sm text-gray-500 mt-2 font-medium uppercase tracking-widest">Total Aset</p>
                </div>
            </div>

            <div class="p-1 rounded-[2rem] bg-gradient-to-b from-white/10 to-transparent hover:from-blue-500/30 transition duration-500 group">
                <div class="h-full bg-[#0f0f0f] rounded-[1.9rem] p-6 relative overflow-hidden">
                    <div class="flex justify-between items-start mb-8">
                        <div class="p-3 bg-blue-500/10 rounded-2xl text-blue-500">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                    </div>
                    <h3 class="text-5xl font-black text-white tracking-tighter group-hover:text-blue-400 transition-colors">
                        {{ \App\Models\Asset::where('status', 'deployed')->count() }}
                    </h3>
                    <p class="text-sm text-gray-500 mt-2 font-medium uppercase tracking-widest">Sedang Dipinjam</p>
                </div>
            </div>

            <div class="p-1 rounded-[2rem] bg-gradient-to-b from-white/10 to-transparent hover:from-green-500/30 transition duration-500 group">
                <div class="h-full bg-[#0f0f0f] rounded-[1.9rem] p-6 relative overflow-hidden">
                    <div class="flex justify-between items-start mb-8">
                        <div class="p-3 bg-green-500/10 rounded-2xl text-green-500">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                    </div>
                    <h3 class="text-5xl font-black text-white tracking-tighter group-hover:text-green-400 transition-colors">
                        {{ \App\Models\Asset::where('status', 'available')->count() }}
                    </h3>
                    <p class="text-sm text-gray-500 mt-2 font-medium uppercase tracking-widest">Aset Tersedia</p>
                </div>
            </div>
        </div>
    @endif

    <div class="p-[1px] rounded-[2.5rem] bg-gradient-to-b from-luxury-gold/20 to-transparent">
        <div class="bg-[#080808] rounded-[2.5rem] overflow-hidden relative">
            <div class="p-8 border-b border-white/5 flex justify-between items-center">
                <h3 class="text-xl font-bold text-white flex items-center gap-3">
                    <span class="w-2 h-2 rounded-full bg-luxury-gold animate-pulse"></span>
                    @if(Auth::user()->role == 'admin')
                        Aktivitas Peminjaman Terbaru
                    @else
                        Daftar Aset Saya
                    @endif
                </h3>
                
                @if(Auth::user()->role == 'admin')
                    <a href="{{ route('allocations.index') }}" class="text-xs font-bold text-luxury-gold hover:text-white transition-colors">LIHAT SEMUA -></a>
                @endif
            </div>

            <div class="p-8">
                @php
                    if(Auth::user()->role == 'admin') {
                        // Admin lihat semua history terbaru
                        $data = \App\Models\Allocation::with(['user', 'asset.category'])->latest()->take(5)->get();
                    } else {
                        // Staff lihat barang dia sendiri
                        $data = \App\Models\Allocation::with(['asset.category'])->where('user_id', Auth::id())->latest()->get();
                    }
                @endphp

                <div class="space-y-4">
                    @forelse($data as $item)
                        <div class="flex items-center justify-between p-4 rounded-2xl bg-white/5 hover:bg-white/10 transition-all group border border-transparent hover:border-luxury-gold/20">
                            <div class="flex items-center gap-5">
                                <div class="w-12 h-12 rounded-xl bg-black border border-white/10 overflow-hidden relative">
                                    @if($item->asset->image)
                                        <img src="{{ asset('storage/' . $item->asset->image) }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-[8px] text-gray-600 font-mono">N/A</div>
                                    @endif
                                </div>
                                
                                <div>
                                    <h4 class="text-white font-bold text-sm">{{ $item->asset->name }}</h4>
                                    <p class="text-xs text-gray-500 mt-0.5 font-mono">{{ $item->asset->code }} • {{ $item->asset->category->name }}</p>
                                </div>
                            </div>

                            <div class="text-right">
                                @if(Auth::user()->role == 'admin')
                                    <p class="text-xs text-gray-400 mb-1">Peminjam:</p>
                                    <div class="flex items-center justify-end gap-2">
                                        <span class="text-sm font-bold text-luxury-gold">{{ $item->user->name }}</span>
                                    </div>
                                @else
                                    <p class="text-xs text-gray-400 mb-1">Diterima:</p>
                                    <span class="text-sm font-bold text-white">{{ \Carbon\Carbon::parse($item->allocated_date)->format('d M Y') }}</span>
                                @endif
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-10">
                            <div class="w-16 h-16 bg-white/5 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-8 h-8 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                            </div>
                            <p class="text-gray-500 text-sm">Belum ada data aktivitas.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

@endsection