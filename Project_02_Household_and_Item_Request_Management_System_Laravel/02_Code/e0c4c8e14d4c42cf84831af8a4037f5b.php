<?php $__env->startSection('title', 'Buat Pengajuan Barang'); ?>
<?php $__env->startSection('content'); ?>
<div class="premium-card shadow-xl p-8 mt-6">
    <!-- Header -->
    <div class="p-6 border-b border-gray-100 bg-gradient-to-r from-white to-gray-50 mb-6">
        <h2 class="text-xl font-bold text-[#0B3B5F] flex items-center gap-2">
            <div class="w-1 h-8 bg-[#D4A017] rounded-full"></div>
            Form Buat Pengajuan Barang
        </h2>
        <p class="text-sm text-gray-500 mt-1">Isi data pengajuan barang dengan lengkap dan akurat</p>
    </div>

    <!-- Error Messages -->
    <?php if($errors->any()): ?>
    <div class="alert alert-danger mb-6">
        <strong>Terjadi kesalahan:</strong>
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
    <?php endif; ?>

    <form action="<?php echo e(route('user.pengajuan.store')); ?>" method="POST" class="grid gap-6 md:grid-cols-2">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="is_new_item" :value="isNew ? '1' : '0'">
        <input type="hidden" name="stock_id" :value="isNew ? '' : selectedValue">
        <input type="hidden" name="new_stock_name" :value="isNew ? newStockName : ''">
        <div class="md:col-span-2 group-input-glass">
            <label class="block text-xs font-bold uppercase tracking-wider text-[#092540] mb-2 opacity-75">
                Nama Pengaju System <span class="text-red-500">*</span>
            </label>
            <input type="hidden" name="user_id" value="<?php echo e(auth()->id()); ?>">
            <div class="relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400">
                    <i class="fas fa-user-shield text-sm"></i>
                </span>
                <input type="text"
                    value="<?php echo e(auth()->user()->name ?? '-'); ?>"
                    readonly
                    class="w-full pl-11 pr-5 py-3.5 rounded-xl border border-gray-200/60 bg-gray-100/70 text-gray-500 font-medium cursor-not-allowed text-sm">
            </div>
            <p class="text-xs text-gray-400 mt-1.5 flex items-center gap-1 pl-1">
                <i class="fas fa-info-circle opacity-75"></i> Otomatis terkunci sesuai dengan akun pegawai yang sedang aktif.
            </p>
        </div>

        <div class="relative w-full group-input-glass"
            x-data="{ 
                    open: false, 
                    search: '',
                    selectedName: '<?php echo e(old('new_stock_name') ? old('new_stock_name') : (old('stock_id') ? $stock->firstWhere('id', old('stock_id'))?->nama_barang : '-- Pilih Barang --')); ?>', 
                    selectedValue: '<?php echo e(old('stock_id')); ?>',
                    newStockName: '<?php echo e(old('new_stock_name')); ?>',
                    isNew: <?php echo e(old('is_new_item') ? 'true' : 'false'); ?>,
                    stocks: [
                        <?php $__currentLoopData = $stock; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        { id: '<?php echo e($item->id); ?>', nama: '<?php echo e(addslashes($item->nama_barang)); ?>' },
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    ],
                    get filteredStocks() {
                        return this.stocks.filter(i => i.nama.toLowerCase().includes(this.search.toLowerCase()));
                    }
                 }">

            <label class="block text-xs font-bold uppercase tracking-wider text-[#092540] mb-2 opacity-75">
                Nama Barang / Logistik <span class="text-red-500">*</span>
            </label>

            <input type="hidden" name="stock_id" :value="isNew ? '' : selectedValue">
            <input type="hidden" name="new_stock_name" :value="isNew ? newStockName : ''">
            <input type="hidden" name="is_new_item" :value="isNew ? '1' : '0'">

            <button type="button" @click="open = !open; if(open) $nextTick(() => $refs.searchField.focus())" @click.away="open = false"
                class="w-full flex items-center justify-between px-5 py-3.5 rounded-xl border border-gray-200 bg-white/60 backdrop-blur-md text-[#092540] font-medium shadow-sm focus:outline-none focus:border-[#D4A017] focus:ring-4 focus:ring-[#D4A017]/10 transition-all duration-300 text-left text-sm">
                <span x-text="selectedName" :class="selectedValue == '' && newStockName == '' ? 'text-gray-400 font-normal' : 'text-[#092540] font-semibold'"></span>

                <div class="flex items-center gap-2">
                    <span x-show="isNew" class="text-[10px] bg-amber-500 text-white px-2 py-0.5 rounded-md font-bold uppercase tracking-wider animate--fade-in">Barang Baru</span>
                    <svg class="w-5 h-5 text-[#D4A017] transition-transform duration-300" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </div>
            </button>

            <div x-show="open"
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 scale-95 -translate-y-2"
                x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                x-transition:leave-end="opacity-0 scale-95 -translate-y-2"
                class="absolute z-50 w-full mt-2 rounded-xl border border-white/70 bg-white/90 backdrop-blur-xl shadow-xl custom-dropdown-scrollbar"
                style="display: none; max-height: 320px;">

                <div class="p-2 border-b border-gray-100 sticky top-0 bg-white/95 backdrop-blur-sm z-10">
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                            <i class="fas fa-search text-xs"></i>
                        </span>
                        <input type="text" x-ref="searchField" x-model="search"
                            placeholder="Cari barang atau ketik nama barang baru..."
                            class="w-full pl-9 pr-4 py-2 text-sm rounded-lg border border-gray-200 focus:outline-none focus:border-[#D4A017] focus:ring-2 focus:ring-[#D4A017]/20 bg-gray-50/50">
                    </div>
                </div>

                <div class="p-1.5 overflow-y-auto" style="max-height: 240px;">
                    <!-- Default placeholder -->
                    <div @click="selectedValue = ''; selectedName = '-- Pilih Barang --'; open = false; search = ''"
                        class="px-4 py-2.5 text-sm text-gray-400 hover:bg-gray-100 rounded-lg cursor-pointer transition-colors">
                        -- Pilih Barang --
                    </div>

                    <!-- Template daftar stock -->
                    <template x-for="item in filteredStocks" :key="item.id">
                        <div @click="selectedValue = item.id; selectedName = item.nama; open = false; search = ''"
                            class="flex items-center justify-between px-4 py-2.5 text-sm text-[#092540] font-medium hover:bg-[#D4A017]/10 rounded-lg cursor-pointer transition-all duration-150"
                            :class="selectedValue == item.id ? 'bg-[#D4A017]/15 font-bold' : ''">
                            <div class="flex items-center">
                                <i class="fas fa-box mr-2.5 text-xs opacity-40 text-primary"></i>
                                <span x-text="item.nama"></span>
                            </div>
                            <i class="fas fa-check text-xs text-[#D4A017]" x-show="selectedValue == item.id"></i>
                        </div>
                    </template>
                </div>
            </div>

            <div x-show="isNew"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 -translate-y-4 max-h-0"
                x-transition:enter-end="opacity-100 translate-y-0 max-h-40"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 max-h-40"
                x-transition:leave-end="opacity-0 -translate-y-4 max-h-0"
                class="mt-4 p-4 rounded-xl bg-amber-50/40 border border-dashed border-amber-200 overflow-hidden">

                <div x-show="isNew"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 -translate-y-4 max-h-0"
                    x-transition:enter-end="opacity-100 translate-y-0 max-h-40"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100 translate-y-0 max-h-40"
                    x-transition:leave-end="opacity-0 -translate-y-4 max-h-0"
                    
                    class="mt-4 p-4 rounded-xl bg-amber-50/40 border border-dashed border-amber-200 relative"
                    
                    :class="openSatuan ? 'z-40' : 'z-10'">

                    <div class="relative w-full" x-data="{ openSatuan: false, selectedSatuan: '<?php echo e(old('satuan', $satuan[0] ?? 'Pcs')); ?>' }">
                        <label class="block text-xs font-bold uppercase tracking-wider text-amber-800 mb-2">
                            Pilih Satuan Barang Baru <span class="text-red-500">*</span>
                        </label>

                        <input type="hidden" name="satuan" :value="isNew ? selectedSatuan : ''">

                        <button type="button" @click="openSatuan = !openSatuan" @click.away="openSatuan = false"
                            class="w-full flex items-center justify-between px-4 py-2.5 rounded-lg border border-amber-200 bg-white text-[#092540] font-semibold text-sm shadow-sm focus:outline-none focus:ring-2 focus:ring-amber-500/20 transition-all duration-200 text-left">
                            <span x-text="selectedSatuan"></span>
                            <svg class="w-4 h-4 text-amber-600 transition-transform duration-300" :class="openSatuan ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>

                        
                        <div x-show="openSatuan"
                            class="absolute left-0 w-full mt-1 max-h-40 overflow-y-auto rounded-lg border border-gray-200 bg-white shadow-2xl custom-dropdown-scrollbar"
                            style="display: none; z-index: 999;">
                            <div class="p-1">
                                
                                <?php $__currentLoopData = $satuan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div @click="selectedSatuan = '<?php echo e($item); ?>'; openSatuan = false"
                                    class="px-4 py-2 text-sm text-[#092540] hover:bg-amber-50 hover:text-amber-800 rounded-md cursor-pointer transition-all font-medium"
                                    :class="selectedSatuan == '<?php echo e($item); ?>' ? 'bg-amber-50 text-amber-800 font-bold' : ''">
                                    <?php echo e($item); ?>

                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="group-input-glass">
            <label class="block text-xs font-bold uppercase tracking-wider text-[#092540] mb-2 opacity-75">
                Jumlah Volume <span class="text-red-500">*</span>
            </label>
            <div class="relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400">
                    <i class="fas fa-calculator text-sm"></i>
                </span>
                <input type="number" name="jumlah_pengajuan"
                    class="w-full pl-11 pr-5 py-3.5 text-sm rounded-xl border border-gray-200 bg-white/60 focus:outline-none focus:border-[#D4A017] focus:ring-4 focus:ring-[#D4A017]/10 transition-all duration-300 font-medium text-[#092540]"
                    value="<?php echo e(old('jumlah_pengajuan')); ?>" placeholder="Contoh: 10" required>
            </div>
        </div>

        <div class="relative w-full group-input-glass" x-data="{ open: false, selectedName: '<?php echo e(old('prioritas') ? old('prioritas') : '-- Pilih Prioritas --'); ?>', selectedValue: '<?php echo e(old('prioritas')); ?>' }">
            <label class="block text-xs font-bold uppercase tracking-wider text-[#092540] mb-2 opacity-75">
                Tingkat Prioritas <span class="text-red-500">*</span>
            </label>

            <input type="hidden" name="prioritas" :value="selectedValue" required>

            <button type="button" @click="open = !open" @click.away="open = false"
                class="w-full flex items-center justify-between px-5 py-3.5 rounded-xl border border-gray-200 bg-white/60 backdrop-blur-md text-[#092540] font-medium shadow-sm focus:outline-none focus:border-[#D4A017] focus:ring-4 focus:ring-[#D4A017]/10 transition-all duration-300 text-left text-sm">
                <span x-text="selectedName" :class="selectedValue == '' ? 'text-gray-400 font-normal' : 'text-[#092540] font-semibold'"></span>

                <svg class="w-5 h-5 text-[#D4A017] transition-transform duration-300" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>

            <div x-show="open"
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 scale-95 -translate-y-2"
                x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                x-transition:leave-end="opacity-0 scale-95 -translate-y-2"
                class="absolute z-50 w-full mt-2 rounded-xl border border-white/70 bg-white/80 backdrop-blur-xl shadow-xl"
                style="display: none;">

                <div class="p-1.5">
                    <div @click="selectedValue = ''; selectedName = '-- Pilih Prioritas --'; open = false"
                        class="px-4 py-2.5 text-sm text-gray-400 hover:bg-gray-100 rounded-lg cursor-pointer transition-colors">
                        -- Pilih Prioritas --
                    </div>

                    <div @click="selectedValue = 'Normal'; selectedName = 'Normal'; open = false"
                        class="flex items-center justify-between px-4 py-2.5 text-sm text-[#092540] font-medium hover:bg-gray-100 rounded-lg cursor-pointer transition-all"
                        :class="selectedValue == 'Normal' ? 'bg-gray-100 font-bold' : ''">
                        <div class="flex items-center">
                            <span class="w-2 h-2 rounded-full bg-slate-400 mr-2.5"></span>
                            <span>Normal</span>
                        </div>
                        <i class="fas fa-check text-xs text-[#D4A017]" x-show="selectedValue == 'Normal'"></i>
                    </div>

                    <div @click="selectedValue = 'Urgent'; selectedName = 'Urgent'; open = false"
                        class="flex items-center justify-between px-4 py-2.5 text-sm text-[#092540] font-medium hover:bg-amber-50 rounded-lg cursor-pointer transition-all"
                        :class="selectedValue == 'Urgent' ? 'bg-amber-50 font-bold text-amber-700' : ''">
                        <div class="flex items-center">
                            <span class="w-2 h-2 rounded-full bg-amber-500 mr-2.5 animate-pulse"></span>
                            <span>Urgent</span>
                        </div>
                        <i class="fas fa-check text-xs text-[#D4A017]" x-show="selectedValue == 'Urgent'"></i>
                    </div>

                    <div @click="selectedValue = 'Critical'; selectedName = 'Critical'; open = false"
                        class="flex items-center justify-between px-4 py-2.5 text-sm text-[#092540] font-medium hover:bg-red-50 rounded-lg cursor-pointer transition-all"
                        :class="selectedValue == 'Critical' ? 'bg-red-50 font-bold text-red-700' : ''">
                        <div class="flex items-center">
                            <span class="w-2 h-2 rounded-full bg-red-600 mr-2.5 animate-ping"></span>
                            <span class="text-red-600 font-semibold">Critical</span>
                        </div>
                        <i class="fas fa-check text-xs text-[#D4A017]" x-show="selectedValue == 'Critical'"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="group-input-glass">
            <label class="block text-xs font-bold uppercase tracking-wider text-[#092540] mb-2 opacity-75">
                Tanggal Pengajuan <span class="text-red-500">*</span>
            </label>
            <input type="date" name="tanggal_pengajuan"
                class="w-full px-5 py-3.5 text-sm rounded-xl border border-gray-200 bg-white/60 focus:outline-none focus:border-[#D4A017] focus:ring-4 focus:ring-[#D4A017]/10 transition-all duration-300 font-medium text-[#092540]"
                value="<?php echo e(old('tanggal_pengajuan', date('Y-m-d'))); ?>" required>
        </div>

        <div class="group-input-glass">
            <label class="block text-xs font-bold uppercase tracking-wider text-[#092540] mb-2 opacity-75">
                Tanggal Target Dibutuhkan
            </label>
            <input type="date" name="tanggal_dibutuhkan"
                class="w-full px-5 py-3.5 text-sm rounded-xl border border-gray-200 bg-white/60 focus:outline-none focus:border-[#D4A017] focus:ring-4 focus:ring-[#D4A017]/10 transition-all duration-300 font-medium text-[#092540]"
                value="<?php echo e(old('tanggal_dibutuhkan')); ?>">
        </div>

        <div class="md:col-span-2 group-input-glass">
            <label class="block text-xs font-bold uppercase tracking-wider text-[#092540] mb-2 opacity-75">
                Keterangan Justifikasi / Keperluan
            </label>
            <textarea name="keterangan"
                class="w-full px-5 py-3.5 text-sm rounded-xl border border-gray-200 bg-white/60 focus:outline-none focus:border-[#D4A017] focus:ring-4 focus:ring-[#D4A017]/10 transition-all duration-300 resize-none font-medium text-[#092540]"
                rows="3" placeholder="Tulis alasan atau rincian spesifikasi barang jika dibutuhkan..."><?php echo e(old('keterangan')); ?></textarea>
        </div>

        <div class="md:col-span-2 flex flex-col sm:flex-row gap-3 pt-4 border-top-glass mt-4">
            <a href="<?php echo e(route('admin.pengajuan.index')); ?>"
                class="w-full sm:w-1/2 px-6 py-3.5 rounded-xl border border-gray-300 bg-white/40 text-center text-gray-700 font-bold text-sm shadow-sm hover:bg-gray-100/80 transition-all duration-200">
                <i class="fas fa-times mr-2 opacity-60"></i> Batal / Kembali
            </a>
            <button type="submit"
                class="w-full sm:w-1/2 btn-premium-submit px-6 py-3.5 rounded-xl text-white font-bold text-sm shadow-md transition-all duration-300">
                <i class="fas fa-paper-plane mr-2"></i> Kirim Form Pengajuan
            </button>
        </div>
    </form>
