<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::create('allocations', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');  // Siapa yang pegang
        $table->foreignId('asset_id')->constrained()->onDelete('cascade'); // Barang apa
        $table->date('allocated_date');       // Tanggal diserahkan
        $table->date('returned_date')->nullable(); // Tanggal kembali (kosong jika masih dipakai)
        $table->text('notes')->nullable();    // Catatan (misal: kondisi saat pinjam)
        $table->timestamps();
    });
}

    public function down(): void
    {
        Schema::dropIfExists('allocations');
    }
};