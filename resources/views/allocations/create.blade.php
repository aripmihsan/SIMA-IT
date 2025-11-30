@extends('layouts.master')

@section('title', 'Buat Peminjaman')

@section('content')
    <div class="max-w-2xl mx-auto animate-fade-in-up">
        <div class="mb-8">
            <a href="{{ route('allocations.index') }}" class="flex items-center gap-2 text-gray-500 hover:text-luxury-gold transition-colors mb-4 text-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali
            </a>
            <h1 class="text-3xl font-black text-white">Form Peminjaman</h1>
            <p class="text-gray-400 text-sm mt-1">Pilih karyawan dan aset yang akan diserahkan.</p>
        </div>

        <div class="premium-glass p-8 rounded-[2rem] relative overflow-hidden">
            <div class="absolute top-0 right-0 w-32 h-32 bg-luxury-gold/10 rounded-full blur-2xl pointer-events-none"></div>

            <form action="{{ route('allocations.store') }}" method="POST" class="space-y-6 relative z-10">
                @csrf

                <div class="group">
                    <label class="block text-xs font-bold text-luxury-gold uppercase tracking-widest mb-2">Pilih Karyawan</label>
                    <select name="user_id" class="w-full bg-luxury-900/50 border border-luxury-gold/20 rounded-xl px-5 py-4 text-white focus:outline-none focus:border-luxury-gold transition-all" required>
                        <option value="" disabled selected>-- Pilih Nama Staff --</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }} - {{ $user->email }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="group">
                    <label class="block text-xs font-bold text-luxury-gold uppercase tracking-widest mb-2">Pilih Aset (Tersedia)</label>
                    <select name="asset_id" class="w-full bg-luxury-900/50 border border-luxury-gold/20 rounded-xl px-5 py-4 text-white focus:outline-none focus:border-luxury-gold transition-all" required>
                        <option value="" disabled selected>-- Pilih Barang --</option>
                        @foreach($assets as $asset)
                            <option value="{{ $asset->id }}">
                                {{ $asset->code }} - {{ $asset->name }} ({{ $asset->category->name }})
                            </option>
                        @endforeach
                    </select>
                    @if($assets->isEmpty())
                        <p class="text-red-400 text-xs mt-2">*Tidak ada aset yang tersedia saat ini.</p>
                    @endif
                </div>

                <div class="group">
                    <label class="block text-xs font-bold text-luxury-gold uppercase tracking-widest mb-2">Tanggal Peminjaman</label>
                    <input type="date" name="allocated_date" value="{{ date('Y-m-d') }}" required class="w-full bg-luxury-900/50 border border-luxury-gold/20 rounded-xl px-5 py-4 text-white focus:outline-none focus:border-luxury-gold transition-all">
                </div>

                <div class="group">
                    <label class="block text-xs font-bold text-luxury-gold uppercase tracking-widest mb-2">Catatan (Kondisi/Kelengkapan)</label>
                    <textarea name="notes" rows="3" placeholder="Contoh: Lengkap dengan charger dan tas..." class="w-full bg-luxury-900/50 border border-luxury-gold/20 rounded-xl px-5 py-4 text-white focus:outline-none focus:border-luxury-gold transition-all"></textarea>
                </div>

                <div class="pt-4 flex gap-4">
                    <button type="submit" class="flex-1 py-4 bg-gradient-to-r from-luxury-gold to-luxury-gold-dark text-black font-bold rounded-xl shadow-gold-glow hover:scale-[1.02] transition-transform">
                        PROSES PEMINJAMAN
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection