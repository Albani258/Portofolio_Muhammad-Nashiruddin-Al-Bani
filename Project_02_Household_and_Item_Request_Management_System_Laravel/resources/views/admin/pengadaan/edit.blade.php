@extends('layouts.admin')
@section('content')

<!-- Welcome Banner -->
<div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-[#0B3B5F] to-[#0A2E4A] p-8 mb-8 shadow-xl">
    <div class="absolute top-0 right-0 w-64 h-64 bg-[#D4A017] opacity-10 rounded-full filter blur-3xl"></div>
    <div class="relative z-10">
        <h1 class="text-2xl font-bold text-white mb-2">Edit Data Barang</h1>
        <p class="text-white/80 text-sm">Kelola dan perbarui data barang inventaris Kementerian Imigrasi dan Pemasyarakatan</p>
    </div>
</div>

<!-- Form Edit Card -->
<div class="premium-card shadow-xl">
    <div class="p-6 border-b border-gray-100 bg-gradient-to-r from-white to-gray-50">
        <h2 class="text-xl font-bold text-[#0B3B5F] flex items-center gap-2">
            <div class="w-1 h-8 bg-[#D4A017] rounded-full"></div>
            Form Edit Barang
        </h2>
        <p class="text-sm text-gray-500 mt-1">Perbarui informasi data barang dengan lengkap dan akurat</p>
    </div>

    <form class="p-8">
        <div class="grid gap-6 md:grid-cols-2">
            <!-- Preview Gambar -->
            <div class="md:col-span-2">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Gambar Barang</label>
                <div class="flex items-center gap-6">
                    <div class="w-32 h-32 rounded-xl overflow-hidden bg-gray-100 border-2 border-dashed border-gray-300">
                        <img src="https://picsum.photos/id/1/200/300" alt="Barang" class="w-full h-full object-cover">
                    </div>
                    <div>
                        <button type="button" class="px-4 py-2 rounded-xl border-2 border-[#D4A017] text-[#D4A017] font-medium hover:bg-[#D4A017] hover:text-white transition-all">
                            Ganti Gambar
                        </button>
                        <p class="text-xs text-gray-400 mt-2">Format: JPG, PNG, SVG. Maks 2MB</p>
                    </div>
                </div>
            </div>

            <!-- Nama Barang -->
            <div class="md:col-span-2">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Barang <span class="text-red-500">*</span></label>
                <input type="text" placeholder="Masukkan nama barang" value="Lindsey Curtis" 
                    class="w-full px-5 py-3 rounded-xl border-2 border-gray-200 focus:border-[#D4A017] focus:ring-2 focus:ring-[#D4A017]/20 transition-all">
            </div>

            <!-- Kode Barang -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Kode Barang <span class="text-red-500">*</span></label>
                <input type="text" placeholder="Masukkan kode barang" value="BRG-001-2024" 
                    class="w-full px-5 py-3 rounded-xl border-2 border-gray-200 focus:border-[#D4A017] focus:ring-2 focus:ring-[#D4A017]/20 transition-all">
            </div>

            <!-- Kategori Barang -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Kategori Barang <span class="text-red-500">*</span></label>
                <select class="w-full px-5 py-3 rounded-xl border-2 border-gray-200 bg-white focus:border-[#D4A017] focus:ring-2 focus:ring-[#D4A017]/20 transition-all">
                    <option value="">Pilih Kategori</option>
                    <option selected>ATK (Alat Tulis Kantor)</option>
                    <option>Elektronik</option>
                    <option>Furniture</option>
                    <option>Kendaraan Operasional</option>
                    <option>Perlengkapan Kantor</option>
                    <option>Perangkat Jaringan</option>
                    <option>Komputer & Aksesoris</option>
                </select>
            </div>

            <!-- Jumlah Stok -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Jumlah Stok Barang <span class="text-red-500">*</span></label>
                <input type="number" placeholder="Masukkan jumlah stok" value="50" 
                    class="w-full px-5 py-3 rounded-xl border-2 border-gray-200 focus:border-[#D4A017] focus:ring-2 focus:ring-[#D4A017]/20 transition-all">
            </div>

            <!-- Satuan -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Satuan</label>
                <select class="w-full px-5 py-3 rounded-xl border-2 border-gray-200 bg-white focus:border-[#D4A017] focus:ring-2 focus:ring-[#D4A017]/20 transition-all">
                    <option selected>Pcs</option>
                    <option>Box</option>
                    <option>Paket</option>
                    <option>Unit</option>
                    <option>Set</option>
                    <option>Lembar</option>
                    <option>Buah</option>
                </select>
            </div>

            <!-- Harga Satuan -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Harga Satuan (Rp)</label>
                <input type="text" placeholder="Masukkan harga satuan" value="Rp 250.000" 
                    class="w-full px-5 py-3 rounded-xl border-2 border-gray-200 focus:border-[#D4A017] focus:ring-2 focus:ring-[#D4A017]/20 transition-all">
            </div>

            <!-- Status Persetujuan -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Status Persetujuan</label>
                <select class="w-full px-5 py-3 rounded-xl border-2 border-gray-200 bg-white focus:border-[#D4A017] focus:ring-2 focus:ring-[#D4A017]/20 transition-all">
                    <option value="approved" selected>Disetujui</option>
                    <option value="pending">Menunggu Persetujuan</option>
                    <option value="rejected">Ditolak</option>
                    <option value="revision">Revisi</option>
                </select>
            </div>

            <!-- Lokasi Penyimpanan -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Lokasi Penyimpanan</label>
                <input type="text" placeholder="Ruangan / Gedung" value="Gudang Utama - Rak A1" 
                    class="w-full px-5 py-3 rounded-xl border-2 border-gray-200 focus:border-[#D4A017] focus:ring-2 focus:ring-[#D4A017]/20 transition-all">
            </div>

            <!-- Kondisi Barang -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Kondisi Barang</label>
                <select class="w-full px-5 py-3 rounded-xl border-2 border-gray-200 bg-white focus:border-[#D4A017] focus:ring-2 focus:ring-[#D4A017]/20 transition-all">
                    <option selected>Baik</option>
                    <option>Rusak Ringan</option>
                    <option>Rusak Berat</option>
                    <option>Perbaikan</option>
                </select>
            </div>

            <!-- Tanggal Pengadaan -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Tanggal Pengadaan</label>
                <input type="date" value="2024-01-15" 
                    class="w-full px-5 py-3 rounded-xl border-2 border-gray-200 focus:border-[#D4A017] focus:ring-2 focus:ring-[#D4A017]/20 transition-all">
            </div>

            <!-- Masa Berlaku -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Masa Berlaku</label>
                <input type="date" value="2029-01-15" 
                    class="w-full px-5 py-3 rounded-xl border-2 border-gray-200 focus:border-[#D4A017] focus:ring-2 focus:ring-[#D4A017]/20 transition-all">
            </div>

            <!-- Keterangan -->
            <div class="md:col-span-2">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Keterangan</label>
                <textarea rows="3" placeholder="Masukkan keterangan tambahan..." 
                    class="w-full px-5 py-3 rounded-xl border-2 border-gray-200 focus:border-[#D4A017] focus:ring-2 focus:ring-[#D4A017]/20 transition-all resize-none">Barang dalam kondisi baik, siap digunakan untuk operasional kantor.</textarea>
            </div>

            <!-- Informasi Supplier -->
            <div class="md:col-span-2">
                <div class="bg-gray-50 rounded-xl p-5 border border-gray-100">
                    <h3 class="font-semibold text-gray-800 mb-4 flex items-center gap-2">
                        <svg class="w-5 h-5 text-[#D4A017]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                        Informasi Supplier / Vendor
                    </h3>
                    <div class="grid gap-5 md:grid-cols-2">
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-1">Nama Supplier</label>
                            <input type="text" placeholder="Nama supplier" value="PT. Sumber Makmur Abadi" 
                                class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-[#D4A017] focus:ring-2 focus:ring-[#D4A017]/20 transition-all">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-1">Kontak Supplier</label>
                            <input type="text" placeholder="No. Telepon / Email" value="(021) 1234-5678" 
                                class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-[#D4A017] focus:ring-2 focus:ring-[#D4A017]/20 transition-all">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Hidden fields untuk data tambahan -->
            <input type="hidden" name="created_by" value="Admin">
            <input type="hidden" name="updated_at" value="{{ date('Y-m-d H:i:s') }}">

            <!-- Buttons -->
            <div class="md:col-span-2 flex gap-4 pt-4 border-t border-gray-200 mt-4">
                <a href="{{ url('admin/pengadaan') }}" class="flex-1 px-6 py-3 rounded-xl border-2 border-gray-200 text-gray-700 font-semibold text-center hover:bg-gray-50 transition-all">
                    Batal
                </a>
                <button type="submit" class="flex-1 btn-premium px-6 py-3 rounded-xl text-white font-semibold shadow-md flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                    </svg>
                    Update Barang
                </button>
            </div>
        </div>
    </form>
</div>

<!-- Riwayat Perubahan Barang (Opsional) -->
<div class="premium-card shadow-xl mt-8">
    <div class="p-6 border-b border-gray-100 bg-gradient-to-r from-white to-gray-50">
        <h2 class="text-lg font-bold text-[#0B3B5F] flex items-center gap-2">
            <div class="w-1 h-6 bg-[#D4A017] rounded-full"></div>
            Riwayat Perubahan
        </h2>
        <p class="text-sm text-gray-500 mt-1">Catatan perubahan data barang</p>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500">Tanggal</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500">Aksi</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500">Pengguna</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500">Keterangan</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-3 text-sm text-gray-600">15 Jan 2024, 10:30</td>
                    <td class="px-6 py-3"><span class="px-2 py-1 rounded-full text-xs bg-green-100 text-green-700">Dibuat</span></td>
                    <td class="px-6 py-3 text-sm text-gray-600">Admin Pusat</td>
                    <td class="px-6 py-3 text-sm text-gray-500">Pembuatan data barang awal</td>
                </tr>
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-3 text-sm text-gray-600">20 Feb 2024, 14:15</td>
                    <td class="px-6 py-3"><span class="px-2 py-1 rounded-full text-xs bg-blue-100 text-blue-700">Diperbarui</span></td>
                    <td class="px-6 py-3 text-sm text-gray-600">Admin Logistik</td>
                    <td class="px-6 py-3 text-sm text-gray-500">Perubahan jumlah stok dari 45 menjadi 50</td>
                </tr>
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-3 text-sm text-gray-600">10 Mar 2024, 09:00</td>
                    <td class="px-6 py-3"><span class="px-2 py-1 rounded-full text-xs bg-yellow-100 text-yellow-700">Verifikasi</span></td>
                    <td class="px-6 py-3 text-sm text-gray-600">Kepala Divisi</td>
                    <td class="px-6 py-3 text-sm text-gray-500">Verifikasi kelengkapan data barang</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<style>
    .premium-card {
        background: white;
        border-radius: 20px;
        border: 1px solid rgba(203, 213, 225, 0.3);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
    }
    .premium-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, #D4A017, #0B3B5F);
        transform: scaleX(0);
        transition: transform 0.3s ease;
    }
    .premium-card:hover::before {
        transform: scaleX(1);
    }
    .btn-premium {
        background: linear-gradient(135deg, #0B3B5F, #0A2E4A);
        border: none;
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
    }
    .btn-premium::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s ease;
    }
    .btn-premium:hover::before {
        left: 100%;
    }
    .btn-premium:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(11, 59, 95, 0.3);
    }
    /* Reset grid dari Tailwind tetap berfungsi */
    .grid {
        display: grid;
    }
    .grid-cols-12 {
        grid-template-columns: repeat(12, minmax(0, 1fr));
    }
    .col-span-12 {
        grid-column: span 12 / span 12;
    }
</style>

@endsection