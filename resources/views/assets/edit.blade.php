@extends('layouts.master')

@section('title', 'Edit Aset')

@section('content')
    <div class="max-w-4xl mx-auto animate-fade-in-up">
        <div class="mb-8">
            <a href="{{ route('assets.index') }}" class="flex items-center gap-2 text-gray-500 hover:text-luxury-gold transition-colors mb-4 text-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali
            </a>
            <h1 class="text-3xl font-black text-white">Edit Data Aset</h1>
            <p class="text-gray-400 text-sm mt-1">Perbarui informasi aset: <span class="text-luxury-gold font-bold">{{ $asset->name }}</span></p>
        </div>

        <div class="premium-glass p-8 rounded-[2rem] relative overflow-hidden">
            <form action="{{ route('assets.update', $asset->id) }}" method="POST" enctype="multipart/form-data" class="space-y-8 relative z-10">
                @csrf @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    
                    <div class="space-y-6">
                        <h3 class="text-luxury-gold font-bold uppercase tracking-widest text-xs border-b border-luxury-gold/20 pb-2 mb-4">Informasi Utama</h3>
                        
                        <div class="group">
                            <label class="label-gold">Nama Barang</label>
                            <input type="text" name="name" value="{{ old('name', $asset->name) }}" required class="input-gold">
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div class="group">
                                <label class="label-gold">Kode Aset</label>
                                <input type="text" name="code" value="{{ old('code', $asset->code) }}" required class="input-gold">
                            </div>
                            <div class="group">
                                <label class="label-gold">Serial Number</label>
                                <input type="text" name="serial_number" value="{{ old('serial_number', $asset->serial_number) }}" class="input-gold">
                            </div>
                        </div>

                        <div class="group">
                            <label class="label-gold">Kategori</label>
                            <select name="category_id" class="input-gold bg-luxury-900">
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}" {{ $asset->category_id == $cat->id ? 'selected' : '' }}>
                                        {{ $cat->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="group">
                            <label class="label-gold">Harga Beli (Rp)</label>
                            <input type="number" name="price" value="{{ old('price', $asset->price) }}" required class="input-gold">
                        </div>
                    </div>

                    <div class="space-y-6">
                        <h3 class="text-luxury-gold font-bold uppercase tracking-widest text-xs border-b border-luxury-gold/20 pb-2 mb-4">Detail & Lokasi</h3>

                        <div class="group">
                            <label class="label-gold">Lokasi Penempatan</label>
                            <select name="location_id" class="input-gold bg-luxury-900">
                                @foreach($locations as $loc)
                                    <option value="{{ $loc->id }}" {{ $asset->location_id == $loc->id ? 'selected' : '' }}>
                                        {{ $loc->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="group">
                            <label class="label-gold">Supplier</label>
                            <select name="supplier_id" class="input-gold bg-luxury-900">
                                @foreach($suppliers as $sup)
                                    <option value="{{ $sup->id }}" {{ $asset->supplier_id == $sup->id ? 'selected' : '' }}>
                                        {{ $sup->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div class="group">
                                <label class="label-gold">Tanggal Beli</label>
                                <input type="date" name="purchase_date" 
       value="{{ old('purchase_date', \Carbon\Carbon::parse($asset->purchase_date)->format('Y-m-d')) }}" 
       required class="input-gold">
                            </div>
                            <div class="group">
                                <label class="label-gold">Status Awal</label>
                                <select name="status" class="input-gold bg-luxury-900">
                                    <option value="available" {{ $asset->status == 'available' ? 'selected' : '' }}>Tersedia</option>
                                    <option value="deployed" {{ $asset->status == 'deployed' ? 'selected' : '' }}>Digunakan</option>
                                    <option value="maintenance" {{ $asset->status == 'maintenance' ? 'selected' : '' }}>Perbaikan</option>
                                    <option value="broken" {{ $asset->status == 'broken' ? 'selected' : '' }}>Rusak</option>
                                </select>
                            </div>
                        </div>

                        <div class="group">
                            <label class="label-gold">Foto Aset</label>
                            <div class="flex items-center gap-4 mt-2">
                                <div class="w-20 h-20 rounded-lg overflow-hidden border border-luxury-gold/30 bg-black shrink-0">
                                    @if($asset->image)
                                        <img src="{{ asset('storage/' . $asset->image) }}" class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-[10px] text-gray-500">NO IMG</div>
                                    @endif
                                </div>
                                <input type="file" name="image" class="input-gold border-dashed pt-3 flex-1">
                            </div>
                            <p class="text-xs text-gray-500 mt-2">*Biarkan kosong jika tidak ingin mengganti foto.</p>
                        </div>
                    </div>
                </div>

                <div class="flex gap-4 pt-4">
                    <button type="submit" class="flex-1 py-4 bg-gradient-to-r from-luxury-gold to-luxury-gold-dark text-black font-bold rounded-xl shadow-gold-glow hover:scale-[1.02] transition-transform">
                        SIMPAN PERUBAHAN
                    </button>
                    <a href="{{ route('assets.index') }}" class="px-8 py-4 bg-white/5 text-gray-400 font-bold rounded-xl hover:bg-white/10 transition">
                        BATAL
                    </a>
                </div>
            </form>
        </div>
    </div>

    <style>
        .label-gold { display: block; font-size: 0.75rem; font-weight: 700; color: #D4AF37; text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 0.5rem; }
        .input-gold { width: 100%; background-color: rgba(18, 18, 18, 0.5); border: 1px solid rgba(212, 175, 55, 0.2); border-radius: 0.75rem; padding: 0.75rem 1.25rem; color: white; transition: all; }
        .input-gold:focus { outline: none; border-color: #D4AF37; box-shadow: 0 0 0 1px #D4AF37; }
    </style>
@endsection