<?php

namespace App\Http\Controllers;

use App\Models\Allocation;
use App\Models\Asset;
use App\Models\User;
use Illuminate\Http\Request;

class AllocationController extends Controller
{
    // 1. DAFTAR RIWAYAT PEMINJAMAN
    public function index()
    {
        // Ambil data alokasi terbaru beserta relasi User dan Asset
        $allocations = Allocation::with(['user', 'asset'])->latest()->get();
        return view('allocations.index', compact('allocations'));
    }

    // 2. FORM PEMINJAMAN
    public function create()
    {
        // Cari User yang Role-nya STAFF saja
        $users = User::where('role', 'staff')->get();
        
        // Cari Aset yang statusnya TERSEDIA (Available) saja
        // Agar barang rusak/dipinjam tidak bisa dipilih lagi
        $assets = Asset::where('status', 'available')->get();

        return view('allocations.create', compact('users', 'assets'));
    }

    // 3. PROSES SIMPAN (CHECKOUT BARANG)
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'asset_id' => 'required|exists:assets,id', // Pastikan ID aset valid
            'allocated_date' => 'required|date',
            'notes' => 'nullable|string',
        ]);

        // A. Simpan data ke tabel Allocation
        Allocation::create([
            'user_id' => $request->user_id,
            'asset_id' => $request->asset_id,
            'allocated_date' => $request->allocated_date,
            'notes' => $request->notes,
        ]);

        // B. UPDATE STATUS ASET JADI 'DEPLOYED' (DIPAKAI)
        $asset = Asset::findOrFail($request->asset_id);
        $asset->update(['status' => 'deployed']);

        return redirect()->route('allocations.index')->with('success', 'Aset berhasil dipinjamkan!');
    }

    // 4. PROSES PENGEMBALIAN BARANG (RETURN)
    public function destroy($id)
    {
        // Cari data peminjaman
        $allocation = Allocation::findOrFail($id);

        // A. Update status aset balik jadi 'AVAILABLE'
        $asset = Asset::findOrFail($allocation->asset_id);
        $asset->update(['status' => 'available']);

        // B. Hapus data peminjaman (Atau bisa pakai soft delete jika mau disimpan historinya)
        // Disini kita hapus saja sesuai konsep CRUD dasar
        $allocation->delete();

        return redirect()->route('allocations.index')->with('success', 'Aset telah dikembalikan dan tersedia lagi.');
    }
}