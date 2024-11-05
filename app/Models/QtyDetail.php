<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QtyDetail extends Model
{
    use HasFactory;

    protected $fillable = ['tanggal', 'jam', 'nama_material', 'barang_masuk', 'barang_keluar', 'gambar'];

    // app/Models/QtyDetail.php
    public function analist()
    {
        return $this->belongsTo(Analist::class);
    }
}
