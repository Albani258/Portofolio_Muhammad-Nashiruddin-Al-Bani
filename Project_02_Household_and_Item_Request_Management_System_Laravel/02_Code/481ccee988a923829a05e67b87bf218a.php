<?php $__env->startSection('content'); ?>

<!-- Premium Header -->
<div class="relative overflow-hidden rounded-[30px] bg-gradient-to-br from-[#082F49] via-[#0B3B5F] to-[#123C5C] p-8 shadow-2xl mb-8">

    <!-- Glow -->
    <div class="absolute -top-20 -right-20 w-72 h-72 rounded-full bg-[#D4A017]/20 blur-3xl"></div>
    <div class="absolute -bottom-24 left-1/4 w-56 h-56 rounded-full bg-white/10 blur-3xl"></div>

    <div class="relative z-10 flex flex-col gap-4">

        <div class="inline-flex w-fit items-center gap-2 rounded-full border border-white/10 bg-white/10 px-4 py-2 text-xs font-semibold text-[#F7D27A] backdrop-blur-sm">
            Management Stock Barang
        </div>

        <div>
            <h1 class="text-3xl font-extrabold text-white">
                Tambah Stock Barang
            </h1>

            <p class="mt-2 max-w-2xl text-sm leading-6 text-slate-200/90">
                Tambahkan data inventaris barang secara lengkap dan terstruktur agar monitoring stock dapat berjalan secara realtime dan terintegrasi.
            </p>
        </div>
    </div>
</div>

<!-- Error Validation -->
<?php if($errors->any()): ?>
<div class="mb-6 rounded-2xl border border-red-200 bg-red-50 p-5 shadow-sm">
    <div class="flex items-start gap-3">

        <div class="flex h-10 w-10 items-center justify-center rounded-full bg-red-100">
            <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 8v4m0 4h.01M5.07 19h13.86c1.54 0 2.5-1.67 1.73-3L13.73 4c-.77-1.33-2.69-1.33-3.46 0L3.34 16c-.77 1.33.19 3 1.73 3z"/>
            </svg>
        </div>

        <div>
            <h3 class="text-sm font-bold text-red-700 mb-2">
                Terjadi Kesalahan Input
            </h3>

            <ul class="space-y-1 text-sm text-red-600">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>• <?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    </div>
</div>
<?php endif; ?>

