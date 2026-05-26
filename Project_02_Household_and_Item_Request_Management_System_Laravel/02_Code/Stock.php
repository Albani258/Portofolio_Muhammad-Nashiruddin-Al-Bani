<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $table = 'stock';

    protected $fillable = [
        'nama_barang',
        'kode_barang',
        'kategori',
        'jumlah_stock',
        'satuan',
        'minimal_stock',
        'lokasi',
    ];

    public function getStatusAttribute()
    {
        if ($this->jumlah_stock == 0) {
            return 'Habis';
        }

        if ($this->jumlah_stock <= $this->minimal_stock) {
            return 'Menipis';
        }

        return 'Tersedia';
    }

    public function pengadaans()
    {
        return $this->hasMany(Pengadaan::class);
    }
}