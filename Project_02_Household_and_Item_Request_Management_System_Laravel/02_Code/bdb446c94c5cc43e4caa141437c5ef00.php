<?php $__env->startSection('content'); ?>

<!-- Welcome Banner -->
<div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-[#0B3B5F] to-[#0A2E4A] p-8 mb-8 shadow-xl">
    <div class="absolute top-0 right-0 w-64 h-64 bg-[#D4A017] opacity-10 rounded-full filter blur-3xl"></div>
    <div class="absolute bottom-0 left-0 w-48 h-48 bg-[#D4A017] opacity-5 rounded-full filter blur-2xl"></div>
    <div class="relative z-10">
        <h1 class="text-2xl font-bold text-white mb-2">Manajemen Pengajuan Barang</h1>
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
<!-- Statistik -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    
    <div class="stat-card-premium p-5">
        <div class="flex items-center justify-between mb-3">
            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-[#0B3B5F] to-[#0A2E4A] flex items-center justify-center shadow-md">
                <span class="text-white text-xl">📄</span>
            </div>

            <span class="text-3xl font-bold text-[#0B3B5F]">
                <?php echo e($totalPengajuan ?? 0); ?>

            </span>
        </div>

        <p class="text-xs font-medium text-gray-500 uppercase tracking-wide">
            Total Pengajuan
        </p>
    </div>

    
    <div class="stat-card-premium p-5">
        <div class="flex items-center justify-between mb-3">
            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-orange-500 to-amber-600 flex items-center justify-center shadow-md">
                <span class="text-white text-xl">⏳</span>
            </div>

            <span class="text-3xl font-bold text-amber-700">
                <?php echo e($pending ?? 0); ?>

            </span>
        </div>

        <p class="text-xs font-medium text-gray-500 uppercase tracking-wide">
            Menunggu
        </p>
    </div>

    
    <div class="stat-card-premium p-5">
        <div class="flex items-center justify-between mb-3">
            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-emerald-500 to-green-600 flex items-center justify-center shadow-md">
                <span class="text-white text-xl">✅</span>
            </div>

            <span class="text-3xl font-bold text-emerald-700">
                <?php echo e($disetujui ?? 0); ?>

            </span>
        </div>

        <p class="text-xs font-medium text-gray-500 uppercase tracking-wide">
            Disetujui
        </p>
    </div>

    
    <div class="stat-card-premium p-5">
        <div class="flex items-center justify-between mb-3">
            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-red-500 to-red-600 flex items-center justify-center shadow-md">
                <span class="text-white text-xl">❌</span>
            </div>

            <span class="text-3xl font-bold text-red-700">
                <?php echo e($ditolak ?? 0); ?>

            </span>
        </div>

        <p class="text-xs font-medium text-gray-500 uppercase tracking-wide">
            Ditolak
        </p>
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
        <div class="flex flex-col sm:flex-row gap-3">
            <!-- Search Input -->
            <form id="filterForm" method="GET" action="<?php echo e(url()->current()); ?>" class="flex flex-col sm:flex-row gap-3">
                <div class="relative">
                    <svg class="absolute left-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>

                    <input type="text"
                        name="search"
                        id="searchInput"
                        value="<?php echo e(request('search')); ?>"
                        placeholder="Cari nama barang, kode, kategori..."
                        class="pl-11 pr-4 py-2.5 rounded-xl border border-gray-200 w-full sm:w-72 focus:border-[#D4A017] focus:ring-2 focus:ring-[#D4A017]/20 transition-all">
                </div>
                <select name="status"
                    id="statusSelect"
                    class="px-4 py-2.5 rounded-xl border border-gray-200 bg-white focus:border-[#D4A017] focus:ring-2 focus:ring-[#D4A017]/20 transition-all">

                    <option value="Semua" <?php echo e(request('status', 'Semua') == 'Semua' ? 'selected' : ''); ?>>
                        Semua Status
                    </option>

                    <option value="Pending" <?php echo e(request('status') == 'Pending' ? 'selected' : ''); ?>>
                        Menunggu Persetujuan
                    </option>

                    <option value="Disetujui semua" <?php echo e(request('status') == 'Disetujui semua' ? 'selected' : ''); ?>>
                        Disetujui Semua
                    </option>

                    <option value="Disetujui sebagian" <?php echo e(request('status') == 'Disetujui sebagian' ? 'selected' : ''); ?>>
                        Disetujui Sebagian
                    </option>

                    <option value="Ditolak" <?php echo e(request('status') == 'Ditolak' ? 'selected' : ''); ?>>
                        Ditolak
                    </option>
                </select>
            </form>

            <!-- Tombol Tambah Pengajuan -->
            <!-- <a href="<?php echo e(url('user/pengajuan/create')); ?>" class="btn-premium px-5 py-2.5 rounded-xl text-white font-semibold flex items-center gap-2 shadow-md">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Tambah Pengajuan
            </a> -->
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gradient-to-r from-[#0B3B5F] to-[#0A2E4A]">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">No</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Kode Barang</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Nama Barang</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Kategori</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Jumlah Diajukan</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Prioritas</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Tgl Pengajuan</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Status</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-100">
                <?php $__empty_1 = true; $__currentLoopData = $pengajuan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <?php
                $status = $item->status_pengajuan ?? 'Pending';

                $namaBarang = $item->stock->nama_barang ?? '-';
                $kodeBarang = $item->stock->kode_barang ?? '-';
                $kategori = $item->stock->kategori ?? '-';
                $satuan = $item->satuan ?? $item->stock->satuan ?? '';

                $jumlahPengajuan = (int) ($item->jumlah_pengajuan ?? 0);
                $jumlahDisetujui = (int) ($item->jumlah_disetujui ?? 0);

                $labelStatus = $status;
                if ($status === 'Disetujui') {
                if ($jumlahDisetujui >= $jumlahPengajuan) {
                $labelStatus = 'Disetujui semua';
                } elseif ($jumlahDisetujui > 0 && $jumlahDisetujui < $jumlahPengajuan) {
                    $labelStatus='Disetujui sebagian' ;
                    }
                    }
                    ?>

                    <tr class="hover:bg-[#F5E6B8]/20 transition-all duration-200">
                    <td class="px-6 py-4 text-sm text-gray-500">
                        <?php echo e(method_exists($pengajuan, 'firstItem') ? $pengajuan->firstItem() + $key : $key + 1); ?>

                    </td>

                    <td class="px-6 py-4 text-sm font-mono font-semibold text-[#0B3B5F]">
                        <?php echo e($kodeBarang); ?>

                    </td>

                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-[#0B3B5F] to-[#0A2E4A] flex items-center justify-center text-white font-bold shadow-md text-xs">
                                <?php echo e(strtoupper(substr($namaBarang, 0, 2))); ?>

                            </div>

                            <span class="font-semibold text-gray-800">
                                <?php echo e($namaBarang); ?>

                            </span>
                        </div>
                    </td>

                    <td class="px-6 py-4 text-sm text-gray-600">
                        <span class="px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-700">
                            <?php echo e($kategori); ?>

                        </span>
                    </td>

                    <td class="px-6 py-4 text-sm font-semibold text-gray-700">
                        <?php echo e($jumlahPengajuan); ?> <?php echo e($satuan); ?>

                    </td>

                    <td class="px-6 py-4 text-sm text-gray-600">
                        <?php echo e($item->prioritas ?? '-'); ?>

                    </td>

                    <td class="px-6 py-4 text-sm text-gray-600">
                        <?php echo e($item->tanggal_pengajuan ? \Carbon\Carbon::parse($item->tanggal_pengajuan)->format('d-m-Y') : '-'); ?>

                    </td>

                    <td class="px-6 py-4">
                        <button type="button"
                            onclick="openModal('modalStatus<?php echo e($item->id); ?>')"
                            class="inline-flex items-center gap-1">
                            <?php if($labelStatus === 'Disetujui semua'): ?>
                            <span class="badge-success cursor-pointer">✅ Disetujui semua</span>
                            <?php elseif($labelStatus === 'Disetujui sebagian'): ?>
                            <span class="badge-warning cursor-pointer">
                                ⚠️ Disetujui sebagian
                                <span class="text-xs">(<?php echo e($jumlahDisetujui); ?>/<?php echo e($jumlahPengajuan); ?>)</span>
                            </span>
                            <?php elseif($labelStatus === 'Ditolak'): ?>
                            <span class="badge-danger cursor-pointer">❌ Ditolak</span>
                            <?php else: ?>
                            <span class="badge-pending cursor-pointer">⏳ Menunggu Persetujuan</span>
                            <?php endif; ?>
                        </button>
                    </td>
                    </tr>

                    <!-- Popup Detail Status -->
                    <div id="modalStatus<?php echo e($item->id); ?>"
                        class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 backdrop-blur-sm px-4 py-6">
                        <div class="w-full max-w-lg rounded-3xl bg-white shadow-2xl overflow-hidden">
                            <div class="bg-gradient-to-r from-[#0B3B5F] to-[#0A2E4A] px-6 py-5 flex items-center justify-between">
                                <div>
                                    <h3 class="text-xl font-bold text-white">Detail Status Pengajuan</h3>
                                    <p class="text-sm text-white/70 mt-1">Informasi keputusan atas pengajuan barang.</p>
                                </div>

                                <button type="button"
                                    onclick="closeModal('modalStatus<?php echo e($item->id); ?>')"
                                    class="text-white/80 hover:text-white p-2 rounded-lg hover:bg-white/10">
                                    ✕
                                </button>
                            </div>

                            <div class="p-6 space-y-4">
                                <div class="rounded-2xl border border-gray-100 bg-gray-50 p-4">
                                    <p class="text-xs text-gray-400">Barang</p>
                                    <p class="text-sm font-bold text-gray-800 mt-1">
                                        <?php echo e($kodeBarang); ?> - <?php echo e($namaBarang); ?>

                                    </p>
                                </div>

                                <div class="grid grid-cols-2 gap-4">
                                    <div class="rounded-2xl border border-gray-100 bg-gray-50 p-4">
                                        <p class="text-xs text-gray-400">Jumlah Diajukan</p>
                                        <p class="text-sm font-bold text-gray-800 mt-1">
                                            <?php echo e($jumlahPengajuan); ?> <?php echo e($satuan); ?>

                                        </p>
                                    </div>

                                    <div class="rounded-2xl border border-gray-100 bg-gray-50 p-4">
                                        <p class="text-xs text-gray-400">Jumlah Disetujui</p>
                                        <p class="text-sm font-bold text-gray-800 mt-1">
                                            <?php if(in_array($labelStatus, ['Disetujui semua', 'Disetujui sebagian'])): ?>
                                            <?php echo e($jumlahDisetujui); ?> <?php echo e($satuan); ?>

                                            <?php else: ?>
                                            -
                                            <?php endif; ?>
                                        </p>
                                    </div>
                                </div>

                                <?php if($labelStatus === 'Disetujui semua'): ?>
                                <div class="rounded-2xl border border-green-200 bg-green-50 p-5">
                                    <p class="font-bold text-green-700">✅ Pengajuan Disetujui Semua</p>
                                    <p class="text-sm text-green-700 mt-1">
                                        Seluruh jumlah pengajuan sebanyak
                                        <strong><?php echo e($jumlahPengajuan); ?> <?php echo e($satuan); ?></strong>
                                        telah disetujui.
                                    </p>
                                </div>
                                <?php elseif($labelStatus === 'Disetujui sebagian'): ?>
                                <div class="rounded-2xl border border-yellow-200 bg-yellow-50 p-5">
                                    <p class="font-bold text-yellow-700">⚠️ Pengajuan Disetujui Sebagian</p>
                                    <p class="text-sm text-yellow-700 mt-1">
                                        Dari total pengajuan
                                        <strong><?php echo e($jumlahPengajuan); ?> <?php echo e($satuan); ?></strong>,
                                        admin menyetujui
                                        <strong><?php echo e($jumlahDisetujui); ?> <?php echo e($satuan); ?></strong>.
                                    </p>
                                </div>
                                <?php elseif($labelStatus === 'Ditolak'): ?>
                                <div class="rounded-2xl border border-red-200 bg-red-50 p-5">
                                    <p class="font-bold text-red-700">❌ Pengajuan Ditolak</p>
                                    <p class="text-sm text-red-700 mt-1">
                                        Pengajuan ini ditolak oleh admin.
                                    </p>

                                    <div class="mt-4 rounded-xl bg-white border border-red-100 p-4">
                                        <p class="text-xs text-gray-400 mb-1">Keterangan / Alasan</p>
                                        <p class="text-sm text-gray-700 whitespace-pre-line">
                                            <?php echo e($item->keterangan ?? 'Tidak ada keterangan penolakan.'); ?>

                                        </p>
                                    </div>
                                </div>
                                <?php else: ?>
                                <div class="rounded-2xl border border-blue-200 bg-blue-50 p-5">
                                    <p class="font-bold text-blue-700">⏳ Menunggu Persetujuan</p>
                                    <p class="text-sm text-blue-700 mt-1">
                                        Pengajuan masih menunggu proses persetujuan dari admin.
                                    </p>
                                </div>
                                <?php endif; ?>
                            </div>

                            <div class="flex justify-end border-t border-gray-100 bg-gray-50 px-6 py-4">
                                <button type="button"
                                    onclick="closeModal('modalStatus<?php echo e($item->id); ?>')"
                                    class="rounded-xl border-2 border-gray-200 px-5 py-2.5 text-sm font-semibold text-gray-700 hover:bg-gray-100">
                                    Tutup
                                </button>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="8" class="px-6 py-4 text-center text-gray-500">
                            Belum ada pengajuan barang.
                        </td>
                    </tr>
                    <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="border-t border-gray-100 px-6 py-4 bg-gray-50/30">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <p class="text-sm text-gray-500">
                Menampilkan
                <strong class="text-[#0B3B5F]"><?php echo e($pengajuan->firstItem() ?? 0); ?></strong>
                sampai
                <strong class="text-[#0B3B5F]"><?php echo e($pengajuan->lastItem() ?? 0); ?></strong>
                dari
                <strong class="text-[#0B3B5F]"><?php echo e($pengajuan->total()); ?></strong>
                data pengajuan
            </p>

            <div>
                <?php echo e($pengajuan->onEachSide(1)->links()); ?>

            </div>
        </div>
    </div>

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
    </script>



    <!-- Pagination -->

</div>

<!-- MODAL Ubah Status Premium dengan Pilihan Disetujui semua, Disetujui sebagian (isi angka), Ditolak -->
<div x-show="statusModal.open" x-cloak class="fixed inset-0 z-50 flex items-center justify-center overflow-y-auto bg-black/60 backdrop-blur-sm p-4" @click.self="statusModal.open = false">
    <div class="premium-modal w-full max-w-md bg-white shadow-2xl overflow-hidden">
        <div class="bg-gradient-to-r from-[#0B3B5F] to-[#0A2E4A] px-6 py-5 flex items-center justify-between">
            <div>
                <h3 class="text-xl font-bold text-white">Ubah Status Persetujuan</h3>
                <p class="text-white/70 text-sm mt-1">Pilih status untuk pengajuan barang</p>
            </div>
            <button @click="statusModal.open = false" class="text-white/80 hover:text-white transition-all p-2 rounded-lg hover:bg-white/10">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <div class="p-6 space-y-4">
            <p class="text-sm text-gray-600 mb-2">
                <span class="font-bold text-[#0B3B5F]" x-text="statusModal.item?.namaBarang"></span>
                <span class="text-xs text-gray-400 ml-2" x-text="`(Jumlah: ${statusModal.item?.jumlah})`"></span>
            </p>

            <!-- Disetujui semua (Hijau) -->
            <button @click="updateStatus('Disetujui semua')" class="w-full text-left px-4 py-3 rounded-xl transition-all flex items-center gap-3 bg-gradient-to-r from-green-50 to-transparent border-2 border-green-300 hover:bg-green-100 hover:border-green-400">
                <span class="text-2xl">✅</span>
                <div>
                    <p class="font-semibold text-green-700">Disetujui semua</p>
                    <p class="text-xs text-gray-500">Menyetujui seluruh jumlah barang (<span x-text="statusModal.item?.jumlah"></span> item)</p>
                </div>
            </button>

            <!-- Disetujui sebagian (Kuning) dengan input angka -->
            <div class="rounded-xl p-4 bg-gradient-to-r from-amber-50 to-transparent border-2 border-amber-300 hover:border-amber-400 transition-all">
                <div class="flex items-center gap-3 mb-3">
                    <span class="text-2xl">⚠️</span>
                    <div>
                        <p class="font-semibold text-amber-700">Disetujui sebagian</p>
                        <p class="text-xs text-gray-500">Menyetujui sejumlah tertentu dari total pengajuan</p>
                    </div>
                </div>
                <div class="flex items-center gap-3 pl-10">
                    <label class="text-sm text-gray-600 font-medium">Jumlah disetujui:</label>
                    <input type="number" x-model="statusModal.partialAmount" :placeholder="`Maks: ${statusModal.item?.jumlah}`"
                        :max="statusModal.item?.jumlah" min="1"
                        class="w-36 rounded-xl border-2 border-amber-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-amber-400">
                    <button @click="updateStatusWithPartial()"
                        :disabled="!statusModal.partialAmount || statusModal.partialAmount <= 0 || statusModal.partialAmount > statusModal.item?.jumlah"
                        class="px-4 py-2 bg-gradient-to-r from-amber-500 to-yellow-600 text-white rounded-xl text-sm font-medium hover:shadow-md disabled:opacity-50 disabled:cursor-not-allowed transition-all">
                        Terapkan
                    </button>
                </div>
                <p class="text-xs text-gray-400 mt-2 ml-10" x-show="statusModal.partialAmount > statusModal.item?.jumlah">
                    *Jumlah melebihi stok yang tersedia
                </p>
            </div>

            <!-- Ditolak (Merah) -->
            <button @click="updateStatus('Ditolak')" class="w-full text-left px-4 py-3 rounded-xl transition-all flex items-center gap-3 bg-gradient-to-r from-red-50 to-transparent border-2 border-red-300 hover:bg-red-100 hover:border-red-400">
                <span class="text-2xl">❌</span>
                <div>
                    <p class="font-semibold text-red-700">Ditolak</p>
                    <p class="text-xs text-gray-500">Menolak seluruh pengajuan barang ini</p>
                </div>
            </button>
        </div>
        <div class="flex justify-end border-t border-gray-100 p-5 bg-gray-50/30">
            <button @click="statusModal.open = false" class="px-5 py-2.5 rounded-xl border-2 border-gray-200 text-gray-700 font-medium hover:bg-gray-50 transition-all">Batal</button>
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

    function openModal(id) {
        const modal = document.getElementById(id);
        if (modal) {
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }
    }

    function closeModal(id) {
        const modal = document.getElementById(id);
        if (modal) {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }
    }
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\RUMGABPSDMIMIPAS\RUMGABPSDMIMIPAS\resources\views/user/pengajuan/index.blade.php ENDPATH**/ ?>