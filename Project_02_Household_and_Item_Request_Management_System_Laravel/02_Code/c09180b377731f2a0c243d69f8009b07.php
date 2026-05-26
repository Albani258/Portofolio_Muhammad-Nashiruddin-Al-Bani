<?php $__env->startSection('content'); ?>

<div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-[#0B3B5F] to-[#0A2E4A] p-8 mb-8 shadow-xl">
    <div class="absolute top-0 right-0 w-64 h-64 bg-[#D4A017] opacity-10 rounded-full filter blur-3xl"></div>
    <div class="absolute bottom-0 left-0 w-48 h-48 bg-[#D4A017] opacity-5 rounded-full filter blur-2xl"></div>

    <div class="relative z-10 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-2xl md:text-3xl font-extrabold text-white tracking-tight mb-2">
                Manajemen Stock Barang
            </h1>
            <p class="text-white/80 text-sm max-w-xl font-medium">
                Kelola dan monitoring stock barang inventaris Kementerian Imigrasi dan Pemasyarakatan
            </p>
        </div>
    </div>
</div>

<?php if(session('success')): ?>
    <div class="mb-6 rounded-2xl border border-emerald-200 bg-emerald-50 px-5 py-4 text-sm font-semibold text-emerald-700">
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>

<div class="mb-8 premium-card overflow-hidden rounded-2xl border border-amber-200/40 bg-gradient-to-r from-[#D4A017]/5 via-transparent to-transparent shadow-sm">
    <div class="p-5">
        <div class="flex items-start gap-4">
            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-[#D4A017] to-[#B38410] flex items-center justify-center shadow-md shrink-0">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                    </path>
                </svg>
            </div>

            <div>
                <h3 class="font-bold text-[#0B3B5F] text-xs uppercase tracking-wider">
                    Petunjuk Manajemen Stock
                </h3>
                <p class="text-sm text-gray-600 mt-1 leading-relaxed">
                    Monitor dan kelola ambang batas logistik secara aktual. Sistem mengategorikan status menjadi:
                    <span class="inline-flex items-center gap-1 font-bold text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded-md text-xs border border-emerald-100">Tersedia (&gt; Minimal)</span>,
                    <span class="inline-flex items-center gap-1 font-bold text-amber-600 bg-amber-50 px-2 py-0.5 rounded-md text-xs border border-amber-100">Menipis (≤ Minimal)</span>,
                    dan
                    <span class="inline-flex items-center gap-1 font-bold text-red-600 bg-red-50 px-2 py-0.5 rounded-md text-xs border border-red-100">Habis (= 0)</span>.
                </p>
            </div>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-5 mb-8">
    <div class="stat-card-premium p-5 bg-white rounded-2xl border border-gray-100 shadow-sm">
        <p class="text-xs font-bold text-gray-400 uppercase tracking-wider">Total Jenis Barang</p>
        <p class="mt-3 text-3xl font-black text-[#0B3B5F]"><?php echo e($totalBarang); ?></p>
    </div>

    <div class="stat-card-premium p-5 bg-white rounded-2xl border border-gray-100 shadow-sm">
        <p class="text-xs font-bold text-gray-400 uppercase tracking-wider">Kuantitas Total Stok</p>
        <p class="mt-3 text-3xl font-black text-indigo-600"><?php echo e($totalStok); ?></p>
    </div>

    <div class="stat-card-premium p-5 bg-white rounded-2xl border border-gray-100 shadow-sm">
        <p class="text-xs font-bold text-gray-400 uppercase tracking-wider">Status: Tersedia</p>
        <p class="mt-3 text-3xl font-black text-emerald-600"><?php echo e($tersedia); ?></p>
    </div>

    <div class="stat-card-premium p-5 bg-white rounded-2xl border border-gray-100 shadow-sm">
        <p class="text-xs font-bold text-gray-400 uppercase tracking-wider">Status: Menipis</p>
        <p class="mt-3 text-3xl font-black text-amber-600"><?php echo e($menipis); ?></p>
    </div>

    <div class="stat-card-premium p-5 bg-white rounded-2xl border border-gray-100 shadow-sm">
        <p class="text-xs font-bold text-gray-400 uppercase tracking-wider">Status: Habis</p>
        <p class="mt-3 text-3xl font-black text-red-600"><?php echo e($habis); ?></p>
    </div>
</div>

<div class="premium-card bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
    <div class="flex flex-wrap items-center justify-between gap-4 border-b border-gray-100 px-6 py-5 bg-gradient-to-r from-white to-gray-50/50">
        <div>
            <h2 class="text-lg font-bold text-[#0B3B5F] flex items-center gap-2">
                <div class="w-1 h-6 bg-[#D4A017] rounded-full"></div>
                Daftar Stock Barang Aktual
            </h2>
            <p class="text-xs text-gray-500 mt-0.5 font-medium">
                Menampilkan data stock barang inventaris unit logistik
            </p>
        </div>

        <div class="flex flex-wrap items-center gap-3 w-full sm:w-auto">
            <a href="<?php echo e(route('admin.stock.create')); ?>"
                class="inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-[#0B3B5F] to-[#0A2E4A] px-5 py-2.5 text-xs font-bold text-white shadow-md transition hover:scale-[1.02] hover:shadow-lg">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 4v16m8-8H4"/>
                </svg>
                Tambah Barang
            </a>

            <form id="filterForm" method="GET" action="<?php echo e(route('admin.stock.index')); ?>" class="flex flex-wrap items-center gap-3">
                <div class="relative w-full sm:w-64">
                    <svg class="absolute left-4 top-1/2 transform -translate-y-1/2 w-4 h-4 text-gray-400"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>

                    <input type="text"
                        name="search"
                        id="searchInput"
                        value="<?php echo e(request('search')); ?>"
                        placeholder="Cari nama barang, kode, kategori..."
                        class="pl-10 pr-4 py-2 text-xs rounded-xl border border-gray-200 w-full focus:border-[#D4A017] focus:ring-2 focus:ring-[#D4A017]/20 transition-all font-medium outline-none">
                </div>

                <select name="status"
                    id="statusSelect"
                    class="px-4 py-2 text-xs rounded-xl border border-gray-200 bg-white focus:border-[#D4A017] focus:ring-2 focus:ring-[#D4A017]/20 transition-all font-semibold text-gray-700 outline-none w-full sm:w-auto">

                    <option value="Semua" <?php echo e(request('status', 'Semua') === 'Semua' ? 'selected' : ''); ?>>
                        Semua Status
                    </option>
                    <option value="Tersedia" <?php echo e(request('status') === 'Tersedia' ? 'selected' : ''); ?>>
                        Tersedia
                    </option>
                    <option value="Menipis" <?php echo e(request('status') === 'Menipis' ? 'selected' : ''); ?>>
                        Menipis
                    </option>
                    <option value="Habis" <?php echo e(request('status') === 'Habis' ? 'selected' : ''); ?>>
                        Habis
                    </option>
                </select>
            </form>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gradient-to-r from-[#0B3B5F] to-[#0A2E4A] text-white">
                <tr>
                    <th class="px-6 py-3.5 text-center text-xs font-semibold uppercase tracking-wider w-12">No</th>
                    <th class="px-6 py-3.5 text-left text-xs font-semibold uppercase tracking-wider">Nama Barang</th>
                    <th class="px-6 py-3.5 text-left text-xs font-semibold uppercase tracking-wider">Kode Barang</th>
                    <th class="px-6 py-3.5 text-left text-xs font-semibold uppercase tracking-wider">Kategori</th>
                    <th class="px-6 py-3.5 text-center text-xs font-semibold uppercase tracking-wider">Jumlah Stok</th>
                    <th class="px-6 py-3.5 text-center text-xs font-semibold uppercase tracking-wider">Satuan</th>
                    <th class="px-6 py-3.5 text-center text-xs font-semibold uppercase tracking-wider">Minimal Stok</th>
                    <th class="px-6 py-3.5 text-center text-xs font-semibold uppercase tracking-wider w-36">Status</th>
                    <th class="px-6 py-3.5 text-left text-xs font-semibold uppercase tracking-wider">Lokasi</th>
                    <th class="px-6 py-3.5 text-center text-xs font-semibold uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-100 font-medium text-gray-700 bg-white">
                <?php $__empty_1 = true; $__currentLoopData = $stock; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="hover:bg-[#F5E6B8]/10 transition-colors">
                        <td class="px-6 py-4 text-center font-bold text-gray-400">
                            <?php echo e($stock->firstItem() + $index); ?>

                        </td>

                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-xl bg-[#0B3B5F]/5 text-[#0B3B5F] border border-[#0B3B5F]/10 flex items-center justify-center font-bold shadow-sm text-xs shrink-0">
                                    <?php echo e(strtoupper(substr($item->nama_barang ?? 'B', 0, 2))); ?>

                                </div>

                                <span class="font-bold text-gray-900">
                                    <?php echo e($item->nama_barang ?? '-'); ?>

                                </span>
                            </div>
                        </td>

                        <td class="px-6 py-4 text-xs font-mono text-gray-500 font-semibold">
                            <?php echo e($item->kode_barang ?? '-'); ?>

                        </td>

                        <td class="px-6 py-4">
                            <span class="px-2.5 py-1 rounded-md text-xs font-bold bg-blue-50 text-blue-700 border border-blue-100">
                                <?php echo e($item->kategori ?? '-'); ?>

                            </span>
                        </td>

                        <td class="px-6 py-4 text-center font-extrabold text-base text-gray-900">
                            <?php echo e($item->jumlah_stock ?? 0); ?>

                        </td>

                        <td class="px-6 py-4 text-center">
                            <span class="px-2 py-1 bg-gray-50 border border-gray-200 text-xs text-gray-600 rounded-md font-semibold">
                                <?php echo e($item->satuan ?? '-'); ?>

                            </span>
                        </td>

                        <td class="px-6 py-4 text-center font-semibold text-gray-500">
                            <?php echo e($item->minimal_stock ?? 0); ?>

                        </td>

                        <td class="px-6 py-4 text-center">
                            <?php if($item->status === 'Habis'): ?>
                                <span class="badge-danger">✕ Habis</span>
                            <?php elseif($item->status === 'Menipis'): ?>
                                <span class="badge-warning">⚠ Menipis</span>
                            <?php else: ?>
                                <span class="badge-success">✓ Tersedia</span>
                            <?php endif; ?>
                        </td>

                        <td class="px-6 py-4 text-xs text-gray-600 font-semibold">
                            <div class="flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z">
                                    </path>
                                </svg>
                                <?php echo e($item->lokasi ?? '-'); ?>

                            </div>
                        </td>

                        <td class="px-6 py-4">
                            <div class="flex items-center justify-center gap-2">
                                <a href="<?php echo e(route('admin.stock.edit', $item->id)); ?>"
                                    class="flex h-9 w-9 items-center justify-center rounded-xl bg-amber-500 text-white shadow-sm transition hover:scale-105 hover:bg-amber-600"
                                    title="Edit">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5h2m-1-1v2m-7 9l-1 4 4-1 9-9-3-3-9 9z"/>
                                    </svg>
                                </a>

                                <form action="<?php echo e(route('admin.stock.destroy', $item->id)); ?>"
                                    method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus data stock ini?')">

                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>

                                    <button type="submit"
                                        class="flex h-9 w-9 items-center justify-center rounded-xl bg-red-500 text-white shadow-sm transition hover:scale-105 hover:bg-red-600"
                                        title="Hapus">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12"/>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="10" class="text-center py-12 text-gray-400 font-semibold bg-gray-50/30">
                            <svg class="w-10 h-10 text-gray-300 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4">
                                </path>
                            </svg>
                            Data stock barang tidak ditemukan.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <?php if($stock->total() > 0): ?>
        <div class="border-t border-gray-100 px-6 py-4 bg-gray-50/40">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <p class="text-sm text-gray-500 font-medium">
                    Menampilkan
                    <span class="font-bold text-[#0B3B5F]"><?php echo e($stock->firstItem()); ?></span>
                    sampai
                    <span class="font-bold text-[#0B3B5F]"><?php echo e($stock->lastItem()); ?></span>
                    dari
                    <span class="font-bold text-[#0B3B5F]"><?php echo e($stock->total()); ?></span>
                    data master stock
                </p>

                <?php if($stock->hasPages()): ?>
                    <div>
                        <?php echo e($stock->links()); ?>

                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
</div>

<style>
    .stat-card-premium {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .stat-card-premium:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 24px -10px rgba(11, 59, 95, 0.15);
    }

    .badge-success {
        background: #DEF7EC;
        color: #03543F;
        padding: 5px 12px;
        border-radius: 8px;
        font-size: 0.75rem;
        font-weight: 700;
        border: 1px solid #BCF0DA;
        display: inline-block;
    }

    .badge-warning {
        background: #FEF3C7;
        color: #92400E;
        padding: 5px 12px;
        border-radius: 8px;
        font-size: 0.75rem;
        font-weight: 700;
        border: 1px solid #FDE68A;
        display: inline-block;
    }

    .badge-danger {
        background: #FDE8E8;
        color: #9B1C1C;
        padding: 5px 12px;
        border-radius: 8px;
        font-size: 0.75rem;
        font-weight: 700;
        border: 1px solid #FBD5D5;
        display: inline-block;
    }
</style>

<script>
    const searchInput = document.getElementById('searchInput');
    const statusSelect = document.getElementById('statusSelect');
    const filterForm = document.getElementById('filterForm');

    let debounceTimer = null;

    if (searchInput) {
        searchInput.addEventListener('input', function () {
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(function () {
                filterForm.submit();
            }, 500);
        });
    }

    if (statusSelect) {
        statusSelect.addEventListener('change', function () {
            filterForm.submit();
        });
    }
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\RUMGABPSDMIMIPAS\RUMGABPSDMIMIPAS\resources\views/admin/stock/index.blade.php ENDPATH**/ ?>