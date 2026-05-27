<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanBarangBaru extends Model
{
    use HasFactory;

    protected $table = 'pengajuan_barang_baru';
    protected $fillable = [
        'user_id',
        'nama_barang',
        'satuan',
        'jumlah_pengajuan',
        'prioritas',
        'tanggal_pengajuan',
        'tanggal_dibutuhkan',
        'keterangan',
        'status_pengajuan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public $timestamps = false; // Laravel tidak akan paksa updated_at/created_at
}
