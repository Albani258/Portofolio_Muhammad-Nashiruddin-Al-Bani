<!-- Premium Loading Preloader -->
<div x-show="loaded" 
     x-init="window.addEventListener('DOMContentLoaded', () => {setTimeout(() => loaded = false, 800)})"
     class="fixed inset-0 z-[999999] flex items-center justify-center bg-gradient-to-br from-[#0B3B5F] to-[#0A2E4A]">
    
    <div class="text-center">
        <!-- Animated Logo -->
        <div class="relative mb-8">
            <div class="w-24 h-24 mx-auto rounded-2xl bg-white/10 backdrop-blur-sm flex items-center justify-center animate-pulse">
                <svg class="w-12 h-12 text-[#D4A017]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
            </div>
            
            <!-- Spinner Rings -->
            <div class="absolute inset-0 flex items-center justify-center">
                <div class="w-32 h-32 rounded-full border-4 border-t-[#D4A017] border-r-[#D4A017] border-b-transparent border-l-transparent animate-spin"></div>
            </div>
            <div class="absolute inset-0 flex items-center justify-center">
                <div class="w-40 h-40 rounded-full border-4 border-t-transparent border-r-transparent border-b-[#D4A017] border-l-[#D4A017] animate-spin" style="animation-direction: reverse; animation-duration: 1.5s;"></div>
            </div>
        </div>
        
        <!-- Loading Text -->
        <h2 class="text-2xl font-bold text-white mb-2">Kementerian Imigrasi dan Pemasyarakatan</h2>
        <p class="text-white/70 text-sm">Memuat data sistem...</p>
        
        <!-- Progress Bar -->
        <div class="mt-6 w-64 mx-auto">
            <div class="h-1 bg-white/20 rounded-full overflow-hidden">
                <div class="h-full w-0 bg-[#D4A017] rounded-full animate-loading-bar"></div>
            </div>
        </div>
        
        <!-- Loading Dots -->
        <div class="flex justify-center gap-2 mt-4">
            <div class="w-2 h-2 rounded-full bg-white/50 animate-bounce" style="animation-delay: 0s"></div>
            <div class="w-2 h-2 rounded-full bg-white/50 animate-bounce" style="animation-delay: 0.2s"></div>
            <div class="w-2 h-2 rounded-full bg-white/50 animate-bounce" style="animation-delay: 0.4s"></div>
        </div>
    </div>
</div>

<style>
    @keyframes spin {
        to { transform: rotate(360deg); }
    }
    @keyframes bounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-8px); }
    }
    @keyframes loading-bar {
        0% { width: 0%; }
        50% { width: 70%; }
        100% { width: 100%; }
    }
    .animate-spin {
        animation: spin 1s linear infinite;
    }
    .animate-bounce {
        animation: bounce 1s ease-in-out infinite;
    }
    .animate-loading-bar {
        animation: loading-bar 1.5s ease-out forwards;
    }
</style>