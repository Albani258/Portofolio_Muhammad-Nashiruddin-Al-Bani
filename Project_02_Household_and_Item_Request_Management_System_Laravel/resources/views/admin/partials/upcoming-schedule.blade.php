<div class="premium-card shadow-md">
    <div class="p-5 border-b border-gray-100 bg-gradient-to-r from-white to-gray-50">
        <div class="flex items-center justify-between">
            <h3 class="text-lg font-bold text-[#0B3B5F] flex items-center gap-2">
                <div class="w-1 h-5 bg-[#D4A017] rounded-full"></div>
                Jadwal Kegiatan
            </h3>
            <div x-data="{openDropDown: false}" class="relative">
                <button @click="openDropDown = !openDropDown" class="text-gray-400 hover:text-[#D4A017] transition-colors">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 8c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm0 2c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/>
                    </svg>
                </button>
            </div>
        </div>
        <p class="text-xs text-gray-500 mt-1">Kegiatan mendatang yang perlu diselesaikan</p>
    </div>

    <div class="p-5">
        <div class="space-y-3">
            <!-- Schedule Item 1 -->
            <div x-data="{checked: false}" @click="checked = !checked"
                 class="flex cursor-pointer items-center gap-4 rounded-xl p-3 hover:bg-gray-50 transition-all">
                <div class="flex items-start gap-3">
                    <div class="flex h-5 w-5 items-center justify-center rounded-md border-2"
                         :class="checked ? 'border-[#D4A017] bg-[#D4A017]' : 'border-gray-300 bg-white'">
                        <svg x-show="checked" class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                        </svg>
                    </div>
                    <div>
                        <span class="text-xs text-gray-400">Rab, 11 Jan 2024</span>
                        <p class="text-sm font-medium text-gray-700">09:20 AM - Rapat Koordinasi</p>
                    </div>
                </div>
            </div>

            <!-- Schedule Item 2 -->
            <div x-data="{checked: false}" @click="checked = !checked"
                 class="flex cursor-pointer items-center gap-4 rounded-xl p-3 hover:bg-gray-50 transition-all">
                <div class="flex items-start gap-3">
                    <div class="flex h-5 w-5 items-center justify-center rounded-md border-2"
                         :class="checked ? 'border-[#D4A017] bg-[#D4A017]' : 'border-gray-300 bg-white'">
                        <svg x-show="checked" class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                        </svg>
                    </div>
                    <div>
                        <span class="text-xs text-gray-400">Jum, 15 Feb 2024</span>
                        <p class="text-sm font-medium text-gray-700">10:35 AM - Evaluasi Bulanan</p>
                    </div>
                </div>
            </div>

            <!-- Schedule Item 3 -->
            <div x-data="{checked: false}" @click="checked = !checked"
                 class="flex cursor-pointer items-center gap-4 rounded-xl p-3 hover:bg-gray-50 transition-all">
                <div class="flex items-start gap-3">
                    <div class="flex h-5 w-5 items-center justify-center rounded-md border-2"
                         :class="checked ? 'border-[#D4A017] bg-[#D4A017]' : 'border-gray-300 bg-white'">
                        <svg x-show="checked" class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                        </svg>
                    </div>
                    <div>
                        <span class="text-xs text-gray-400">Kam, 18 Mar 2024</span>
                        <p class="text-sm font-medium text-gray-700">13:15 PM - Rapat Pemangku Kepentingan</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="border-t border-gray-100 p-4 bg-gray-50/30">
        <a href="#" class="flex items-center justify-center gap-2 text-sm font-medium text-[#D4A017] hover:text-[#B8920E] transition-colors">
            Lihat Semua Jadwal
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