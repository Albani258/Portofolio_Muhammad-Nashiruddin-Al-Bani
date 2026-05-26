<?php $__env->startSection('content'); ?>

<div class="w-full">
    <main class="w-full">

        <div class="w-full rounded-xl border border-gray-200 bg-white shadow-md">

            <!-- HEADER -->
            <div class="border-b border-gray-200 bg-[#0B3B5F] rounded-t-xl px-6 py-5">
                <h2 class="text-xl font-bold text-white">
                    Form Tambah Akun
                </h2>

                <p class="mt-1 text-sm text-white/80">
                    Kementerian Imigrasi dan Pemasyarakatan
                </p>
            </div>

            <!-- ERROR -->
            <?php if($errors->any()): ?>
            <div class="m-6 rounded-xl border border-red-200 bg-red-50 p-4 text-red-700">

                <h3 class="mb-2 font-semibold">
                    Data belum lengkap
                </h3>

                <ul class="list-disc list-inside text-sm space-y-1">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <?php endif; ?>

            <!-- FORM -->
            <form
                class="grid gap-5 p-6 md:grid-cols-2"
                method="POST"
                action="<?php echo e(route('admin.akun.store')); ?>">

                <?php echo csrf_field(); ?>

                <!-- NAMA -->
                <div class="md:col-span-2">
                    <label class="mb-1.5 block text-sm font-medium text-gray-700">
                        Nama Lengkap
                        <span class="text-red-500">*</span>
                    </label>

                    <input
                        type="text"
                        name="name"
                        value="<?php echo e(old('name')); ?>"
                        placeholder="Masukkan nama lengkap"
                        required
                        class="w-full px-5 py-3 rounded-xl border-2 border-gray-200 focus:border-[#D4A017] focus:ring-2 focus:ring-[#D4A017]/20 transition-all">
                </div>

                <!-- NIP -->
                <div>
                    <label class="mb-1.5 block text-sm font-medium text-gray-700">
                        NIP
                        <span class="text-red-500">*</span>
                    </label>

                    <input
                        type="text"
                        name="nip"
                        value="<?php echo e(old('nip')); ?>"
                        placeholder="Masukkan NIP"
                        required
                        class="w-full px-5 py-3 rounded-xl border-2 border-gray-200 focus:border-[#D4A017] focus:ring-2 focus:ring-[#D4A017]/20 transition-all">
                </div>

                <!-- USERNAME -->
                <div>
                    <label class="mb-1.5 block text-sm font-medium text-gray-700">
                        Username
                        <span class="text-red-500">*</span>
                    </label>

                    <input
                        type="text"
                        name="username"
                        value="<?php echo e(old('username')); ?>"
                        placeholder="Masukkan username"
                        required
                        class="w-full px-5 py-3 rounded-xl border-2 border-gray-200 focus:border-[#D4A017] focus:ring-2 focus:ring-[#D4A017]/20 transition-all">

                    <p class="mt-1 text-xs text-gray-500">
                        Username digunakan untuk login selain email
                    </p>
                </div>

                <!-- JABATAN -->
                <div>
                    <label class="mb-1.5 block text-sm font-medium text-gray-700">
                        Jabatan
                    </label>

                    <input
                        type="text"
                        name="jabatan"
                        value="<?php echo e(old('jabatan')); ?>"
                        placeholder="Masukkan jabatan"
                        class="w-full px-5 py-3 rounded-xl border-2 border-gray-200 focus:border-[#D4A017] focus:ring-2 focus:ring-[#D4A017]/20 transition-all">
                </div>

                <!-- DIVISI -->
                <div>
                    <label class="mb-1.5 block text-sm font-medium text-gray-700">
                        Divisi / Unit Kerja
                        <span class="text-red-500">*</span>
                    </label>

                    <select
                        name="divisi"
                        required
                        class="w-full px-5 py-3 rounded-xl border-2 border-gray-200 bg-white focus:border-[#D4A017] focus:ring-2 focus:ring-[#D4A017]/20 transition-all">

                        <option value="">Pilih Divisi</option>

                        <option value="BPSDM Imigrasi dan Pemasyarakatan"
                            <?php echo e(old('divisi') == 'BPSDM Imigrasi dan Pemasyarakatan' ? 'selected' : ''); ?>>
                            BPSDM Imigrasi dan Pemasyarakatan
                        </option>

                        <option value="Pusat Pelatihan"
                            <?php echo e(old('divisi') == 'Pusat Pelatihan' ? 'selected' : ''); ?>>
                            Pusat Pelatihan
                        </option>

                        <option value="Pusat Pengembangan dan Penilaian Kompetensi"
                            <?php echo e(old('divisi') == 'Pusat Pengembangan dan Penilaian Kompetensi' ? 'selected' : ''); ?>>
                            Pusat Pengembangan dan Penilaian Kompetensi
                        </option>

                        <option value="Bagian Umum"
                            <?php echo e(old('divisi') == 'Bagian Umum' ? 'selected' : ''); ?>>
                            Bagian Umum / Pimpinan, Humas, & Protokol
                        </option>

                        <option value="Bagian Umum / Keuangan"
                            <?php echo e(old('divisi') == 'Bagian Umum / Keuangan' ? 'selected' : ''); ?>>
                            Bagian Umum / Keuangan
                        </option>

                        <option value="Bagian Umum / Data dan Informasi"
                            <?php echo e(old('divisi') == 'Bagian Umum / Data dan Informasi' ? 'selected' : ''); ?>>
                            Bagian Umum / Data dan Informasi
                        </option>

                        <option value="Bagian Umum / Perencanaan dan Kerja Sama"
                            <?php echo e(old('divisi') == 'Bagian Umum / Perencanaan dan Kerja Sama' ? 'selected' : ''); ?>>
                            Bagian Umum / Perencanaan dan Kerja Sama

                        <option value="Bagian Umum / Rumah Tangga"
                            <?php echo e(old('divisi') == 'Bagian Umum / Rumah Tangga' ? 'selected' : ''); ?>>
                            Bagian Umum / Rumah Tangga
                        </option>
                    </select>
                </div>

                <!-- ROLE -->
                <div>
                    <label class="mb-1.5 block text-sm font-medium text-gray-700">
                        Role / Hak Akses
                        <span class="text-red-500">*</span>
                    </label>

                    <select
                        name="role"
                        required
                        class="w-full px-5 py-3 rounded-xl border-2 border-gray-200 bg-white focus:border-[#D4A017] focus:ring-2 focus:ring-[#D4A017]/20 transition-all">

                        <option value="">Pilih Role</option>

                        <option value="admin"
                            <?php echo e(old('role') == 'admin' ? 'selected' : ''); ?>>
                            Admin
                        </option>

                        <option value="user"
                            <?php echo e(old('role') == 'user' ? 'selected' : ''); ?>>
                            User
                        </option>
                    </select>
                </div>

                <!-- EMAIL -->
                <div>
                    <label class="mb-1.5 block text-sm font-medium text-gray-700">
                        Email
                        <span class="text-red-500">*</span>
                    </label>

                    <input
                        type="email"
                        name="email"
                        value="<?php echo e(old('email')); ?>"
                        placeholder="nama@imipas.go.id"
                        required
                        class="w-full px-5 py-3 rounded-xl border-2 border-gray-200 focus:border-[#D4A017] focus:ring-2 focus:ring-[#D4A017]/20 transition-all">

                    <p class="mt-1 text-xs text-gray-500">
                        Gunakan email resmi @imipas.go.id
                    </p>
                </div>

                <!-- PASSWORD -->
                <div>
                    <label class="mb-1.5 block text-sm font-medium text-gray-700">
                        Password
                        <span class="text-red-500">*</span>
                    </label>

                    <input
                        type="password"
                        name="password"
                        placeholder="Minimal 8 karakter"
                        required
                        class="w-full px-5 py-3 rounded-xl border-2 border-gray-200 focus:border-[#D4A017] focus:ring-2 focus:ring-[#D4A017]/20 transition-all">

                    <p class="mt-1 text-xs text-gray-500">
                        Password akan disimpan dengan enkripsi bcrypt
                    </p>
                </div>

                <!-- KONFIRMASI PASSWORD -->
                <div>
                    <label class="mb-1.5 block text-sm font-medium text-gray-700">
                        Konfirmasi Password
                        <span class="text-red-500">*</span>
                    </label>

                    <input
                        type="password"
                        name="password_confirmation"
                        placeholder="Ulangi password"
                        required
                        class="w-full px-5 py-3 rounded-xl border-2 border-gray-200 focus:border-[#D4A017] focus:ring-2 focus:ring-[#D4A017]/20 transition-all">
                </div>

                <!-- BUTTON -->
                <div class="md:col-span-2 flex gap-4 pt-4 border-t border-gray-200 mt-4">

                    <a href="<?php echo e(route('admin.akun.index')); ?>"
                        class="flex-1 px-6 py-3 rounded-xl border-2 border-gray-200 text-gray-700 font-semibold text-center hover:bg-gray-50 transition-all">

                        Batal
                    </a>

                    <button
                        type="submit"
                        class="flex-1 btn-premium px-6 py-3 rounded-xl text-white font-semibold shadow-md flex items-center justify-center gap-2">

                        <svg class="w-5 h-5"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24">

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M12 4v16m8-8H4">
                            </path>
                        </svg>

                        Simpan Akun
                    </button>
                </div>
            </form>
        </div>
    </main>
</div>

<style>
    .btn-premium {
        background: linear-gradient(135deg, #0B3B5F, #0A2E4A);
        border: none;
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .btn-premium:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(11, 59, 95, 0.3);
    }
</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\RUMGABPSDMIMIPAS\RUMGABPSDMIMIPAS\resources\views/admin/akun/create.blade.php ENDPATH**/ ?>