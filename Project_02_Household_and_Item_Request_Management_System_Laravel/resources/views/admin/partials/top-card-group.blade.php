<div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
    <!-- Card Top Channels -->
    <div class="premium-card shadow-md">
        <div class="p-5 border-b border-gray-100 bg-gradient-to-r from-white to-gray-50">
            <div class="flex items-start justify-between">
                <h3 class="text-lg font-bold text-[#0B3B5F] flex items-center gap-2">
                    <div class="w-1 h-5 bg-[#D4A017] rounded-full"></div>
                    Top Channels
                </h3>
                <div x-data="{openDropDown: false}" class="relative">
                    <button @click="openDropDown = !openDropDown" class="text-gray-400 hover:text-[#D4A017] transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 8c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm0 2c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/>
                        </svg>
                    </button>
                    <div x-show="openDropDown" @click.outside="openDropDown = false"
                         class="absolute right-0 top-full z-40 w-40 rounded-xl border border-gray-200 bg-white p-2 shadow-lg dark:border-gray-700 dark:bg-gray-800">
                        <button class="w-full rounded-lg px-3 py-2 text-left text-xs text-gray-600 hover:bg-[#F5E6B8] hover:text-[#0B3B5F]">Lihat Detail</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="p-5">
            <div class="flex items-center justify-between border-b border-gray-100 pb-3">
                <span class="text-xs text-gray-400">Sumber</span>
                <span class="text-xs text-gray-400">Pengunjung</span>
            </div>
            <div class="space-y-3 mt-3">
                <div class="flex items-center justify-between py-2">
                    <span class="text-sm text-gray-600">Website Resmi</span>
                    <span class="text-sm font-semibold text-[#0B3B5F]">4.7K</span>
                </div>
                <div class="flex items-center justify-between py-2 border-t border-gray-100">
                    <span class="text-sm text-gray-600">Portal Internal</span>
                    <span class="text-sm font-semibold text-[#0B3B5F]">3.4K</span>
                </div>
                <div class="flex items-center justify-between py-2 border-t border-gray-100">
                    <span class="text-sm text-gray-600">Aplikasi Mobile</span>
                    <span class="text-sm font-semibold text-[#0B3B5F]">2.9K</span>
                </div>
            </div>
        </div>
        <div class="border-t border-gray-100 p-4 bg-gray-50/30">
            <a href="#" class="flex items-center justify-center gap-2 text-sm font-medium text-[#D4A017] hover:text-[#B8920E] transition-colors">
                Laporan Lengkap
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </a>
        </div>
    </div>

    <!-- Card Top Pages -->
    <div class="premium-card shadow-md">
        <div class="p-5 border-b border-gray-100 bg-gradient-to-r from-white to-gray-50">
            <div class="flex items-start justify-between">
                <h3 class="text-lg font-bold text-[#0B3B5F] flex items-center gap-2">
                    <div class="w-1 h-5 bg-[#D4A017] rounded-full"></div>
                    Top Pages
                </h3>
                <div x-data="{openDropDown: false}" class="relative">
                    <button @click="openDropDown = !openDropDown" class="text-gray-400 hover:text-[#D4A017] transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 8c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm0 2c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <div class="p-5">
            <div class="flex items-center justify-between border-b border-gray-100 pb-3">
                <span class="text-xs text-gray-400">Halaman</span>
                <span class="text-xs text-gray-400">Kunjungan</span>
            </div>
            <div class="space-y-3 mt-3">
                <div class="flex items-center justify-between py-2">
                    <span class="text-sm text-gray-600">Dashboard Utama</span>
                    <span class="text-sm font-semibold text-[#0B3B5F]">12.5K</span>
                </div>
                <div class="flex items-center justify-between py-2 border-t border-gray-100">
                    <span class="text-sm text-gray-600">Halaman Pengajuan</span>
                    <span class="text-sm font-semibold text-[#0B3B5F]">8.3K</span>
                </div>
                <div class="flex items-center justify-between py-2 border-t border-gray-100">
                    <span class="text-sm text-gray-600">Halaman Stock</span>
                    <span class="text-sm font-semibold text-[#0B3B5F]">6.2K</span>
                </div>
            </div>
        </div>
        <div class="border-t border-gray-100 p-4 bg-gray-50/30">
            <a href="#" class="flex items-center justify-center gap-2 text-sm font-medium text-[#D4A017] hover:text-[#B8920E] transition-colors">
                Laporan Lengkap
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </a>
        </div>
    </div>
</div>

<style>
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
</style>