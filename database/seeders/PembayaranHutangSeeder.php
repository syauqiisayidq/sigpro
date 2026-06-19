<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PembayaranHutangSeeder extends Seeder {
    public function run(): void {
        $pembelian = DB::table('pembelians')->where('no_pembelian', 'NBL-202606-001')->first();

        if ($pembelian) {
            $jumlahCicilan = 400000;

            // Masukkan data cicilan
            DB::table('pembayaran_hutangs')->insert([
                'no_bayar' => 'BYR-HUT-001',
                'tanggal_bayar' => '2026-06-19',
                'jumlah_bayar' => $jumlahCicilan,
                'pembelian_id' => $pembelian->id_pembelian,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Update status nota pembelian
            $sisaHutangBaru = $pembelian->sisa_hutang - $jumlahCicilan;
            
            DB::table('pembelians')->where('id_pembelian', $pembelian->id_pembelian)->update([
                'total_bayar' => $pembelian->total_bayar + $jumlahCicilan,
                'sisa_hutang' => $sisaHutangBaru,
                'status_bayar' => $sisaHutangBaru <= 0 ? 'lunas' : 'belum_lunas',
                'updated_at' => now(),
            ]);
        }
    }
}