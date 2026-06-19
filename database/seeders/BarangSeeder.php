<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('barangs')->insert([
            [
                'kode_barang' => 'BRG-001',
                'nama_barang' => 'Indomie Goreng (Kardus)',
                'harga_beli' => 115000,
                'stok' => 50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_barang' => 'BRG-002',
                'nama_barang' => 'Minyak Goreng Bimoli 2L',
                'harga_beli' => 34000,
                'stok' => 100,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}