</div>
</div>

<style>
    .user-glass-wrapper {
        font-family: 'Plus Jakarta Sans', sans-serif;
    }

    .glass-card-main {
        background: rgba(255, 255, 255, 0.5) !important;
        backdrop-filter: blur(20px) saturate(125%);
        -webkit-backdrop-filter: blur(20px) saturate(125%);
        border: 1px solid rgba(255, 255, 255, 0.65) !important;
        border-radius: 24px;
        padding: 2.5rem;
    }

    .icon-identity-form {
        width: 48px;
        height: 48px;
        background: linear-gradient(135deg, #092540 0%, #174675 100%);
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .header-title-imipas {
        color: #092540;
        font-weight: 800;
        letter-spacing: -0.5px;
    }

    .border-bottom-glass {
        border-bottom: 1px solid rgba(9, 37, 64, 0.08) !important;
    }

    .border-top-glass {
        border-top: 1px solid rgba(9, 37, 64, 0.08) !important;
    }

    .group-input-glass input:focus,
    .group-input-glass textarea:focus {
        background-color: #ffffff !important;
        box-shadow: 0 0 0 4px rgba(212, 160, 23, 0.1) !important;
    }

    .btn-premium-submit {
        background: linear-gradient(135deg, #092540 0%, #174675 100%);
        border: 1px solid rgba(255, 255, 255, 0.15);
    }

    .btn-premium-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 22px rgba(9, 37, 64, 0.25);
        opacity: 0.95;
    }

    .alert-glass-danger {
        background: rgba(220, 53, 69, 0.06) !important;
        backdrop-filter: blur(8px);
        border: 1px solid rgba(220, 53, 69, 0.15) !important;
        border-radius: 16px;
        padding: 1.25rem;
    }

    .custom-dropdown-scrollbar::-webkit-scrollbar {
        width: 5px;
    }

    .custom-dropdown-scrollbar::-webkit-scrollbar-track {
        background: transparent;
    }

    .custom-dropdown-scrollbar::-webkit-scrollbar-thumb {
        background: rgba(18, 50, 83, 0.15);
        border-radius: 10px;
    }

    .custom-dropdown-scrollbar::-webkit-scrollbar-thumb:hover {
        background: rgba(212, 160, 23, 0.3);
    }

    .animate--fade-in {
        animation: fadeIn 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(8px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\RUMGABPSDMIMIPAS\RUMGABPSDMIMIPAS\resources\views/user/pengajuan/create.blade.php ENDPATH**/ ?>