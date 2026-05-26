<?php $__env->startSection('content'); ?>

<!-- Welcome Banner -->
<div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-[#0B3B5F] to-[#0A2E4A] p-8 mb-8 shadow-xl">
    <div class="absolute top-0 right-0 w-64 h-64 bg-[#D4A017] opacity-10 rounded-full filter blur-3xl"></div>
    <div class="absolute bottom-0 left-0 w-48 h-48 bg-[#D4A017] opacity-5 rounded-full filter blur-2xl"></div>
    <div class="relative z-10">
        <h1 class="text-2xl font-bold text-white mb-2">Manajemen Pengadaan Barang</h1>
        <p class="text-white/80 text-sm">Kelola dan monitoring pengadaan barang inventaris Kementerian Imigrasi dan Pemasyarakatan</p>
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
                <h3 class="font-bold text-[#0B3B5F] text-sm uppercase tracking-wide">Petunjuk Admin Pengadaan</h3>
                <p class="text-sm text-gray-600 mt-1">Klik <strong class="text-blue-600">"Tambah Pengadaan"</strong>, untuk menambah barang baru maupun stock baru</p>
            </div>
        </div>
    </div>
</div>


<!-- TABEL DAFTAR PENGAJUAN PREMIUM -->
<div class="premium-card shadow-xl">
    <div class="flex flex-wrap items-center justify-between gap-4 border-b border-gray-100 px-6 py-5 bg-gradient-to-r from-white to-gray-50">
        <div>
            <h2 class="text-lg font-bold text-[#0B3B5F] flex items-center gap-2">
                <div class="w-1 h-6 bg-[#D4A017] rounded-full"></div>
                Daftar Pengadaan Barang
            </h2>
            <p class="text-xs text-gray-500 mt-1">Klik pada badge status untuk mengubah persetujuan</p>
        </div>
        <div class="mb-5 flex justify-end">
            <a href="<?php echo e(route('admin.pengadaan.create')); ?>"
                class="px-5 py-3 rounded-xl bg-[#0B3B5F] text-white font-semibold hover:bg-[#0A2E4A] transition">
                + Tambah Pengadaan
            </a>
        </div>
    </div>

    <div class="overflow-x-auto">
        <?php if(session('success')): ?>
        <div class="mb-4 px-5 py-3 rounded-xl bg-green-100 text-green-700 font-semibold">
            <?php echo e(session('success')); ?>

        </div>
        <?php endif; ?>



        <table class="w-full">
            <thead class="bg-gradient-to-r from-[#0B3B5F] to-[#0A2E4A]">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">No</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Nama Barang</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Kode Barang</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Kategori</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Jumlah Pengadaan</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Satuan</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Lokasi</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Tanggal Pengadaan</th>
                    <!-- <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Status</th> -->
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-100">
                <?php $__empty_1 = true; $__currentLoopData = $pengadaans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr class="hover:bg-[#F5E6B8]/20 transition-all duration-200">
                    <td class="px-6 py-4 text-sm text-gray-500">
                        <?php echo e($key + 1); ?>

                    </td>

                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-[#0B3B5F] to-[#0A2E4A] flex items-center justify-center text-white font-bold shadow-md text-xs">
                                <?php echo e(strtoupper(substr($item->nama_barang ?? 'B', 0, 2))); ?>

                            </div>

                            <span class="font-semibold text-gray-800">
                                <?php echo e($item->nama_barang ?? '-'); ?>

                            </span>
                        </div>
                    </td>

                    <td class="px-6 py-4 text-sm font-mono text-gray-600">
                        <?php echo e($item->kode_barang ?? '-'); ?>

                    </td>

                    <td class="px-6 py-4">
                        <span class="px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-700">
                            <?php echo e($item->kategori ?? '-'); ?>

                        </span>
                    </td>

                    <td class="px-6 py-4 text-sm font-semibold text-gray-700">
                        <?php echo e($item->jumlah_pengadaan ?? 0); ?>

                    </td>

                    <td class="px-6 py-4 text-sm text-gray-600">
                        <?php echo e($item->satuan ?? '-'); ?>

                    </td>

                    <td class="px-6 py-4 text-sm text-gray-600">
                        <?php echo e($item->lokasi ?? '-'); ?>

                    </td>

                    <td class="px-6 py-4 text-sm text-gray-600">
                        <?php echo e($item->tanggal_pengadaan ? \Carbon\Carbon::parse($item->tanggal_pengadaan)->format('d-m-Y') : '-'); ?>

                    </td>

                    <!-- <td class="px-6 py-4">
                        <?php if($item->status === 'Selesai'): ?>
                        <span class="badge-success cursor-pointer">
                            ✅ Selesai
                        </span>
                        <?php elseif($item->status === 'Ditolak'): ?>
                        <span class="badge-danger cursor-pointer">
                            ❌ Ditolak
                        </span>
                        <?php elseif($item->status === 'Menunggu Persetujuan'): ?>
                        <span class="badge-pending cursor-pointer">
                            ⏳ Menunggu Persetujuan
                        </span>
                        <?php else: ?>
                        <span class="badge-warning cursor-pointer">
                            ⚠️ <?php echo e($item->status ?? 'Diproses'); ?>

                        </span>
                        <?php endif; ?>
                    </td> -->
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="9" class="px-6 py-6 text-center text-gray-500">
                        Belum ada data pengadaan barang.
                    </td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="border-t border-gray-100 px-6 py-4 bg-gray-50/30 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <p class="text-sm text-gray-500">Menampilkan <strong class="text-[#0B3B5F]" x-text="items.length"></strong> data pengadaan</p>
        <div class="flex items-center gap-2">
            <button class="px-3 py-2 rounded-lg border border-gray-200 text-gray-600 hover:bg-white hover:border-[#D4A017] transition-all opacity-50 cursor-not-allowed">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
            <button class="w-10 h-10 rounded-lg bg-gradient-to-r from-[#0B3B5F] to-[#0A2E4A] text-white font-semibold shadow-md">1</button>
            <button class="px-3 py-2 rounded-lg border border-gray-200 text-gray-600 hover:bg-white hover:border-[#D4A017] transition-all">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>
    </div>
</div>

<!-- MODAL Tambah Pengadaan Premium -->
<div x-show="showModal" x-cloak class="fixed inset-0 z-50 flex items-center justify-center overflow-y-auto bg-black/60 backdrop-blur-sm p-4" @click.self="showModal = false">
    <div class="premium-modal w-full max-w-lg bg-white shadow-2xl overflow-hidden">
        <div class="bg-gradient-to-r from-[#0B3B5F] to-[#0A2E4A] px-6 py-5 flex items-center justify-between">
            <div>
                <h3 class="text-xl font-bold text-white">Tambah Pengadaan Barang</h3>
                <p class="text-white/70 text-sm mt-1">Isi data barang dengan lengkap</p>
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
                <input type="text" x-model="formKode" placeholder="Contoh: MAP-011" class="premium-input w-full px-4 py-3">
            </div>
            <div>
                <label class="mb-1.5 block text-sm font-semibold text-gray-700">Jumlah Stok <span class="text-red-500">*</span></label>
                <input type="number" x-model="formJumlahStock" min="0" placeholder="Masukkan jumlah stok" class="premium-input w-full px-4 py-3">
            </div>
            <p class="text-xs text-gray-400">*Status awal: Menunggu Persetujuan</p>
        </div>
        <div class="flex justify-end gap-3 border-t border-gray-100 p-6 bg-gray-50/30">
            <button @click="showModal = false" class="px-5 py-2.5 rounded-xl border-2 border-gray-200 text-gray-700 font-medium hover:bg-gray-50 transition-all">Batal</button>
            <button @click="addItem" class="btn-premium px-5 py-2.5 rounded-xl text-white font-medium shadow-md">Submit Pengadaan</button>
        </div>
    </div>
</div>

<!-- MODAL Ubah Status Premium dengan Pilihan Disetujui semua, Disetujui sebagian (isi angka), Ditolak -->
<div x-show="statusModal.open" x-cloak class="fixed inset-0 z-50 flex items-center justify-center overflow-y-auto bg-black/60 backdrop-blur-sm p-4" @click.self="statusModal.open = false">
    <div class="premium-modal w-full max-w-md bg-white shadow-2xl overflow-hidden">
        <div class="bg-gradient-to-r from-[#0B3B5F] to-[#0A2E4A] px-6 py-5 flex items-center justify-between">
            <div>
                <h3 class="text-xl font-bold text-white">Ubah Status Persetujuan</h3>
                <p class="text-white/70 text-sm mt-1">Pilih status untuk pengadaan barang</p>
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
                <span class="text-xs text-gray-400 ml-2" x-text="`(Stok: ${statusModal.item?.jumlahStock})`"></span>
            </p>

            <!-- Disetujui semua (Hijau) -->
            <button @click="updateStatus('Disetujui semua')" class="w-full text-left px-4 py-3 rounded-xl transition-all flex items-center gap-3 bg-gradient-to-r from-green-50 to-transparent border-2 border-green-300 hover:bg-green-100 hover:border-green-400">
                <span class="text-2xl">✅</span>
                <div>
                    <p class="font-semibold text-green-700">Disetujui semua</p>
                    <p class="text-xs text-gray-500">Menyetujui seluruh jumlah barang (<span x-text="statusModal.item?.jumlahStock"></span> item)</p>
                </div>
            </button>

            <!-- Disetujui sebagian (Kuning) dengan input angka -->
            <div class="rounded-xl p-4 bg-gradient-to-r from-amber-50 to-transparent border-2 border-amber-300 hover:border-amber-400 transition-all">
                <div class="flex items-center gap-3 mb-3">
                    <span class="text-2xl">⚠️</span>
                    <div>
                        <p class="font-semibold text-amber-700">Disetujui sebagian</p>
                        <p class="text-xs text-gray-500">Menyetujui sejumlah tertentu dari total stok</p>
                    </div>
                </div>
                <div class="flex items-center gap-3 pl-10">
                    <label class="text-sm text-gray-600 font-medium">Jumlah disetujui:</label>
                    <input type="number" x-model="statusModal.partialAmount" :placeholder="`Maks: ${statusModal.item?.jumlahStock}`"
                        :max="statusModal.item?.jumlahStock" min="1"
                        class="w-36 rounded-xl border-2 border-amber-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-amber-400">
                    <button @click="updateStatusWithPartial()"
                        :disabled="!statusModal.partialAmount || statusModal.partialAmount <= 0 || statusModal.partialAmount > statusModal.item?.jumlahStock"
                        class="px-4 py-2 bg-gradient-to-r from-amber-500 to-yellow-600 text-white rounded-xl text-sm font-medium hover:shadow-md disabled:opacity-50 disabled:cursor-not-allowed transition-all">
                        Terapkan
                    </button>
                </div>
                <p class="text-xs text-gray-400 mt-2 ml-10" x-show="statusModal.partialAmount > statusModal.item?.jumlahStock">
                    *Jumlah melebihi stok yang tersedia
                </p>
            </div>

            <!-- Ditolak (Merah) -->
            <button @click="updateStatus('Ditolak')" class="w-full text-left px-4 py-3 rounded-xl transition-all flex items-center gap-3 bg-gradient-to-r from-red-50 to-transparent border-2 border-red-300 hover:bg-red-100 hover:border-red-400">
                <span class="text-2xl">❌</span>
                <div>
                    <p class="font-semibold text-red-700">Ditolak</p>
                    <p class="text-xs text-gray-500">Menolak seluruh pengadaan barang ini</p>
                </div>
            </button>
        </div>
        <div class="flex justify-end border-t border-gray-100 p-5 bg-gray-50/30">
            <button @click="statusModal.open = false" class="px-5 py-2.5 rounded-xl border-2 border-gray-200 text-gray-700 font-medium hover:bg-gray-50 transition-all">Batal</button>
        </div>
    </div>
</div>

<style>
    /* Premium Card */
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

    /* Stat Card Premium */
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

    /* Buttons */
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

    /* Input Premium */
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

    /* Badges */
    .badge-success {
        background: linear-gradient(135deg, #10B981, #059669);
        color: white;
        padding: 6px 14px;
        border-radius: 50px;
        font-size: 0.75rem;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 4px;
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
        gap: 4px;
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
        gap: 4px;
    }

    .badge-pending {
        background: linear-gradient(135deg, #6B7280, #4B5563);
        color: white;
        padding: 6px 14px;
        border-radius: 50px;
        font-size: 0.75rem;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 4px;
    }

    /* Modal Premium */
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

    /* Alpine Cloak */
    [x-cloak] {
        display: none !important;
    }
</style>

<script>
    function appData() {
        return {
            items: [{
                    id: 1,
                    namaBarang: 'Sepatu Running Pro',
                    kode: 'MAP-001',
                    kategori: 'Footwear',
                    jumlahStock: 120,
                    status: 'Disetujui semua'
                },
                {
                    id: 2,
                    namaBarang: 'Kaos Olahraga Dri-Fit',
                    kode: 'MAP-002',
                    kategori: 'Apparel',
                    jumlahStock: 80,
                    status: 'Disetujui 20'
                },
                {
                    id: 3,
                    namaBarang: 'Tas Gym Active',
                    kode: 'MAP-003',
                    kategori: 'Accessories',
                    jumlahStock: 30,
                    status: 'Ditolak'
                },
                {
                    id: 4,
                    namaBarang: 'Celana Training Elite',
                    kode: 'MAP-004',
                    kategori: 'Apparel',
                    jumlahStock: 60,
                    status: 'Disetujui semua'
                },
                {
                    id: 5,
                    namaBarang: 'Topi Olahraga UV',
                    kode: 'MAP-005',
                    kategori: 'Accessories',
                    jumlahStock: 45,
                    status: 'Disetujui semua'
                },
                {
                    id: 6,
                    namaBarang: 'Matras Yoga Premium',
                    kode: 'MAP-006',
                    kategori: 'Equipment',
                    jumlahStock: 25,
                    status: 'Disetujui 50'
                },
                {
                    id: 7,
                    namaBarang: 'Botol Minum Tritan',
                    kode: 'MAP-007',
                    kategori: 'Accessories',
                    jumlahStock: 100,
                    status: 'Disetujui semua'
                },
                {
                    id: 8,
                    namaBarang: 'Rompi Training Berat',
                    kode: 'MAP-008',
                    kategori: 'Apparel',
                    jumlahStock: 15,
                    status: 'Ditolak'
                },
                {
                    id: 9,
                    namaBarang: 'Pelindung Lutut',
                    kode: 'MAP-009',
                    kategori: 'Accessories',
                    jumlahStock: 50,
                    status: 'Disetujui semua'
                },
                {
                    id: 10,
                    namaBarang: 'Hand Grip Adjustable',
                    kode: 'MAP-010',
                    kategori: 'Equipment',
                    jumlahStock: 75,
                    status: 'Menunggu Persetujuan'
                }
            ],
            showModal: false,
            formNamaBarang: '',
            formKategori: '',
            formKode: '',
            formJumlahStock: 0,
            statusModal: {
                open: false,
                item: null,
                partialAmount: ''
            },
            get partialCount() {
                return this.items.filter(item => {
                    const status = item.status;
                    return status !== 'Disetujui semua' && status !== 'Ditolak' && status !== 'Menunggu Persetujuan' && status.includes('Disetujui');
                }).length;
            },
            openStatusModal(item) {
                this.statusModal.item = item;
                this.statusModal.partialAmount = '';
                // Jika status sudah berupa "Disetujui X", ambil angkanya
                const match = item.status.match(/Disetujui (\d+)/);
                if (match) {
                    this.statusModal.partialAmount = match[1];
                }
                this.statusModal.open = true;
            },
            updateStatus(newStatus) {
                if (this.statusModal.item) {
                    const index = this.items.findIndex(i => i.id === this.statusModal.item.id);
                    if (index !== -1) {
                        this.items[index].status = newStatus;
                    }
                }
                this.statusModal.open = false;
                this.statusModal.item = null;
                this.statusModal.partialAmount = '';
            },
            updateStatusWithPartial() {
                if (this.statusModal.item && this.statusModal.partialAmount && this.statusModal.partialAmount > 0) {
                    const jumlah = parseInt(this.statusModal.partialAmount);
                    if (jumlah <= this.statusModal.item.jumlahStock) {
                        this.updateStatus(`Disetujui ${jumlah}`);
                    } else {
                        alert(`Jumlah yang disetujui (${jumlah}) melebihi stok yang tersedia (${this.statusModal.item.jumlahStock})`);
                    }
                }
            },
            addItem() {
                if (!this.formNamaBarang || !this.formKategori || !this.formKode) {
                    alert('Harap lengkapi Nama Barang, Kategori, dan Kode.');
                    return;
                }
                const newId = Math.max(...this.items.map(i => i.id)) + 1;
                this.items.push({
                    id: newId,
                    namaBarang: this.formNamaBarang,
                    kode: this.formKode,
                    kategori: this.formKategori,
                    jumlahStock: parseInt(this.formJumlahStock) || 0,
                    status: 'Menunggu Persetujuan'
                });
                this.formNamaBarang = '';
                this.formKategori = '';
                this.formKode = '';
                this.formJumlahStock = 0;
                this.showModal = false;
            }
        };
    }
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\RUMGABPSDMIMIPAS\RUMGABPSDMIMIPAS\resources\views/admin/pengadaan/index.blade.php ENDPATH**/ ?>