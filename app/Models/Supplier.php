<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_supplier';
    protected $fillable = ['kode_supplier', 'nama_supplier', 'no_telp', 'alamat'];

    public function pembelians() {
        return $this->hasMany(Pembelian::class, 'supplier_id', 'id_supplier');
    }
}