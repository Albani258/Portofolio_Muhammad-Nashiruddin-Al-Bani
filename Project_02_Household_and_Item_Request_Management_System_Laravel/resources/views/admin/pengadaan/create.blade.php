@extends('layouts.admin')
@section('title', 'Pengadaan Barang')
@section('content')
@php
$stock = $stocks ?? collect();
@endphp

<div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-[#0B3B5F] to-[#0A2E4A] p-8 mb-8 shadow-xl">
    <div class="absolute top-0 right-0 w-64 h-64 bg-[#D4A017] opacity-10 rounded-full filter blur-3xl"></div>

    <div class="relative z-10">
        <h1 class="text-2xl font-bold text-white mb-2">Pengadaan Barang</h1>
        <p class="text-white/80 text-sm">
            Tambahkan jumlah stok barang yang sudah ada atau input barang baru.
        </p>
    </div>
</div>

@if ($errors->any())
<div class="mb-6 rounded-2xl border border-red-200 bg-red-50 p-5 text-red-700">
    <h3 class="font-bold mb-2">Data belum lengkap</h3>
    <ul class="list-disc list-inside text-sm space-y-1">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="premium-card shadow-xl">
    <div class="p-6 border-b border-gray-100 bg-gradient-to-r from-white to-gray-50">
        <h2 class="text-xl font-bold text-[#0B3B5F] flex items-center gap-2">
            <div class="w-1 h-8 bg-[#D4A017] rounded-full"></div>
            Form Pengadaan
        </h2>
        <p class="text-sm text-gray-500 mt-1">
            Pilih salah satu mode pengadaan barang.
        </p>
    </div>

    <div class="p-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
            <button type="button"
                id="btnExisting"
                onclick="setMode('existing')"
                class="px-5 py-4 rounded-2xl font-semibold bg-[#0B3B5F] text-white shadow-md">
                Tambah Stok Barang Lama
            </button>

            <button type="button"
                id="btnNew"
                onclick="setMode('new')"
                class="px-5 py-4 rounded-2xl font-semibold bg-gray-100 text-gray-700 hover:bg-gray-200">
                Tambah Barang Baru
            </button>
        </div>

        <form action="{{ route('admin.pengadaan.store') }}" method="POST" id="formPengadaan">
            @csrf

            <input type="hidden" name="mode_pengadaan" id="mode_pengadaan" value="existing">

            {{-- MODE BARANG LAMA --}}
            <div id="formExisting" class="grid gap-6 md:grid-cols-2">
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Pilih Barang dari Stock <span class="text-red-500">*</span>
                    </label>

                    <select name="stock_id"
                        id="stock_id"
                        onchange="fillStockData()"
                        class="w-full px-5 py-3 rounded-xl border-2 border-gray-200 bg-white focus:border-[#D4A017] focus:ring-2 focus:ring-[#D4A017]/20 transition-all">

                        <option value="">Pilih barang</option>

                        @forelse ($stock as $item)
                        <option value="{{ $item->id }}"
                            data-nama="{{ $item->nama_barang }}"
                            data-kode="{{ $item->kode_barang }}"
                            data-kategori="{{ $item->kategori }}"
                            data-jumlah="{{ $item->jumlah_stock }}"
                            data-satuan="{{ $item->satuan }}"
                            data-minimal="{{ $item->minimal_stock }}"
                            data-lokasi="{{ $item->lokasi }}">
                            {{ $item->nama_barang }} - {{ $item->kode_barang }}
                        </option>
                        @empty
                        <option value="" disabled>Belum ada data stock</option>
                        @endforelse
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Barang</label>
                    <input type="text" id="existing_nama_barang" readonly
                        class="w-full px-5 py-3 rounded-xl border-2 border-gray-200 bg-gray-100 text-gray-500">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Kode Barang</label>
                    <input type="text" id="existing_kode_barang" readonly
                        class="w-full px-5 py-3 rounded-xl border-2 border-gray-200 bg-gray-100 text-gray-500">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Kategori</label>
                    <input type="text" id="existing_kategori" readonly
                        class="w-full px-5 py-3 rounded-xl border-2 border-gray-200 bg-gray-100 text-gray-500">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Stok Saat Ini</label>
                    <input type="number" id="existing_jumlah_stock" readonly
                        class="w-full px-5 py-3 rounded-xl border-2 border-gray-200 bg-gray-100 text-gray-500">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Satuan</label>
                    <input type="text" id="existing_satuan" readonly
                        class="w-full px-5 py-3 rounded-xl border-2 border-gray-200 bg-gray-100 text-gray-500">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Lokasi</label>
                    <input type="text" id="existing_lokasi" readonly
                        class="w-full px-5 py-3 rounded-xl border-2 border-gray-200 bg-gray-100 text-gray-500">
                </div>
            </div>

            {{-- MODE BARANG BARU --}}
            <div id="formNew" class="hidden grid gap-6 md:grid-cols-2">
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Nama Barang <span class="text-red-500">*</span>
                    </label>
                    <input type="text"
                        name="nama_barang"
                        id="new_nama_barang"
                        placeholder="Masukkan nama barang"
                        class="w-full px-5 py-3 rounded-xl border-2 border-gray-200 focus:border-[#D4A017] focus:ring-2 focus:ring-[#D4A017]/20 transition-all">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Kode Barang <span class="text-red-500">*</span>
                    </label>
                    <input type="text"
                        name="kode_barang"
                        id="new_kode_barang"
                        placeholder="Contoh: BRG-001"
                        class="w-full px-5 py-3 rounded-xl border-2 border-gray-200 focus:border-[#D4A017] focus:ring-2 focus:ring-[#D4A017]/20 transition-all">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Kategori <span class="text-red-500">*</span>
                    </label>
                    <select name="kategori"
                        id="new_kategori"
                        class="w-full px-5 py-3 rounded-xl border-2 border-gray-200 bg-white focus:border-[#D4A017] focus:ring-2 focus:ring-[#D4A017]/20 transition-all">
                        <option value="">Pilih kategori barang</option>

                        @foreach ($kategoriOptions as $kategori)
                        <option value="{{ $kategori }}" {{ old('kategori') == $kategori ? 'selected' : '' }}>
                            {{ $kategori }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Satuan</label>
                    <select name="satuan"
                        id="new_satuan"
                        class="w-full px-5 py-3 rounded-xl border-2 border-gray-200 bg-white focus:border-[#D4A017] focus:ring-2 focus:ring-[#D4A017]/20 transition-all">
                        <option value="">Pilih satuan</option>

                        @foreach ($satuanOptions as $satuan)
                        <option value="{{ $satuan }}" {{ old('satuan', 'Pcs') == $satuan ? 'selected' : '' }}>
                            {{ $satuan }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Minimal Stock</label>
                    <input type="number"
                        name="minimal_stock"
                        id="new_minimal_stock"
                        value="0"
                        min="0"
                        class="w-full px-5 py-3 rounded-xl border-2 border-gray-200 focus:border-[#D4A017] focus:ring-2 focus:ring-[#D4A017]/20 transition-all">
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Lokasi</label>
                    <input type="text"
                        name="lokasi"
                        id="new_lokasi"
                        placeholder="Contoh: Gudang A1"
                        class="w-full px-5 py-3 rounded-xl border-2 border-gray-200 focus:border-[#D4A017] focus:ring-2 focus:ring-[#D4A017]/20 transition-all">
                </div>
            </div>

            {{-- JUMLAH MASUK --}}
            <div class="mt-6">
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Jumlah Masuk <span class="text-red-500">*</span>
                </label>
                <input type="number"
                    name="jumlah_masuk"
                    min="1"
                    required
                    placeholder="Masukkan jumlah barang yang masuk"
                    class="w-full px-5 py-3 rounded-xl border-2 border-gray-200 focus:border-[#D4A017] focus:ring-2 focus:ring-[#D4A017]/20 transition-all">
            </div>

            <div class="flex gap-4 pt-6 border-t border-gray-200 mt-8">
                <a href="{{ url('/admin/pengadaan') }}"
                    class="flex-1 px-6 py-3 rounded-xl border-2 border-gray-200 text-gray-700 font-semibold text-center hover:bg-gray-50 transition-all">
                    Batal
                </a>

                <button type="submit"
                    class="flex-1 btn-premium px-6 py-3 rounded-xl text-white font-semibold shadow-md">
                    Simpan Pengadaan
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function setMode(mode) {
        const modeInput = document.getElementById('mode_pengadaan');
        const formExisting = document.getElementById('formExisting');
        const formNew = document.getElementById('formNew');
        const btnExisting = document.getElementById('btnExisting');
        const btnNew = document.getElementById('btnNew');

        modeInput.value = mode;

        if (mode === 'existing') {
            formExisting.classList.remove('hidden');
            formNew.classList.add('hidden');

            btnExisting.className = 'px-5 py-4 rounded-2xl font-semibold bg-[#0B3B5F] text-white shadow-md';
            btnNew.className = 'px-5 py-4 rounded-2xl font-semibold bg-gray-100 text-gray-700 hover:bg-gray-200';
        } else {
            formExisting.classList.add('hidden');
            formNew.classList.remove('hidden');

            btnExisting.className = 'px-5 py-4 rounded-2xl font-semibold bg-gray-100 text-gray-700 hover:bg-gray-200';
            btnNew.className = 'px-5 py-4 rounded-2xl font-semibold bg-[#0B3B5F] text-white shadow-md';
        }
    }

    function fillStockData() {
        const select = document.getElementById('stock_id');
        const option = select.options[select.selectedIndex];

        if (!option || !option.value) {
            document.getElementById('existing_nama_barang').value = '';
            document.getElementById('existing_kode_barang').value = '';
            document.getElementById('existing_kategori').value = '';
            document.getElementById('existing_jumlah_stock').value = '';
            document.getElementById('existing_satuan').value = '';
            document.getElementById('existing_lokasi').value = '';
            return;
        }

        document.getElementById('existing_nama_barang').value = option.dataset.nama || '';
        document.getElementById('existing_kode_barang').value = option.dataset.kode || '';
        document.getElementById('existing_kategori').value = option.dataset.kategori || '';
        document.getElementById('existing_jumlah_stock').value = option.dataset.jumlah || 0;
        document.getElementById('existing_satuan').value = option.dataset.satuan || '';
        document.getElementById('existing_lokasi').value = option.dataset.lokasi || '';
    }

    setMode('existing');
</script>

<style>
    .premium-card {
        background: white;
        border-radius: 20px;
        border: 1px solid rgba(203, 213, 225, 0.3);
        overflow: hidden;
    }

    .btn-premium {
        background: linear-gradient(135deg, #0B3B5F, #0A2E4A);
        border: none;
        transition: all 0.3s ease;
    }

    .btn-premium:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(11, 59, 95, 0.3);
    }
</style>
@endsection