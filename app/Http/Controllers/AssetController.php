<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Category;
use App\Models\Location;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AssetController extends Controller
{
    // 1. TAMPILKAN SEMUA ASET
    public function index()
    {
        // Mengambil aset beserta relasinya (Eager Loading) agar query cepat
        $assets = Asset::with(['category', 'location', 'supplier'])->latest()->get();
        return view('assets.index', compact('assets'));
    }

    // 2. FORM TAMBAH (PENTING: Kirim data Master ke View)
    public function create()
    {
        $categories = Category::all();
        $locations = Location::all();
        $suppliers = Supplier::all();
        
        // Buat Kode Otomatis (Contoh: AST-2025-001) opsional, tapi keren
        // Disini kita biarkan user input manual dulu sesuai KUK
        
        return view('assets.create', compact('categories', 'locations', 'suppliers'));
    }

    // 3. SIMPAN DATA
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:assets,code',
            'name' => 'required|max:255',
            'category_id' => 'required',
            'location_id' => 'required',
            'supplier_id' => 'required',
            'purchase_date' => 'required|date',
            'price' => 'required|numeric',
            'status' => 'required',
            'image' => 'nullable|image|max:2048'
        ]);

        $data = $request->all();

        // Upload Gambar
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('assets', 'public');
        }

        Asset::create($data);

        return redirect()->route('assets.index')->with('success', 'Aset berhasil didaftarkan!');
    }

    // 4. EDIT & UPDATE & DELETE (Nanti kita lengkapi, fokus Create dulu)
    public function edit(Asset $asset)
    {
        // Kita butuh data master lagi untuk dropdown
        $categories = Category::all();
        $locations = Location::all();
        $suppliers = Supplier::all();

        return view('assets.edit', compact('asset', 'categories', 'locations', 'suppliers'));
    }

   public function update(Request $request, Asset $asset)
    {
        $request->validate([
            // Code harus unique, TAPI pengecualian untuk id aset ini sendiri
            'code' => 'required|unique:assets,code,' . $asset->id,
            'name' => 'required|max:255',
            'category_id' => 'required',
            'location_id' => 'required',
            'supplier_id' => 'required',
            'purchase_date' => 'required|date',
            'price' => 'required|numeric',
            'status' => 'required',
            'image' => 'nullable|image|max:2048'
        ]);

        $data = $request->all();

        // Logika Ganti Gambar
        if ($request->hasFile('image')) {
            // 1. Hapus gambar lama jika ada
            if ($asset->image) {
                Storage::disk('public')->delete($asset->image);
            }
            // 2. Upload gambar baru
            $data['image'] = $request->file('image')->store('assets', 'public');
        }

        $asset->update($data);

        return redirect()->route('assets.index')->with('success', 'Data aset berhasil diperbarui!');
    }
    
    public function destroy(Asset $asset) {
        if($asset->image) Storage::disk('public')->delete($asset->image);
        $asset->delete();
        return redirect()->route('assets.index')->with('success', 'Aset dihapus');
    }
}