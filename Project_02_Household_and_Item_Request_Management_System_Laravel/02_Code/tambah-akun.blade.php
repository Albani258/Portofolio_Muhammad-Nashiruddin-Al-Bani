@extends('layouts.admin')
@section('content')

<!-- Welcome Banner -->
<div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-[#0B3B5F] to-[#0A2E4A] p-8 mb-8 shadow-xl">
    <div class="absolute top-0 right-0 w-64 h-64 bg-[#D4A017] opacity-10 rounded-full filter blur-3xl"></div>
    <div class="absolute bottom-0 left-0 w-48 h-48 bg-[#D4A017] opacity-5 rounded-full filter blur-2xl"></div>
    <div class="relative z-10">
        <h1 class="text-2xl font-bold text-white mb-2">Tambah Akun Baru</h1>
        <p class="text-white/80 text-sm">Buat akun baru untuk petugas Kementerian Imigrasi dan Pemasyarakatan</p>
    </div>
</div>

<!-- Form Tambah Akun -->
<div class="premium-card shadow-xl">
    <div class="p-6 border-b border-gray-100 bg-gradient-to-r from-white to-gray-50">
        <h2 class="text-xl font-bold text-[#0B3B5F] flex items-center gap-2">
            <div class="w-1 h-8 bg-[#D4A017] rounded-full"></div>
            Form Tambah Akun Petugas
        </h2>
        <p class="text-sm text-gray-500 mt-1">Isi data petugas dengan lengkap dan benar</p>
    </div>

    <form class="p-8">
        <div class="grid gap-6 md:grid-cols-2">
            <!-- Foto Profil -->
            <div class="md:col-span-2">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Foto Profil</label>
                <div class="flex items-center gap-6">
                    <div class="w-24 h-24 rounded-full bg-gray-100 border-2 border-dashed border-gray-300 flex items-center justify-center">
                        <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <div>
                        <button type="button" class="px-4 py-2 rounded-xl border-2 border-[#D4A017] text-[#D4A017] font-medium hover:bg-[#D4A017] hover:text-white transition-all">Upload Foto</button>
                        <p class="text-xs text-gray-400 mt-1">Format: JPG, PNG. Maks 2MB</p>
                    </div>
                </div>
            </div>

            <!-- Nama Lengkap -->
            <div class="md:col-span-2">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap <span class="text-red-500">*</span></label>
                <input type="text" placeholder="Masukkan nama lengkap" class="w-full px-5 py-3 rounded-xl border-2 border-gray-200 focus:border-[#D4A017] focus:ring-2 focus:ring-[#D4A017]/20 transition-all">
            </div>

            <!-- NIP -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">NIP <span class="text-red-500">*</span></label>
                <input type="text" placeholder="Masukkan NIP" class="w-full px-5 py-3 rounded-xl border-2 border-gray-200 focus:border-[#D4A017] focus:ring-2 focus:ring-[#D4A017]/20 transition-all">
            </div>

            <!-- Golongan -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Golongan / Pangkat</label>
                <select class="w-full px-5 py-3 rounded-xl border-2 border-gray-200 bg-white focus:border-[#D4A017] focus:ring-2 focus:ring-[#D4A017]/20 transition-all">
                    <option value="">Pilih Golongan</option>
                    <option>III/a (Penata Muda)</option>
                    <option>III/b (Penata Muda Tingkat I)</option>
                    <option>III/c (Penata)</option>
                    <option>III/d (Penata Tingkat I)</option>
                    <option>IV/a (Pembina)</option>
                    <option>IV/b (Pembina Tingkat I)</option>
                    <option>IV/c (Pembina Utama Muda)</option>
                </select>
            </div>

            <!-- Jabatan -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Jabatan</label>
                <input type="text" placeholder="Masukkan jabatan" class="w-full px-5 py-3 rounded-xl border-2 border-gray-200 focus:border-[#D4A017] focus:ring-2 focus:ring-[#D4A017]/20 transition-all">
            </div>

            <!-- Divisi -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Divisi / Unit Kerja <span class="text-red-500">*</span></label>
                <select class="w-full px-5 py-3 rounded-xl border-2 border-gray-200 bg-white focus:border-[#D4A017] focus:ring-2 focus:ring-[#D4A017]/20 transition-all">
                    <option value="">Pilih Divisi</option>
                    <option>Direktorat Jenderal Imigrasi</option>
                    <option>Direktorat Jenderal Pemasyarakatan</option>
                    <option>Sekretariat Jenderal</option>
                    <option>Inspektorat Jenderal</option>
                    <option>Kantor Wilayah</option>
                    <option>Kantor Imigrasi</option>
                </select>
            </div>

            <!-- Email -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Email <span class="text-red-500">*</span></label>
                <input type="email" placeholder="nama@imipas.go.id" class="w-full px-5 py-3 rounded-xl border-2 border-gray-200 focus:border-[#D4A017] focus:ring-2 focus:ring-[#D4A017]/20 transition-all">
                <p class="text-xs text-gray-400 mt-1">Gunakan email resmi @imipas.go.id</p>
            </div>

            <!-- No. HP -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">No. HP</label>
                <input type="tel" placeholder="08xxxxxxxxxx" class="w-full px-5 py-3 rounded-xl border-2 border-gray-200 focus:border-[#D4A017] focus:ring-2 focus:ring-[#D4A017]/20 transition-all">
            </div>

            <!-- Role Akses -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Role / Hak Akses</label>
                <select class="w-full px-5 py-3 rounded-xl border-2 border-gray-200 bg-white focus:border-[#D4A017] focus:ring-2 focus:ring-[#D4A017]/20 transition-all">
                    <option value="">Pilih Role</option>
                    <option>Super Admin</option>
                    <option>Admin</option>
                    <option>User Biasa</option>
                    <option>Verifikator</option>
                </select>
            </div>

            <!-- Status Akun -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Status Akun</label>
                <select class="w-full px-5 py-3 rounded-xl border-2 border-gray-200 bg-white focus:border-[#D4A017] focus:ring-2 focus:ring-[#D4A017]/20 transition-all">
                    <option value="active" selected>Aktif</option>
                    <option value="inactive">Nonaktif</option>
                    <option value="leave">Cuti</option>
                </select>
            </div>

            <!-- Password -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Password <span class="text-red-500">*</span></label>
                <input type="password" placeholder="Minimal 8 karakter" class="w-full px-5 py-3 rounded-xl border-2 border-gray-200 focus:border-[#D4A017] focus:ring-2 focus:ring-[#D4A017]/20 transition-all">
                <p class="text-xs text-gray-400 mt-1">Password akan dienkripsi dengan bcrypt</p>
            </div>

            <!-- Konfirmasi Password -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Konfirmasi Password <span class="text-red-500">*</span></label>
                <input type="password" placeholder="Ulangi password" class="w-full px-5 py-3 rounded-xl border-2 border-gray-200 focus:border-[#D4A017] focus:ring-2 focus:ring-[#D4A017]/20 transition-all">
            </div>

            <!-- Alamat -->
            <div class="md:col-span-2">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Alamat</label>
                <textarea rows="3" placeholder="Masukkan alamat lengkap" class="w-full px-5 py-3 rounded-xl border-2 border-gray-200 focus:border-[#D4A017] focus:ring-2 focus:ring-[#D4A017]/20 transition-all resize-none"></textarea>
            </div>

            <!-- Buttons -->
            <div class="md:col-span-2 flex gap-4 pt-4 border-t border-gray-200 mt-4">
                <a href="{{ url('admin/manajemen-akun') }}" class="flex-1 px-6 py-3 rounded-xl border-2 border-gray-200 text-gray-700 font-semibold text-center hover:bg-gray-50 transition-all">
                    Batal
                </a>
                <button type="submit" class="flex-1 btn-premium px-6 py-3 rounded-xl text-white font-semibold shadow-md flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Simpan Akun
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