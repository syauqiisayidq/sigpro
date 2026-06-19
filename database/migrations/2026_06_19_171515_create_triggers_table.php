<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Trigger 1: Tambah Stok Barang Otomatis saat Beli
        DB::unprepared('
        CREATE TRIGGER trg_after_insert_detail_pembelian
        AFTER INSERT ON detail_pembelians
        FOR EACH ROW
        BEGIN
            UPDATE barangs 
            SET stok = stok + NEW.qty 
            WHERE id_barang = NEW.barang_id;
        END
    ');

    // Trigger 2: Potong Utang Otomatis saat Bayar Cicilan
    DB::unprepared('
        CREATE TRIGGER trg_after_insert_pembayaran
        AFTER INSERT ON pembayaran_hutangs
        FOR EACH ROW
        BEGIN
            UPDATE pembelians 
            SET total_bayar = total_bayar + NEW.jumlah_bayar,
                sisa_hutang = total_harga - (total_bayar + NEW.jumlah_bayar),
                status_bayar = IF(total_harga - (total_bayar + NEW.jumlah_bayar) <= 0, "lunas", "belum_lunas")
            WHERE id_pembelian = NEW.pembelian_id;
        END
    ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('triggers');
    }
};
