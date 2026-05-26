<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengajuanBarang extends Model
{
    // Nama tabel di database
    protected $table = 'pengajuan_barang';

    // Nonaktifkan timestamps jika tidak ada created_at & updated_at
    public $timestamps = false;

    // Field yang boleh diisi mass assignment
protected $fillable = [
    'user_id',
    'stock_id',
    'jumlah_pengajuan',
    'jumlah_disetujui',
    'satuan',
    'perkiraan_harga',
    'status_pengajuan',
    'prioritas',
    'tanggal_pengajuan',
    'tanggal_dibutuhkan',
    'divisi_pengaju',
    'nama_pengaju',
    'keterangan',
    'supplier_nama',
    'supplier_kontak',
    'created_by',
    'updated_at',
];

    /**
     * Relasi ke User (pengaju)
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relasi ke Stock (barang)
     */
    public function stock()
    {
        return $this->belongsTo(Stock::class, 'stock_id');
    }
}
