<aside :class="sidebarToggle ? 'translate-x-0 lg:w-[90px]' : '-translate-x-full'"
    class="sidebar fixed left-0 top-0 z-9999 flex h-screen w-[280px] flex-col overflow-y-hidden bg-gradient-to-b from-[#0B3B5F] to-[#0A2E4A] shadow-xl lg:static lg:translate-x-0">

    <!-- SIDEBAR HEADER -->
    <div :class="sidebarToggle ? 'justify-center' : 'justify-between'"
        class="px-4 pt-6 pb-5 border-b border-white/10">

        <a href="<?php echo e(url('user/')); ?>" class="block">

            <!-- Expanded Logo -->
            <div :class="sidebarToggle ? 'lg:hidden' : 'block'"
                class="rounded-2xl border border-white/10 bg-white/[0.06] p-4 shadow-lg">

                <div class="flex items-center gap-3">
                    <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-white shadow-md">
                        <img
                            src="<?php echo e(asset('tailadmin/src/images/logo/logo-kemenimipas.png')); ?>"
                            alt="Logo Kemenimipas"
                            class="h-9 w-9 object-contain">
                    </div>

                    <div class="min-w-0">
                        <h1 class="truncate text-lg font-extrabold tracking-wide text-white">
                            KEMENIMIPAS
                        </h1>
                        <p class="mt-1 text-[10px] leading-4 text-white/60">
                            Kementerian Imigrasi & Pemasyarakatan
                        </p>
                    </div>
                </div>

                <div class="my-3 h-px bg-white/10"></div>

                <div class="flex items-center gap-3">
                    <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-white shadow-md">
                        <img
                            src="<?php echo e(asset('tailadmin/src/images/logo/logo-bpsdm.png')); ?>"
                            alt="Logo BPSDM"
                            class="h-9 w-9 object-contain">
                    </div>

                    <div class="min-w-0">
                        <h2 class="truncate text-lg font-extrabold tracking-wide text-white">
                            BPSDM
                        </h2>
                        <p class="mt-1 text-[10px] leading-4 text-white/60">
                            Badan Pengembangan Sumber Daya Manusia
                        </p>
                    </div>
                </div>
            </div>

            <!-- Collapsed Logo -->
            <div :class="sidebarToggle ? 'lg:flex hidden' : 'hidden'"
                class="flex flex-col items-center gap-3">

                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-white shadow-md">
                    <img
                        src="<?php echo e(asset('tailadmin/src/images/logo/logo-kemenimipas.png')); ?>"
                        alt="Logo Kemenimipas"
                        class="h-9 w-9 object-contain">
                </div>

                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-white shadow-md">
                    <img
                        src="<?php echo e(asset('tailadmin/src/images/logo/logo-bpsdm.png')); ?>"
                        alt="Logo BPSDM"
                        class="h-9 w-9 object-contain">
                </div>
            </div>
        </a>
    </div>

    <!-- USER PROFILE -->
    <div :class="sidebarToggle ? 'justify-center' : 'justify-between'"
        class="flex items-center gap-3 mx-3 mt-5 p-3 rounded-xl bg-white/5 border border-white/10">

        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-[#D4A017] to-[#B8920E] flex items-center justify-center shadow-md">
                <span class="text-white font-bold text-sm">
                    <?php echo e(strtoupper(substr(Auth::user()->name ?? 'U', 0, 1))); ?>

                </span>
            </div>

            <div :class="sidebarToggle ? 'lg:hidden' : ''">
                <p class="text-sm font-semibold text-white">
                    <?php echo e(Auth::user()->name ?? 'User BPSDM'); ?>

                </p>

                <p class="text-[10px] text-white/50">
                    <?php echo e(Auth::user()->divisi ?? 'User'); ?>

                </p>
            </div>
        </div>

        <div :class="sidebarToggle ? 'lg:hidden' : ''">
            <div class="w-2 h-2 rounded-full bg-green-400"></div>
        </div>
    </div>

    <!-- MENU -->
    <div class="flex flex-col overflow-y-auto duration-300 ease-linear no-scrollbar px-3 py-4">
        <nav x-data="{selected: $persist('Dashboard')}">

            <div class="mb-6">
                <h3 class="mb-3 text-[10px] font-semibold uppercase tracking-wider text-white/40">
                    <span :class="sidebarToggle ? 'lg:hidden' : ''">
                        MENU UTAMA
                    </span>

                    <svg :class="sidebarToggle ? 'lg:block hidden' : 'hidden'"
                        class="mx-auto w-4 h-4 text-white/40"
                        fill="currentColor"
                        viewBox="0 0 24 24">

                        <path d="M4 6h16v2H4V6zm0 5h16v2H4v-2zm0 5h16v2H4v-2z" />
                    </svg>
                </h3>

                <ul class="flex flex-col gap-1">

                    <!-- Riwayat Pengajuan -->
                    <li>
                        <a href="<?php echo e(url('user/pengajuan')); ?>"
                            class="group flex items-center gap-3 rounded-xl px-4 py-3 transition-all duration-200
                            <?php echo e(request()->is('user/pengajuan') ? 'bg-white/10 text-white' : 'text-white/70 hover:bg-white/10 hover:text-white'); ?>">

                            <div class="w-8 h-8 rounded-lg bg-white/5 flex items-center justify-center group-hover:bg-[#D4A017]/20">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>

                            <span :class="sidebarToggle ? 'lg:hidden' : ''" class="text-sm font-medium">
                                Riwayat Pengajuan
                            </span>
                        </a>
                    </li>

                    <!-- Tambah Pengajuan -->
                    <li>
                        <a href="<?php echo e(url('user/pengajuan/create')); ?>"
                            class="group flex items-center gap-3 rounded-xl px-4 py-3 transition-all duration-200
                            <?php echo e(request()->is('user/pengajuan/create') ? 'bg-white/10 text-white' : 'text-white/70 hover:bg-white/10 hover:text-white'); ?>">

                            <div class="w-8 h-8 rounded-lg bg-white/5 flex items-center justify-center group-hover:bg-[#D4A017]/20">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 4v16m8-8H4" />
                                </svg>
                            </div>

                            <span :class="sidebarToggle ? 'lg:hidden' : ''" class="text-sm font-medium">
                                Permohonan
                            </span>
                        </a>
                    </li>

                    <!-- Riwayat Pengadaan -->
                    <li>
                        <a href="<?php echo e(url('user/pengadaan')); ?>"
                            class="group flex items-center gap-3 rounded-xl px-4 py-3 transition-all duration-200
                            <?php echo e(request()->is('user/pengadaan') ? 'bg-white/10 text-white' : 'text-white/70 hover:bg-white/10 hover:text-white'); ?>">

                            <div class="w-8 h-8 rounded-lg bg-white/5 flex items-center justify-center group-hover:bg-[#D4A017]/20">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                </svg>
                            </div>

                            <span :class="sidebarToggle ? 'lg:hidden' : ''" class="text-sm font-medium">
                                Riwayat Pengadaan
                            </span>
                        </a>
                    </li>

                    <!-- Tambah Pengadaan -->
                    <li>
                        <a href="<?php echo e(url('user/pengadaan/create')); ?>"
                            class="group flex items-center gap-3 rounded-xl px-4 py-3 transition-all duration-200
                            <?php echo e(request()->is('user/pengadaan/create') ? 'bg-white/10 text-white' : 'text-white/70 hover:bg-white/10 hover:text-white'); ?>">

                            <div class="w-8 h-8 rounded-lg bg-white/5 flex items-center justify-center group-hover:bg-[#D4A017]/20">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 4v16m8-8H4" />
                                </svg>
                            </div>

                            <span :class="sidebarToggle ? 'lg:hidden' : ''" class="text-sm font-medium">
                                Tambah Pengadaan Barang
                            </span>
                        </a>
                    </li>

                </ul>
            </div>
        </nav>
    </div>

    <!-- FOOTER -->
    <div class="mt-auto p-4 border-t border-white/10">
        <div class="text-center">
            <div :class="sidebarToggle ? 'lg:hidden' : ''">
                <p class="text-[10px] text-white/30">
                    Badan Pengembangan Sumber Daya Manusia
                </p>

                <p class="text-[10px] text-white/20 mt-1">
                    Kementerian Imigrasi & Pemasyarakatan
                </p>
            </div>

            <div :class="sidebarToggle ? 'lg:block hidden' : 'hidden'">
                <p class="text-[8px] text-white/30">
                    BPSDM
                </p>
            </div>

            <p class="text-[10px] text-white/20 mt-2">
                &copy; 2026
            </p>
        </div>
    </div>
</aside>

<style>
    .no-scrollbar::-webkit-scrollbar {
        display: none;
    }

    .no-scrollbar {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
</style><?php /**PATH E:\RUMGABPSDMIMIPAS\RUMGABPSDMIMIPAS\resources\views/user/partials/sidebar.blade.php ENDPATH**/ ?>