@extends('layouts.admin')
@section('content')

<!-- Welcome Banner -->
<div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-[#0B3B5F] to-[#0A2E4A] p-8 mb-8 shadow-xl">
    <div class="absolute top-0 right-0 w-64 h-64 bg-[#D4A017] opacity-10 rounded-full filter blur-3xl"></div>
    <div class="absolute bottom-0 left-0 w-48 h-48 bg-[#D4A017] opacity-5 rounded-full filter blur-2xl"></div>
    <div class="relative z-10">
        <h1 class="text-2xl font-bold text-white mb-2">Daftar Persetujuan Pengajuan</h1>
        <p class="text-white/80 text-sm">Kelola persetujuan pengajuan barang inventaris Kementerian Imigrasi dan Pemasyarakatan</p>
    </div>
</div>

<!-- PETUNJUK ADMIN -->
<div class="mb-8 premium-card overflow-hidden">
    <div class="bg-gradient-to-r from-[#D4A017]/10 to-transparent p-5">
        <div class="flex items-start gap-4">
            <div class="w-10 h-10 rounded-xl bg-[#D4A017] flex items-center justify-center shadow-md">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
            </div>
            <div>
                <h3 class="font-bold text-[#0B3B5F] text-sm uppercase tracking-wide">Petunjuk Persetujuan</h3>
                <p class="text-sm text-gray-600 mt-1">Klik tombol <strong class="text-blue-600">Detail</strong> untuk melihat dan mengubah status persetujuan pengajuan barang.</p>
            </div>
        </div>
    </div>
</div>

<!-- Statistik Ringkas -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="stat-card-premium p-5">
        <div class="flex items-center justify-between mb-3">
            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-[#0B3B5F] to-[#0A2E4A] flex items-center justify-center shadow-md">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
            </div>
            <span class="text-3xl font-bold text-[#0B3B5F]">24</span>
        </div>
        <p class="text-xs font-medium text-gray-500 uppercase tracking-wide">Total Pengajuan</p>
    </div>
    <div class="stat-card-premium p-5">
        <div class="flex items-center justify-between mb-3">
            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-amber-500 to-yellow-600 flex items-center justify-center shadow-md">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <span class="text-3xl font-bold text-amber-700">8</span>
        </div>
        <p class="text-xs font-medium text-gray-500 uppercase tracking-wide">Menunggu Persetujuan</p>
    </div>
    <div class="stat-card-premium p-5">
        <div class="flex items-center justify-between mb-3">
            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-emerald-500 to-green-600 flex items-center justify-center shadow-md">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <span class="text-3xl font-bold text-emerald-700">12</span>
        </div>
        <p class="text-xs font-medium text-gray-500 uppercase tracking-wide">Disetujui</p>
    </div>
    <div class="stat-card-premium p-5">
        <div class="flex items-center justify-between mb-3">
            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-red-500 to-red-600 flex items-center justify-center shadow-md">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <span class="text-3xl font-bold text-red-700">4</span>
        </div>
        <p class="text-xs font-medium text-gray-500 uppercase tracking-wide">Ditolak / Revisi</p>
    </div>
</div>

<!-- Tabel Daftar Persetujuan -->
<div class="premium-card shadow-xl">
    <div class="flex flex-wrap items-center justify-between gap-4 border-b border-gray-100 px-6 py-5 bg-gradient-to-r from-white to-gray-50">
        <div>
            <h2 class="text-lg font-bold text-[#0B3B5F] flex items-center gap-2">
                <div class="w-1 h-6 bg-[#D4A017] rounded-full"></div>
                Daftar Pengajuan Barang
            </h2>
            <p class="text-xs text-gray-500 mt-1">Klik Detail untuk mengelola status persetujuan</p>
        </div>
        <div class="flex flex-col sm:flex-row gap-3">
            <div class="relative">
                <svg class="absolute left-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
                <input type="text" placeholder="Cari nama barang, peminta..." class="pl-11 pr-4 py-2.5 rounded-xl border border-gray-200 w-full sm:w-64 focus:border-[#D4A017] focus:ring-2 focus:ring-[#D4A017]/20 transition-all">
            </div>
            <select class="px-4 py-2.5 rounded-xl border border-gray-200 bg-white focus:border-[#D4A017] focus:ring-2 focus:ring-[#D4A017]/20 transition-all">
                <option>Semua Status</option>
                <option>Menunggu Persetujuan</option>
                <option>Disetujui</option>
                <option>Ditolak</option>
                <option>Revisi</option>
            </select>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gradient-to-r from-[#0B3B5F] to-[#0A2E4A]">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">No</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Nama Barang</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Kode Barang</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Kategori</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Jumlah</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Peminta</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Tgl Pengajuan</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Status</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <tr class="hover:bg-[#F5E6B8]/20 transition-all">
                    <td class="px-6 py-4 text-sm text-gray-500">01</td>
                    <td class="px-6 py-4 font-semibold text-gray-800">Sepatu Running Pro</td>
                    <td class="px-6 py-4 font-mono text-gray-600">MP-001</td>
                    <td class="px-6 py-4"><span class="px-2 py-1 rounded-full text-xs bg-blue-100 text-blue-700">Footwear</span></td>
                    <td class="px-6 py-4 text-gray-700">120</td>
                    <td class="px-6 py-4 text-gray-600">Rizky Ramadhan</td>
                    <td class="px-6 py-4 text-gray-600">15/01/2024</td>
                    <td class="px-6 py-4"><span class="badge-success">✅ Disetujui</span></td>
                    <td class="px-6 py-4">
                        <a href="{{ url('admin/pengajuan/detail/1') }}" class="inline-flex items-center px-4 py-2 rounded-lg bg-[#D4A017] text-white text-sm font-medium hover:bg-[#B8920E] transition-all">Detail</a>
                    </td>
                </tr>
                <tr class="hover:bg-[#F5E6B8]/20 transition-all">
                    <td class="px-6 py-4 text-sm text-gray-500">02</td>
                    <td class="px-6 py-4 font-semibold text-gray-800">Kaos Olahraga Dri-Fit</td>
                    <td class="px-6 py-4 font-mono text-gray-600">MP-002</td>
                    <td class="px-6 py-4"><span class="px-2 py-1 rounded-full text-xs bg-purple-100 text-purple-700">Apparel</span></td>
                    <td class="px-6 py-4 text-gray-700">80</td>
                    <td class="px-6 py-4 text-gray-600">Nadia Putri</td>
                    <td class="px-6 py-4 text-gray-600">16/01/2024</td>
                    <td class="px-6 py-4"><span class="badge-pending">⏳ Menunggu</span></td>
                    <td class="px-6 py-4">
                        <a href="{{ url('admin/pengajuan/detail/2') }}" class="inline-flex items-center px-4 py-2 rounded-lg bg-[#D4A017] text-white text-sm font-medium hover:bg-[#B8920E] transition-all">Detail</a>
                    </td>
                </tr>
                <tr class="hover:bg-[#F5E6B8]/20 transition-all">
                    <td class="px-6 py-4 text-sm text-gray-500">03</td>
                    <td class="px-6 py-4 font-semibold text-gray-800">Tas Gym Active</td>
                    <td class="px-6 py-4 font-mono text-gray-600">MP-003</td>
                    <td class="px-6 py-4"><span class="px-2 py-1 rounded-full text-xs bg-orange-100 text-orange-700">Accessories</span></td>
                    <td class="px-6 py-4 text-gray-700">30</td>
                    <td class="px-6 py-4 text-gray-600">Fajar Hidayat</td>
                    <td class="px-6 py-4 text-gray-600">17/01/2024</td>
                    <td class="px-6 py-4"><span class="badge-warning">📝 Revisi</span></td>
                    <td class="px-6 py-4">
                        <a href="{{ url('admin/pengajuan/detail/3') }}" class="inline-flex items-center px-4 py-2 rounded-lg bg-[#D4A017] text-white text-sm font-medium hover:bg-[#B8920E] transition-all">Detail</a>
                    </td>
                </tr>
                <tr class="hover:bg-[#F5E6B8]/20 transition-all">
                    <td class="px-6 py-4 text-sm text-gray-500">04</td>
                    <td class="px-6 py-4 font-semibold text-gray-800">Celana Training Elite</td>
                    <td class="px-6 py-4 font-mono text-gray-600">MP-004</td>
                    <td class="px-6 py-4"><span class="px-2 py-1 rounded-full text-xs bg-purple-100 text-purple-700">Apparel</span></td>
                    <td class="px-6 py-4 text-gray-700">60</td>
                    <td class="px-6 py-4 text-gray-600">Rizky Ramadhan</td>
                    <td class="px-6 py-4 text-gray-600">18/01/2024</td>
                    <td class="px-6 py-4"><span class="badge-success">✅ Disetujui</span></td>
                    <td class="px-6 py-4">
                        <a href="{{ url('admin/pengajuan/detail/4') }}" class="inline-flex items-center px-4 py-2 rounded-lg bg-[#D4A017] text-white text-sm font-medium hover:bg-[#B8920E] transition-all">Detail</a>
                    </td>
                </tr>
                <tr class="hover:bg-[#F5E6B8]/20 transition-all">
                    <td class="px-6 py-4 text-sm text-gray-500">05</td>
                    <td class="px-6 py-4 font-semibold text-gray-800">Topi Olahraga UV</td>
                    <td class="px-6 py-4 font-mono text-gray-600">MP-005</td>
                    <td class="px-6 py-4"><span class="px-2 py-1 rounded-full text-xs bg-orange-100 text-orange-700">Accessories</span></td>
                    <td class="px-6 py-4 text-gray-700">45</td>
                    <td class="px-6 py-4 text-gray-600">Alya Safira</td>
                    <td class="px-6 py-4 text-gray-600">19/01/2024</td>
                    <td class="px-6 py-4"><span class="badge-danger">❌ Ditolak</span></td>
                    <td class="px-6 py-4">
                        <a href="{{ url('admin/pengajuan/detail/5') }}" class="inline-flex items-center px-4 py-2 rounded-lg bg-[#D4A017] text-white text-sm font-medium hover:bg-[#B8920E] transition-all">Detail</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="border-t border-gray-100 px-6 py-4 bg-gray-50/30 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <p class="text-sm text-gray-500">Menampilkan <strong class="text-[#0B3B5F]">5</strong> dari <strong class="text-[#0B3B5F]">24</strong> data</p>
        <div class="flex items-center gap-2">
            <button class="px-3 py-2 rounded-lg border border-gray-200 text-gray-600 hover:bg-white hover:border-[#D4A017] transition-all opacity-50 cursor-not-allowed">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            </button>
            <button class="w-10 h-10 rounded-lg bg-gradient-to-r from-[#0B3B5F] to-[#0A2E4A] text-white font-semibold shadow-md">1</button>
            <button class="w-10 h-10 rounded-lg border border-gray-200 text-gray-600 hover:bg-white hover:border-[#D4A017] transition-all">2</button>
            <button class="w-10 h-10 rounded-lg border border-gray-200 text-gray-600 hover:bg-white hover:border-[#D4A017] transition-all">3</button>
            <button class="px-3 py-2 rounded-lg border border-gray-200 text-gray-600 hover:bg-white hover:border-[#D4A017] transition-all">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </button>
        </div>
    </div>
</div>

<style>
    .premium-card, .stat-card-premium { /* style sama seperti sebelumnya */ }
    .badge-success { background: linear-gradient(135deg, #10B981, #059669); color: white; padding: 4px 12px; border-radius: 50px; font-size: 0.75rem; display: inline-flex; align-items: center; gap: 4px; }
    .badge-warning { background: linear-gradient(135deg, #F59E0B, #D97706); color: white; padding: 4px 12px; border-radius: 50px; font-size: 0.75rem; display: inline-flex; align-items: center; gap: 4px; }
    .badge-danger { background: linear-gradient(135deg, #EF4444, #DC2626); color: white; padding: 4px 12px; border-radius: 50px; font-size: 0.75rem; display: inline-flex; align-items: center; gap: 4px; }
    .badge-pending { background: linear-gradient(135deg, #F97316, #EA580C); color: white; padding: 4px 12px; border-radius: 50px; font-size: 0.75rem; display: inline-flex; align-items: center; gap: 4px; }
    .btn-premium { background: linear-gradient(135deg, #0B3B5F, #0A2E4A); }
    .stat-card-premium { background: white; border-radius: 20px; border: 1px solid rgba(203, 213, 225, 0.3); transition: all 0.3s; }
    .premium-card { background: white; border-radius: 20px; border: 1px solid rgba(203, 213, 225, 0.3); position: relative; overflow: hidden; }
    .premium-card::before { content: ''; position: absolute; top: 0; left: 0; right: 0; height: 3px; background: linear-gradient(90deg, #D4A017, #0B3B5F); transform: scaleX(0); transition: transform 0.3s; }
    .premium-card:hover::before { transform: scaleX(1); }
    .stat-card-premium:hover { transform: translateY(-4px); box-shadow: 0 20px 40px -12px rgba(11, 59, 95, 0.15); }
</style>

@endsection