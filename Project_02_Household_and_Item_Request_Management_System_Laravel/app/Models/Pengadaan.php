<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengadaan extends Model
{
    use HasFactory;

    protected $table = 'pengadaans';

    protected $fillable = [
        'stock_id',
        'nama_barang',
        'kode_barang',
        'kategori',
        'jumlah_pengadaan',
        'satuan',
        'minimal_stock',
        'lokasi',
        'harga_satuan',
        'nama_supplier',
        'kontak_supplier',
        'tanggal_pengadaan',
        'keterangan',
        'status'
    ];

    public function stock()
    {
        return $this->belongsTo(Stock::class, 'stock_id');
    }
}