@extends('layouts.admin')
@section('content')

<!-- Welcome Banner -->
<div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-[#0B3B5F] to-[#0A2E4A] p-8 mb-8 shadow-xl">
    <div class="absolute top-0 right-0 w-64 h-64 bg-[#D4A017] opacity-10 rounded-full filter blur-3xl"></div>
    <div class="absolute bottom-0 left-0 w-48 h-48 bg-[#D4A017] opacity-5 rounded-full filter blur-2xl"></div>
    <div class="relative z-10">
        <h1 class="text-2xl font-bold text-white mb-2">Detail Akun Petugas</h1>
        <p class="text-white/80 text-sm">Informasi lengkap data petugas Kementerian Imigrasi dan Pemasyarakatan</p>
    </div>
</div>

<!-- Detail Akun Card -->
<div class="premium-card shadow-xl">
    <div class="p-6 border-b border-gray-100 bg-gradient-to-r from-white to-gray-50">
        <h2 class="text-xl font-bold text-[#0B3B5F] flex items-center gap-2">
            <div class="w-1 h-8 bg-[#D4A017] rounded-full"></div>
            Informasi Detail Akun
        </h2>
        <p class="text-sm text-gray-500 mt-1">Data lengkap petugas yang terdaftar di sistem</p>
    </div>

    <div class="p-8">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Foto Profil -->
            <div class="lg:w-1/3">
                <div class="bg-gray-50 rounded-2xl p-6 text-center border border-gray-100">
                    <div class="w-40 h-40 mx-auto rounded-full overflow-hidden bg-gradient-to-br from-[#0B3B5F] to-[#0A2E4A] p-1">
                        <img src="https://picsum.photos/id/37/200/200" class="w-full h-full object-cover rounded-full" alt="Profile">
                    </div>
                    <h3 class="mt-4 text-xl font-bold text-[#0B3B5F]">Endin Rahmanda</h3>
                    <p class="text-sm text-gray-500">Divisi IT</p>
                    <div class="mt-3">
                        <span class="badge-success">✅ Aktif</span>
                    </div>
                </div>
            </div>

            <!-- Informasi Detail -->
            <div class="lg:w-2/3">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-gray-50 rounded-xl p-4">
                        <label class="text-xs font-medium text-gray-400 uppercase tracking-wide">Nama Lengkap</label>
                        <p class="text-gray-800 font-semibold text-lg">Endin Rahmanda</p>
                    </div>
                    <div class="bg-gray-50 rounded-xl p-4">
                        <label class="text-xs font-medium text-gray-400 uppercase tracking-wide">NIP</label>
                        <p class="text-gray-800 font-semibold font-mono">198503152010011001</p>
                    </div>
                    <div class="bg-gray-50 rounded-xl p-4">
                        <label class="text-xs font-medium text-gray-400 uppercase tracking-wide">Divisi / Unit</label>
                        <p class="text-gray-800 font-semibold">Divisi Teknologi Informasi</p>
                    </div>
                    <div class="bg-gray-50 rounded-xl p-4">
                        <label class="text-xs font-medium text-gray-400 uppercase tracking-wide">Jabatan</label>
                        <p class="text-gray-800 font-semibold">Kepala Seksi IT</p>
                    </div>
                    <div class="bg-gray-50 rounded-xl p-4">
                        <label class="text-xs font-medium text-gray-400 uppercase tracking-wide">Email</label>
                        <p class="text-gray-800 font-semibold">endin.rahmanda@imipas.go.id</p>
                    </div>
                    <div class="bg-gray-50 rounded-xl p-4">
                        <label class="text-xs font-medium text-gray-400 uppercase tracking-wide">No. Telepon</label>
                        <p class="text-gray-800 font-semibold">0812-3456-7890</p>
                    </div>
                    <div class="bg-gray-50 rounded-xl p-4">
                        <label class="text-xs font-medium text-gray-400 uppercase tracking-wide">Golongan</label>
                        <p class="text-gray-800 font-semibold">IV/a (Pembina)</p>
                    </div>
                    <div class="bg-gray-50 rounded-xl p-4">
                        <label class="text-xs font-medium text-gray-400 uppercase tracking-wide">Status Akun</label>
                        <p class="text-gray-800 font-semibold"><span class="badge-success">Aktif</span></p>
                    </div>
                    <div class="bg-gray-50 rounded-xl p-4">
                        <label class="text-xs font-medium text-gray-400 uppercase tracking-wide">Role Akses</label>
                        <p class="text-gray-800 font-semibold">Admin</p>
                    </div>
                    <div class="bg-gray-50 rounded-xl p-4">
                        <label class="text-xs font-medium text-gray-400 uppercase tracking-wide">Tanggal Bergabung</label>
                        <p class="text-gray-800 font-semibold">15 Januari 2010</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tombol Aksi -->
        <div class="flex gap-4 mt-8 pt-6 border-t border-gray-200">
            <a href="{{ url('admin/manajemen-akun') }}" class="px-6 py-3 rounded-xl border-2 border-gray-200 text-gray-700 font-semibold hover:bg-gray-50 transition-all">
                Kembali
            </a>
            <a href="{{ url('admin/manajemen-akun/edit/1') }}" class="btn-premium px-6 py-3 rounded-xl text-white font-semibold flex items-center gap-2 shadow-md">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                </svg>
                Edit Akun
            </a>
            <button onclick="confirmDelete()" class="px-6 py-3 rounded-xl bg-gradient-to-r from-red-600 to-red-700 text-white font-semibold flex items-center gap-2 shadow-md hover:shadow-lg transition-all">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                </svg>
                Hapus Akun
            </button>
        </div>
    </div>
</div>

<!-- Riwayat Pengajuan -->
<div class="premium-card shadow-xl mt-8">
    <div class="p-6 border-b border-gray-100 bg-gradient-to-r from-white to-gray-50">
        <h2 class="text-lg font-bold text-[#0B3B5F] flex items-center gap-2">
            <div class="w-1 h-6 bg-[#D4A017] rounded-full"></div>
            Riwayat Pengajuan Barang
        </h2>
        <p class="text-sm text-gray-500 mt-1">Daftar pengajuan barang yang pernah diajukan oleh petugas</p>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500">Tanggal</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500">Nama Barang</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500">Kode</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500">Jumlah</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-3 text-sm text-gray-600">15/01/2024</td>
                    <td class="px-6 py-3 font-medium text-gray-800">Monitor 24 Inch</td>
                    <td class="px-6 py-3 font-mono text-gray-600">BRG-001</td>
                    <td class="px-6 py-3 text-gray-700">2</td>
                    <td class="px-6 py-3"><span class="badge-success">✅ Disetujui</span></td>
                    <td class="px-6 py-3">
                        <a href="{{ url('admin/pengajuan/detail/1') }}" class="text-[#D4A017] hover:text-[#B8920E]">Lihat</a>
                    </td>
                </tr>
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-3 text-sm text-gray-600">20/02/2024</td>
                    <td class="px-6 py-3 font-medium text-gray-800">Keyboard Mechanical</td>
                    <td class="px-6 py-3 font-mono text-gray-600">BRG-005</td>
                    <td class="px-6 py-3 text-gray-700">5</td>
                    <td class="px-6 py-3"><span class="badge-pending">⏳ Menunggu</span></td>
                    <td class="px-6 py-3">
                        <a href="{{ url('admin/pengajuan/detail/2') }}" class="text-[#D4A017] hover:text-[#B8920E]">Lihat</a>
                    </td>
                </tr>
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-3 text-sm text-gray-600">10/03/2024</td>
                    <td class="px-6 py-3 font-medium text-gray-800">Mouse Wireless</td>
                    <td class="px-6 py-3 font-mono text-gray-600">BRG-008</td>
                    <td class="px-6 py-3 text-gray-700">10</td>
                    <td class="px-6 py-3"><span class="badge-success">✅ Disetujui</span></td>
                    <td class="px-6 py-3">
                        <a href="{{ url('admin/pengajuan/detail/3') }}" class="text-[#D4A017] hover:text-[#B8920E]">Lihat</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script>
    function confirmDelete() {
        if(confirm('Apakah Anda yakin ingin menghapus akun ini? Data yang dihapus tidak dapat dikembalikan.')) {
            alert('Akun berhasil dihapus');
            window.location.href = "{{ url('admin/manajemen-akun') }}";
        }
    }
</script>

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
    .badge-success {
        background: linear-gradient(135deg, #10B981, #059669);
        color: white;
        padding: 4px 12px;
        border-radius: 50px;
        font-size: 0.75rem;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 4px;
    }
    .badge-pending {
        background: linear-gradient(135deg, #F97316, #EA580C);
        color: white;
        padding: 4px 12px;
        border-radius: 50px;
        font-size: 0.75rem;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 4px;
    }
</style>

@endsection