<?php $__env->startSection('title', 'Dashboard Pengadaan Anda'); ?>

<?php $__env->startSection('content'); ?>
<div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-[#0B3B5F] to-[#0A2E4A] p-8 mb-8 shadow-xl">
    <div class="absolute top-0 right-0 w-64 h-64 bg-[#D4A017] opacity-10 rounded-full filter blur-3xl"></div>
    <div class="absolute bottom-0 left-0 w-48 h-48 bg-[#D4A017] opacity-5 rounded-full filter blur-2xl"></div>
    <div class="relative z-10">
        <h1 class="text-2xl font-bold text-white mb-2">Dashboard Pengadaan Barang Anda</h1>
        <p class="text-white/80 text-sm">Monitor status usulan, volume pengajuan, dan realisasi pemenuhan logistik Anda</p>
    </div>
</div>

<div class="space-y-6">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="stat-card-premium p-5 bg-white shadow-sm border border-gray-100 rounded-2xl flex items-center justify-between">
            <div>
                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Total Permintaan Barang Baru</p>
                <p class="text-3xl font-bold text-[#0B3B5F] mt-1"><?php echo e($total ?? 0); ?></p>
            </div>
            <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center text-[#0B3B5F]">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
            </div>
        </div>

        <div class="stat-card-premium p-5 bg-white shadow-sm border border-gray-100 rounded-2xl flex items-center justify-between">
            <div>
                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Menunggu</p>
                <p class="text-3xl font-bold text-amber-600 mt-1"><?php echo e($pending ?? 0); ?></p>
            </div>
            <div class="w-10 h-10 rounded-xl bg-amber-50 flex items-center justify-center text-amber-600">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
        </div>

        <div class="stat-card-premium p-5 bg-white shadow-sm border border-gray-100 rounded-2xl flex items-center justify-between">
            <div>
                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Disetujui</p>
                <p class="text-3xl font-bold text-emerald-600 mt-1"><?php echo e($disetujui ?? 0); ?></p>
            </div>
            <div class="w-10 h-10 rounded-xl bg-emerald-50 flex items-center justify-center text-emerald-600">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
        </div>

        <div class="stat-card-premium p-5 bg-white shadow-sm border border-gray-100 rounded-2xl flex items-center justify-between">
            <div>
                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Ditolak</p>
                <p class="text-3xl font-bold text-red-600 mt-1"><?php echo e($ditolak ?? 0); ?></p>
            </div>
            <div class="w-10 h-10 rounded-xl bg-red-50 flex items-center justify-center text-red-600">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-xl border border-gray-200 overflow-hidden">
        <div class="flex flex-wrap items-center justify-between gap-4 border-b border-gray-100 px-6 py-5 bg-gradient-to-r from-white to-gray-50/50">
            <div>
                <h2 class="text-lg font-bold text-[#0B3B5F] flex items-center gap-2">
                    <div class="w-1 h-6 bg-[#D4A017] rounded-full"></div>
                    Daftar Usulan Barang Anda
                </h2>
                <p class="text-xs text-gray-500 mt-0.5">Riwayat lengkap berkas permintaan pengadaan yang Anda ajukan.</p>
            </div>

            <form method="GET" action="<?php echo e(route('admin.permintaan_user.index')); ?>" class="flex flex-wrap items-center gap-3 w-full sm:w-auto">
                <div class="relative w-full sm:w-64">
                    <svg class="absolute left-4 top-1/2 transform -translate-y-1/2 w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    <input type="text" name="search" placeholder="Cari nama barang..." value="<?php echo e(request('search')); ?>"
                        class="pl-10 pr-4 py-2 text-xs rounded-xl border border-gray-200 w-full focus:border-[#D4A017] focus:ring-2 focus:ring-[#D4A017]/20 transition-all font-medium outline-none">
                </div>

                <select name="status" onchange="this.form.submit()"
                    class="px-4 py-2 text-xs rounded-xl border border-gray-200 bg-white focus:border-[#D4A017] focus:ring-2 focus:ring-[#D4A017]/20 transition-all font-semibold text-gray-700 outline-none w-full sm:w-auto">
                    <option value="Semua" <?php echo e(request('status','Semua')=='Semua'?'selected':''); ?>>Semua Status</option>
                    <option value="Pending" <?php echo e(request('status')=='Pending'?'selected':''); ?>>Menunggu</option>
                    <option value="Disetujui semua" <?php echo e(request('status')=='Disetujui semua'?'selected':''); ?>>Disetujui Semua</option>
                    <option value="Disetujui sebagian" <?php echo e(request('status')=='Disetujui sebagian'?'selected':''); ?>>Disetujui Sebagian</option>
                    <option value="Ditolak" <?php echo e(request('status')=='Ditolak'?'selected':''); ?>>Ditolak</option>
                </select>

                <button type="submit" class="btn-premium px-5 py-2 text-xs font-bold rounded-xl text-white shadow-sm uppercase tracking-wider w-full sm:w-auto">Filter</button>
            </form>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-gradient-to-r from-[#0B3B5F] to-[#0A2E4A] text-white">
                    <tr>
                        <th class="px-6 py-3.5 text-center text-xs font-semibold uppercase tracking-wider w-12">No</th>
                        <th class="px-6 py-3.5 text-left text-xs font-semibold uppercase tracking-wider">Nama Pengaju</th>
                        <th class="px-6 py-3.5 text-left text-xs font-semibold uppercase tracking-wider">Divisi</th>
                        <th class="px-6 py-3.5 text-left text-xs font-semibold uppercase tracking-wider">Nama Barang</th>
                        <th class="px-6 py-3.5 text-center text-xs font-semibold uppercase tracking-wider">Satuan</th>
                        <th class="px-6 py-3.5 text-center text-xs font-semibold uppercase tracking-wider">Jumlah</th>
                        <th class="px-6 py-3.5 text-center text-xs font-semibold uppercase tracking-wider">Prioritas</th>
                        <th class="px-6 py-3.5 text-center text-xs font-semibold uppercase tracking-wider">Tanggal Pengajuan</th>
                        <th class="px-6 py-3.5 text-center text-xs font-semibold uppercase tracking-wider w-44">Status Berkas</th>
                        <th class="px-6 py-3.5 text-center text-xs font-semibold uppercase tracking-wider w-44">Aksi</th>

                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 font-medium text-gray-700 bg-white">
                    <?php $__empty_1 = true; $__currentLoopData = $pengadaan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="hover:bg-[#F5E6B8]/10 transition-colors">
                        <td class="px-6 py-4 text-center font-bold text-gray-400">
                            <?php echo e($loop->iteration); ?>

                        </td>
                        <td class="px-6 py-4 font-semibold text-gray-900">
                            <?php echo e($item->user->name ?? 'N/A'); ?>

                        </td>
                        <td class="px-6 py-4 text-gray-600 text-xs">
                            <?php echo e($item->user->divisi ?? 'N/A'); ?>

                        </td>
                        <td class="px-6 py-4 font-bold text-[#0B3B5F]">
                            <?php echo e($item->nama_barang); ?>

                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="px-2 py-1 bg-gray-50 border border-gray-200 text-xs text-gray-600 rounded-md"><?php echo e($item->satuan); ?></span>
                        </td>
                        <td class="px-6 py-4 text-center font-extrabold text-base text-gray-900">
                            <?php echo e($item->jumlah_pengajuan); ?>

                        </td>
                        <td class="px-6 py-4 text-center">
                            <?php if(($item->prioritas ?? '-') == 'Critical'): ?>
                            <span class="px-2.5 py-1 bg-red-100 text-red-700 text-xs font-bold rounded-md border border-red-200">Critical</span>
                            <?php elseif(($item->prioritas ?? '-') == 'Urgent'): ?>
                            <span class="px-2.5 py-1 bg-amber-100 text-amber-700 text-xs font-bold rounded-md border border-amber-200">Urgent</span>
                            <?php else: ?>
                            <span class="px-2.5 py-1 bg-blue-100 text-blue-700 text-xs font-bold rounded-md border border-blue-200">Normal</span>
                            <?php endif; ?>
                        </td>
                        <td class="px-6 py-4 text-center text-xs text-gray-500 font-semibold">
                            <?php echo e(\Carbon\Carbon::parse($item->tanggal_pengajuan)->translatedFormat('d M Y')); ?>

                        </td>
                        <td class="px-6 py-4 text-center">
                            <?php if($item->status_pengajuan == 'Pending' || empty($item->status_pengajuan)): ?>
                            <span class="badge-pending">⏳ Menunggu</span>
                            <?php elseif($item->status_pengajuan == 'Disetujui semua'): ?>
                            <span class="badge-success">✓ Disetujui Semua</span>
                            <?php elseif($item->status_pengajuan == 'Disetujui sebagian'): ?>
                            <span class="badge-warning">⚠ Sebagian (<?php echo e($item->jumlah_disetujui); ?>)</span>
                            <?php else: ?>
                            <span class="badge-danger">✕ Ditolak</span>
                            <?php endif; ?>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <?php if($item->status_pengajuan === 'Pending' || empty($item->status_pengajuan)): ?>
                            <div class="flex items-center justify-center gap-2">
                                <form action="<?php echo e(route('admin.permintaan_user.updateStatus', $item->id)); ?>" method="POST" onsubmit="return confirm('Setujui semua jumlah pengajuan ini?')">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PATCH'); ?>
                                    <input type="hidden" name="aksi_persetujuan" value="approve_all">
                                    <button type="submit" class="px-2.5 py-1.5 rounded-lg bg-emerald-600 text-white text-xs font-bold hover:bg-emerald-700 shadow-sm transition-all whitespace-nowrap">
                                        ✓ Semua
                                    </button>
                                </form>

                                <form id="form-partial-<?php echo e($item->id); ?>" action="<?php echo e(route('admin.permintaan_user.updateStatus', $item->id)); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PATCH'); ?>
                                    <input type="hidden" name="aksi_persetujuan" value="approve_partial">
                                    <input type="hidden" name="jumlah_disetujui" id="partial-qty-<?php echo e($item->id); ?>">
                                    <button type="button" onclick="approvePartial(<?php echo e($item->id); ?>, <?php echo e($item->jumlah_pengajuan); ?>)" class="px-2.5 py-1.5 rounded-lg bg-amber-500 text-white text-xs font-bold hover:bg-amber-600 shadow-sm transition-all whitespace-nowrap">
                                        ⚠ Sebagian
                                    </button>
                                </form>

                                <form id="form-reject-<?php echo e($item->id); ?>" action="<?php echo e(route('admin.permintaan_user.updateStatus', $item->id)); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PATCH'); ?>
                                    <input type="hidden" name="aksi_persetujuan" value="reject">
                                    <input type="hidden" name="alasan_penolakan" id="reject-reason-<?php echo e($item->id); ?>">
                                    <button type="button" onclick="rejectPengajuan(<?php echo e($item->id); ?>)" class="px-2.5 py-1.5 rounded-lg bg-red-600 text-white text-xs font-bold hover:bg-red-700 shadow-sm transition-all whitespace-nowrap">
                                        ✕ Tolak
                                    </button>
                                </form>
                            </div>
                            <?php else: ?>
                            <span class="text-gray-400 text-xs font-semibold bg-gray-100 px-2 py-1 rounded">Selesai diproses</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="10" class="text-center py-12 text-gray-400 font-semibold bg-gray-50/30">
                            <svg class="w-10 h-10 text-gray-300 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                            Belum ada riwayat pengadaan barang dari akun Anda.
                        </td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <?php if(method_exists($pengadaan, 'links')): ?>
        <div class="border-t border-gray-100 px-6 py-4 bg-gray-50/40">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <p class="text-sm text-gray-500 font-medium">
                    Menampilkan data berkas usulan aktif milik Anda.
                </p>
                <div class="pagination-premium-wrapper">
                    <?php echo e($pengadaan->appends(request()->query())->links()); ?>

                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>

<style>
    .stat-card-premium {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border: 1px solid rgba(229, 231, 235, 1);
    }

    .stat-card-premium:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px -8px rgba(11, 59, 95, 0.12);
    }

    .btn-premium {
        background: linear-gradient(135deg, #0B3B5F, #0A2E4A);
        transition: all 0.2s ease;
    }

    .btn-premium:hover {
        opacity: 0.95;
        box-shadow: 0 4px 12px rgba(11, 59, 95, 0.2);
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

    .badge-pending {
        background: #FFEDD5;
        color: #EA580C;
        padding: 5px 12px;
        border-radius: 8px;
        font-size: 0.75rem;
        font-weight: 700;
        border: 1px solid #FED7AA;
        display: inline-block;
    }
</style>
<script>
    function approvePartial(id, maxQty) {
        let qty = prompt("Masukkan jumlah barang yang disetujui (Maksimal " + maxQty + "):");
        
        if (qty === null) return; // Batal klik
        
        qty = parseInt(qty);
        if (isNaN(qty) || qty <= 0 || qty > maxQty) {
            alert("Jumlah tidak valid! Harus berupa angka di antara 1 sampai " + maxQty);
            return;
        }
        
        document.getElementById('partial-qty-' + id).value = qty;
        document.getElementById('form-partial-' + id).submit();
    }

    function rejectPengajuan(id) {
        let reason = prompt("Masukkan alasan penolakan pengajuan:");
        
        if (reason === null) return; // Batal klik
        
        if (reason.trim() === "") {
            alert("Alasan penolakan tidak boleh kosong!");
            return;
        }
        
        document.getElementById('reject-reason-' + id).value = reason;
        document.getElementById('form-reject-' + id).submit();
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\RUMGABPSDMIMIPAS\RUMGABPSDMIMIPAS\resources\views/admin/permintaan_user/index.blade.php ENDPATH**/ ?>