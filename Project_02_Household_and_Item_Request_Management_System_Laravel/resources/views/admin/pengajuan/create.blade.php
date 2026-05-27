@extends('layouts.admin')
@section('title', 'Pengajuan Barang')
@section('content')

<div class="premium-card shadow-xl p-8 mt-6">
    <!-- Header -->
    <div class="p-6 border-b border-gray-100 bg-gradient-to-r from-white to-gray-50 mb-6">
        <h2 class="text-xl font-bold text-[#0B3B5F] flex items-center gap-2">
            <div class="w-1 h-8 bg-[#D4A017] rounded-full"></div>
            Form Buat Pengajuan Barang
        </h2>
        <p class="text-sm text-gray-500 mt-1">Isi data pengajuan barang dengan lengkap dan akurat</p>
    </div>

    <!-- Error Messages -->
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

    <form action="{{ route('admin.pengajuan.store') }}" method="POST" class="grid gap-6 md:grid-cols-2">
        @csrf

        <!-- Pengaju -->
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Pengaju <span class="text-red-500">*</span></label>
            <select name="user_id" class="w-full px-5 py-3 rounded-xl border-2 border-gray-200 bg-white focus:border-[#D4A017] focus:ring-2 focus:ring-[#D4A017]/20 transition-all" required>
                <option value="">-- Pilih User --</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Barang -->
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Barang <span class="text-red-500">*</span></label>
            <select name="stock_id" class="w-full px-5 py-3 rounded-xl border-2 border-gray-200 bg-white focus:border-[#D4A017] focus:ring-2 focus:ring-[#D4A017]/20 transition-all" required>
                <option value="">-- Pilih Barang --</option>
                @foreach($stocks as $stock)
                    <option value="{{ $stock->id }}" {{ old('stock_id') == $stock->id ? 'selected' : '' }}>{{ $stock->nama_barang }}</option>
                @endforeach
            </select>
        </div>

        <!-- Jumlah -->
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Jumlah <span class="text-red-500">*</span></label>
            <input type="number" name="jumlah_pengajuan" class="w-full px-5 py-3 rounded-xl border-2 border-gray-200 focus:border-[#D4A017] focus:ring-2 focus:ring-[#D4A017]/20 transition-all" value="{{ old('jumlah_pengajuan') }}" required>
        </div>

        <!-- Satuan -->
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Satuan <span class="text-red-500">*</span></label>
            <select name="satuan" class="w-full px-5 py-3 rounded-xl border-2 border-gray-200 bg-white focus:border-[#D4A017] focus:ring-2 focus:ring-[#D4A017]/20 transition-all" required>
                <option value="">-- Pilih Satuan --</option>
                @foreach($satuan as $item)
                    <option value="{{ $item }}" {{ old('satuan') == $item ? 'selected' : '' }}>{{ $item }}</option>
                @endforeach
            </select>
        </div>


        <!-- Prioritas -->
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Prioritas <span class="text-red-500">*</span></label>
            <select name="prioritas" class="w-full px-5 py-3 rounded-xl border-2 border-gray-200 bg-white focus:border-[#D4A017] focus:ring-2 focus:ring-[#D4A017]/20 transition-all" required>
                <option value="">-- Pilih Prioritas --</option>
                <option value="Normal" {{ old('prioritas') == 'Normal' ? 'selected' : '' }}>Normal</option>
                <option value="Urgent" {{ old('prioritas') == 'Urgent' ? 'selected' : '' }}>Urgent</option>
                <option value="Critical" {{ old('prioritas') == 'Critical' ? 'selected' : '' }}>Critical</option>
            </select>
        </div>

        <!-- Tanggal Pengajuan -->
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Tanggal Pengajuan <span class="text-red-500">*</span></label>
            <input type="date" name="tanggal_pengajuan" class="w-full px-5 py-3 rounded-xl border-2 border-gray-200 focus:border-[#D4A017] focus:ring-2 focus:ring-[#D4A017]/20 transition-all" value="{{ old('tanggal_pengajuan', date('Y-m-d')) }}" required>
        </div>

        <!-- Tanggal Dibutuhkan -->
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Tanggal Dibutuhkan</label>
            <input type="date" name="tanggal_dibutuhkan" class="w-full px-5 py-3 rounded-xl border-2 border-gray-200 focus:border-[#D4A017] focus:ring-2 focus:ring-[#D4A017]/20 transition-all" value="{{ old('tanggal_dibutuhkan') }}">
        </div>

        <!-- Keterangan -->
        <div class="md:col-span-2">
            <label class="block text-sm font-semibold text-gray-700 mb-2">Keterangan</label>
            <textarea name="keterangan" class="w-full px-5 py-3 rounded-xl border-2 border-gray-200 focus:border-[#D4A017] focus:ring-2 focus:ring-[#D4A017]/20 transition-all resize-none" rows="3">{{ old('keterangan') }}</textarea>
        </div>

        <!-- Buttons -->
        <div class="md:col-span-2 flex gap-4 pt-4 border-t border-gray-200 mt-4">
            <a href="{{ route('admin.pengajuan.index') }}" class="flex-1 px-6 py-3 rounded-xl border-2 border-gray-200 text-gray-700 font-semibold text-center hover:bg-gray-50 transition-all">
                Batal
            </a>
            <button type="submit" class="flex-1 btn-premium px-6 py-3 rounded-xl text-white font-semibold shadow-md">
                Simpan Pengajuan
            </button>
        </div>
    </form>
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
    .btn-premium {
        background: linear-gradient(135deg, #0B3B5F, #0A2E4A);
        border: none;
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
    }
    .btn-premium:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(11, 59, 95, 0.3);
    }
</style>
@endsection