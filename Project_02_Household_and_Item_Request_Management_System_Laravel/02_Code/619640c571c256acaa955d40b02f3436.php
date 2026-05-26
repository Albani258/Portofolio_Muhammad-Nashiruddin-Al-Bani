<?php $__env->startSection('title', 'Buat Pengadaan Barang'); ?>
<?php $__env->startSection('content'); ?>
<div class="premium-card shadow-xl p-8 mt-6">

    <div class="p-6 border-b border-gray-100 bg-gradient-to-r from-white to-gray-50 mb-6">
        <h2 class="text-xl font-bold text-[#0B3B5F] flex items-center gap-2">
            <div class="w-1 h-8 bg-[#D4A017] rounded-full"></div>
            Form Buat Pengadaan Barang
        </h2>
        <p class="text-sm text-gray-500 mt-1">Isi data pengadaan barang dengan lengkap dan akurat</p>
    </div>

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

    <form action="<?php echo e(route('user.pengadaan.store')); ?>" method="POST" class="grid gap-6 md:grid-cols-2">
        <?php echo csrf_field(); ?>

        <!-- Nama Barang Input Manual -->
        <div class="md:col-span-2 group-input-glass">
            <label class="block text-xs font-bold uppercase tracking-wider text-[#092540] mb-2 opacity-75">
                Nama Barang <span class="text-red-500">*</span>
            </label>
            <input type="text" name="nama_barang"
                value="<?php echo e(old('nama_barang')); ?>"
                placeholder="Masukkan nama barang"
                class="w-full px-5 py-3.5 rounded-xl border border-gray-200 bg-white/60 focus:outline-none focus:border-[#D4A017] focus:ring-4 focus:ring-[#D4A017]/10 text-sm font-medium text-[#092540]"
                required>
        </div>

        <!-- Satuan Barang Dropdown -->
        <div class="relative w-full group-input-glass" x-data="{ open: false, selectedSatuan: '<?php echo e(old('satuan', $satuan[0] ?? 'Pcs')); ?>' }">
            <label class="block text-xs font-bold uppercase tracking-wider text-[#092540] mb-2 opacity-75">
                Pilih Satuan <span class="text-red-500">*</span>
            </label>
            <input type="hidden" name="satuan" :value="selectedSatuan">

            <button type="button" @click="open = !open" @click.away="open = false"
                class="w-full flex items-center justify-between px-4 py-2.5 rounded-lg border border-gray-200 bg-white text-[#092540] font-semibold text-sm shadow-sm text-left">
                <span x-text="selectedSatuan"></span>
                <svg class="w-4 h-4 text-gray-600 transition-transform duration-300" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>

            <div x-show="open" class="absolute left-0 w-full mt-1 max-h-40 overflow-y-auto rounded-lg border border-gray-200 bg-white shadow-lg" style="display: none; z-index: 999;">
                <div class="p-1">
                    <?php $__currentLoopData = $satuan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div @click="selectedSatuan = '<?php echo e($item); ?>'; open = false"
                        class="px-4 py-2 text-sm text-[#092540] hover:bg-gray-100 rounded-md cursor-pointer"
                        :class="selectedSatuan == '<?php echo e($item); ?>' ? 'bg-gray-100 font-bold' : ''">
                        <?php echo e($item); ?>

                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>

        <!-- Jumlah Barang -->
        <div class="group-input-glass">
            <label class="block text-xs font-bold uppercase tracking-wider text-[#092540] mb-2 opacity-75">
                Jumlah Barang <span class="text-red-500">*</span>
            </label>
            <input type="number" name="jumlah_pengajuan"
                value="<?php echo e(old('jumlah_pengajuan')); ?>"
                placeholder="Contoh: 10"
                class="w-full px-5 py-3.5 rounded-xl border border-gray-200 bg-white/60 ... "
                required>
        </div>

        <!-- Tanggal Pengadaan -->
        <div class="group-input-glass">
            <label class="block text-xs font-bold uppercase tracking-wider text-[#092540] mb-2 opacity-75">
                Tanggal Pengadaan <span class="text-red-500">*</span>
            </label>
            <input type="date" name="tanggal_pengajuan"
                value="<?php echo e(old('tanggal_pengajuan', date('Y-m-d'))); ?>"
                class="w-full px-5 py-3.5 rounded-xl border border-gray-200 bg-white/60 ... "
                required>
        </div>

        <!-- Submit -->
        <div class="md:col-span-2 flex flex-col sm:flex-row gap-3 pt-4 border-top-glass mt-4">
            <a href="<?php echo e(route('user.pengadaan.index')); ?>"
                class="w-full sm:w-1/2 px-6 py-3.5 rounded-xl border border-gray-300 bg-white/40 text-center text-gray-700 font-bold text-sm shadow-sm hover:bg-gray-100/80 transition-all duration-200">
                <i class="fas fa-times mr-2 opacity-60"></i> Batal / Kembali
            </a>
            <button type="submit"
                class="w-full sm:w-1/2 btn-premium-submit px-6 py-3.5 rounded-xl text-white font-bold text-sm shadow-md transition-all duration-300">
                <i class="fas fa-paper-plane mr-2"></i> Kirim Form Pengadaan
            </button>
        </div>

    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mclarens-username/Downloads/BMN-VS2/resources/views/user/pengadaan/create.blade.php ENDPATH**/ ?>