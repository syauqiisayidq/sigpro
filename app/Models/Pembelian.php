<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_pembelian';
    protected $fillable = ['no_pembelian', 'tanggal_pembelian', 'total_harga', 'total_barang', 'sisa_hutang', 'status_bayar', 'supplier_id', 'user_id'];

    // Relasi balik ke Supplier
    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id_supplier');
    }

    // Relasi ke rincian item barang
    public function detailPembelians()
    {
        return $this->hasMany(DetailPembelian::class, 'pembelian_id', 'id_pembelian');
    }

    // Relasi ke histori pembayaran cicilan hutang (Modul Utama Kelompok 5)
    public function pembayaranFutangs()
    {
        return $this->hasMany(PembayaranHutang::class, 'pembelian_id', 'id_pembelian');
    }
}