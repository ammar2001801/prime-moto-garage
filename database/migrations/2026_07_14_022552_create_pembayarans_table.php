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
    Schema::create('pembayarans', function (Blueprint $table) {
        $table->id();
        $table->foreignId('servis_id')->constrained('servis')->onDelete('cascade');
        $table->foreignId('user_id_kasir')->constrained('users')->onDelete('cascade');
        $table->dateTime('tanggal_bayar');
        $table->decimal('total_tagihan', 10, 2);
        $table->decimal('bayar',10,2);
        $table->decimal('kembalian',10,2);
        $table->enum('status',[
        'Belum Lunas',
        'Lunas'
        ])->default('Belum Lunas');
        $table->string('metode_bayar', 50);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
