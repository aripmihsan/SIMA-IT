<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Asset
 * Model Inti. Menyimpan data fisik barang dan relasinya.
 */
class Asset extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'serial_number',
        'category_id',
        'location_id',
        'supplier_id', // BARU: Tambahan untuk versi lengkap
        'status',
        'purchase_date',
        'price',
        'specifications',
        'image',
    ];

    // --- RELASI PARENT (Milik Siapa?) ---

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function supplier() // BARU
    {
        return $this->belongsTo(Supplier::class);
    }

    // --- RELASI CHILD (Dipakai Siapa?) ---

    /**
     * Satu Aset bisa memiliki banyak riwayat peminjaman (Allocation).
     * Dari sini kita bisa melacak sejarah barang ini pernah dipakai siapa saja.
     */
    public function allocations()
    {
        return $this->hasMany(Allocation::class);
    }
}