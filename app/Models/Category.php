<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 * Model ini digunakan untuk mengelompokkan jenis aset.
 * Contoh data: "Hardware", "Software", "Furniture".
 */
class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',        // Nama kategori
        'description',
        'image'  // Deskripsi opsional
    ];

    /**
     * Relasi One-to-Many.
     * Satu kategori bisa menaungi banyak aset.
     */
    public function assets()
    {
        return $this->hasMany(Asset::class);
    }
}