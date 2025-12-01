@extends('layouts.master')

@section('title', 'Edit Data Aset')

@section('content')
    <div class="max-w-5xl mx-auto animate-fade-in-up">
        
        <div class="flex justify-between items-end mb-8">
            <div>
                <a href="{{ route('assets.index') }}" class="flex items-center gap-2 text-gray-500 hover:text-luxury-gold transition-colors mb-2 text-xs font-bold tracking-widest uppercase">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Kembali ke Daftar
                </a>
                <h1 class="text-4xl font-black text-white tracking-tight">Edit Aset</h1>
                <p class="text-gray-400 mt-1 text-sm">Mengubah data: <span class="text-luxury-gold font-bold">{{ $asset->name }}</span></p>
            </div>
        </div>

        <div class="premium-glass p-8 md:p-10 rounded-[2.5rem] relative overflow-hidden border border-luxury-gold/10">
            <div class="absolute top-0 right-0 w-64 h-64 bg-luxury-gold/5 rounded-full blur-[80px] pointer-events-none"></div>

            <form action="{{ route('assets.update', $asset->id) }}" method="POST" enctype="multipart/form-data" class="space-y-8 relative z-10">
                @csrf @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                    
                    <div class="space-y-6">
                        <div class="flex items-center gap-2 pb-2 border-b border-white/5 mb-6">
                            <span class="w-2 h-2 rounded-full bg-luxury-gold"></span>
                            <h3 class="text-sm font-bold text-gray-400 uppercase tracking-widest">Informasi Utama</h3>
                        </div>
                        
                        <div class="group">
                            <label class="label-modern">Nama Barang</label>
                            <input type="text" name="name" value="{{ old('name', $asset->name) }}" required class="input-modern">
                        </div>

                        <div class="grid grid-cols-2 gap-5">
                            <div class="group">
                                <label class="label-modern">Kode Aset</label>
                                <input type="text" name="code" value="{{ old('code', $asset->code) }}" required class="input-modern">
                            </div>
                            <div class="group">
                                <label class="label-modern">Serial Number</label>
                                <input type="text" name="serial_number" value="{{ old('serial_number', $asset->serial_number) }}" class="input-modern">
                            </div>
                        </div>

                        <div class="group">
                            <label class="label-modern">Kategori</label>
                            <div class="relative">
                                <select name="category_id" class="input-modern appearance-none cursor-pointer">
                                    @foreach($categories as $cat)
                                        <option value="{{ $cat->id }}" {{ $asset->category_id == $cat->id ? 'selected' : '' }}>
                                            {{ $cat->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center px-4 pointer-events-none text-luxury-gold">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                </div>
                            </div>
                        </div>

                        <div class="group">
                            <label class="label-modern">Harga Beli (IDR)</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none">
                                    <span class="text-luxury-gold font-bold text-sm">Rp</span>
                                </div>
                                <input type="number" name="price" 
                                       value="{{ old('price', $asset->price) }}" 
                                       required 
                                       class="input-modern pl-16" 
                                       placeholder="" min="0">
                            </div>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div class="flex items-center gap-2 pb-2 border-b border-white/5 mb-6">
                            <span class="w-2 h-2 rounded-full bg-luxury-gold"></span>
                            <h3 class="text-sm font-bold text-gray-400 uppercase tracking-widest">Detail & Lokasi</h3>
                        </div>

                        <div class="group">
                            <label class="label-modern">Lokasi Penempatan</label>
                            <div class="relative">
                                <select name="location_id" class="input-modern appearance-none cursor-pointer">
                                    @foreach($locations as $loc)
                                        <option value="{{ $loc->id }}" {{ $asset->location_id == $loc->id ? 'selected' : '' }}>
                                            {{ $loc->name }}
                                        </option>
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
                                    @foreach($suppliers as $sup)
                                        <option value="{{ $sup->id }}" {{ $asset->supplier_id == $sup->id ? 'selected' : '' }}>
                                            {{ $sup->name }}
                                        </option>
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
                                <input type="date" name="purchase_date" 
                                       value="{{ old('purchase_date', \Carbon\Carbon::parse($asset->purchase_date)->format('Y-m-d')) }}" 
                                       required class="input-modern cursor-pointer">
                            </div>
                            <div class="group">
                                <label class="label-modern">Status Awal</label>
                                <div class="relative">
                                    <select name="status" class="input-modern appearance-none cursor-pointer">
                                        <option value="available" {{ $asset->status == 'available' ? 'selected' : '' }}>Tersedia</option>
                                        <option value="deployed" {{ $asset->status == 'deployed' ? 'selected' : '' }}>Digunakan</option>
                                        <option value="maintenance" {{ $asset->status == 'maintenance' ? 'selected' : '' }}>Perbaikan</option>
                                        <option value="broken" {{ $asset->status == 'broken' ? 'selected' : '' }}>Rusak</option>
                                    </select>
                                    <div class="absolute inset-y-0 right-0 flex items-center px-4 pointer-events-none text-luxury-gold">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="group">
                            <label class="label-modern">Foto Aset</label>
                            <div class="flex items-center gap-4 mt-2">
                                <div class="w-20 h-20 rounded-2xl overflow-hidden border-2 border-luxury-gold/20 bg-black shrink-0 relative shadow-lg">
                                    @if($asset->image)
                                        <img src="{{ asset('storage/' . $asset->image) }}" class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-[10px] text-gray-500 font-mono">NO IMG</div>
                                    @endif
                                </div>
                                <input type="file" name="image" class="input-modern border-dashed pt-3 flex-1 text-xs file:mr-4 file:py-1 file:px-2 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-luxury-gold/20 file:text-luxury-gold hover:file:bg-luxury-gold/30">
                            </div>
                            <p class="text-[10px] text-gray-500 mt-2">*Biarkan kosong jika tidak ingin mengubah foto.</p>
                        </div>
                    </div>
                </div>

                <div class="pt-6 border-t border-white/5">
                    <button type="submit" class="w-full py-4 bg-gradient-to-r from-luxury-gold to-luxury-gold-dark text-black font-black text-sm tracking-widest uppercase rounded-xl shadow-gold-glow hover:scale-[1.01] active:scale-[0.99] transition-all duration-300">
                        Simpan Perubahan
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
        
        /* Ikon Kalender Putih */
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