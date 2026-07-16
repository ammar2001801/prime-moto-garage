<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('spareparts', function (Blueprint $table) {
        $table->id();
        $table->foreignId('kategori_id')->constrained('kategori_spareparts')->onDelete('cascade');
        $table->string('nama_sparepart', 100);
        $table->string('kode_sparepart')->unique();
        $table->string('satuan')->default('pcs');
        $table->integer('stok');
        $table->decimal('harga', 10, 2);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spareparts');
    }
};
