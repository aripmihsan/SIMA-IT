<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Location
 * * Model ini merepresentasikan tabel 'locations'.
 * Digunakan untuk mencatat lokasi fisik aset disimpan (misal: Ruang Server, Gudang).
 * * @package App\Models
 */
class Location extends Model
{
    use HasFactory;

    /**
     * Daftar atribut yang aman untuk diisi secara massal.
     * * @var array
     */
    protected $fillable = [
        'name',        // Nama Lokasi
        'description', // Keterangan lokasi
    ];

    /**
     * Relasi One-to-Many: Satu Lokasi bisa menampung banyak Aset.
     * * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function assets()
    {
        return $this->hasMany(Asset::class);
    }
}