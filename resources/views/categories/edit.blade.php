@extends('layouts.master')

@section('title', 'Edit Kategori')

@section('content')
    
    <div class="max-w-2xl mx-auto animate-fade-in-up">
        <div class="mb-8">
            <a href="{{ route('categories.index') }}" class="flex items-center gap-2 text-gray-500 hover:text-luxury-gold transition-colors mb-4 text-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali ke Daftar
            </a>
            <h1 class="text-3xl font-black text-white tracking-tight">Edit Data</h1>
            <p class="text-gray-400 text-sm mt-1">Mengubah data kategori: <span class="text-luxury-gold font-bold">{{ $category->name }}</span></p>
        </div>

        <div class="premium-glass p-8 rounded-[2rem] relative overflow-hidden">
            <div class="absolute top-0 right-0 w-32 h-32 bg-luxury-gold/10 rounded-full blur-2xl pointer-events-none"></div>

            <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6 relative z-10">
                @csrf 
                @method('PUT') <div class="group">
                    <label class="block text-xs font-bold text-luxury-gold uppercase tracking-widest mb-2">Nama Kategori</label>
                    <input type="text" name="name" value="{{ old('name', $category->name) }}" required 
                    class="w-full bg-luxury-900/50 border border-luxury-gold/20 rounded-xl px-5 py-4 text-white focus:outline-none focus:border-luxury-gold transition-all">
                </div>

                <div class="group">
                    <label class="block text-xs font-bold text-luxury-gold uppercase tracking-widest mb-2">Foto Kategori</label>
                    
                    <div class="flex items-start gap-6">
                        <div class="shrink-0">
                            <p class="text-xs text-gray-500 mb-2">Saat ini:</p>
                            <div class="w-32 h-32 rounded-xl overflow-hidden border border-luxury-gold/30 shadow-lg relative group-img">
                                @if($category->image)
                                    <img src="{{ asset('storage/' . $category->image) }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full bg-luxury-900 flex items-center justify-center text-luxury-gold/20 font-bold">NO IMG</div>
                                @endif
                            </div>
                        </div>

                        <div class="flex-1">
                            <p class="text-xs text-gray-500 mb-2">Ganti foto (Opsional):</p>
                            <label class="flex flex-col items-center justify-center w-full h-32 border-2 border-luxury-gold/30 border-dashed rounded-xl cursor-pointer bg-luxury-900/30 hover:bg-luxury-gold/5 hover:border-luxury-gold transition-all">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-6 h-6 mb-2 text-luxury-gold/50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                                    <p class="text-xs text-gray-400">Klik untuk ganti foto</p>
                                </div>
                                <input type="file" name="image" class="hidden" /> 
                            </label>
                        </div>
                    </div>
                </div>

                <div class="group">
                    <label class="block text-xs font-bold text-luxury-gold uppercase tracking-widest mb-2">Deskripsi</label>
                    <textarea name="description" rows="4" 
                    class="w-full bg-luxury-900/50 border border-luxury-gold/20 rounded-xl px-5 py-4 text-white focus:outline-none focus:border-luxury-gold transition-all">{{ old('description', $category->description) }}</textarea>
                </div>

                <div class="pt-4 flex items-center gap-4">
                    <button type="submit" class="flex-1 py-4 bg-gradient-to-r from-luxury-gold to-luxury-gold-dark text-black font-bold rounded-xl shadow-gold-glow hover:scale-[1.02] transition-transform">
                        UPDATE PERUBAHAN
                    </button>
                    <a href="{{ route('categories.index') }}" class="px-8 py-4 bg-white/5 text-gray-400 font-bold rounded-xl hover:bg-white/10 hover:text-white transition-colors">
                        BATAL
                    </a>
                </div>
            </form>
        </div>
    </div>

@endsection