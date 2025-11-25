<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Supplier
 * Menangani data vendor/toko tempat pembelian aset.
 */
class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'address'
    ];

    /**
     * Satu Supplier bisa menyuplai BANYAK Aset.
     */
    public function assets()
    {
        return $this->hasMany(Asset::class);
    }
}