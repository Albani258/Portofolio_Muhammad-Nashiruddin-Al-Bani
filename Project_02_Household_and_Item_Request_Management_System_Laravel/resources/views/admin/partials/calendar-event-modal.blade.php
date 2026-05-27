<!-- Modal untuk Add/Edit Event - Premium Style -->
<div class="fixed inset-0 z-50 hidden items-center justify-center p-5 overflow-y-auto" id="eventModal">
    <div class="modal-close-btn fixed inset-0 h-full w-full bg-black/60 backdrop-blur-sm"></div>
    <div class="relative w-full max-w-[700px] rounded-2xl bg-white shadow-2xl overflow-hidden animate-modalSlideIn">
        
        <!-- Header Modal dengan Gradient -->
        <div class="bg-gradient-to-r from-[#0B3B5F] to-[#0A2E4A] px-6 py-5 flex items-center justify-between">
            <div>
                <h5 class="text-xl font-bold text-white" id="eventModalLabel">Tambah / Edit Event</h5>
                <p class="text-white/70 text-sm mt-1">Atur jadwal event dan kegiatan penting Anda</p>
            </div>
            <button class="modal-close-btn text-white/80 hover:text-white transition-all p-2 rounded-lg hover:bg-white/10">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <!-- Body Modal -->
        <div class="p-6">
            <!-- Event Title -->
            <div class="mb-6">
                <label class="mb-1.5 block text-sm font-semibold text-gray-700">Judul Event <span class="text-red-500">*</span></label>
                <input id="event-title" type="text" placeholder="Masukkan judul event" 
                    class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-[#D4A017] focus:ring-2 focus:ring-[#D4A017]/20 transition-all">
            </div>

            <!-- Event Color -->
            <div class="mb-6">
                <label class="block text-sm font-semibold text-gray-700 mb-3">Warna Event</label>
                <div class="flex flex-wrap items-center gap-4">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="radio" name="event-level" value="Danger" class="hidden peer">
                        <span class="w-5 h-5 rounded-full bg-red-500 border-2 border-white ring-2 ring-gray-200 peer-checked:ring-red-500"></span>
                        <span class="text-sm text-gray-600">Danger</span>
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="radio" name="event-level" value="Success" class="hidden peer">
                        <span class="w-5 h-5 rounded-full bg-green-500 border-2 border-white ring-2 ring-gray-200 peer-checked:ring-green-500"></span>
                        <span class="text-sm text-gray-600">Success</span>
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="radio" name="event-level" value="Primary" class="hidden peer" checked>
                        <span class="w-5 h-5 rounded-full bg-[#0B3B5F] border-2 border-white ring-2 ring-gray-200 peer-checked:ring-[#0B3B5F]"></span>
                        <span class="text-sm text-gray-600">Primary</span>
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="radio" name="event-level" value="Warning" class="hidden peer">
                        <span class="w-5 h-5 rounded-full bg-amber-500 border-2 border-white ring-2 ring-gray-200 peer-checked:ring-amber-500"></span>
                        <span class="text-sm text-gray-600">Warning</span>
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="radio" name="event-level" value="Info" class="hidden peer">
                        <span class="w-5 h-5 rounded-full bg-cyan-500 border-2 border-white ring-2 ring-gray-200 peer-checked:ring-cyan-500"></span>
                        <span class="text-sm text-gray-600">Info</span>
                    </label>
                </div>
            </div>

            <!-- Start Date -->
            <div class="mb-6">
                <label class="mb-1.5 block text-sm font-semibold text-gray-700">Tanggal Mulai <span class="text-red-500">*</span></label>
                <div class="relative">
                    <input id="event-start-date" type="date" class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-[#D4A017] focus:ring-2 focus:ring-[#D4A017]/20 transition-all">
                    <span class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </span>
                </div>
            </div>

            <!-- End Date -->
            <div class="mb-6">
                <label class="mb-1.5 block text-sm font-semibold text-gray-700">Tanggal Selesai</label>
                <div class="relative">
                    <input id="event-end-date" type="date" class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-[#D4A017] focus:ring-2 focus:ring-[#D4A017]/20 transition-all">
                    <span class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </span>
                </div>
            </div>

            <!-- Deskripsi Event -->
            <div class="mb-6">
                <label class="mb-1.5 block text-sm font-semibold text-gray-700">Deskripsi Event</label>
                <textarea rows="3" placeholder="Masukkan deskripsi event..." class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-[#D4A017] focus:ring-2 focus:ring-[#D4A017]/20 transition-all resize-none"></textarea>
            </div>

            <!-- Lokasi -->
            <div class="mb-6">
                <label class="mb-1.5 block text-sm font-semibold text-gray-700">Lokasi</label>
                <input type="text" placeholder="Masukkan lokasi event" class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-[#D4A017] focus:ring-2 focus:ring-[#D4A017]/20 transition-all">
            </div>

            <!-- Reminder -->
            <div class="mb-6">
                <label class="flex items-center gap-3 cursor-pointer">
                    <input type="checkbox" class="w-5 h-5 rounded border-2 border-gray-300 text-[#D4A017] focus:ring-[#D4A017]">
                    <span class="text-sm text-gray-700">Kirim pengingat 1 jam sebelum event</span>
                </label>
            </div>
        </div>

        <!-- Footer Modal -->
        <div class="flex items-center justify-end gap-3 border-t border-gray-100 p-6 bg-gray-50/30">
            <button type="button" class="btn-update-event hidden px-5 py-2.5 rounded-xl bg-gradient-to-r from-[#0B3B5F] to-[#0A2E4A] text-white font-medium shadow-md hover:shadow-lg transition-all">
                Update Event
            </button>
            <button type="button" class="btn-add-event px-5 py-2.5 rounded-xl bg-gradient-to-r from-[#0B3B5F] to-[#0A2E4A] text-white font-medium shadow-md hover:shadow-lg transition-all">
                + Tambah Event
            </button>
            <button type="button" class="modal-close-btn px-5 py-2.5 rounded-xl border-2 border-gray-200 text-gray-700 font-medium hover:bg-gray-50 transition-all">
                Batal
            </button>
        </div>
    </div>
</div>

<style>
    @keyframes modalSlideIn {
        from {
            opacity: 0;
            transform: scale(0.95) translateY(-20px);
        }
        to {
            opacity: 1;
            transform: scale(1) translateY(0);
        }
    }
    .animate-modalSlideIn {
        animation: modalSlideIn 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
</style>

<script>
    // Fungsi untuk membuka modal
    function openEventModal() {
        const modal = document.getElementById('eventModal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.body.style.overflow = 'hidden';
    }

    // Fungsi untuk menutup modal
    function closeEventModal() {
        const modal = document.getElementById('eventModal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        document.body.style.overflow = 'auto';
    }

    // Event listener untuk tombol close
    document.querySelectorAll('.modal-close-btn').forEach(btn => {
        btn.addEventListener('click', closeEventModal);
    });

    // Klik di luar modal untuk menutup
    window.addEventListener('click', function(e) {
        const modal = document.getElementById('eventModal');
        if (e.target === modal) {
            closeEventModal();
        }
    });
</script>