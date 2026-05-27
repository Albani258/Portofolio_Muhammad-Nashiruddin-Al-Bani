<!-- Dekorasi Grid Shape - Background Elegant -->
<div class="fixed inset-0 pointer-events-none -z-10 overflow-hidden">
    <!-- Grid Pattern -->
    <div class="absolute right-0 top-0 w-full max-w-[300px] lg:max-w-[500px] opacity-30">
        <svg width="100%" height="auto" viewBox="0 0 500 500" fill="none" xmlns="http://www.w3.org/2000/svg">
            <pattern id="grid" width="40" height="40" patternUnits="userSpaceOnUse">
                <path d="M 40 0 L 0 0 0 40" fill="none" stroke="#D4A017" stroke-width="0.5" stroke-opacity="0.3"/>
            </pattern>
            <rect width="500" height="500" fill="url(#grid)" />
            <circle cx="400" cy="100" r="80" fill="#D4A017" fill-opacity="0.05" />
            <circle cx="450" cy="350" r="120" fill="#0B3B5F" fill-opacity="0.03" />
        </svg>
    </div>

    <!-- Dekorasi Bawah Kiri -->
    <div class="absolute bottom-0 left-0 w-full max-w-[300px] lg:max-w-[450px] rotate-180 opacity-30">
        <svg width="100%" height="auto" viewBox="0 0 500 500" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect width="500" height="500" fill="url(#grid)" />
            <circle cx="100" cy="400" r="100" fill="#D4A017" fill-opacity="0.05" />
            <circle cx="50" cy="150" r="60" fill="#0B3B5F" fill-opacity="0.03" />
        </svg>
    </div>

    <!-- Dekorasi Tambahan - Blur Circles -->
    <div class="absolute top-1/3 left-1/4 w-64 h-64 rounded-full bg-[#D4A017] opacity-5 blur-3xl"></div>
    <div class="absolute bottom-1/4 right-1/3 w-80 h-80 rounded-full bg-[#0B3B5F] opacity-5 blur-3xl"></div>
</div>

<!-- CSS untuk grid background -->
<style>
    /* Pastikan konten utama memiliki z-index yang lebih tinggi */
    main, .premium-card, .stat-card-premium {
        position: relative;
        z-index: 1;
    }
    
    /* Background halus untuk body */
    body {
        background: linear-gradient(135deg, #F8FAFC 0%, #F1F5F9 100%);
    }
</style>