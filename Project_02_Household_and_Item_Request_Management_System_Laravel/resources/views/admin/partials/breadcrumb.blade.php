<div class="mb-6 flex flex-wrap items-center justify-between gap-3">
    <h2 class="text-xl font-bold text-[#0B3B5F] flex items-center gap-2" x-text="pageName">
        <div class="w-1 h-6 bg-[#D4A017] rounded-full"></div>
        <span x-text="pageName"></span>
    </h2>

    <nav>
        <ol class="flex items-center gap-1.5">
            <li>
                <a class="inline-flex items-center gap-1.5 text-sm text-gray-500 hover:text-[#D4A017] transition-colors" href="{{ url('/admin/dashboard') }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    Dashboard
                    <svg class="stroke-current ml-1" width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6.0765 12.667L10.2432 8.50033L6.0765 4.33366" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>
            </li>
            <li class="text-sm font-medium text-[#D4A017]" x-text="pageName"></li>
        </ol>
    </nav>
</div>