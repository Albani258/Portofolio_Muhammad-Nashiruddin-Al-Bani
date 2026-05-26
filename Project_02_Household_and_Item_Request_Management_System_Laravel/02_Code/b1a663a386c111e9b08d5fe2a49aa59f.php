<aside :class="sidebarToggle ? 'translate-x-0 lg:w-[90px]' : '-translate-x-full'"
    class="sidebar fixed left-0 top-0 z-9999 flex h-screen w-[280px] flex-col overflow-y-hidden bg-gradient-to-b from-[#0B3B5F] to-[#0A2E4A] shadow-xl lg:static lg:translate-x-0">

    <!-- SIDEBAR HEADER - Dipanjangkan (Ungu) -->
    <div :class="sidebarToggle ? 'justify-center' : 'justify-between'"
        class="flex items-center gap-2 pt-8 pb-7 px-5 border-b border-white/10">
        <a href="<?php echo e(url('admin/')); ?>" class="flex items-center gap-2">
            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-[#D4A017] to-[#B8920E] flex items-center justify-center shadow-lg">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
            </div>
            <div :class="sidebarToggle ? 'lg:hidden' : ''">
                <span class="text-white font-bold text-lg">KEMENIMIPAS</span>
                <p class="text-[10px] text-white/60">Badan Pengembangan Sumber Daya Manusia - Rumah Tangga</p>
            </div>
        </a>
    </div>

    <!-- User Profile Summary - DIPINDAHKAN KE POSISI SEBELUMNYA (Merah) -->
    <div :class="sidebarToggle ? 'justify-center' : 'justify-between'"
        class="flex items-center gap-3 mx-3 mt-5 p-3 rounded-xl bg-white/5 border border-white/10">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-[#D4A017] to-[#B8920E] flex items-center justify-center shadow-md">
                <span class="text-white font-bold text-sm">A</span>
            </div>
            <div :class="sidebarToggle ? 'lg:hidden' : ''">
                <p class="text-sm font-semibold text-white">
                    <?php echo e(Auth::user()->name ?? 'Admin BPSDM'); ?>

                </p>

                <p class="text-[10px] text-white/50">
                    <?php echo e(Auth::user()->divisi ?? 'Administrator'); ?>

                </p>
            </div>
        </div>
        <div :class="sidebarToggle ? 'lg:hidden' : ''">
            <div class="w-2 h-2 rounded-full bg-green-400"></div>
        </div>
    </div>

    <div class="flex flex-col overflow-y-auto duration-300 ease-linear no-scrollbar px-3 py-4">
        <nav x-data="{selected: $persist('Dashboard')}">

            <!-- MENU UTAMA Group -->
            <div class="mb-6">
                <h3 class="mb-3 text-[10px] font-semibold uppercase tracking-wider text-white/40">
                    <span :class="sidebarToggle ? 'lg:hidden' : ''">MENU UTAMA</span>
                    <svg :class="sidebarToggle ? 'lg:block hidden' : 'hidden'" class="mx-auto w-4 h-4 text-white/40" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M4 6h16v2H4V6zm0 5h16v2H4v-2zm0 5h16v2H4v-2z" />
                    </svg>
                </h3>
                <ul class="flex flex-col gap-1">
                    <!-- Dashboard -->
                    <li>
                        <a href="<?php echo e(url('admin/')); ?>"
                            class="group flex items-center gap-3 rounded-xl px-4 py-3 text-white/70 hover:bg-white/10 hover:text-white transition-all duration-200">
                            <div class="w-8 h-8 rounded-lg bg-white/5 flex items-center justify-center group-hover:bg-[#D4A017]/20">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                </svg>
                            </div>
                            <span :class="sidebarToggle ? 'lg:hidden' : ''" class="text-sm font-medium">Dashboard</span>
                        </a>
                    </li>

                    <!-- Stock Barang -->
                    <li>
                        <a href="<?php echo e(url('admin/stock')); ?>"
                            class="group flex items-center gap-3 rounded-xl px-4 py-3 text-white/70 hover:bg-white/10 hover:text-white transition-all duration-200">
                            <div class="w-8 h-8 rounded-lg bg-white/5 flex items-center justify-center group-hover:bg-[#D4A017]/20">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                </svg>
                            </div>
                            <span :class="sidebarToggle ? 'lg:hidden' : ''" class="text-sm font-medium">Stock Barang</span>
                        </a>
                    </li>

                    <!-- Pengajuan -->
                    <li>
                        <a href="<?php echo e(url('admin/pengajuan')); ?>"
                            class="group flex items-center gap-3 rounded-xl px-4 py-3 text-white/70 hover:bg-white/10 hover:text-white transition-all duration-200">
                            <div class="w-8 h-8 rounded-lg bg-white/5 flex items-center justify-center group-hover:bg-[#D4A017]/20">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                            <span :class="sidebarToggle ? 'lg:hidden' : ''" class="text-sm font-medium">Pengajuan</span>
                        </a>
                    </li>
                    <!-- Pengadaan -->
                    <li>
                        <a href="<?php echo e(url('admin/permintaan_user')); ?>"
                            class="group flex items-center gap-3 rounded-xl px-4 py-3 text-white/70 hover:bg-white/10 hover:text-white transition-all duration-200">
                            <div class="w-8 h-8 rounded-lg bg-white/5 flex items-center justify-center group-hover:bg-[#D4A017]/20">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                </svg>
                            </div>
                            <span :class="sidebarToggle ? 'lg:hidden' : ''" class="text-sm font-medium">Permintaan User</span>
                        </a>
                    </li>
                    <!-- Pengadaan -->
                    <li>
                        <a href="<?php echo e(url('admin/pengadaan')); ?>"
                            class="group flex items-center gap-3 rounded-xl px-4 py-3 text-white/70 hover:bg-white/10 hover:text-white transition-all duration-200">
                            <div class="w-8 h-8 rounded-lg bg-white/5 flex items-center justify-center group-hover:bg-[#D4A017]/20">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                </svg>
                            </div>
                            <span :class="sidebarToggle ? 'lg:hidden' : ''" class="text-sm font-medium">Pengadaan</span>
                        </a>
                    </li>
                </ul>

            </div>

            <!-- Manajemen Akun - Dropdown -->
            <div class="mb-6">
                <ul class="flex flex-col gap-1">
                    <li x-data="{ open: false }">
                        <a @click.prevent="open = !open"
                            class="group flex items-center justify-between rounded-xl px-4 py-3 text-white/70 hover:bg-white/10 hover:text-white transition-all duration-200 cursor-pointer">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-lg bg-white/5 flex items-center justify-center group-hover:bg-[#D4A017]/20">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                    </svg>
                                </div>
                                <span :class="sidebarToggle ? 'lg:hidden' : ''" class="text-sm font-medium">Manajemen Akun</span>
                            </div>
                            <svg :class="open ? 'rotate-180' : ''" class="w-4 h-4 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </a>
                        <div x-show="open" x-collapse class="ml-9 mt-1 space-y-1">
                            <a href="<?php echo e(url('admin/akun')); ?>" class="flex items-center rounded-lg px-3 py-2 text-xs text-white/50 hover:bg-white/10 hover:text-white transition-all">Akun</a>
                            <a href="<?php echo e(url('admin/akun/create')); ?>" class="flex items-center rounded-lg px-3 py-2 text-xs text-white/50 hover:bg-white/10 hover:text-white transition-all">Tambah Akun</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <!-- Footer Sidebar - DIPERLANJARKAN (Ungu) -->
    <div class="mt-auto p-4 border-t border-white/10">
        <div class="text-center">
            <div :class="sidebarToggle ? 'lg:hidden' : ''">
                <p class="text-[10px] text-white/30">Badan Pengembangan Sumber Daya Manusia</p>
                <p class="text-[10px] text-white/20 mt-1">Kementerian Imigrasi & Pemasyarakatan</p>
            </div>
            <div :class="sidebarToggle ? 'lg:block hidden' : 'hidden'">
                <p class="text-[8px] text-white/30">BPSDM</p>
            </div>
            <p class="text-[10px] text-white/20 mt-2">&copy; 2024</p>
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
</style><?php /**PATH /home/mclarens-username/Downloads/BMN-VS2/resources/views/admin/partials/sidebar.blade.php ENDPATH**/ ?>