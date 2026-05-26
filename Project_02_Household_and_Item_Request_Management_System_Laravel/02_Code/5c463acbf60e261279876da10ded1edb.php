<?php $__env->startSection('title', 'Sign In'); ?>

<?php $__env->startSection('content'); ?>
<div class="min-h-screen bg-gray-50 dark:bg-gray-950">
    <div class="flex min-h-screen">

        
        <div class="flex flex-col justify-center w-full px-6 py-10 lg:w-1/2 sm:px-10 lg:px-20">

            
            <div class="absolute top-6 left-6">
                <a href="<?php echo e(url('/')); ?>"
                    class="inline-flex items-center gap-2 text-sm font-medium text-gray-500 transition hover:text-[#0B3B5F] dark:text-gray-400 dark:hover:text-white">
                    <span class="text-lg">←</span>
                    Back to dashboard
                </a>
            </div>

            <div class="w-full max-w-md mx-auto">

                
                <div class="mb-8">
                    <div class="inline-flex items-center justify-center w-14 h-14 mb-5 rounded-2xl bg-gradient-to-br from-[#0B3B5F] to-[#0A2E4A] shadow-lg">
                        <span class="text-xl font-bold text-white">B</span>
                    </div>

                    <h1 class="mb-2 text-3xl font-bold tracking-tight text-gray-900 dark:text-white">
                        Sign In
                    </h1>

                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        Masuk untuk mengakses sistem pengelolaan BMN.
                    </p>
                </div>

                
                <?php if($errors->any()): ?>
                    <div class="p-4 mb-5 text-sm text-red-700 border border-red-200 rounded-xl bg-red-50">
                        <p class="font-semibold">Login gagal</p>
                        <ul class="mt-1 list-disc list-inside">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <?php if(session('error')): ?>
                    <div class="p-4 mb-5 text-sm text-red-700 border border-red-200 rounded-xl bg-red-50">
                        <?php echo e(session('error')); ?>

                    </div>
                <?php endif; ?>

                
                <form method="POST" action="<?php echo e(route('login.process')); ?>" class="space-y-5">
                    <?php echo csrf_field(); ?>

                    
<div>
    <label for="login" class="block mb-2 text-sm font-semibold text-gray-700 dark:text-gray-300">
        Email atau Username
    </label>

    <input type="text"
        id="login"
        name="login"
        value="<?php echo e(old('login')); ?>"
        required
        autofocus
        placeholder="Masukkan email atau username"
        class="w-full px-4 py-3 text-sm text-gray-800 transition bg-white border border-gray-200 rounded-xl focus:border-[#0B3B5F] focus:ring-4 focus:ring-[#0B3B5F]/10 outline-none dark:bg-gray-900 dark:border-gray-700 dark:text-white dark:placeholder-gray-500">
</div>

                    
                    <div>
                        <label for="password" class="block mb-2 text-sm font-semibold text-gray-700 dark:text-gray-300">
                            Password
                        </label>

                        <input type="password"
                            id="password"
                            name="password"
                            required
                            placeholder="Masukkan password"
                            class="w-full px-4 py-3 text-sm text-gray-800 transition bg-white border border-gray-200 rounded-xl focus:border-[#0B3B5F] focus:ring-4 focus:ring-[#0B3B5F]/10 outline-none dark:bg-gray-900 dark:border-gray-700 dark:text-white dark:placeholder-gray-500">
                    </div>

                    
                    <div class="flex items-center justify-between">
                        <label class="flex items-center gap-2 text-sm text-gray-600 dark:text-gray-400">
                            <input type="checkbox"
                                name="remember"
                                class="w-4 h-4 rounded border-gray-300 text-[#0B3B5F] focus:ring-[#0B3B5F]">
                            Remember me
                        </label>

                        <a href="#"
                            class="text-sm font-medium text-[#0B3B5F] hover:underline">
                            Forgot password?
                        </a>
                    </div>

                    
                    <button type="submit"
                        class="w-full px-5 py-3 text-sm font-semibold text-white transition rounded-xl bg-gradient-to-r from-[#0B3B5F] to-[#0A2E4A] shadow-lg hover:shadow-xl hover:-translate-y-0.5">
                        Sign In
                    </button>
                </form>

                
                <p class="mt-6 text-sm text-center text-gray-500 dark:text-gray-400">
                    Belum punya akun?
                    <a href="#"
                        class="font-semibold text-[#0B3B5F] hover:underline">
                        Hubungi Admin
                    </a>
                </p>
            </div>
        </div>

        
        <div class="relative hidden w-1/2 overflow-hidden lg:flex bg-gradient-to-br from-[#0B3B5F] via-[#0A2E4A] to-gray-950">
            <div class="absolute w-72 h-72 rounded-full -top-16 -right-16 bg-[#D4A017]/20 blur-3xl"></div>
            <div class="absolute w-72 h-72 rounded-full -bottom-20 -left-20 bg-white/10 blur-3xl"></div>

            <div class="relative z-10 flex flex-col justify-center max-w-md px-12 mx-auto text-white">
                <div class="mb-8">
                    <div class="inline-flex items-center justify-center w-16 h-16 mb-6 rounded-3xl bg-white/10 backdrop-blur border border-white/10">
                        <span class="text-3xl">📦</span>
                    </div>

                    <h2 class="mb-4 text-4xl font-bold leading-tight">
                        Welcome Back
                    </h2>

                    <p class="text-base leading-relaxed text-white/70">
                        Kelola data stock, pengajuan, dan pengadaan barang secara lebih rapi, aman, dan terkontrol.
                    </p>
                </div>

                <div class="grid gap-4">
                    <div class="p-4 border rounded-2xl bg-white/10 border-white/10 backdrop-blur">
                        <p class="text-sm font-semibold">Manajemen Stock</p>
                        <p class="mt-1 text-xs text-white/60">Pantau jumlah barang dan status ketersediaan.</p>
                    </div>

                    <div class="p-4 border rounded-2xl bg-white/10 border-white/10 backdrop-blur">
                        <p class="text-sm font-semibold">Pengadaan Barang</p>
                        <p class="mt-1 text-xs text-white/60">Tambah barang baru atau update stok lama.</p>
                    </div>

                    <div class="p-4 border rounded-2xl bg-white/10 border-white/10 backdrop-blur">
                        <p class="text-sm font-semibold">Akses Berbasis Role</p>
                        <p class="mt-1 text-xs text-white/60">Admin dan staf memiliki hak akses berbeda.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.sign', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\RUMGABPSDMIMIPAS\RUMGABPSDMIMIPAS\resources\views/sign/sign-in.blade.php ENDPATH**/ ?>