<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::create('assets', function (Blueprint $table) {
        $table->id();
        $table->string('code')->unique();      // Kode Aset
        $table->string('name');                // Nama Barang
        $table->string('serial_number')->nullable();
        
        // Relasi (Foreign Keys)
        $table->foreignId('category_id')->constrained()->onDelete('cascade');
        $table->foreignId('location_id')->constrained()->onDelete('cascade');
        $table->foreignId('supplier_id')->nullable()->constrained()->onDelete('set null'); // Tambahan
        
        $table->enum('status', ['available', 'deployed', 'maintenance', 'broken'])->default('available');
        $table->date('purchase_date')->nullable();
        $table->decimal('price', 15, 2)->nullable();
        $table->text('specifications')->nullable();
        $table->string('image')->nullable();
        $table->timestamps();
    });
}

    public function down(): void
    {
        Schema::dropIfExists('assets');
    }
};