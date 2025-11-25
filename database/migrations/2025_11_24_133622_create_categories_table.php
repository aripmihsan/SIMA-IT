<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi.
     */
   public function up()
{
    Schema::create('categories', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('description')->nullable();
        $table->timestamps();
    });
}

    /**
     * Kembalikan migrasi.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};