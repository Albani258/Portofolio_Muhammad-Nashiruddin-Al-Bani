<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pengajuan_barang_baru', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('nama_barang');
            $table->string('satuan');
            $table->integer('jumlah_pengajuan');
            $table->string('prioritas');
            $table->date('tanggal_pengajuan');
            $table->date('tanggal_dibutuhkan')->nullable();
            $table->text('keterangan')->nullable();
            $table->string('status_pengajuan')->default('Pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_barang_barus');
    }
};
