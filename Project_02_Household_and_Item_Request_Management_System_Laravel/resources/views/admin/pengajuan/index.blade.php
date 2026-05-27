@extends('layouts.admin')
@section('content')

<!-- Welcome Banner -->
<div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-[#0B3B5F] to-[#0A2E4A] p-8 mb-8 shadow-xl">
    <div class="absolute top-0 right-0 w-64 h-64 bg-[#D4A017] opacity-10 rounded-full filter blur-3xl"></div>
    <div class="absolute bottom-0 left-0 w-48 h-48 bg-[#D4A017] opacity-5 rounded-full filter blur-2xl"></div>
    <div class="relative z-10">
        <h1 class="text-2xl font-bold text-white mb-2">Manajemen Pengajuan Barang (admin)</h1>
        <p class="text-white/80 text-sm">Kelola dan monitoring pengajuan barang inventaris Kementerian Imigrasi dan Pemasyarakatan</p>
    </div>
</div>

<!-- PETUNJUK ADMIN - Premium -->
<div class="mb-8 premium-card overflow-hidden">
    <div class="bg-gradient-to-r from-[#D4A017]/10 to-transparent p-5">
        <div class="flex items-start gap-4">
            <div class="w-10 h-10 rounded-xl bg-[#D4A017] flex items-center justify-center shadow-md">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
            </div>
            <div>
                <h3 class="font-bold text-[#0B3B5F] text-sm uppercase tracking-wide">Petunjuk Admin Pengajuan</h3>
                <p class="text-sm text-gray-600 mt-1">Klik pada badge status untuk mengubah persetujuan pengajuan barang. Pilih <strong class="text-green-600">"Disetujui semua"</strong>, <strong class="text-yellow-600">"Disetujui sebagian"</strong> (dengan jumlah), atau <strong class="text-red-600">"Ditolak"</strong>.</p>
            </div>
        </div>
    </div>
</div>

<!-- RINGKASAN STATISTIK PREMIUM -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6 mb-8">
    <!-- Total Pengajuan -->
    <div class="stat-card-premium p-5">
        <div class="flex items-center justify-between mb-3">
            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-[#0B3B5F] to-[#0A2E4A] flex items-center justify-center shadow-md">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
            </div>
            <span class="text-3xl font-bold text-[#0B3B5F]" x-text="items.length"></span>
        </div>
        <p class="text-xs font-medium text-gray-500 uppercase tracking-wide">Total Pengajuan</p>
        <div class="mt-2 flex items-center gap-2">
            <span class="text-xs text-green-600 bg-green-100 px-2 py-0.5 rounded-full">↑ 5</span>
            <span class="text-xs text-gray-400">bulan ini</span>
        </div>
    </div>

    <!-- Menunggu Persetujuan -->
    <div class="stat-card-premium p-5">
        <div class="flex items-center justify-between mb-3">
            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-orange-500 to-amber-600 flex items-center justify-center shadow-md">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <span class="text-3xl font-bold text-amber-700" x-text="items.filter(i => i.status === 'Menunggu Persetujuan').length"></span>
        </div>
        <p class="text-xs font-medium text-gray-500 uppercase tracking-wide">Menunggu</p>
        <div class="mt-2 w-full bg-gray-200 rounded-full h-1.5">
            <div class="bg-amber-500 h-1.5 rounded-full" :style="{ width: (items.filter(i => i.status === 'Menunggu Persetujuan').length / items.length * 100) + '%' }"></div>
        </div>
    </div>

    <!-- Disetujui semua -->
    <div class="stat-card-premium p-5">
        <div class="flex items-center justify-between mb-3">
            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-emerald-500 to-green-600 flex items-center justify-center shadow-md">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <span class="text-3xl font-bold text-emerald-700" x-text="items.filter(i => i.status === 'Disetujui semua').length"></span>
        </div>
        <p class="text-xs font-medium text-gray-500 uppercase tracking-wide">Disetujui semua</p>
    </div>

    <!-- Disetujui sebagian -->
    <div class="stat-card-premium p-5">
        <div class="flex items-center justify-between mb-3">
            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-amber-500 to-yellow-600 flex items-center justify-center shadow-md">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                </svg>
            </div>
            <span class="text-3xl font-bold text-amber-700" x-text="partialCount"></span>
        </div>
        <p class="text-xs font-medium text-gray-500 uppercase tracking-wide">Disetujui sebagian</p>
    </div>

    <!-- Ditolak -->
    <div class="stat-card-premium p-5">
        <div class="flex items-center justify-between mb-3">
            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-red-500 to-red-600 flex items-center justify-center shadow-md">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <span class="text-3xl font-bold text-red-700" x-text="items.filter(i => i.status === 'Ditolak').length"></span>
        </div>
        <p class="text-xs font-medium text-gray-500 uppercase tracking-wide">Ditolak</p>
    </div>
</div>

<!-- TABEL DAFTAR PENGAJUAN PREMIUM -->
<div class="premium-card shadow-xl">
    <div class="flex flex-wrap items-center justify-between gap-4 border-b border-gray-100 px-6 py-5 bg-gradient-to-r from-white to-gray-50">
        <div>
            <h2 class="text-lg font-bold text-[#0B3B5F] flex items-center gap-2">
                <div class="w-1 h-6 bg-[#D4A017] rounded-full"></div>
                Daftar Pengajuan Barang
            </h2>
            <p class="text-xs text-gray-500 mt-1">Klik pada badge status untuk mengubah persetujuan</p>
        </div>
        <form id="filterForm" method="GET" action="{{ route('admin.pengajuan.index') }}"
            class="flex flex-col sm:flex-row gap-3">

            <div class="relative">
                <svg class="absolute left-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>

                <input type="text"
                    name="search"
                    id="searchInput"
                    value="{{ request('search') }}"
                    placeholder="Cari nama, kode, barang..."
                    class="pl-11 pr-4 py-2.5 rounded-xl border border-gray-200 w-full sm:w-64 focus:border-[#D4A017] focus:ring-2 focus:ring-[#D4A017]/20 transition-all">
            </div>

            <select name="status"
                id="statusSelect"
                class="px-4 py-2.5 rounded-xl border border-gray-200 bg-white focus:border-[#D4A017] focus:ring-2 focus:ring-[#D4A017]/20 transition-all">

                <option value="Semua" {{ request('status', 'Semua') == 'Semua' ? 'selected' : '' }}>
                    Semua Status
                </option>

                <option value="Pending" {{ request('status') == 'Pending' ? 'selected' : '' }}>
                    Menunggu Persetujuan
                </option>

                <option value="Disetujui semua" {{ request('status') == 'Disetujui semua' ? 'selected' : '' }}>
                    Disetujui Semua
                </option>

                <option value="Disetujui sebagian" {{ request('status') == 'Disetujui sebagian' ? 'selected' : '' }}>
                    Disetujui Sebagian
                </option>

                <option value="Ditolak" {{ request('status') == 'Ditolak' ? 'selected' : '' }}>
                    Ditolak
                </option>
            </select>
        </form>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gradient-to-r from-[#0B3B5F] to-[#0A2E4A]">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">No</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Nama Pengaju</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Kode Barang</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Nama Barang</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Kategori</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Jumlah Diajukan</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Prioritas</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Tgl Pengajuan</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Status</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-100">
                @forelse($pengajuan as $key => $item)
                @php
                $status = $item->status_pengajuan ?? 'Pending';

                $namaPengaju = $item->nama_pengaju ?? $item->user->name ?? '-';
                $divisiPengaju = $item->divisi_pengaju ?? $item->user->divisi ?? '-';

                $namaBarang = $item->stock->nama_barang ?? '-';
                $kodeBarang = $item->stock->kode_barang ?? '-';
                $kategori = $item->stock->kategori ?? '-';
                $satuan = $item->satuan ?? $item->stock->satuan ?? '';
                $stokTersedia = $item->stock->jumlah_stock ?? 0;

                $isProcessed = in_array($status, [
                'Disetujui semua',
                'Disetujui sebagian',
                'Ditolak'
                ]);
                @endphp

                <tr class="hover:bg-[#F5E6B8]/20 transition-all duration-200">
                    <td class="px-6 py-4 text-sm text-gray-500">
                        {{ $pengajuan->firstItem() + $key }}
                    </td>

                    <td class="px-6 py-4 text-sm font-semibold text-gray-700">
                        {{ $namaPengaju }}
                    </td>

                    <td class="px-6 py-4 text-sm font-mono font-semibold text-[#0B3B5F]">
                        {{ $kodeBarang }}
                    </td>

                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-[#0B3B5F] to-[#0A2E4A] flex items-center justify-center text-white font-bold shadow-md text-xs">
                                {{ strtoupper(substr($namaBarang, 0, 2)) }}
                            </div>

                            <span class="font-semibold text-gray-800">
                                {{ $namaBarang }}
                            </span>
                        </div>
                    </td>

                    <td class="px-6 py-4 text-sm text-gray-600">
                        <span class="px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-700">
                            {{ $kategori }}
                        </span>
                    </td>

                    <td class="px-6 py-4 text-sm font-semibold text-gray-700">
                        {{ $item->jumlah_pengajuan ?? 0 }} {{ $satuan }}
                    </td>

                    <td class="px-6 py-4 text-sm text-gray-600">
                        {{ $item->prioritas ?? '-' }}
                    </td>

                    <td class="px-6 py-4 text-sm text-gray-600">
                        {{ $item->tanggal_pengajuan ? \Carbon\Carbon::parse($item->tanggal_pengajuan)->format('d-m-Y') : '-' }}
                    </td>

                    <td class="px-6 py-4">
                        @if($status === 'Disetujui semua')
                        <span class="badge-success cursor-pointer">✅ Disetujui semua</span>
                        @elseif($status === 'Disetujui sebagian')
                        <span class="badge-warning cursor-pointer">⚠️ Disetujui sebagian</span>
                        @elseif($status === 'Ditolak')
                        <span class="badge-danger cursor-pointer">❌ Ditolak</span>
                        @else
                        <span class="badge-pending cursor-pointer">⏳ Menunggu Persetujuan</span>
                        @endif
                    </td>

                    <td class="px-6 py-4">
                        <button type="button"
                            onclick="openModal('modalDetail{{ $item->id }}')"
                            class="px-4 py-2 rounded-xl bg-[#0B3B5F] text-white text-xs font-semibold hover:bg-[#0A2E4A] transition">
                            Detail
                        </button>
                    </td>
                </tr>

                {{-- MODAL DETAIL --}}
                <div id="modalDetail{{ $item->id }}"
                    class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 backdrop-blur-sm px-4 py-6">

                    <div class="w-full max-w-3xl max-h-[92vh] overflow-y-auto rounded-3xl bg-white shadow-2xl">

                        {{-- Header --}}
                        <div class="sticky top-0 z-10 bg-gradient-to-r from-[#0B3B5F] to-[#0A2E4A] px-6 py-5">
                            <div class="flex items-start justify-between gap-4">
                                <div>
                                    <h3 class="text-xl font-bold text-white">
                                        Detail Pengajuan Barang
                                    </h3>
                                    <p class="mt-1 text-sm text-white/70">
                                        Periksa detail pengajuan sebelum menyetujui atau menolak permintaan barang.
                                    </p>
                                </div>

                                <button type="button"
                                    onclick="closeModal('modalDetail{{ $item->id }}')"
                                    class="rounded-xl p-2 text-white/80 transition hover:bg-white/10 hover:text-white">
                                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        {{-- Body --}}
                        <div class="p-6">

                            {{-- Status Ringkas --}}
                            <div class="mb-6 rounded-2xl border border-gray-100 bg-gray-50 p-5">
                                <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                                    <div>
                                        <p class="text-xs font-semibold uppercase tracking-wide text-gray-400">
                                            Barang Diajukan
                                        </p>
                                        <h4 class="mt-1 text-lg font-bold text-gray-900">
                                            {{ $namaBarang }}
                                        </h4>
                                        <p class="mt-1 text-sm text-gray-500">
                                            {{ $kodeBarang }} • {{ $kategori }}
                                        </p>
                                    </div>

                                    <div class="text-left md:text-right">
                                        <p class="text-xs font-semibold uppercase tracking-wide text-gray-400">
                                            Status Saat Ini
                                        </p>

                                        <div class="mt-2">
                                            @if($status === 'Disetujui semua')
                                            <span class="inline-flex rounded-full bg-green-100 px-4 py-2 text-sm font-semibold text-green-700">
                                                ✅ Disetujui semua
                                            </span>
                                            @elseif($status === 'Disetujui sebagian')
                                            <span class="inline-flex rounded-full bg-yellow-100 px-4 py-2 text-sm font-semibold text-yellow-700">
                                                ⚠️ Disetujui sebagian
                                            </span>
                                            @elseif($status === 'Ditolak')
                                            <span class="inline-flex rounded-full bg-red-100 px-4 py-2 text-sm font-semibold text-red-700">
                                                ❌ Ditolak
                                            </span>
                                            @else
                                            <span class="inline-flex rounded-full bg-blue-100 px-4 py-2 text-sm font-semibold text-blue-700">
                                                ⏳ Menunggu Persetujuan
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Detail Grid --}}
                            <div class="grid gap-4 md:grid-cols-2">
                                <div class="rounded-2xl border border-gray-100 bg-white p-4 shadow-sm">
                                    <p class="text-xs text-gray-400">Nama Pengaju</p>
                                    <p class="mt-1 text-sm font-bold text-gray-800">{{ $namaPengaju }}</p>
                                </div>

                                <div class="rounded-2xl border border-gray-100 bg-white p-4 shadow-sm">
                                    <p class="text-xs text-gray-400">Divisi Pengaju</p>
                                    <p class="mt-1 text-sm font-bold text-gray-800">{{ $divisiPengaju }}</p>
                                </div>

                                <div class="rounded-2xl border border-gray-100 bg-white p-4 shadow-sm">
                                    <p class="text-xs text-gray-400">Kode Barang</p>
                                    <p class="mt-1 text-sm font-bold font-mono text-[#0B3B5F]">{{ $kodeBarang }}</p>
                                </div>

                                <div class="rounded-2xl border border-gray-100 bg-white p-4 shadow-sm">
                                    <p class="text-xs text-gray-400">Nama Barang</p>
                                    <p class="mt-1 text-sm font-bold text-gray-800">{{ $namaBarang }}</p>
                                </div>

                                <div class="rounded-2xl border border-gray-100 bg-white p-4 shadow-sm">
                                    <p class="text-xs text-gray-400">Stok Tersedia</p>
                                    <p class="mt-1 text-sm font-bold text-gray-800">
                                        {{ $stokTersedia }} {{ $satuan }}
                                    </p>
                                </div>

                                <div class="rounded-2xl border border-gray-100 bg-white p-4 shadow-sm">
                                    <p class="text-xs text-gray-400">Jumlah Diajukan</p>
                                    <p class="mt-1 text-sm font-bold text-gray-800">
                                        {{ $item->jumlah_pengajuan }} {{ $satuan }}
                                    </p>
                                </div>

                                <div class="rounded-2xl border border-gray-100 bg-white p-4 shadow-sm">
                                    <p class="text-xs text-gray-400">Prioritas</p>
                                    <p class="mt-1 text-sm font-bold text-gray-800">
                                        {{ $item->prioritas ?? '-' }}
                                    </p>
                                </div>

                                <div class="rounded-2xl border border-gray-100 bg-white p-4 shadow-sm">
                                    <p class="text-xs text-gray-400">Tanggal Pengajuan</p>
                                    <p class="mt-1 text-sm font-bold text-gray-800">
                                        {{ $item->tanggal_pengajuan ? \Carbon\Carbon::parse($item->tanggal_pengajuan)->format('d-m-Y') : '-' }}
                                    </p>
                                </div>
                            </div>

                            {{-- Keterangan --}}
                            <div class="mt-4 rounded-2xl border border-gray-100 bg-gray-50 p-4">
                                <p class="text-xs text-gray-400">Keterangan</p>
                                <p class="mt-1 text-sm text-gray-700">
                                    {{ $item->keterangan ?? '-' }}
                                </p>
                            </div>

                            {{-- Area Keputusan --}}
                            {{-- Area Keputusan --}}
                            @if(!$isProcessed)
                            <form action="{{ route('admin.pengajuan.updateStatus', $item->id) }}" method="POST"
                                class="mt-6 rounded-2xl border border-gray-200 bg-gray-50 p-5">
                                @csrf
                                @method('PATCH')

                                <h4 class="mb-4 text-base font-bold text-[#0B3B5F]">
                                    Keputusan Admin
                                </h4>

                                <div class="mb-4 grid gap-3 rounded-xl bg-white p-4 text-sm md:grid-cols-3">
                                    <div>
                                        <p class="text-xs text-gray-400">Jumlah Diajukan</p>
                                        <p class="font-bold text-gray-800">
                                            {{ $item->jumlah_pengajuan }} {{ $satuan }}
                                        </p>
                                    </div>

                                    <div>
                                        <p class="text-xs text-gray-400">Stok Tersedia</p>
                                        <p class="font-bold text-gray-800">
                                            {{ $stokTersedia }} {{ $satuan }}
                                        </p>
                                    </div>

                                    <div>
                                        <p class="text-xs text-gray-400">Maksimal Disetujui</p>
                                        <p class="font-bold text-gray-800">
                                            {{ min($item->jumlah_pengajuan, $stokTersedia) }} {{ $satuan }}
                                        </p>
                                    </div>
                                </div>

                                @if($stokTersedia < $item->jumlah_pengajuan)
                                    <div class="mb-4 rounded-xl border border-yellow-200 bg-yellow-50 p-4 text-sm text-yellow-800">
                                        Stok tidak cukup untuk menyetujui semua pengajuan. Admin hanya dapat menyetujui sebagian maksimal
                                        <strong>{{ $stokTersedia }} {{ $satuan }}</strong>.
                                    </div>
                                    @endif

                                    <div class="mb-4">
                                        <label class="mb-2 block text-sm font-semibold text-gray-700">
                                            Pilih Keputusan <span class="text-red-500">*</span>
                                        </label>

                                        <select name="aksi_persetujuan"
                                            id="aksi_persetujuan_{{ $item->id }}"
                                            onchange="togglePersetujuanForm('{{ $item->id }}')"
                                            required
                                            class="w-full rounded-xl border-2 border-gray-200 bg-white px-4 py-3 text-sm focus:border-[#D4A017] focus:outline-none focus:ring-2 focus:ring-[#D4A017]/20">

                                            <option value="">-- Pilih keputusan --</option>

                                            @if($stokTersedia >= $item->jumlah_pengajuan)
                                            <option value="approve_all">Setujui Semua</option>
                                            @else
                                            <option value="approve_all" disabled>Setujui Semua - Stok tidak cukup</option>
                                            @endif

                                            <option value="approve_partial">Setujui Sebagian</option>
                                            <option value="reject">Tolak Pengajuan</option>
                                        </select>
                                    </div>

                                    <div id="partial_box_{{ $item->id }}"
                                        class="mb-4 hidden rounded-xl border-2 border-yellow-200 bg-yellow-50 p-4">
                                        <label class="mb-2 block text-sm font-semibold text-yellow-700">
                                            Jumlah Disetujui
                                        </label>

                                        <input type="number"
                                            name="jumlah_disetujui"
                                            id="jumlah_disetujui_{{ $item->id }}"
                                            min="1"
                                            max="{{ min($item->jumlah_pengajuan, $stokTersedia) }}"
                                            placeholder="Masukkan jumlah yang disetujui"
                                            class="w-full rounded-xl border-2 border-yellow-300 px-4 py-3 text-sm focus:border-yellow-500 focus:outline-none focus:ring-2 focus:ring-yellow-200">

                                        <p class="mt-2 text-xs text-gray-500">
                                            Maksimal:
                                            <strong>{{ min($item->jumlah_pengajuan, $stokTersedia) }} {{ $satuan }}</strong>
                                        </p>
                                    </div>

                                    <div id="reject_box_{{ $item->id }}"
                                        class="mb-4 hidden rounded-xl border-2 border-red-200 bg-red-50 p-4">
                                        <label class="mb-2 block text-sm font-semibold text-red-700">
                                            Alasan Penolakan
                                        </label>

                                        <textarea name="alasan_penolakan"
                                            id="alasan_penolakan_{{ $item->id }}"
                                            rows="3"
                                            placeholder="Tuliskan alasan penolakan"
                                            class="w-full rounded-xl border-2 border-red-200 px-4 py-3 text-sm focus:border-red-500 focus:outline-none focus:ring-2 focus:ring-red-200"></textarea>
                                    </div>

                                    <div class="flex justify-end gap-3">
                                        <button type="button"
                                            onclick="closeModal('modalDetail{{ $item->id }}')"
                                            class="rounded-xl border-2 border-gray-200 px-5 py-2.5 text-sm font-semibold text-gray-700 hover:bg-gray-100">
                                            Batal
                                        </button>

                                        <button type="submit"
                                            onclick="return confirm('Yakin ingin memproses keputusan ini?')"
                                            class="rounded-xl bg-[#0B3B5F] px-5 py-2.5 text-sm font-bold text-white transition hover:bg-[#0A2E4A]">
                                            Simpan Keputusan
                                        </button>
                                    </div>
                            </form>
                            @else
                            <div class="mt-6 rounded-2xl border border-gray-200 bg-gray-50 p-5 text-sm text-gray-600">
                                Pengajuan ini sudah diproses dengan status:
                                <strong>{{ $status }}</strong>
                            </div>
                            @endif
                        </div>

                        {{-- Footer --}}
                        <div class="sticky bottom-0 flex justify-end border-t border-gray-100 bg-white px-6 py-4">
                            <button type="button"
                                onclick="closeModal('modalDetail{{ $item->id }}')"
                                class="rounded-xl border-2 border-gray-200 px-5 py-2.5 text-sm font-semibold text-gray-700 transition hover:bg-gray-100">
                                Tutup
                            </button>
                        </div>
                    </div>
                </div>

                @empty
                <tr>
                    <td colspan="10" class="px-6 py-4 text-center text-gray-500">
                        Belum ada pengajuan barang.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>




    <!-- Pagination -->
    <div class="border-t border-gray-100 px-6 py-4 bg-gray-50/30">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <p class="text-sm text-gray-500">
                Menampilkan
                <strong class="text-[#0B3B5F]">{{ $pengajuan->firstItem() ?? 0 }}</strong>
                sampai
                <strong class="text-[#0B3B5F]">{{ $pengajuan->lastItem() ?? 0 }}</strong>
                dari
                <strong class="text-[#0B3B5F]">{{ $pengajuan->total() }}</strong>
                data pengajuan
            </p>

            <div>
                {{ $pengajuan->onEachSide(1)->links() }}
            </div>
        </div>
    </div>
</div>



<!-- MODAL Tambah Pengajuan -->
<div x-show="showModal" x-cloak class="fixed inset-0 z-50 flex items-center justify-center overflow-y-auto bg-black/60 backdrop-blur-sm p-4" @click.self="showModal = false">
    <div class="premium-modal w-full max-w-lg bg-white shadow-2xl overflow-hidden">
        <div class="bg-gradient-to-r from-[#0B3B5F] to-[#0A2E4A] px-6 py-5 flex items-center justify-between">
            <div>
                <h3 class="text-xl font-bold text-white">Tambah Pengajuan Barang</h3>
                <p class="text-white/70 text-sm mt-1">Isi data pengajuan dengan lengkap</p>
            </div>
            <button @click="showModal = false" class="text-white/80 hover:text-white transition-all p-2 rounded-lg hover:bg-white/10">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <div class="p-6 space-y-5">
            <div>
                <label class="mb-1.5 block text-sm font-semibold text-gray-700">Nama Barang <span class="text-red-500">*</span></label>
                <input type="text" x-model="formNamaBarang" placeholder="Masukkan nama barang" class="premium-input w-full px-4 py-3">
            </div>
            <div>
                <label class="mb-1.5 block text-sm font-semibold text-gray-700">Kategori <span class="text-red-500">*</span></label>
                <select x-model="formKategori" class="premium-input w-full px-4 py-3 bg-white">
                    <option value="" disabled>Pilih kategori</option>
                    <option value="Footwear">Footwear</option>
                    <option value="Apparel">Apparel</option>
                    <option value="Accessories">Accessories</option>
                    <option value="Equipment">Equipment</option>
                </select>
            </div>
            <div>
                <label class="mb-1.5 block text-sm font-semibold text-gray-700">Kode Barang <span class="text-red-500">*</span></label>
                <input type="text" x-model="formKode" placeholder="Contoh: BRG-011" class="premium-input w-full px-4 py-3">
            </div>
            <div>
                <label class="mb-1.5 block text-sm font-semibold text-gray-700">Jumlah <span class="text-red-500">*</span></label>
                <input type="number" x-model="formJumlah" min="1" placeholder="Masukkan jumlah" class="premium-input w-full px-4 py-3">
            </div>
            <div>
                <label class="mb-1.5 block text-sm font-semibold text-gray-700">Unit Pengaju</label>
                <input type="text" x-model="formUnit" placeholder="Bagian / Divisi" class="premium-input w-full px-4 py-3">
            </div>
            <p class="text-xs text-gray-400">*Status awal: Menunggu Persetujuan</p>
        </div>
        <div class="flex justify-end gap-3 border-t border-gray-100 p-6 bg-gray-50/30">
            <button @click="showModal = false" class="px-5 py-2.5 rounded-xl border-2 border-gray-200 text-gray-700 font-medium hover:bg-gray-50 transition-all">Batal</button>
            <button @click="addItem" class="btn-premium px-5 py-2.5 rounded-xl text-white font-medium shadow-md">Submit Pengajuan</button>
        </div>
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

    .stat-card-premium {
        background: white;
        border-radius: 20px;
        position: relative;
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        border: 1px solid rgba(203, 213, 225, 0.3);
    }

    .stat-card-premium::after {
        content: '';
        position: absolute;
        bottom: 0;
        right: 0;
        width: 100px;
        height: 100px;
        background: radial-gradient(circle, rgba(212, 160, 23, 0.08), transparent);
        border-radius: 50%;
        pointer-events: none;
    }

    .stat-card-premium:hover {
        transform: translateY(-4px);
        box-shadow: 0 20px 40px -12px rgba(11, 59, 95, 0.15);
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
        padding: 6px 14px;
        border-radius: 50px;
        font-size: 0.75rem;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .badge-warning {
        background: linear-gradient(135deg, #F59E0B, #D97706);
        color: white;
        padding: 6px 14px;
        border-radius: 50px;
        font-size: 0.75rem;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .badge-danger {
        background: linear-gradient(135deg, #EF4444, #DC2626);
        color: white;
        padding: 6px 14px;
        border-radius: 50px;
        font-size: 0.75rem;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .badge-pending {
        background: linear-gradient(135deg, #F97316, #EA580C);
        color: white;
        padding: 6px 14px;
        border-radius: 50px;
        font-size: 0.75rem;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .premium-input {
        border: 2px solid #E5E7EB;
        border-radius: 12px;
        transition: all 0.3s ease;
        background: white;
    }

    .premium-input:focus {
        border-color: #D4A017;
        box-shadow: 0 0 0 4px rgba(212, 160, 23, 0.1);
        outline: none;
    }

    .premium-modal {
        border-radius: 24px;
        animation: modalSlideIn 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    @keyframes modalSlideIn {
        from {
            opacity: 0;
            transform: scale(0.95) translateY(-20px);
        }

        to {
            opacity: 1;
            transform: scale(1) translateY(0);
        }
    }

    [x-cloak] {
        display: none !important;
    }
</style>

<script>
        function openModal(id) {
            const modal = document.getElementById(id);

            if (modal) {
                modal.classList.remove('hidden');
                modal.classList.add('flex');
                document.body.classList.add('overflow-hidden');
            }
        }

    function closeModal(id) {
        const modal = document.getElementById(id);

        if (modal) {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.classList.remove('overflow-hidden');
        }
    }

    function togglePersetujuanForm(id) {
        const aksi = document.getElementById('aksi_persetujuan_' + id).value;

        const partialBox = document.getElementById('partial_box_' + id);
        const rejectBox = document.getElementById('reject_box_' + id);

        const jumlahDisetujui = document.getElementById('jumlah_disetujui_' + id);
        const alasanPenolakan = document.getElementById('alasan_penolakan_' + id);

        partialBox.classList.add('hidden');
        rejectBox.classList.add('hidden');

        jumlahDisetujui.removeAttribute('required');
        alasanPenolakan.removeAttribute('required');

        jumlahDisetujui.value = '';
        alasanPenolakan.value = '';

        if (aksi === 'approve_partial') {
            partialBox.classList.remove('hidden');
            jumlahDisetujui.setAttribute('required', 'required');
        }

        if (aksi === 'reject') {
            rejectBox.classList.remove('hidden');
            alasanPenolakan.setAttribute('required', 'required');
        }
    }

    const searchInput = document.getElementById('searchInput');
    const statusSelect = document.getElementById('statusSelect');
    const filterForm = document.getElementById('filterForm');

    let searchTimer = null;

    if (searchInput) {
        searchInput.addEventListener('input', function() {
            clearTimeout(searchTimer);

            searchTimer = setTimeout(function() {
                filterForm.submit();
            }, 500);
        });
    }

    if (statusSelect) {
        statusSelect.addEventListener('change', function() {
            filterForm.submit();
        });
    }
</script>
@endsection