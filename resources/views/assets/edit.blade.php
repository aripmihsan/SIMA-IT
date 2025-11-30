@extends('layouts.master')

@section('title', 'Registrasi Aset')

@section('content')
    <div class="max-w-5xl mx-auto animate-fade-in-up">
        
        <!-- Header Page -->
        <div class="flex justify-between items-end mb-8">
            <div>
                <a href="{{ route('assets.index') }}" class="flex items-center gap-2 text-gray-500 hover:text-luxury-gold transition-colors mb-2 text-xs font-bold tracking-widest uppercase">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Kembali ke Daftar
                </a>
                <h1 class="text-4xl font-black text-white tracking-tight">Input Aset Baru</h1>
            </div>
        </div>

        <!-- Form Card -->
        <div class="premium-glass p-8 md:p-10 rounded-[2.5rem] relative overflow-hidden border border-luxury-gold/10">
            <!-- Dekorasi Cahaya -->
            <div class="absolute top-0 right-0 w-64 h-64 bg-luxury-gold/5 rounded-full blur-[80px] pointer-events-none"></div>

            <form action="{{ route('assets.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8 relative z-10">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                    
                    <!-- KOLOM KIRI -->
                    <div class="space-y-6">
                        <div class="flex items-center gap-2 pb-2 border-b border-white/5 mb-6">
                            <span class="w-2 h-2 rounded-full bg-luxury-gold"></span>
                            <h3 class="text-sm font-bold text-gray-400 uppercase tracking-widest">Informasi Utama</h3>
                        </div>
                        
                        <div class="group">
                            <label class="label-modern">Nama Barang</label>
                            <input type="text" name="name" required class="input-modern" placeholder="Contoh: Macbook Pro M3 Max">
                        </div>

                        <div class="grid grid-cols-2 gap-5">
                            <div class="group">
                                <label class="label-modern">Kode Aset</label>
                                <input type="text" name="code" required class="input-modern" placeholder="AST-2025-001">
                            </div>
                            <div class="group">
                                <label class="label-modern">Serial Number</label>
                                <input type="text" name="serial_number" class="input-modern" placeholder="SN-XXXXX">
                            </div>
                        </div>

                        <div class="group">
                            <label class="label-modern">Kategori</label>
                            <div class="relative">
                                <select name="category_id" class="input-modern appearance-none cursor-pointer">
                                    <option value="" disabled selected>-- Pilih Kategori --</option>
                                    @foreach($categories as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center px-4 pointer-events-none text-luxury-gold">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                </div>
                            </div>
                        </div>

                        <!-- INPUT HARGA (DIPERBAIKI: NO PLACEHOLDER & LEBIH LEBAR) -->
                        <div class="group">
                            <label class="label-modern">Harga Beli (IDR)</label>
                            <div class="relative">
                                <!-- Tulisan Rp -->
                                <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none">
                                    <span class="text-luxury-gold font-bold text-sm">Rp</span>
                                </div>
                                
                                <!-- Input Angka: Padding Kiri 64px (pl-16) dan Placeholder Kosong -->
                                <input type="number" name="price" required 
                                       class="input-modern pl-16" 
                                       placeholder="" min="0">
                            </div>
                        </div>
                    </div>

                    <!-- KOLOM KANAN -->
                    <div class="space-y-6">
                        <div class="flex items-center gap-2 pb-2 border-b border-white/5 mb-6">
                            <span class="w-2 h-2 rounded-full bg-luxury-gold"></span>
                            <h3 class="text-sm font-bold text-gray-400 uppercase tracking-widest">Detail & Lokasi</h3>
                        </div>

                        <div class="group">
                            <label class="label-modern">Lokasi Penempatan</label>
                            <div class="relative">
                                <select name="location_id" class="input-modern appearance-none cursor-pointer">
                                    <option value="" disabled selected>-- Pilih Lokasi --</option>
                                    @foreach($locations as $loc)
                                        <option value="{{ $loc->id }}">{{ $loc->name }}</option>
                                    @endforeach
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center px-4 pointer-events-none text-luxury-gold">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                </div>
                            </div>
                        </div>

                        <div class="group">
                            <label class="label-modern">Supplier</label>
                            <div class="relative">
                                <select name="supplier_id" class="input-modern appearance-none cursor-pointer">
                                    <option value="" disabled selected>-- Pilih Supplier --</option>
                                    @foreach($suppliers as $sup)
                                        <option value="{{ $sup->id }}">{{ $sup->name }}</option>
                                    @endforeach
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center px-4 pointer-events-none text-luxury-gold">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-5">
                            <div class="group">
                                <label class="label-modern">Tanggal Beli</label>
                                <input type="date" name="purchase_date" required class="input-modern cursor-pointer">
                            </div>
                            <div class="group">
                                <label class="label-modern">Status Awal</label>
                                <div class="relative">
                                    <select name="status" class="input-modern appearance-none cursor-pointer">
                                        <option value="available">Tersedia</option>
                                        <option value="deployed">Digunakan</option>
                                        <option value="maintenance">Perbaikan</option>
                                        <option value="broken">Rusak</option>
                                    </select>
                                    <div class="absolute inset-y-0 right-0 flex items-center px-4 pointer-events-none text-luxury-gold">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="group">
                            <label class="label-modern">Foto Aset</label>
                            <label class="flex flex-col items-center justify-center w-full h-32 border-2 border-luxury-gold/20 border-dashed rounded-2xl cursor-pointer bg-black/20 hover:bg-luxury-gold/5 hover:border-luxury-gold hover:scale-[1.01] transition-all duration-300 group-hover:shadow-gold-sm">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-8 h-8 mb-3 text-luxury-gold/50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                                    <p class="text-xs text-gray-400">Klik untuk upload <span class="font-bold text-luxury-gold">Gambar</span></p>
                                </div>
                                <input type="file" name="image" class="hidden" accept="image/*" /> 
                            </label>
                        </div>
                    </div>
                </div>

                <div class="pt-6 border-t border-white/5">
                    <button type="submit" class="w-full py-4 bg-gradient-to-r from-luxury-gold to-luxury-gold-dark text-black font-black text-sm tracking-widest uppercase rounded-xl shadow-gold-glow hover:scale-[1.01] active:scale-[0.99] transition-all duration-300">
                        Simpan Data Aset
                    </button>
                </div>
            </form>
        </div>
    </div>

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
        
        /* Memutihkan Ikon Kalender */
        input[type="date"]::-webkit-calendar-picker-indicator {
            filter: invert(1);
            cursor: pointer;
            opacity: 0.6;
            transition: opacity 0.2s;
        }
        input[type="date"]::-webkit-calendar-picker-indicator:hover {
            opacity: 1;
        }

        /* Hilangkan Panah Angka (Spinner) */
        input[type=number]::-webkit-inner-spin-button, 
        input[type=number]::-webkit-outer-spin-button { 
            -webkit-appearance: none; 
            margin: 0; 
        }
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
@endsection