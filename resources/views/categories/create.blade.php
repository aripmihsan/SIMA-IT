@extends('layouts.master')

@section('title', 'Tambah Kategori')

@section('content')
    <div class="max-w-2xl mx-auto animate-fade-in-up">
        
        <div class="flex justify-between items-end mb-8">
            <div>
                <a href="{{ route('categories.index') }}" class="flex items-center gap-2 text-gray-500 hover:text-luxury-gold transition-colors mb-2 text-xs font-bold tracking-widest uppercase">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Kembali
                </a>
                <h1 class="text-4xl font-black text-white tracking-tight">Input Kategori</h1>
            </div>
        </div>

        <div class="premium-glass p-8 md:p-10 rounded-[2.5rem] relative overflow-hidden border border-luxury-gold/10">
            <div class="absolute top-0 right-0 w-64 h-64 bg-luxury-gold/5 rounded-full blur-[80px] pointer-events-none"></div>

            <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8 relative z-10">
                @csrf

                <div class="group">
                    <label class="label-modern">Nama Kategori</label>
                    <input type="text" name="name" required class="input-modern" placeholder="Contoh: Laptop / Elektronik">
                </div>

                <div class="group">
                    <label class="label-modern">Foto Kategori</label>
                    <label class="flex flex-col items-center justify-center w-full h-40 border-2 border-luxury-gold/20 border-dashed rounded-2xl cursor-pointer bg-black/20 hover:bg-luxury-gold/5 hover:border-luxury-gold hover:scale-[1.01] transition-all duration-300 group-hover:shadow-gold-sm relative overflow-hidden">
                        
                        <div class="flex flex-col items-center justify-center pt-5 pb-6 text-center" id="upload-placeholder">
                            <svg class="w-10 h-10 mb-3 text-luxury-gold/50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                            <p class="text-xs text-gray-400">Klik untuk upload <span class="font-bold text-luxury-gold">Gambar</span></p>
                            <p class="text-[10px] text-gray-600 mt-1">PNG, JPG (Max. 2MB)</p>
                        </div>

                        <div id="file-info" class="hidden absolute inset-0 flex flex-col items-center justify-center bg-luxury-900/90 w-full h-full">
                             <svg class="w-8 h-8 mb-2 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                             <p class="text-sm text-white font-bold px-4 text-center truncate w-full" id="file-name">...</p>
                             <p class="text-[10px] text-luxury-gold mt-1">Klik untuk ganti</p>
                        </div>

                        <input type="file" name="image" class="hidden" accept="image/*" onchange="showFileName(this)" required /> 
                    </label>
                </div>

                <div class="group">
                    <label class="label-modern">Deskripsi</label>
                    <textarea name="description" rows="4" class="input-modern" placeholder="Keterangan singkat..."></textarea>
                </div>

                <div class="pt-4 border-t border-white/5">
                    <button type="submit" class="w-full py-4 bg-gradient-to-r from-luxury-gold to-luxury-gold-dark text-black font-black text-sm tracking-widest uppercase rounded-xl shadow-gold-glow hover:scale-[1.01] active:scale-[0.99] transition-all duration-300">
                        SIMPAN DATA
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function showFileName(input) {
            if (input.files && input.files[0]) {
                var fileName = input.files[0].name;
                document.getElementById('file-name').innerText = fileName;
                
                // Sembunyikan placeholder, tampilkan info file
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