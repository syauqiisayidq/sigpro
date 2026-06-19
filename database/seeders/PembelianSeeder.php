<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PembelianSeeder extends Seeder {
    public function run(): void {
        $supplier = DB::table('suppliers')->first();
        $user = DB::table('users')->first();

        DB::table('pembelians')->insert([
            'no_pembelian' => 'NBL-202606-001',
            'tanggal_pembelian' => '2026-06-15',
            'total_harga' => 1150000,
            'total_bayar' => 500000,
            'sisa_hutang' => 650000,
            'status_bayar' => 'belum_lunas',
            'supplier_id' => $supplier->id_supplier,
            'user_id' => $user->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}