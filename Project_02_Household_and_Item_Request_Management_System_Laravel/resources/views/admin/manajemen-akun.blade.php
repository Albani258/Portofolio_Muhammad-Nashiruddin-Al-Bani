@extends('layouts.admin')
@section('content')

<!-- Welcome Banner -->
<div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-[#0B3B5F] to-[#0A2E4A] p-8 mb-8 shadow-xl">
    <div class="absolute top-0 right-0 w-64 h-64 bg-[#D4A017] opacity-10 rounded-full filter blur-3xl"></div>
    <div class="absolute bottom-0 left-0 w-48 h-48 bg-[#D4A017] opacity-5 rounded-full filter blur-2xl"></div>
    <div class="relative z-10">
        <h1 class="text-2xl font-bold text-white mb-2">Manajemen Akun Petugas</h1>
        <p class="text-white/80 text-sm">Kelola data akun petugas Kementerian Imigrasi dan Pemasyarakatan</p>
    </div>
</div>

<!-- Statistik Ringkas -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="stat-card-premium p-5">
        <div class="flex items-center justify-between mb-3">
            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-[#0B3B5F] to-[#0A2E4A] flex items-center justify-center shadow-md">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg>
            </div>
            <span class="text-3xl font-bold text-[#0B3B5F]">48</span>
        </div>
        <p class="text-xs font-medium text-gray-500 uppercase tracking-wide">Total Petugas</p>
    </div>
    <div class="stat-card-premium p-5">
        <div class="flex items-center justify-between mb-3">
            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-emerald-500 to-green-600 flex items-center justify-center shadow-md">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <span class="text-3xl font-bold text-emerald-700">42</span>
        </div>
        <p class="text-xs font-medium text-gray-500 uppercase tracking-wide">Aktif</p>
    </div>
    <div class="stat-card-premium p-5">
        <div class="flex items-center justify-between mb-3">
            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-amber-500 to-yellow-600 flex items-center justify-center shadow-md">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <span class="text-3xl font-bold text-amber-700">4</span>
        </div>
        <p class="text-xs font-medium text-gray-500 uppercase tracking-wide">Cuti</p>
    </div>
    <div class="stat-card-premium p-5">
        <div class="flex items-center justify-between mb-3">
            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-red-500 to-red-600 flex items-center justify-center shadow-md">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <span class="text-3xl font-bold text-red-700">2</span>
        </div>
        <p class="text-xs font-medium text-gray-500 uppercase tracking-wide">Nonaktif</p>
    </div>
</div>

<!-- Tabel Manajemen Akun -->
<div class="premium-card shadow-xl">
    <div class="flex flex-wrap items-center justify-between gap-4 border-b border-gray-100 px-6 py-5 bg-gradient-to-r from-white to-gray-50">
        <div>
            <h2 class="text-lg font-bold text-[#0B3B5F] flex items-center gap-2">
                <div class="w-1 h-6 bg-[#D4A017] rounded-full"></div>
                Daftar Akun Petugas
            </h2>
            <p class="text-xs text-gray-500 mt-1">Kelola data akun petugas seluruh unit kerja</p>
        </div>
        <div class="flex flex-col sm:flex-row gap-3">
            <div class="relative">
                <svg class="absolute left-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
                <input type="text" placeholder="Cari nama, NIP, atau email..." class="pl-11 pr-4 py-2.5 rounded-xl border border-gray-200 w-full sm:w-64 focus:border-[#D4A017] focus:ring-2 focus:ring-[#D4A017]/20 transition-all">
            </div>
            <select class="px-4 py-2.5 rounded-xl border border-gray-200 bg-white focus:border-[#D4A017] focus:ring-2 focus:ring-[#D4A017]/20 transition-all">
                <option>Semua Divisi</option>
                <option>Divisi IT</option>
                <option>Divisi Keuangan</option>
                <option>Divisi SDM</option>
                <option>Divisi Operasional</option>
            </select>
            <a href="{{ url('admin/manajemen-akun/create') }}" class="btn-premium px-5 py-2.5 rounded-xl text-white font-semibold flex items-center gap-2 shadow-md">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Tambah Akun
            </a>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gradient-to-r from-[#0B3B5F] to-[#0A2E4A]">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">No</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Nama</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">NIP</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Divisi</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Email</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Status</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <tr class="hover:bg-[#F5E6B8]/20 transition-all">
                    <td class="px-6 py-4 text-sm text-gray-500">01</td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-[#0B3B5F] to-[#0A2E4A] flex items-center justify-center text-white font-bold shadow-md">ER</div>
                            <div>
                                <p class="font-semibold text-gray-800">Endin Rahmanda</p>
                                <p class="text-xs text-gray-400">Kepala Seksi IT</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 font-mono text-gray-600">198503152010011001</td>
                    <td class="px-6 py-4"><span class="px-2 py-1 rounded-full text-xs bg-blue-100 text-blue-700">Divisi IT</span></td>
                    <td class="px-6 py-4 text-gray-600">endin@imipas.go.id</td>
                    <td class="px-6 py-4"><span class="badge-success">Aktif</span></td>
                    <td class="px-6 py-4">
                        <div class="flex gap-2">
                            <a href="{{ url('admin/aksi-akun/1') }}" class="p-2 rounded-lg text-[#D4A017] hover:bg-[#D4A017]/10 transition-all" title="Detail">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                            </a>
                            <a href="{{ url('admin/manajemen-akun/edit/1') }}" class="p-2 rounded-lg text-blue-500 hover:bg-blue-50 transition-all" title="Edit">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            </a>
                            <button class="p-2 rounded-lg text-red-500 hover:bg-red-50 transition-all" title="Hapus">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr class="hover:bg-[#F5E6B8]/20 transition-all">
                    <td class="px-6 py-4 text-sm text-gray-500">02</td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-purple-500 to-purple-600 flex items-center justify-center text-white font-bold shadow-md">SN</div>
                            <div><p class="font-semibold text-gray-800">Siti Nuraini</p><p class="text-xs text-gray-400">Kepala Divisi Keuangan</p></div>
                        </div>
                    </td>
                    <td class="px-6 py-4 font-mono text-gray-600">197808202005012001</td>
                    <td class="px-6 py-4"><span class="px-2 py-1 rounded-full text-xs bg-green-100 text-green-700">Divisi Keuangan</span></td>
                    <td class="px-6 py-4 text-gray-600">siti.nuraini@imipas.go.id</td>
                    <td class="px-6 py-4"><span class="badge-success">Aktif</span></td>
                    <td class="px-6 py-4"><div class="flex gap-2"><a href="{{ url('admin/aksi-akun/2') }}" class="p-2 rounded-lg text-[#D4A017] hover:bg-[#D4A017]/10"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0zM2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg></a><a href="#" class="p-2 rounded-lg text-blue-500 hover:bg-blue-50"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg></a><button class="p-2 rounded-lg text-red-500 hover:bg-red-50"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg></button></div></td>
                </tr>
                <tr class="hover:bg-[#F5E6B8]/20 transition-all bg-amber-50/30">
                    <td class="px-6 py-4 text-sm text-gray-500">03</td>
                    <td class="px-6 py-4"><div class="flex items-center gap-3"><div class="w-10 h-10 rounded-full bg-gradient-to-br from-amber-500 to-amber-600 flex items-center justify-center text-white font-bold shadow-md">FH</div><div><p class="font-semibold text-gray-800">Fajar Hidayat</p><p class="text-xs text-gray-400">Staff SDM</p></div></div></td>
                    <td class="px-6 py-4 font-mono text-gray-600">199003152015031002</td>
                    <td class="px-6 py-4"><span class="px-2 py-1 rounded-full text-xs bg-purple-100 text-purple-700">Divisi SDM</span></td>
                    <td class="px-6 py-4 text-gray-600">fajar.hidayat@imipas.go.id</td>
                    <td class="px-6 py-4"><span class="badge-warning">Cuti</span></td>
                    <td class="px-6 py-4"><div class="flex gap-2"><a href="{{ url('admin/aksi-akun/3') }}" class="p-2 rounded-lg text-[#D4A017] hover:bg-[#D4A017]/10"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0zM2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg></a><a href="#" class="p-2 rounded-lg text-blue-500 hover:bg-blue-50"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg></a><button class="p-2 rounded-lg text-red-500 hover:bg-red-50"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg></button></div></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="border-t border-gray-100 px-6 py-4 bg-gray-50/30 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <p class="text-sm text-gray-500">Menampilkan <strong class="text-[#0B3B5F]">3</strong> dari <strong class="text-[#0B3B5F]">48</strong> data</p>
        <div class="flex items-center gap-2">
            <button class="px-3 py-2 rounded-lg border border-gray-200 text-gray-600 hover:bg-white hover:border-[#D4A017] transition-all opacity-50 cursor-not-allowed"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg></button>
            <button class="w-10 h-10 rounded-lg bg-gradient-to-r from-[#0B3B5F] to-[#0A2E4A] text-white font-semibold shadow-md">1</button>
            <button class="w-10 h-10 rounded-lg border border-gray-200 text-gray-600 hover:bg-white hover:border-[#D4A017] transition-all">2</button>
            <button class="w-10 h-10 rounded-lg border border-gray-200 text-gray-600 hover:bg-white hover:border-[#D4A017] transition-all">3</button>
            <button class="px-3 py-2 rounded-lg border border-gray-200 text-gray-600 hover:bg-white hover:border-[#D4A017] transition-all"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg></button>
        </div>
    </div>
</div>

<style>
    .premium-card, .stat-card-premium, .badge-success, .badge-warning, .badge-danger, .badge-pending, .btn-premium { /* style sama seperti sebelumnya */ }
</style>

@endsection