<!-- Form Card -->
<div class="overflow-hidden rounded-[28px] border border-gray-100 bg-white shadow-2xl">

    <!-- Card Header -->
    <div class="border-b border-gray-100 bg-gradient-to-r from-white to-slate-50 px-8 py-6">

        <div class="flex items-center gap-3">

            <div class="h-10 w-2 rounded-full bg-[#D4A017]"></div>

            <div>
                <h2 class="text-xl font-bold text-[#0B3B5F]">
                    Form Input Stock Barang
                </h2>

                <p class="mt-1 text-sm text-gray-500">
                    Lengkapi seluruh data barang inventaris dengan benar.
                </p>
            </div>
        </div>
    </div>

    <!-- Form -->
    <form action="<?php echo e(route('admin.stock.store')); ?>" method="POST" class="p-8">
        <?php echo csrf_field(); ?>

        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

            <!-- Nama Barang -->
            <div class="md:col-span-2">
                <label class="mb-2 block text-sm font-semibold text-gray-700">
                    Nama Barang
                    <span class="text-red-500">*</span>
                </label>

                <input
                    type="text"
                    name="nama_barang"
                    value="<?php echo e(old('nama_barang')); ?>"
                    placeholder="Masukkan nama barang"
                    required
                    class="w-full rounded-2xl border-2 border-gray-200 px-5 py-3 text-sm transition-all focus:border-[#D4A017] focus:outline-none focus:ring-4 focus:ring-[#D4A017]/10">
            </div>

            <!-- Kode Barang -->
            <div>
                <label class="mb-2 block text-sm font-semibold text-gray-700">
                    Kode Barang
                    <span class="text-red-500">*</span>
                </label>

                <input
                    type="text"
                    name="kode_barang"
                    value="<?php echo e(old('kode_barang')); ?>"
                    placeholder="Masukkan kode barang"
                    required
                    class="w-full rounded-2xl border-2 border-gray-200 px-5 py-3 text-sm transition-all focus:border-[#D4A017] focus:outline-none focus:ring-4 focus:ring-[#D4A017]/10">
            </div>

            <!-- Kategori -->
            <div>
                <label class="mb-2 block text-sm font-semibold text-gray-700">
                    Kategori Barang
                    <span class="text-red-500">*</span>
                </label>

                <select
                    name="kategori"
                    required
                    class="w-full rounded-2xl border-2 border-gray-200 bg-white px-5 py-3 text-sm transition-all focus:border-[#D4A017] focus:outline-none focus:ring-4 focus:ring-[#D4A017]/10">

                    <option value="">Pilih Kategori</option>

                    <?php $__currentLoopData = $kategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_kategori): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option
                            value="<?php echo e($item_kategori); ?>"
                            <?php echo e(old('kategori') == $item_kategori ? 'selected' : ''); ?>>
                            <?php echo e($item_kategori); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <!-- Jumlah Stock -->
            <div>
                <label class="mb-2 block text-sm font-semibold text-gray-700">
                    Jumlah Stock
                    <span class="text-red-500">*</span>
                </label>

                <input
                    type="number"
                    name="jumlah_stock"
                    value="<?php echo e(old('jumlah_stock')); ?>"
                    placeholder="0"
                    min="0"
                    required
                    class="w-full rounded-2xl border-2 border-gray-200 px-5 py-3 text-sm transition-all focus:border-[#D4A017] focus:outline-none focus:ring-4 focus:ring-[#D4A017]/10">
            </div>

            <!-- Minimal Stock -->
            <div>
                <label class="mb-2 block text-sm font-semibold text-gray-700">
                    Minimal Stock
                    <span class="text-red-500">*</span>
                </label>

                <input
                    type="number"
                    name="minimal_stock"
                    value="<?php echo e(old('minimal_stock')); ?>"
                    placeholder="0"
                    min="0"
                    required
                    class="w-full rounded-2xl border-2 border-gray-200 px-5 py-3 text-sm transition-all focus:border-[#D4A017] focus:outline-none focus:ring-4 focus:ring-[#D4A017]/10">
            </div>

            <!-- Satuan -->
            <div>
                <label class="mb-2 block text-sm font-semibold text-gray-700">
                    Satuan
                    <span class="text-red-500">*</span>
                </label>

                <select
                    name="satuan"
                    required
                    class="w-full rounded-2xl border-2 border-gray-200 bg-white px-5 py-3 text-sm transition-all focus:border-[#D4A017] focus:outline-none focus:ring-4 focus:ring-[#D4A017]/10">

                    <option value="">Pilih Satuan</option>

                    <?php $__currentLoopData = $satuan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_satuan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option
                            value="<?php echo e($item_satuan); ?>"
                            <?php echo e(old('satuan') == $item_satuan ? 'selected' : ''); ?>>
                            <?php echo e($item_satuan); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <!-- Lokasi -->
            <div class="md:col-span-2">
                <label class="mb-2 block text-sm font-semibold text-gray-700">
                    Lokasi Penyimpanan
                    <span class="text-red-500">*</span>
                </label>

                <input
                    type="text"
                    name="lokasi"
                    value="<?php echo e(old('lokasi')); ?>"
                    placeholder="Masukkan lokasi penyimpanan barang"
                    required
                    class="w-full rounded-2xl border-2 border-gray-200 px-5 py-3 text-sm transition-all focus:border-[#D4A017] focus:outline-none focus:ring-4 focus:ring-[#D4A017]/10">
            </div>
        </div>

        <!-- Buttons -->
        <div class="mt-10 flex flex-col gap-4 border-t border-gray-100 pt-6 sm:flex-row">

            <a href="<?php echo e(route('admin.stock.index')); ?>"
                class="flex-1 rounded-2xl border-2 border-gray-200 px-6 py-3 text-center text-sm font-semibold text-gray-700 transition-all hover:bg-gray-50">
                Batal
            </a>

            <button
                type="submit"
                class="flex flex-1 items-center justify-center gap-2 rounded-2xl bg-gradient-to-r from-[#0B3B5F] to-[#123C5C] px-6 py-3 text-sm font-bold text-white shadow-lg transition-all hover:scale-[1.01] hover:shadow-xl">

                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 13l4 4L19 7"/>
                </svg>

                Simpan Stock Barang
            </button>
        </div>
    </form>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\RUMGABPSDMIMIPAS\RUMGABPSDMIMIPAS\resources\views/admin/stock/create.blade.php ENDPATH**/ ?>