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
    Schema::create('detail_spareparts', function (Blueprint $table) {
        $table->id();
        $table->foreignId('servis_id')->constrained('servis')->onDelete('cascade');
        $table->foreignId('sparepart_id')->constrained('spareparts')->onDelete('cascade');
        $table->integer('jumlah');
        $table->decimal('subtotal', 10, 2);
        $table->decimal('harga',10,2);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_spareparts');
    }
};
