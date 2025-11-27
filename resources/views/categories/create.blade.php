@extends('layouts.master')

@section('title', 'Tambah Kategori')

@section('content')
    <div class="max-w-2xl mx-auto animate-fade-in-up">
        <div class="mb-8">
            <a href="{{ route('categories.index') }}" class="flex items-center gap-2 text-gray-500 hover:text-luxury-gold transition-colors mb-4 text-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali
            </a>
            <h1 class="text-3xl font-black text-white">Input Data + Gambar</h1>
        </div>

        <div class="premium-glass p-8 rounded-[2rem] relative overflow-hidden">
            
            <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6 relative z-10">
                @csrf

                <div class="group">
                    <label class="block text-xs font-bold text-luxury-gold uppercase tracking-widest mb-2">Nama Kategori</label>
                    <input type="text" name="name" required class="w-full bg-luxury-900/50 border border-luxury-gold/20 rounded-xl px-5 py-4 text-white focus:outline-none focus:border-luxury-gold transition-all">
                </div>

                <div class="group">
                    <label class="block text-xs font-bold text-luxury-gold uppercase tracking-widest mb-2">Foto Kategori</label>
                    <label class="flex flex-col items-center justify-center w-full h-32 border-2 border-luxury-gold/30 border-dashed rounded-xl cursor-pointer bg-luxury-900/30 hover:bg-luxury-gold/5 hover:border-luxury-gold transition-all group-hover:shadow-gold-glow">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg class="w-8 h-8 mb-3 text-luxury-gold/50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                            <p class="text-sm text-gray-400"><span class="font-bold text-luxury-gold">Klik untuk upload</span> atau drag file ke sini</p>
                            <p class="text-xs text-gray-500">SVG, PNG, JPG (MAX. 2MB)</p>
                        </div>
                        <input type="file" name="image" class="hidden" required /> 
                    </label>
                </div>

                <div class="group">
                    <label class="block text-xs font-bold text-luxury-gold uppercase tracking-widest mb-2">Deskripsi</label>
                    <textarea name="description" rows="3" class="w-full bg-luxury-900/50 border border-luxury-gold/20 rounded-xl px-5 py-4 text-white focus:outline-none focus:border-luxury-gold transition-all"></textarea>
                </div>

                <button type="submit" class="w-full py-4 bg-gradient-to-r from-luxury-gold to-luxury-gold-dark text-black font-bold rounded-xl shadow-gold-glow hover:scale-[1.02] transition-transform">
                    SIMPAN DATA
                </button>
            </form>
        </div>
    </div>
@endsection