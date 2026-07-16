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
    Schema::create('kendaraans', function (Blueprint $table) {
        $table->id();
        $table->foreignId('pelanggan_id')->constrained('pelanggans')->onDelete('cascade');
        $table->string('plat_nomor', 15)->unique();
        $table->string('merk', 50);
        $table->string('tipe', 50);
        $table->string('warna',30)->nullable();
        $table->string('nomor_rangka')->nullable();
        $table->string('nomor_mesin')->nullable();
        $table->year('tahun');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kendaraans');
    }
};
