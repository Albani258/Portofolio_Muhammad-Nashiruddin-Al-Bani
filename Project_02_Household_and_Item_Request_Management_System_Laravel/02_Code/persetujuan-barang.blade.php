@extends('layouts.admin')
@section('content')

<!-- Welcome Banner -->
<div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-[#0B3B5F] to-[#0A2E4A] p-8 mb-8 shadow-xl">
    <div class="absolute top-0 right-0 w-64 h-64 bg-[#D4A017] opacity-10 rounded-full filter blur-3xl"></div>
    <div class="absolute bottom-0 left-0 w-48 h-48 bg-[#D4A017] opacity-5 rounded-full filter blur-2xl"></div>
    <div class="relative z-10">
        <h1 class="text-2xl font-bold text-white mb-2">Detail & Persetujuan Pengajuan</h1>
        <p class="text-white/80 text-sm">Tinjau dan setujui pengajuan barang inventaris</p>
    </div>
</div>

<!-- Detail Pengajuan Card -->
<div class="premium-card shadow-xl">
    <div class="p-6 border-b border-gray-100 bg-gradient-to-r from-white to-gray-50">
        <h2 class="text-xl font-bold text-[#0B3B5F] flex items-center gap-2">
            <div class="w-1 h-8 bg-[#D4A017] rounded-full"></div>
            Detail Pengajuan Barang
        </h2>
        <p class="text-sm text-gray-500 mt-1">Informasi lengkap pengajuan barang</p>
    </div>

    <div class="p-8">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Gambar Barang -->
            <div class="lg:w-1/3">
                <div class="bg-gray-50 rounded-2xl p-6 text-center border border-gray-100">
                    <div class="w-full h-48 rounded-xl overflow-hidden bg-gray-200">
                        <img src="https://picsum.photos/id/237/400/300" class="w-full h-full object-cover" alt="Barang">
                    </div>
                    <p class="text-xs text-gray-400 mt-3">*Gambar ilustrasi</p>
                </div>
            </div>

            <!-- Informasi Detail -->
            <div class="lg:w-2/3">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-gray-50 rounded-xl p-4">
                        <label class="text-xs font-medium text-gray-400 uppercase tracking-wide">Nama Barang</label>
                        <p class="text-gray-800 font-semibold text-lg">Laptop Asus ROG</p>
                    </div>
                    <div class="bg-gray-50 rounded-xl p-4">
                        <label class="text-xs font-medium text-gray-400 uppercase tracking-wide">Kode Barang</label>
                        <p class="text-gray-800 font-semibold font-mono">BRG-001-2024</p>
                    </div>
                    <div class="bg-gray-50 rounded-xl p-4">
                        <label class="text-xs font-medium text-gray-400 uppercase tracking-wide">Kategori</label>
                        <p class="text-gray-800 font-semibold">Elektronik</p>
                    </div>
                    <div class="bg-gray-50 rounded-xl p-4">
                        <label class="text-xs font-medium text-gray-400 uppercase tracking-wide">Jumlah</label>
                        <p class="text-gray-800 font-semibold">5 Unit</p>
                    </div>
                    <div class="bg-gray-50 rounded-xl p-4">
                        <label class="text-xs font-medium text-gray-400 uppercase tracking-wide">Satuan</label>
                        <p class="text-gray-800 font-semibold">Unit</p>
                    </div>

                    <div class="bg-gray-50 rounded-xl p-4">
                        <label class="text-xs font-medium text-gray-400 uppercase tracking-wide">Pengaju</label>
                        <p class="text-gray-800 font-semibold">Endin Rahmanda</p>
                    </div>
                    <div class="bg-gray-50 rounded-xl p-4">
                        <label class="text-xs font-medium text-gray-400 uppercase tracking-wide">Divisi</label>
                        <p class="text-gray-800 font-semibold">Divisi IT</p>
                    </div>
                    <div class="bg-gray-50 rounded-xl p-4">
                        <label class="text-xs font-medium text-gray-400 uppercase tracking-wide">Tanggal Pengajuan</label>
                        <p class="text-gray-800 font-semibold">15 Januari 2024</p>
                    </div>
                    <div class="bg-gray-50 rounded-xl p-4">
                        <label class="text-xs font-medium text-gray-400 uppercase tracking-wide">Prioritas</label>
                        <p class="text-gray-800 font-semibold"><span class="badge-urgent">Urgent</span></p>
                    </div>
                </div>

                <!-- Deskripsi -->
                <div class="bg-gray-50 rounded-xl p-4 mt-6">
                    <label class="text-xs font-medium text-gray-400 uppercase tracking-wide">Deskripsi / Alasan</label>
                    <p class="text-gray-700 mt-1">Laptop untuk kebutuhan desain grafis dan editing video. Spesifikasi yang dibutuhkan: RAM minimal 16GB, SSD 512GB, dan VGA khusus. Barang diperlukan untuk mendukung pekerjaan tim kreatif.</p>
                </div>
            </div>
        </div>

        <!-- Tombol Aksi Persetujuan -->
        <div class="mt-8 pt-6 border-t border-gray-200">
            <h3 class="font-semibold text-gray-800 mb-4">Aksi Persetujuan</h3>
            <div class="flex flex-wrap gap-4">
                <button onclick="approveItem()" class="btn-approve px-6 py-3 rounded-xl text-white font-semibold flex items-center gap-2 shadow-md">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    Approve / Setujui
                </button>

                <button onclick="openRejectModal()" class="btn-reject px-6 py-3 rounded-xl text-white font-semibold flex items-center gap-2 shadow-md">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                    Reject / Tolak
                </button>

                <button onclick="openRevisionModal()" class="btn-revision px-6 py-3 rounded-xl text-white font-semibold flex items-center gap-2 shadow-md">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    Revisi / Perbaiki
                </button>

                <a href="{{ url('admin/pengajuan') }}" class="px-6 py-3 rounded-xl border-2 border-gray-200 text-gray-700 font-semibold hover:bg-gray-50 transition-all">
                    Kembali
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Modal Reject -->
<div id="rejectModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 backdrop-blur-sm p-4">
    <div class="premium-modal w-full max-w-md bg-white shadow-2xl overflow-hidden">
        <div class="bg-gradient-to-r from-red-600 to-red-700 px-6 py-5 flex items-center justify-between">
            <div>
                <h3 class="text-xl font-bold text-white">Tolak Pengajuan</h3>
                <p class="text-white/70 text-sm mt-1">Berikan alasan penolakan</p>
            </div>
            <button onclick="closeRejectModal()" class="text-white/80 hover:text-white transition-all p-2 rounded-lg hover:bg-white/10">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>
        <div class="p-6">
            <label class="block text-sm font-semibold text-gray-700 mb-2">Alasan Penolakan</label>
            <textarea rows="4" placeholder="Jelaskan alasan pengajuan ditolak..." class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-red-500 focus:ring-2 focus:ring-red-500/20 transition-all resize-none"></textarea>
            <div class="flex gap-3 mt-6">
                <button onclick="closeRejectModal()" class="flex-1 px-4 py-2 rounded-xl border-2 border-gray-200 text-gray-700 font-medium">Batal</button>
                <button onclick="submitReject()" class="flex-1 px-4 py-2 rounded-xl bg-gradient-to-r from-red-600 to-red-700 text-white font-medium">Kirim</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Revision -->
<div id="revisionModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 backdrop-blur-sm p-4">
    <div class="premium-modal w-full max-w-md bg-white shadow-2xl overflow-hidden">
        <div class="bg-gradient-to-r from-amber-500 to-amber-600 px-6 py-5 flex items-center justify-between">
            <div>
                <h3 class="text-xl font-bold text-white">Revisi Pengajuan</h3>
                <p class="text-white/70 text-sm mt-1">Berikan catatan revisi</p>
            </div>
            <button onclick="closeRevisionModal()" class="text-white/80 hover:text-white transition-all p-2 rounded-lg hover:bg-white/10">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>
        <div class="p-6">
            <label class="block text-sm font-semibold text-gray-700 mb-2">Catatan Revisi</label>
            <textarea rows="4" placeholder="Masukkan catatan untuk perbaikan pengajuan..." class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20 transition-all resize-none"></textarea>
            <div class="flex gap-3 mt-6">
                <button onclick="closeRevisionModal()" class="flex-1 px-4 py-2 rounded-xl border-2 border-gray-200 text-gray-700 font-medium">Batal</button>
                <button onclick="submitRevision()" class="flex-1 px-4 py-2 rounded-xl bg-gradient-to-r from-amber-500 to-amber-600 text-white font-medium">Kirim</button>
            </div>
        </div>
    </div>
</div>

<script>
    function approveItem() {
        if(confirm('Apakah Anda yakin ingin menyetujui pengajuan ini?')) {
            alert('Pengajuan berhasil disetujui!');
            window.location.href = "{{ url('admin/pengajuan') }}";
        }
    }
    function openRejectModal() { document.getElementById('rejectModal').classList.remove('hidden'); document.getElementById('rejectModal').classList.add('flex'); }
    function closeRejectModal() { document.getElementById('rejectModal').classList.add('hidden'); document.getElementById('rejectModal').classList.remove('flex'); }
    function submitReject() { alert('Pengajuan ditolak!'); closeRejectModal(); window.location.href = "{{ url('admin/pengajuan') }}"; }
    function openRevisionModal() { document.getElementById('revisionModal').classList.remove('hidden'); document.getElementById('revisionModal').classList.add('flex'); }
    function closeRevisionModal() { document.getElementById('revisionModal').classList.add('hidden'); document.getElementById('revisionModal').classList.remove('flex'); }
    function submitRevision() { alert('Revisi telah dikirim!'); closeRevisionModal(); window.location.href = "{{ url('admin/pengajuan') }}"; }
    window.addEventListener('click', function(e) {
        if(e.target === document.getElementById('rejectModal')) closeRejectModal();
        if(e.target === document.getElementById('revisionModal')) closeRevisionModal();
    });
</script>

<style>
    .premium-card, .premium-modal, .btn-premium { /* style sama seperti sebelumnya */ }
    .badge-urgent { background: linear-gradient(135deg, #F59E0B, #D97706); color: white; padding: 4px 12px; border-radius: 50px; font-size: 0.75rem; font-weight: 600; }
    .btn-approve { background: linear-gradient(135deg, #10B981, #059669); }
    .btn-reject { background: linear-gradient(135deg, #EF4444, #DC2626); }
    .btn-revision { background: linear-gradient(135deg, #F59E0B, #D97706); }
    .btn-approve, .btn-reject, .btn-revision { transition: all 0.3s ease; }
    .btn-approve:hover, .btn-reject:hover, .btn-revision:hover { transform: translateY(-2px); box-shadow: 0 8px 20px rgba(0,0,0,0.2); }
</style>

@endsection