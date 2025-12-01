@extends('layouts.master')

@section('title', 'Manajemen Lokasi')

@section('content')

    @if(session('success'))
        <div class="mb-6 p-4 rounded-xl bg-green-500/10 border border-green-500/30 text-green-400 flex items-center gap-3 animate-fade-in-up">
            <div class="p-2 bg-green-500/20 rounded-full">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            </div>
            <div>
                <h4 class="font-bold text-sm">Berhasil!</h4>
                <p class="text-xs opacity-80">{{ session('success') }}</p>
            </div>
        </div>
    @endif
    
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4 animate-fade-in-up">
        <div>
            <h1 class="text-3xl font-black text-white tracking-tight">Data Lokasi</h1>
            <p class="text-gray-400 mt-1 text-sm">Daftar ruangan atau tempat penyimpanan aset (Contoh: Gudang, Ruang Server).</p>
        </div>
        
        <a href="{{ route('locations.create') }}" class="group relative px-6 py-3 bg-gradient-to-r from-luxury-gold to-luxury-gold-dark rounded-xl font-bold text-black shadow-gold-glow hover:scale-105 transition-transform overflow-hidden">
            <span class="relative z-10 flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                Tambah Lokasi
            </span>
            <div class="absolute inset-0 bg-white/20 translate-y-full group-hover:translate-y-0 transition-transform duration-300"></div>
        </a>
    </div>

    <div class="premium-glass rounded-[2rem] overflow-hidden shadow-2xl relative animate-fade-in-up">
        <div class="absolute top-0 right-0 w-64 h-64 bg-luxury-gold/5 rounded-full blur-3xl pointer-events-none"></div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-luxury-gold/10 text-luxury-gold uppercase text-xs tracking-widest bg-black/20">
                        <th class="p-6 font-semibold rounded-tl-[2rem]">No</th>
                        <th class="p-6 font-semibold">Nama Lokasi</th>
                        <th class="p-6 font-semibold">Keterangan</th>
                        <th class="p-6 font-semibold text-right rounded-tr-[2rem]">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-300 divide-y divide-luxury-gold/5">
                    @forelse($locations as $index => $item)
                        <tr class="hover:bg-luxury-gold/5 transition-colors group">
                            <td class="p-6 font-mono text-luxury-gold/50">#{{ $index + 1 }}</td>
                            <td class="p-6 font-bold text-white group-hover:text-luxury-gold transition-colors">
                                {{ $item->name }}
                            </td>
                            <td class="p-6 text-sm text-gray-400">
                                {{ $item->description ?? '-' }}
                            </td>
                            <td class="p-6 text-right">
                                <div class="flex items-center justify-end gap-2 opacity-60 group-hover:opacity-100 transition-opacity">
                                    <a href="{{ route('locations.edit', $item->id) }}" class="p-2 rounded-lg hover:bg-luxury-gold/20 text-luxury-gold border border-transparent hover:border-luxury-gold/30 transition">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                    </a>
                                    <form action="{{ route('locations.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus lokasi ini?');">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="p-2 rounded-lg hover:bg-red-500/10 text-red-400 hover:text-red-500 border border-transparent hover:border-red-500/30 transition">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="p-12 text-center text-gray-500">Belum ada data lokasi.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection