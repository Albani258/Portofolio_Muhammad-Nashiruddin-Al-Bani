<header x-data="{menuToggle: false}"
    class="sticky top-0 z-50 flex w-full bg-white shadow-md dark:bg-gray-900">
    <div class="flex grow flex-col items-center justify-between lg:flex-row lg:px-6">

        <!-- Top Bar -->
        <div class="flex w-full items-center justify-between gap-2 px-4 py-3 lg:justify-normal lg:px-0 lg:py-4">

            <!-- Hamburger Toggle BTN -->
            <button :class="sidebarToggle ? 'bg-[#D4A017]/10 text-[#D4A017]' : 'text-gray-500 hover:bg-[#D4A017]/10 hover:text-[#D4A017]'"
                class="flex h-10 w-10 items-center justify-center rounded-xl transition-all duration-200 lg:h-11 lg:w-11"
                @click.stop="sidebarToggle = !sidebarToggle">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>

            <!-- Logo Desktop -->
            <a href="<?php echo e(url('admin/dashboard')); ?>" class="hidden lg:flex lg:items-center lg:gap-3">
                <div class="flex items-center gap-3">
                    <!-- Logo Kemenimipas -->

                    <div class="border-l border-gray-300 h-8 mx-1"></div>
                    <!-- Logo BPSDM -->
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-[#D4A017] to-[#B8920E] flex items-center justify-center shadow-md">
                        <span class="text-white font-bold text-sm">B</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-bold text-gray-800 dark:text-white text-sm">KEMENTERIAN IMIGRASI & PEMASYARAKATAN</span>
                        <span class="text-[10px] text-gray-400">BADAN PENGEMBANGAN SUMBER DAYA MANUSIA</span>
                    </div>
                </div>
            </a>

            <!-- Logo Mobile -->
            <a href="<?php echo e(url('admin/dashboard')); ?>" class="lg:hidden flex items-center gap-2">
                <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-[#0B3B5F] to-[#0A2E4A] flex items-center justify-center">
                    <span class="text-white font-bold text-sm">K</span>
                </div>
                <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-[#D4A017] to-[#B8920E] flex items-center justify-center">
                    <span class="text-white font-bold text-sm">B</span>
                </div>
                <span class="font-bold text-[#0B3B5F] dark:text-white text-xs">BPSDM KEMENIMIPAS</span>
            </a>


            <!-- Right Side Icons - DI SEBELAH KANAN (Posisi seperti panah) -->
            <div class="flex items-center gap-2 ml-auto">

                <!-- Dashboard Label - DIGESER KE KANAN (seperti panah) -->
                <div class="hidden lg:block text-right mr-2">
                    <p class="text-xs font-semibold text-[#D4A017]">Dashboard BPSDM</p>
                    <p class="text-[9px] text-gray-500">Administrator</p>
                </div>

                <!-- Dark Mode Toggler -->
                <button class="flex h-9 w-9 items-center justify-center rounded-xl border border-gray-200 bg-white text-gray-500 transition-all hover:bg-[#D4A017]/10 hover:text-[#D4A017] dark:border-gray-700 dark:bg-gray-800"
                    @click.prevent="darkMode = !darkMode">
                    <svg class="dark:hidden w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    <svg class="hidden dark:block w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                    </svg>
                </button>

                <!-- User Profile -->
                <div class="relative" x-data="{ dropdownOpen: false }" @click.outside="dropdownOpen = false">
                    <?php
                    $initials = strtoupper(substr(auth()->user()->name ?? 'U', 0, 1));
                    ?>

                    <button @click="dropdownOpen = !dropdownOpen"
                        class="flex items-center gap-2 rounded-xl p-1 hover:bg-gray-100 transition-all">

                        <div class="h-8 w-8 rounded-full bg-gradient-to-br from-[#0B3B5F] to-[#D4A017] flex items-center justify-center shadow-md">
                            <span class="text-xs font-bold text-white">
                                <?php echo e($initials); ?>

                            </span>
                        </div>

                        <svg class="hidden lg:block w-3 h-3 text-gray-500 transition-transform"
                            :class="dropdownOpen ? 'rotate-180' : ''"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>

                    <!-- User Dropdown -->
                    <div x-show="dropdownOpen" x-cloak
                        class="absolute right-0 mt-2 w-56 rounded-xl border border-gray-200 bg-white shadow-lg dark:border-gray-700 dark:bg-gray-800 z-50">
                        <div class="border-b border-gray-100 px-4 py-3 dark:border-gray-700">
                            <p class="font-semibold text-gray-800 dark:text-white">Admin BPSDM</p>
                            <p class="text-xs text-gray-500 mt-0.5">admin@bpsdm.imipas.go.id</p>
                        </div>
                        <!-- <div class="p-1">
                            <a href="#" class="flex items-center gap-3 rounded-lg px-3 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                Profil Saya
                            </a>
                            <a href="#" class="flex items-center gap-3 rounded-lg px-3 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                </svg>
                                Pengaturan
                            </a>
                        </div> -->
                        <div class="border-t border-gray-100 p-1 dark:border-gray-700">
                            <form method="POST" action="<?php echo e(route('logout')); ?>">
                                <?php echo csrf_field(); ?>

                                <button type="submit"
                                    class="flex w-full items-center gap-3 rounded-lg px-3 py-2 text-sm text-red-600 hover:bg-red-50">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                    </svg>

                                    Keluar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Mobile Menu Button -->
                <button class="flex h-9 w-9 items-center justify-center rounded-xl text-gray-500 hover:bg-[#D4A017]/10 hover:text-[#D4A017] lg:hidden"
                    :class="menuToggle ? 'bg-[#D4A017]/10 text-[#D4A017]' : ''"
                    @click.stop="menuToggle = !menuToggle">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu Dropdown -->
        <div :class="menuToggle ? 'flex' : 'hidden'"
            class="w-full flex-col gap-3 px-4 pb-4 lg:hidden">

            <!-- Search Bar Mobile -->
            <div class="relative">
                <span class="absolute top-1/2 left-4 -translate-y-1/2">
                    <svg class="text-gray-400 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </span>
                <input type="text" placeholder="Cari..."
                    class="w-full rounded-xl border border-gray-200 bg-gray-50 py-2.5 pl-10 pr-4 text-sm focus:border-[#D4A017] focus:outline-none focus:ring-2 focus:ring-[#D4A017]/20">
            </div>


        </div>
    </div>
</header>

<style>
    [x-cloak] {
        display: none !important;
    }
</style><?php /**PATH /home/mclarens-username/Downloads/BMN-VS2/resources/views/admin/partials/header.blade.php ENDPATH**/ ?>