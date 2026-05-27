@extends('layouts.user')
@section('title', 'Buat Pengadaan Barang')
@section('content')
<div class="premium-card shadow-xl p-8 mt-6">

    <div class="p-6 border-b border-gray-100 bg-gradient-to-r from-white to-gray-50 mb-6">
        <h2 class="text-xl font-bold text-[#0B3B5F] flex items-center gap-2">
            <div class="w-1 h-8 bg-[#D4A017] rounded-full"></div>
            Form Buat Pengadaan Barang
        </h2>
        <p class="text-sm text-gray-500 mt-1">Isi data pengadaan barang dengan lengkap dan akurat</p>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger mb-6">
        <strong>Terjadi kesalahan:</strong>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('user.pengadaan.store') }}" method="POST" class="grid gap-6 md:grid-cols-2">
        @csrf

        <!-- Nama Barang Input Manual -->
        <div class="md:col-span-2 group-input-glass">
            <label class="block text-xs font-bold uppercase tracking-wider text-[#092540] mb-2 opacity-75">
                Nama Barang <span class="text-red-500">*</span>
            </label>
            <input type="text" name="nama_barang"
                value="{{ old('nama_barang') }}"
                placeholder="Masukkan nama barang"
                class="w-full px-5 py-3.5 rounded-xl border border-gray-200 bg-white/60 focus:outline-none focus:border-[#D4A017] focus:ring-4 focus:ring-[#D4A017]/10 text-sm font-medium text-[#092540]"
                required>
        </div>

        <!-- Satuan Barang Dropdown -->
        <div class="relative w-full group-input-glass" x-data="{ open: false, selectedSatuan: '{{ old('satuan', $satuan[0] ?? 'Pcs') }}' }">
            <label class="block text-xs font-bold uppercase tracking-wider text-[#092540] mb-2 opacity-75">
                Pilih Satuan <span class="text-red-500">*</span>
            </label>
            <input type="hidden" name="satuan" :value="selectedSatuan">

            <button type="button" @click="open = !open" @click.away="open = false"
                class="w-full flex items-center justify-between px-4 py-2.5 rounded-lg border border-gray-200 bg-white text-[#092540] font-semibold text-sm shadow-sm text-left">
                <span x-text="selectedSatuan"></span>
                <svg class="w-4 h-4 text-gray-600 transition-transform duration-300" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>

            <div x-show="open" class="absolute left-0 w-full mt-1 max-h-40 overflow-y-auto rounded-lg border border-gray-200 bg-white shadow-lg" style="display: none; z-index: 999;">
                <div class="p-1">
                    @foreach($satuan as $item)
                    <div @click="selectedSatuan = '{{ $item }}'; open = false"
                        class="px-4 py-2 text-sm text-[#092540] hover:bg-gray-100 rounded-md cursor-pointer"
                        :class="selectedSatuan == '{{ $item }}' ? 'bg-gray-100 font-bold' : ''">
                        {{ $item }}
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Jumlah Barang -->
        <div class="group-input-glass">
            <label class="block text-xs font-bold uppercase tracking-wider text-[#092540] mb-2 opacity-75">
                Jumlah Barang <span class="text-red-500">*</span>
            </label>
            <input type="number" name="jumlah_pengajuan"
                value="{{ old('jumlah_pengajuan') }}"
                placeholder="Contoh: 10"
                class="w-full px-5 py-3.5 rounded-xl border border-gray-200 bg-white/60 ... "
                required>
        </div>

        <!-- Tanggal Pengadaan -->
        <div class="group-input-glass">
            <label class="block text-xs font-bold uppercase tracking-wider text-[#092540] mb-2 opacity-75">
                Tanggal Pengadaan <span class="text-red-500">*</span>
            </label>
            <input type="date" name="tanggal_pengajuan"
                value="{{ old('tanggal_pengajuan', date('Y-m-d')) }}"
                class="w-full px-5 py-3.5 rounded-xl border border-gray-200 bg-white/60 ... "
                required>
        </div>

        <!-- Submit -->
        <div class="md:col-span-2 flex flex-col sm:flex-row gap-3 pt-4 border-t border-gray-200 mt-4">
    <a href="{{ route('user.pengadaan.index') }}"
        class="w-full sm:w-1/2 px-6 py-3.5 rounded-xl border border-gray-300 bg-white text-center text-gray-700 font-bold text-sm shadow-sm hover:bg-gray-100 transition-all duration-200">
        Batal / Kembali
    </a>

    <button type="submit"
        class="w-full sm:w-1/2 px-6 py-3.5 rounded-xl bg-gradient-to-r from-[#0B3B5F] to-[#0A2E4A] text-white font-bold text-sm shadow-md hover:shadow-lg hover:scale-[1.01] transition-all duration-300 flex items-center justify-center gap-2">

        <i class="fas fa-paper-plane"></i>
        <span>Kirim Form Pengadaan</span>
    </button>
</div>

    </form>
</div>
@endsection