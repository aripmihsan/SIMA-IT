@extends('layouts.master')

@section('title', 'Edit Kategori')

@section('content')
    
    <div class="max-w-2xl mx-auto animate-fade-in-up">
        
        <div class="mb-8">
            <a href="{{ route('categories.index') }}" class="flex items-center gap-2 text-gray-500 hover:text-luxury-gold transition-colors mb-4 text-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali
            </a>
            <h1 class="text-3xl font-black text-white tracking-tight">Edit Data</h1>
            <p class="text-gray-400 text-sm mt-1">Mengubah data: <span class="text-luxury-gold font-bold">{{ $category->name }}</span></p>
        </div>

        <div class="premium-glass p-8 rounded-[2rem] relative overflow-hidden border border-luxury-gold/10">
            <div class="absolute top-0 right-0 w-32 h-32 bg-luxury-gold/10 rounded-full blur-2xl pointer-events-none"></div>

            <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6 relative z-10">
                @csrf 
                @method('PUT')

                <div class="group">
                    <label class="label-modern">Nama Kategori</label>
                    <input type="text" name="name" value="{{ old('name', $category->name) }}" required class="input-modern">
                </div>

                <div class="group">
                    <label class="label-modern">Foto Kategori</label>
                    
                    <div class="flex items-start gap-6">
                        <div class="shrink-0">
                            <p class="text-[10px] text-gray-500 mb-2 uppercase tracking-widest">Saat ini</p>
                            <div class="w-32 h-32 rounded-2xl overflow-hidden border-2 border-luxury-gold/30 shadow-lg relative bg-black">
                                @if($category->image)
                                    <img src="{{ asset('storage/' . $category->image) }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-gray-600 font-mono text-xs">NO IMG</div>
                                @endif
                            </div>
                        </div>

                        <div class="flex-1">
                            <p class="text-[10px] text-gray-500 mb-2 uppercase tracking-widest">Ganti Foto</p>
                            <label class="flex flex-col items-center justify-center w-full h-32 border-2 border-luxury-gold/20 border-dashed rounded-2xl cursor-pointer bg-black/20 hover:bg-luxury-gold/5 hover:border-luxury-gold hover:scale-[1.01] transition-all relative overflow-hidden group-hover:shadow-gold-sm">
                                
                                <div class="flex flex-col items-center justify-center pt-5 pb-6 text-center" id="upload-placeholder">
                                    <svg class="w-8 h-8 mb-2 text-luxury-gold/50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                                    <p class="text-xs text-gray-400">Klik untuk ganti</p>
                                </div>

                                <div id="file-info" class="hidden absolute inset-0 flex flex-col items-center justify-center bg-luxury-900/90 w-full h-full">
                                     <svg class="w-6 h-6 mb-1 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                     <p class="text-xs text-white font-bold px-4 text-center truncate w-full" id="file-name">...</p>
                                </div>

                                <input type="file" name="image" class="hidden" accept="image/*" onchange="showFileName(this)" /> 
                            </label>
                        </div>
                    </div>
                </div>

                <div class="group">
                    <label class="label-modern">Deskripsi</label>
                    <textarea name="description" rows="4" class="input-modern">{{ old('description', $category->description) }}</textarea>
                </div>

                <div class="pt-6 border-t border-white/5 flex gap-4">
                    <button type="submit" class="flex-1 py-4 bg-gradient-to-r from-luxury-gold to-luxury-gold-dark text-black font-black text-sm tracking-widest uppercase rounded-xl shadow-gold-glow hover:scale-[1.01] active:scale-[0.99] transition-all duration-300">
                        Simpan Perubahan
                    </button>
                    <a href="{{ route('categories.index') }}" class="px-8 py-4 bg-white/5 text-gray-400 font-bold rounded-xl hover:bg-white/10 hover:text-white transition-colors border border-white/5 text-sm flex items-center">
                        BATAL
                    </a>
                </div>
            </form>
        </div>
    </div>

    <script>
        function showFileName(input) {
            if (input.files && input.files[0]) {
                var fileName = input.files[0].name;
                document.getElementById('file-name').innerText = fileName;
                document.getElementById('upload-placeholder').classList.add('hidden');
                document.getElementById('file-info').classList.remove('hidden');
                document.getElementById('file-info').classList.add('flex');
            }
        }
    </script>

    <style>
        .label-modern { 
            display: block; 
            font-size: 0.7rem; 
            font-weight: 700; 
            color: #D4AF37; 
            text-transform: uppercase; 
            letter-spacing: 0.1em; 
            margin-bottom: 0.5rem; 
        }
        .input-modern { 
            width: 100%; 
            background-color: rgba(10, 10, 10, 0.6); 
            border: 1px solid rgba(255, 255, 255, 0.1); 
            border-radius: 1rem; 
            padding: 0.8rem 1.25rem; 
            color: white; 
            font-size: 0.95rem;
            transition: all 0.3s ease; 
        }
        .input-modern:focus { 
            outline: none; 
            border-color: #D4AF37; 
            background-color: rgba(10, 10, 10, 0.9);
            box-shadow: 0 0 20px -5px rgba(212, 175, 55, 0.2); 
        }
    </style>
@endsection