<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// 1. Baris di bawah ini dihapus saja (penyebab error)
// use Laravel\Sanctum\HasApiTokens; 

class User extends Authenticatable
{
    // 2. Hapus tulisan "HasApiTokens," di dalam sini
    use HasFactory, Notifiable; 

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // --- RELASI & HELPER (Tetap Dipertahankan) ---

    public function allocations()
    {
        return $this->hasMany(Allocation::class);
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }
}