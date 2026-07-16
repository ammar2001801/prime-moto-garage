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
    Schema::create('servis', function (Blueprint $table) {
        $table->id();
        $table->foreignId('kendaraan_id')->constrained('kendaraans')->onDelete('cascade');
        $table->foreignId('mekanik_id')->constrained('mekaniks')->onDelete('cascade');
        $table->date('tanggal_servis');
        $table->text('keluhan');
        $table->enum('status', ['Antri', 'Dikerjakan', 'Selesai'])->default('Antri');
        $table->string('kode_servis')->unique();
        $table->text('diagnosa')->nullable();
        $table->decimal('total_jasa',10,2)->default(0);
        $table->decimal('total_sparepart',10,2)->default(0);
        $table->decimal('grand_total',10,2)->default(0);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servis');
    }
};
