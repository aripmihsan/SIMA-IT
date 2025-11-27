@extends('layouts.master')

@section('title', 'Tambah Supplier')

@section('content')
    <div class="max-w-2xl mx-auto animate-fade-in-up">
        <div class="mb-8">
            <a href="{{ route('suppliers.index') }}" class="flex items-center gap-2 text-gray-500 hover:text-luxury-gold transition-colors mb-4 text-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali
            </a>
            <h1 class="text-3xl font-black text-white">Input Supplier Baru</h1>
        </div>

        <div class="premium-glass p-8 rounded-[2rem] relative overflow-hidden">
            <div class="absolute top-0 right-0 w-32 h-32 bg-luxury-gold/10 rounded-full blur-2xl pointer-events-none"></div>

            <form action="{{ route('suppliers.store') }}" method="POST" class="space-y-6 relative z-10">
                @csrf

                <div class="group">
                    <label class="block text-xs font-bold text-luxury-gold uppercase tracking-widest mb-2">Nama Perusahaan / Toko</label>
                    <input type="text" name="name" required placeholder="Contoh: PT. Sumber Makmur" 
                    class="w-full bg-luxury-900/50 border border-luxury-gold/20 rounded-xl px-5 py-4 text-white placeholder-gray-600 focus:outline-none focus:border-luxury-gold transition-all">
                </div>

                <div class="group">
                    <label class="block text-xs font-bold text-luxury-gold uppercase tracking-widest mb-2">Nomor Telepon / WA</label>
                    <input type="text" name="phone" placeholder="0812xxxx" 
                    class="w-full bg-luxury-900/50 border border-luxury-gold/20 rounded-xl px-5 py-4 text-white placeholder-gray-600 focus:outline-none focus:border-luxury-gold transition-all">
                </div>

                <div class="group">
                    <label class="block text-xs font-bold text-luxury-gold uppercase tracking-widest mb-2">Alamat Lengkap</label>
                    <textarea name="address" rows="3" placeholder="Jl. Raya..." 
                    class="w-full bg-luxury-900/50 border border-luxury-gold/20 rounded-xl px-5 py-4 text-white placeholder-gray-600 focus:outline-none focus:border-luxury-gold transition-all"></textarea>
                </div>

                <div class="pt-4 flex gap-4">
                    <button type="submit" class="flex-1 py-4 bg-gradient-to-r from-luxury-gold to-luxury-gold-dark text-black font-bold rounded-xl shadow-gold-glow hover:scale-[1.02] transition-transform">
                        SIMPAN DATA
                    </button>
                    <a href="{{ route('suppliers.index') }}" class="px-8 py-4 bg-white/5 text-gray-400 font-bold rounded-xl hover:bg-white/10 transition">
                        BATAL
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection