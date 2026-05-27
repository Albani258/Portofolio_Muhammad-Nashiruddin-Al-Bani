<div class="premium-card shadow-md">
    <div class="p-5 border-b border-gray-100 bg-gradient-to-r from-white to-gray-50">
        <div class="flex items-center justify-between">
            <h3 class="text-lg font-bold text-[#0B3B5F] flex items-center gap-2">
                <div class="w-1 h-5 bg-[#D4A017] rounded-full"></div>
                Daftar Pantauan Barang
            </h3>
            <div x-data="{openDropDown: false}" class="relative">
                <button @click="openDropDown = !openDropDown" class="text-gray-400 hover:text-[#D4A017] transition-colors">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 8c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm0 2c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/>
                    </svg>
                </button>
            </div>
        </div>
        <p class="text-xs text-gray-500 mt-1">Barang dengan permintaan terbanyak</p>
    </div>

    <div class="p-5">
        <div class="space-y-4">
            <!-- Item 1 -->
            <div class="flex items-center justify-between pb-4 border-b border-gray-100">
                <div>
                    <h4 class="font-semibold text-gray-800">Sepatu Running Pro</h4>
                    <span class="text-xs text-gray-500">Footwear - 120 stok</span>
                </div>
                <div class="text-right">
                    <p class="text-sm font-bold text-green-600">+15%</p>
                    <span class="text-xs text-gray-400">5 permintaan</span>
                </div>
            </div>

            <!-- Item 2 -->
            <div class="flex items-center justify-between pb-4 border-b border-gray-100">
                <div>
                    <h4 class="font-semibold text-gray-800">Kaos Olahraga Dri-Fit</h4>
                    <span class="text-xs text-gray-500">Apparel - 80 stok</span>
                </div>
                <div class="text-right">
                    <p class="text-sm font-bold text-green-600">+12%</p>
                    <span class="text-xs text-gray-400">4 permintaan</span>
                </div>
            </div>

            <!-- Item 3 -->
            <div class="flex items-center justify-between pb-4 border-b border-gray-100">
                <div>
                    <h4 class="font-semibold text-gray-800">Tas Gym Active</h4>
                    <span class="text-xs text-gray-500">Accessories - 30 stok</span>
                </div>
                <div class="text-right">
                    <p class="text-sm font-bold text-yellow-600">-5%</p>
                    <span class="text-xs text-gray-400">3 permintaan</span>
                </div>
            </div>

            <!-- Item 4 -->
            <div class="flex items-center justify-between">
                <div>
                    <h4 class="font-semibold text-gray-800">Topi Olahraga UV</h4>
                    <span class="text-xs text-gray-500">Accessories - 45 stok</span>
                </div>
                <div class="text-right">
                    <p class="text-sm font-bold text-green-600">+8%</p>
                    <span class="text-xs text-gray-400">3 permintaan</span>
                </div>
            </div>
        </div>
    </div>

    <div class="border-t border-gray-100 p-4 bg-gray-50/30">
        <a href="{{ url('admin/pengajuan') }}" class="flex items-center justify-center gap-2 text-sm font-medium text-[#D4A017] hover:text-[#B8920E] transition-colors">
            Lihat Semua Pengajuan
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
        </a>
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