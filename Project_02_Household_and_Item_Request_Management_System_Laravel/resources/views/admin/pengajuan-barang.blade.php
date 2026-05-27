@extends('layouts.admin')
@section('content')

<!-- Welcome Banner -->
<div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-[#0B3B5F] to-[#0A2E4A] p-8 mb-8 shadow-xl">
    <div class="absolute top-0 right-0 w-64 h-64 bg-[#D4A017] opacity-10 rounded-full filter blur-3xl"></div>
    <div class="absolute bottom-0 left-0 w-48 h-48 bg-[#D4A017] opacity-5 rounded-full filter blur-2xl"></div>
    <div class="relative z-10">
        <h1 class="text-2xl font-bold text-white mb-2">Form Pengajuan Barang</h1>
        <p class="text-white/80 text-sm">Ajukan permintaan barang inventaris Kementerian Imigrasi dan Pemasyarakatan</p>
    </div>
</div>

<!-- Form Pengajuan Card -->
<div class="premium-card shadow-xl">
    <div class="p-6 border-b border-gray-100 bg-gradient-to-r from-white to-gray-50">
        <h2 class="text-xl font-bold text-[#0B3B5F] flex items-center gap-2">
            <div class="w-1 h-8 bg-[#D4A017] rounded-full"></div>
            Form Pengajuan Barang
        </h2>
        <p class="text-sm text-gray-500 mt-1">Isi data pengajuan barang dengan lengkap dan akurat</p>
    </div>

    <form class="p-8">
        <div class="grid gap-6 md:grid-cols-2">
            <!-- Upload Gambar -->
            <div class="md:col-span-2">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Gambar Barang</label>
                <div class="border-2 border-dashed border-gray-300 rounded-xl p-8 text-center hover:border-[#D4A017] transition-all cursor-pointer">
                    <div class="flex justify-center mb-4">
                        <div class="w-16 h-16 rounded-full bg-gray-100 flex items-center justify-center">
                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                            </svg>
                        </div>
                    </div>
                    <p class="text-sm text-gray-600">Drag and drop atau <span class="text-[#D4A017] font-medium">klik untuk upload</span></p>
                    <p class="text-xs text-gray-400 mt-1">Format: JPG, PNG, SVG. Maks 2MB</p>
                </div>
            </div>

            <!-- Nama Barang -->
            <div class="md:col-span-2">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Barang <span class="text-red-500">*</span></label>
                <input type="text" placeholder="Masukkan nama barang" 
                    class="w-full px-5 py-3 rounded-xl border-2 border-gray-200 focus:border-[#D4A017] focus:ring-2 focus:ring-[#D4A017]/20 transition-all">
            </div>

            <!-- Kode Barang -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Kode Barang <span class="text-red-500">*</span></label>
                <input type="text" placeholder="Contoh: BRG-001" 
                    class="w-full px-5 py-3 rounded-xl border-2 border-gray-200 focus:border-[#D4A017] focus:ring-2 focus:ring-[#D4A017]/20 transition-all">
            </div>

            <!-- Kategori -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Kategori Barang <span class="text-red-500">*</span></label>
                <select class="w-full px-5 py-3 rounded-xl border-2 border-gray-200 bg-white focus:border-[#D4A017] focus:ring-2 focus:ring-[#D4A017]/20 transition-all">
                    <option value="">Pilih kategori</option>
                    <option>ATK (Alat Tulis Kantor)</option>
                    <option>Elektronik</option>
                    <option>Furniture</option>
                    <option>Perlengkapan Kantor</option>
                    <option>Perangkat Jaringan</option>
                    <option>Komputer & Aksesoris</option>
                </select>
            </div>

            <!-- Jumlah -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Jumlah <span class="text-red-500">*</span></label>
                <div class="flex items-center gap-3">
                    <button type="button" class="w-10 h-10 rounded-xl border-2 border-gray-200 text-gray-600 hover:border-[#D4A017] hover:text-[#D4A017] transition-all">-</button>
                    <input type="number" value="1" min="1" class="w-32 px-4 py-3 text-center rounded-xl border-2 border-gray-200 focus:border-[#D4A017] focus:ring-2 focus:ring-[#D4A017]/20 transition-all">
                    <button type="button" class="w-10 h-10 rounded-xl border-2 border-gray-200 text-gray-600 hover:border-[#D4A017] hover:text-[#D4A017] transition-all">+</button>
                </div>
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
                </select>
            </div>

            <!-- Prioritas -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Prioritas</label>
                <select class="w-full px-5 py-3 rounded-xl border-2 border-gray-200 bg-white focus:border-[#D4A017] focus:ring-2 focus:ring-[#D4A017]/20 transition-all">
                    <option value="normal" selected>Normal</option>
                    <option value="urgent">Urgent / Segera</option>
                    <option value="critical">Critical / Sangat Penting</option>
                </select>
            </div>

            <!-- Tanggal Dibutuhkan -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Tanggal Dibutuhkan</label>
                <input type="date" class="w-full px-5 py-3 rounded-xl border-2 border-gray-200 focus:border-[#D4A017] focus:ring-2 focus:ring-[#D4A017]/20 transition-all">
            </div>

            <!-- Deskripsi -->
            <div class="md:col-span-2">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi / Alasan Pengajuan</label>
                <textarea rows="4" placeholder="Jelaskan kebutuhan dan alasan pengajuan barang ini..." 
                    class="w-full px-5 py-3 rounded-xl border-2 border-gray-200 focus:border-[#D4A017] focus:ring-2 focus:ring-[#D4A017]/20 transition-all resize-none"></textarea>
            </div>

            <!-- Informasi Tambahan -->
            <div class="md:col-span-2">
                <div class="bg-blue-50 rounded-xl p-4 border border-blue-200">
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <p class="text-sm text-blue-800">Status awal pengajuan akan <strong>"Menunggu Persetujuan"</strong> setelah disubmit.</p>
                    </div>
                </div>
            </div>

            <!-- Buttons -->
            <div class="md:col-span-2 flex gap-4 pt-4 border-t border-gray-200 mt-4">
                <a href="{{ url('admin/pengajuan') }}" class="flex-1 px-6 py-3 rounded-xl border-2 border-gray-200 text-gray-700 font-semibold text-center hover:bg-gray-50 transition-all">
                    Batal
                </a>
                <button type="submit" class="flex-1 btn-premium px-6 py-3 rounded-xl text-white font-semibold shadow-md flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Ajukan Pengajuan
                </button>
            </div>
        </div>
    </form>
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
</style>

@endsection