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
        $assets = Asset::with(['category', 'location', 'supplier'])->latest()->get();
        return view('assets.index', compact('assets'));
    }

    // 2. FORM TAMBAH
    public function create()
    {
        $categories = Category::all();
        $locations = Location::all();
        $suppliers = Supplier::all();
        
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

        // Ambil semua data input
        $data = $request->all();

        // Cek jika ada file gambar yang diupload
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('assets', 'public');
        }

        Asset::create($data);

        return redirect()->route('assets.index')->with('success', 'Aset berhasil didaftarkan!');
    }

    // 4. FORM EDIT
    public function edit(Asset $asset)
    {
        $categories = Category::all();
        $locations = Location::all();
        $suppliers = Supplier::all();

        return view('assets.edit', compact('asset', 'categories', 'locations', 'suppliers'));
    }

    // 5. UPDATE DATA (VERSI LEBIH AMAN)
    public function update(Request $request, Asset $asset)
    {
        $request->validate([
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

        // PERBAIKAN: Ambil semua data KECUALI image dulu
        $data = $request->except('image');

        // Logika Ganti Gambar
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($asset->image) {
                Storage::disk('public')->delete($asset->image);
            }
            // Simpan gambar baru & masukkan ke array $data
            $data['image'] = $request->file('image')->store('assets', 'public');
        }

        // Update database (gambar lama aman jika tidak ada upload baru)
        $asset->update($data);

        return redirect()->route('assets.index')->with('success', 'Data aset berhasil diperbarui!');
    }
    
    // 6. HAPUS ASET
    public function destroy(Asset $asset) {
        if($asset->image) {
            Storage::disk('public')->delete($asset->image);
        }
        $asset->delete();
        return redirect()->route('assets.index')->with('success', 'Aset dihapus');
    }

    // 7. DETAIL ASET (SHOW)
    public function show(Asset $asset)
    {
        // Kita arahkan ke view detail
        return view('assets.show', compact('asset')); 
    }
}