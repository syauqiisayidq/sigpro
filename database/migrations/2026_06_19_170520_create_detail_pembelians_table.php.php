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
        Schema::create('detail_pembelians', function (Blueprint $table) {
            $table->id('id_detail'); // Primary Key
            $table->integer('qty');
            $table->integer('harga_beli');
            $table->integer('subtotal');
    
            // Foreign Key ke tabel pembelian dan barang
            $table->foreignId('pembelian_id')->constrained('pembelians', 'id_pembelian')->onDelete('cascade');
            $table->foreignId('barang_id')->constrained('barangs', 'id_barang')->onDelete('cascade');
    
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_pembelians');
    }
};
