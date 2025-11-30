@extends('layouts.master')

@section('title', 'Transaksi Peminjaman')

@section('content')

    @if(session('success'))
        <div class="mb-6 p-4 rounded-xl bg-green-500/10 border border-green-500/30 text-green-400 flex items-center gap-3 animate-fade-in-up">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            <span class="font-bold text-sm">{{ session('success') }}</span>
        </div>
    @endif

    <div class="flex justify-between items-center mb-8 gap-4 animate-fade-in-up">
        <div>
            <h1 class="text-3xl font-black text-white tracking-tight">Peminjaman Aset</h1>
            <p class="text-gray-400 mt-1 text-sm">Kelola distribusi aset ke karyawan.</p>
        </div>
        
        @if(Auth::user()->role == 'admin')
            <a href="{{ route('allocations.create') }}" class="group relative px-6 py-3 bg-gradient-to-r from-luxury-gold to-luxury-gold-dark rounded-xl font-bold text-black shadow-gold-glow hover:scale-105 transition-transform overflow-hidden">
                <span class="relative z-10 flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    Buat Peminjaman
                </span>
                <div class="absolute inset-0 bg-white/20 translate-y-full group-hover:translate-y-0 transition-transform duration-300"></div>
            </a>
        @endif
    </div>

    <div class="premium-glass rounded-[2rem] overflow-hidden shadow-2xl relative animate-fade-in-up">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-luxury-gold/10 text-luxury-gold uppercase text-xs tracking-widest bg-black/20">
                        <th class="p-6 font-semibold">Karyawan</th>
                        <th class="p-6 font-semibold">Barang Dipinjam</th>
                        <th class="p-6 font-semibold">Tanggal Pinjam</th>
                        <th class="p-6 font-semibold">Status</th>
                        <th class="p-6 font-semibold text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-300 divide-y divide-luxury-gold/5">
                    @forelse($allocations as $item)
                        <tr class="hover:bg-luxury-gold/5 transition-colors">
                            <td class="p-6">
                                <div class="font-bold text-white">{{ $item->user->name }}</div>
                                <div class="text-xs text-gray-500">{{ $item->user->email }}</div>
                            </td>
                            <td class="p-6">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded bg-black border border-luxury-gold/20 overflow-hidden shrink-0">
                                        @if($item->asset->image)
                                            <img src="{{ asset('storage/'.$item->asset->image) }}" class="w-full h-full object-cover">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center text-[8px] text-gray-500">NO IMG</div>
                                        @endif
                                    </div>
                                    <div>
                                        <div class="text-white font-medium">{{ $item->asset->name }}</div>
                                        <div class="text-xs text-luxury-gold font-mono">{{ $item->asset->code }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="p-6 text-sm">
                                {{ \Carbon\Carbon::parse($item->allocated_date)->format('d M Y') }}
                            </td>
                            <td class="p-6">
                                <span class="px-3 py-1 rounded-full bg-blue-500/10 border border-blue-500/30 text-blue-400 text-xs font-bold uppercase">
                                    Sedang Dipakai
                                </span>
                            </td>
                            <td class="p-6 text-right">
                                @if(Auth::user()->role == 'admin')
                                    <form action="{{ route('allocations.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Konfirmasi pengembalian barang? Status aset akan kembali menjadi Tersedia.');">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="px-4 py-2 bg-luxury-gold/10 hover:bg-luxury-gold/20 text-luxury-gold text-xs font-bold rounded-lg border border-luxury-gold/30 transition">
                                            ✔ KEMBALIKAN
                                        </button>
                                    </form>
                                @else
                                    <span class="text-xs text-gray-500 italic">Sedang Anda Gunakan</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="p-12 text-center text-gray-500">Belum ada barang yang sedang dipinjam.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection