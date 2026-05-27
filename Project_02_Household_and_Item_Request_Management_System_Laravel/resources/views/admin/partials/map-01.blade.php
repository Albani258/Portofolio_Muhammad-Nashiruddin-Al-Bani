<div class="rounded-2xl premium-card shadow-md">
    <div class="p-5 border-b border-gray-100 bg-gradient-to-r from-white to-gray-50 sm:p-6">
        <div class="flex justify-between items-center">
            <div>
                <h3 class="text-lg font-bold text-[#0B3B5F] flex items-center gap-2">
                    <div class="w-1 h-5 bg-[#D4A017] rounded-full"></div>
                    Sebaran Pengguna
                </h3>
                <p class="mt-1 text-sm text-gray-500">Jumlah pengguna berdasarkan wilayah</p>
            </div>

            <div x-data="{openDropDown: false}" class="relative h-fit">
                <button @click="openDropDown = !openDropDown"
                        :class="openDropDown ? 'text-[#D4A017]' : 'text-gray-400 hover:text-[#D4A017]'"
                        class="transition-colors">
                    <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" 
                              d="M10.2441 6C10.2441 5.0335 11.0276 4.25 11.9941 4.25H12.0041C12.9706 4.25 13.7541 5.0335 13.7541 6C13.7541 6.9665 12.9706 7.75 12.0041 7.75H11.9941C11.0276 7.75 10.2441 6.9665 10.2441 6ZM10.2441 18C10.2441 17.0335 11.0276 16.25 11.9941 16.25H12.0041C12.9706 16.25 13.7541 17.0335 13.7541 18C13.7541 18.9665 12.9706 19.75 12.0041 19.75H11.9941C11.0276 19.75 10.2441 18.9665 10.2441 18ZM11.9941 10.25C11.0276 10.25 10.2441 11.0335 10.2441 12C10.2441 12.9665 11.0276 13.75 11.9941 13.75H12.0041C12.9706 13.75 13.7541 12.9665 13.7541 12C13.7541 11.0335 12.9706 10.25 12.0041 10.25H11.9941Z" 
                              fill="currentColor" />
                    </svg>
                </button>
                <div x-show="openDropDown" @click.outside="openDropDown = false"
                     class="absolute right-0 top-full z-40 w-40 space-y-1 rounded-xl border border-gray-200 bg-white p-2 shadow-lg dark:border-gray-700 dark:bg-gray-800">
                    <button class="flex w-full rounded-lg px-3 py-2 text-xs font-medium text-gray-600 hover:bg-[#F5E6B8] hover:text-[#0B3B5F] transition-colors">Lihat Detail</button>
                    <button class="flex w-full rounded-lg px-3 py-2 text-xs font-medium text-gray-600 hover:bg-[#F5E6B8] hover:text-[#0B3B5F] transition-colors">Export Data</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Map Container -->
    <div class="overflow-hidden bg-gray-50 p-4 dark:bg-gray-900/50">
        <div id="mapOne" class="mapOne h-[300px] w-full rounded-xl bg-cover bg-center"
             style="background-image: url('https://upload.wikimedia.org/wikipedia/commons/e/ec/World_map_blank_without_borders.svg'); background-size: cover;">
            <div class="flex h-full items-center justify-center bg-black/20 rounded-xl">
                <div class="text-center">
                    <svg class="w-16 h-16 text-[#D4A017] mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path>
                    </svg>
                    <p class="text-sm text-gray-500">Peta Sebaran Pengguna</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistik Wilayah -->
    <div class="p-5 space-y-4 sm:p-6">
        <div class="flex items-center justify-between group hover:bg-[#F5E6B8]/20 p-2 rounded-xl transition-all">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center text-blue-700 font-bold">ID</div>
                <div>
                    <p class="font-semibold text-gray-800">Indonesia</p>
                    <span class="text-xs text-gray-500">2,847 Pengguna</span>
                </div>
            </div>
            <div class="flex items-center gap-3">
                <div class="relative h-2 w-32 rounded-full bg-gray-200 overflow-hidden">
                    <div class="absolute left-0 top-0 h-full w-[79%] rounded-full bg-gradient-to-r from-[#0B3B5F] to-[#D4A017]"></div>
                </div>
                <p class="text-sm font-semibold text-[#0B3B5F]">79%</p>
            </div>
        </div>

        <div class="flex items-center justify-between group hover:bg-[#F5E6B8]/20 p-2 rounded-xl transition-all">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-full bg-red-100 flex items-center justify-center text-red-700 font-bold">MY</div>
                <div>
                    <p class="font-semibold text-gray-800">Malaysia</p>
                    <span class="text-xs text-gray-500">589 Pengguna</span>
                </div>
            </div>
            <div class="flex items-center gap-3">
                <div class="relative h-2 w-32 rounded-full bg-gray-200 overflow-hidden">
                    <div class="absolute left-0 top-0 h-full w-[23%] rounded-full bg-gradient-to-r from-[#0B3B5F] to-[#D4A017]"></div>
                </div>
                <p class="text-sm font-semibold text-[#0B3B5F]">23%</p>
            </div>
        </div>

        <div class="flex items-center justify-between group hover:bg-[#F5E6B8]/20 p-2 rounded-xl transition-all">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-full bg-green-100 flex items-center justify-center text-green-700 font-bold">SG</div>
                <div>
                    <p class="font-semibold text-gray-800">Singapura</p>
                    <span class="text-xs text-gray-500">312 Pengguna</span>
                </div>
            </div>
            <div class="flex items-center gap-3">
                <div class="relative h-2 w-32 rounded-full bg-gray-200 overflow-hidden">
                    <div class="absolute left-0 top-0 h-full w-[12%] rounded-full bg-gradient-to-r from-[#0B3B5F] to-[#D4A017]"></div>
                </div>
                <p class="text-sm font-semibold text-[#0B3B5F]">12%</p>
            </div>
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