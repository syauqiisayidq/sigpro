<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembayaranHutang extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_bayar';
    protected $fillable = ['no_bayar', 'tanggal_bayar', 'jumlah_bayar', 'pembelian_id'];

    // Relasi balik ke nota induk Pembelian Kredit
    public function pembelian()
    {
        return $this->belongsTo(Pembelian::class, 'pembelian_id', 'id_pembelian');
    }
}