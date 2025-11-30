@extends('layouts.master')

@section('title', 'Data Aset IT')

@section('content')

    @if(session('success'))
        <div class="mb-6 p-4 rounded-xl bg-green-500/10 border border-green-500/30 text-green-400 flex items-center gap-3 animate-fade-in-up">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            <span class="font-bold text-sm">{{ session('success') }}</span>
        </div>
    @endif

    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4 animate-fade-in-up">
        <div>
            <h1 class="text-3xl font-black text-white tracking-tight">Inventaris Aset</h1>
            <p class="text-gray-400 mt-1 text-sm">Kelola seluruh perangkat keras dan lunak perusahaan.</p>
        </div>
        
        @if(Auth::user()->role == 'admin')
            <a href="{{ route('assets.create') }}" class="group relative px-6 py-3 bg-gradient-to-r from-luxury-gold to-luxury-gold-dark rounded-xl font-bold text-black shadow-gold-glow hover:scale-105 transition-transform overflow-hidden">
                <span class="relative z-10 flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    Registrasi Aset
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
                        <th class="p-6 font-semibold">Aset Info</th>
                        <th class="p-6 font-semibold">Kategori & Lokasi</th>
                        <th class="p-6 font-semibold">Kondisi</th>
                        <th class="p-6 font-semibold">Harga</th>
                        <th class="p-6 font-semibold text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-300 divide-y divide-luxury-gold/5">
                    @forelse($assets as $item)
                        <tr class="hover:bg-luxury-gold/5 transition-colors group">
                            
                            <td class="p-6">
                                <div class="flex items-center gap-4">
                                    <div class="w-14 h-14 rounded-lg overflow-hidden border border-luxury-gold/20 bg-black shrink-0">
                                        @if($item->image)
                                            <img src="{{ asset('storage/' . $item->image) }}" class="w-full h-full object-cover">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center text-[10px] text-gray-600">NO IMG</div>
                                        @endif
                                    </div>
                                    <div>
                                        <div class="font-bold text-white group-hover:text-luxury-gold transition">{{ $item->name }}</div>
                                        <div class="text-xs text-gray-500 font-mono mt-1">{{ $item->code }}</div>
                                        <div class="text-[10px] text-gray-600">{{ $item->serial_number }}</div>
                                    </div>
                                </div>
                            </td>

                            <td class="p-6">
                                <div class="text-sm text-white">{{ $item->category->name }}</div>
                                <div class="text-xs text-gray-500 mt-1 flex items-center gap-1">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                    {{ $item->location->name }}
                                </div>
                            </td>

                            <td class="p-6">
                                @php
                                    $statusClass = match($item->status) {
                                        'available' => 'bg-green-500/10 text-green-400 border-green-500/20',
                                        'deployed' => 'bg-blue-500/10 text-blue-400 border-blue-500/20',
                                        'maintenance' => 'bg-yellow-500/10 text-yellow-400 border-yellow-500/20',
                                        'broken' => 'bg-red-500/10 text-red-400 border-red-500/20',
                                        default => 'bg-gray-500/10 text-gray-400 border-gray-500/20'
                                    };
                                @endphp
                                <span class="px-3 py-1 rounded-full border text-xs font-bold uppercase {{ $statusClass }}">
                                    {{ $item->status }}
                                </span>
                            </td>

                            <td class="p-6 text-sm font-mono text-luxury-gold-light">
                                Rp {{ number_format($item->price, 0, ',', '.') }}
                            </td>

                            <td class="p-6 text-right">
                                
                                @if(Auth::user()->role == 'admin')
                                    <div class="flex items-center justify-end gap-2">
                                        
                                        <a href="{{ route('assets.edit', $item->id) }}" class="p-2 rounded-lg hover:bg-luxury-gold/20 text-gray-500 hover:text-luxury-gold transition tooltip" title="Edit Data">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                        </a>

                                        <form action="{{ route('assets.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus aset ini?');">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="p-2 rounded-lg hover:bg-red-500/10 text-gray-500 hover:text-red-500 transition tooltip" title="Hapus Data">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                            </button>
                                        </form>

                                    </div>
                                @else
                                    <span class="text-xs text-gray-600 italic bg-white/5 px-2 py-1 rounded">Read Only</span>
                                @endif

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-12 text-center text-gray-500">
                                <div class="flex flex-col items-center justify-center opacity-50">
                                    <svg class="w-12 h-12 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                                    <p>Belum ada aset terdaftar.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection