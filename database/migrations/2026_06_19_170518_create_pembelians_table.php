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
        Schema::create('pembelians', function (Blueprint $table) {
            $table->id('id_pembelian'); // Primary Key
            $table->string('no_pembelian')->unique();
            $table->date('tanggal_pembelian');
            $table->integer('total_harga')->default(0);
            $table->integer('total_bayar')->default(0);
            $table->integer('sisa_hutang')->default(0);
            $table->enum('status_bayar', ['belum_lunas', 'lunas'])->default('belum_lunas');
    
            // Foreign Key ke tabel supplier dan users (user bawaan laravel)
            $table->foreignId('supplier_id')->constrained('suppliers', 'id_supplier')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
    
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembelians');
    }
};
