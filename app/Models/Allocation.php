<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Allocation
 * Model Transaksi. Mencatat peminjaman aset ke karyawan.
 */
class Allocation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'asset_id',
        'allocated_date',
        'returned_date',
        'notes'
    ];

    /**
     * Transaksi ini milik satu User (Peminjam).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Transaksi ini terkait satu Aset (Barang yang dipinjam).
     */
    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }
}