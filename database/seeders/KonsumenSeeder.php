<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KonsumenSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('konsumens')->insert([
            [
                'kode_konsumen' => 'KNS-001',
                'nama_konsumen' => 'Toko Sembako Maju Jaya',
                'no_telp' => '081234567890',
                'alamat' => 'Jl. Merdeka No. 10, Bandung',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_konsumen' => 'KNS-002',
                'nama_konsumen' => 'Warung Kelontong Berkah',
                'no_telp' => '085712345678',
                'alamat' => 'Jl. Melati No. 5, Cimahi',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}