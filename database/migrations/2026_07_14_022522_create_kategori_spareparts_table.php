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
    Schema::create('kategori_spareparts', function (Blueprint $table) {
        $table->id();
        $table->string('nama_kategori', 50);
        $table->string('kode_sparepart')->unique();
        $table->string('satuan')->default('pcs');
        $table->timestamps();
        $table->text('keterangan')->nullable();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategori_spareparts');
    }
};
