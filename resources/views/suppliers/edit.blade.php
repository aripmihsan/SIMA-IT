@extends('layouts.master')

@section('title', 'Edit Supplier')

@section('content')
    <div class="max-w-2xl mx-auto animate-fade-in-up">
        <div class="mb-8">
            <a href="{{ route('suppliers.index') }}" class="flex items-center gap-2 text-gray-500 hover:text-luxury-gold transition-colors mb-4 text-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali
            </a>
            <h1 class="text-3xl font-black text-white">Edit Data Supplier</h1>
            <p class="text-gray-400 text-sm mt-1">Mengubah data: <span class="text-luxury-gold font-bold">{{ $supplier->name }}</span></p>
        </div>

        <div class="premium-glass p-8 rounded-[2rem] relative overflow-hidden">
            <form action="{{ route('suppliers.update', $supplier->id) }}" method="POST" class="space-y-6 relative z-10">
                @csrf @method('PUT')

                <div class="group">
                    <label class="block text-xs font-bold text-luxury-gold uppercase tracking-widest mb-2">Nama Perusahaan / Toko</label>
                    <input type="text" name="name" value="{{ old('name', $supplier->name) }}" required 
                    class="w-full bg-luxury-900/50 border border-luxury-gold/20 rounded-xl px-5 py-4 text-white focus:outline-none focus:border-luxury-gold transition-all">
                </div>

                <div class="group">
                    <label class="block text-xs font-bold text-luxury-gold uppercase tracking-widest mb-2">Nomor Telepon</label>
                    <input type="text" name="phone" value="{{ old('phone', $supplier->phone) }}" 
                    class="w-full bg-luxury-900/50 border border-luxury-gold/20 rounded-xl px-5 py-4 text-white focus:outline-none focus:border-luxury-gold transition-all">
                </div>

                <div class="group">
                    <label class="block text-xs font-bold text-luxury-gold uppercase tracking-widest mb-2">Alamat Lengkap</label>
                    <textarea name="address" rows="3" 
                    class="w-full bg-luxury-900/50 border border-luxury-gold/20 rounded-xl px-5 py-4 text-white focus:outline-none focus:border-luxury-gold transition-all">{{ old('address', $supplier->address) }}</textarea>
                </div>

                <div class="pt-4 flex gap-4">
                    <button type="submit" class="flex-1 py-4 bg-gradient-to-r from-luxury-gold to-luxury-gold-dark text-black font-bold rounded-xl shadow-gold-glow hover:scale-[1.02] transition-transform">
                        UPDATE SUPPLIER
                    </button>
                    <a href="{{ route('suppliers.index') }}" class="px-8 py-4 bg-white/5 text-gray-400 font-bold rounded-xl hover:bg-white/10 transition">
                        BATAL
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection