<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat data user admin default
        User::factory()->create([
            'name' => 'Admin Grosir',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
        ]);

        // 2. Panggil semua Seeder cukup SATU KALI saja
        $this->call([
            SupplierSeeder::class,
            BarangSeeder::class,
            // KonsumenSeeder::class, // Uncomment kalau sudah buat file-nya
            PembelianSeeder::class,
            PembayaranHutangSeeder::class,
        ]);
    }
}