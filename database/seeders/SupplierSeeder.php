<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('suppliers')->insert([
            [
                'kode_supplier' => 'SPL-001',
                'nama_supplier' => 'PT Indofood Sukses Makmur',
                'no_telp' => '021-123456',
                'alamat' => 'Kawasan Industri Jakabaring, Palembang',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_supplier' => 'SPL-002',
                'nama_supplier' => 'Unilever Indonesia Tbk',
                'no_telp' => '021-654321',
                'alamat' => 'Jl. BSD Boulevard Barat, Tangerang',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}