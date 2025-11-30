@extends('layouts.master')

@section('title', 'Detail Aset')

@section('content')
    <div class="max-w-4xl mx-auto animate-fade-in-up">
        <div class="mb-8 flex justify-between items-center">
            <a href="{{ route('assets.index') }}" class="flex items-center gap-2 text-gray-500 hover:text-luxury-gold transition-colors text-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali ke Daftar
            </a>
            
            @if(Auth::user()->role == 'admin')
            <a href="{{ route('assets.edit', $asset->id) }}" class="px-4 py-2 bg-luxury-gold/10 border border-luxury-gold/30 text-luxury-gold rounded-lg text-xs font-bold hover:bg-luxury-gold hover:text-black transition">
                EDIT DATA
            </a>
            @endif
        </div>

        <div class="premium-glass p-8 rounded-[2rem] relative overflow-hidden">
            <div class="absolute top-0 right-0 w-64 h-64 bg-luxury-gold/10 rounded-full blur-3xl pointer-events-none"></div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 relative z-10">
                <!-- FOTO ASET (KIRI) -->
                <div class="md:col-span-1">
                    <div class="aspect-square rounded-2xl overflow-hidden border-2 border-luxury-gold/20 bg-black shadow-lg">
                        @if($asset->image)
                            <img src="{{ asset('storage/' . $asset->image) }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-gray-600 font-mono">NO IMAGE</div>
                        @endif
                    </div>
                    
                    <div class="mt-4 text-center">
                        @php
                            $statusClass = match($asset->status) {
                                'available' => 'bg-green-500/10 text-green-400 border-green-500/20',
                                'deployed' => 'bg-blue-500/10 text-blue-400 border-blue-500/20',
                                'maintenance' => 'bg-yellow-500/10 text-yellow-400 border-yellow-500/20',
                                'broken' => 'bg-red-500/10 text-red-400 border-red-500/20',
                            };
                        @endphp
                        <span class="px-4 py-2 rounded-full border text-sm font-bold uppercase {{ $statusClass }}">
                            {{ $asset->status }}
                        </span>
                    </div>
                </div>

                <!-- INFO DETAIL (KANAN) -->
                <div class="md:col-span-2 space-y-6">
                    <div>
                        <h2 class="text-3xl font-black text-white">{{ $asset->name }}</h2>
                        <p class="text-luxury-gold font-mono text-lg mt-1">{{ $asset->code }}</p>
                    </div>

                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <p class="text-xs text-gray-500 uppercase tracking-widest mb-1">Kategori</p>
                            <p class="text-white font-medium">{{ $asset->category->name }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 uppercase tracking-widest mb-1">Lokasi</p>
                            <p class="text-white font-medium">{{ $asset->location->name }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 uppercase tracking-widest mb-1">Serial Number</p>
                            <p class="text-white font-mono">{{ $asset->serial_number ?? '-' }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 uppercase tracking-widest mb-1">Harga Beli</p>
                            <p class="text-luxury-gold-light font-mono">Rp {{ number_format($asset->price, 0, ',', '.') }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 uppercase tracking-widest mb-1">Tanggal Beli</p>
                            <p class="text-white">{{ \Carbon\Carbon::parse($asset->purchase_date)->translatedFormat('d F Y') }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 uppercase tracking-widest mb-1">Supplier</p>
                            <p class="text-white">{{ $asset->supplier->name }}</p>
                        </div>
                    </div>

                    @if($asset->allocations->count() > 0)
                        <div class="mt-6 pt-6 border-t border-luxury-gold/10">
                            <p class="text-xs text-gray-500 uppercase tracking-widest mb-3">Riwayat Peminjaman</p>
                            <div class="space-y-2">
                                @foreach($asset->allocations as $history)
                                    <div class="flex items-center gap-3 text-sm bg-white/5 p-3 rounded-lg">
                                        <div class="w-2 h-2 rounded-full bg-luxury-gold"></div>
                                        <span class="text-white">{{ $history->user->name }}</span>
                                        <span class="text-gray-500 text-xs ml-auto">{{ $history->created_at->diffForHumans() }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection