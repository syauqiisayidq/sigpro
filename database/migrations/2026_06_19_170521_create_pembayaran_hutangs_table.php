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
        Schema::create('pembayaran_hutangs', function (Blueprint $table) {
            $table->id('id_bayar'); // Primary Key
            $table->string('no_bayar')->unique();
            $table->date('tanggal_bayar');
            $table->integer('jumlah_bayar');
    
            // Foreign Key ke tabel pembelian
            $table->foreignId('pembelian_id')->constrained('pembelians', 'id_pembelian')->onDelete('cascade');
    
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran_hutangs');
    }
};
