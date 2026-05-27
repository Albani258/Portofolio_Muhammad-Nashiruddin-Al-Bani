@extends('layouts.admin')

@section('content')

<!-- Welcome Banner -->
<div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-[#0B3B5F] to-[#0A2E4A] p-8 mb-8 shadow-xl">
    <div class="absolute top-0 right-0 w-64 h-64 bg-[#D4A017] opacity-10 rounded-full filter blur-3xl"></div>

    <div class="relative z-10">
        <h1 class="text-2xl font-bold text-white mb-2">
            Manajemen Akun Petugas
        </h1>

        <p class="text-white/80 text-sm">
            Kelola akun admin dan user pada sistem pengajuan barang BPSDM.
        </p>
    </div>
</div>

@if(session('success'))
<div class="mb-5 px-5 py-3 rounded-xl bg-green-100 text-green-700 font-semibold">
    {{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="mb-5 px-5 py-3 rounded-xl bg-red-100 text-red-700 font-semibold">
    {{ session('error') }}
</div>
@endif

@if ($errors->any())
<div class="mb-5 rounded-xl border border-red-200 bg-red-50 p-4 text-red-700">
    <p class="font-semibold">Terjadi kesalahan:</p>
    <ul class="mt-2 list-disc list-inside text-sm">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<!-- Stat Cards -->
<div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4 mb-8">
    <div class="stat-card-premium p-6 shadow-md hover:shadow-xl transition-all duration-300">
        <div class="flex items-center justify-between mb-4">
            <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-[#0B3B5F] to-[#0A2E4A] flex items-center justify-center shadow-lg">
                <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                </svg>
            </div>

            <span class="text-3xl font-bold text-[#0B3B5F]">
                {{ $totalAkun ?? 0 }}
            </span>
        </div>

        <p class="text-gray-500 text-sm font-medium">Total Akun</p>
        <p class="text-xs text-gray-400 mt-2">Seluruh akun terdaftar</p>
    </div>

    <div class="stat-card-premium p-6 shadow-md hover:shadow-xl transition-all duration-300">
        <div class="flex items-center justify-between mb-4">
            <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-emerald-500 to-green-600 flex items-center justify-center shadow-lg">
                <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15h-2v-2h2v2zm0-4h-2V7h2v6z" />
                </svg>
            </div>

            <span class="text-3xl font-bold text-[#0B3B5F]">
                {{ $totalUser ?? 0 }}
            </span>
        </div>

        <p class="text-gray-500 text-sm font-medium">Akun User</p>

        <div class="mt-2 w-full bg-gray-200 rounded-full h-1.5">
            <div class="bg-emerald-500 h-1.5 rounded-full" style="width: {{ $persenUser ?? 0 }}%"></div>
        </div>

        <p class="text-xs text-gray-400 mt-2">
            {{ $persenUser ?? 0 }}% dari total akun
        </p>
    </div>

    <div class="stat-card-premium p-6 shadow-md hover:shadow-xl transition-all duration-300">
        <div class="flex items-center justify-between mb-4">
            <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-red-500 to-red-600 flex items-center justify-center shadow-lg">
                <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2L4 5v6c0 5.55 3.84 10.74 8 12 4.16-1.26 8-6.45 8-12V5l-8-3z" />
                </svg>
            </div>

            <span class="text-3xl font-bold text-[#0B3B5F]">
                {{ $totalAdmin ?? 0 }}
            </span>
        </div>

        <p class="text-gray-500 text-sm font-medium">Akun Admin</p>

        <div class="mt-2 w-full bg-gray-200 rounded-full h-1.5">
            <div class="bg-red-500 h-1.5 rounded-full" style="width: {{ $persenAdmin ?? 0 }}%"></div>
        </div>

        <p class="text-xs text-gray-400 mt-2">Admin tidak dapat dihapus</p>
    </div>

    <div class="stat-card-premium p-6 shadow-md hover:shadow-xl transition-all duration-300">
        <div class="flex items-center justify-between mb-4">
            <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-[#D4A017] to-[#B8920E] flex items-center justify-center shadow-lg">
                <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z" />
                </svg>
            </div>

            <span class="text-3xl font-bold text-[#0B3B5F]">
                {{ $totalDivisi ?? 0 }}
            </span>
        </div>

        <p class="text-gray-500 text-sm font-medium">Divisi</p>
        <p class="text-xs text-gray-400 mt-2">Berdasarkan data akun</p>
    </div>
</div>

<!-- Main Table Card -->
<div class="premium-card shadow-xl">
    <div class="p-6 border-b border-gray-100 bg-gradient-to-r from-white to-gray-50">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
            <div>
                <h2 class="text-xl font-bold text-[#0B3B5F] flex items-center gap-2">
                    <div class="w-1 h-8 bg-[#D4A017] rounded-full"></div>
                    Daftar Akun Petugas
                </h2>
                <p class="text-sm text-gray-500 mt-1">
                    Menampilkan data petugas aktif di seluruh unit kerja
                </p>
            </div>

            <div class="flex flex-col sm:flex-row gap-3">
                <a href="{{ route('admin.akun.create') }}"
                    class="inline-flex items-center justify-center px-5 py-2.5 rounded-xl bg-[#0B3B5F] text-white text-sm font-semibold hover:bg-[#0A2E4A] transition">
                    + Tambah Akun
                </a>

                <form id="filterForm" method="GET" action="{{ route('admin.akun.index') }}"
                    class="flex flex-col sm:flex-row gap-3">

                    <div class="relative">
                        <svg class="absolute left-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>

                        <input type="text"
                            id="searchInput"
                            name="search"
                            placeholder="Cari nama, username, NIP, atau email..."
                            class="pl-11 pr-4 py-2.5 rounded-xl border border-gray-200 w-full sm:w-72 focus:border-[#D4A017] focus:ring-2 focus:ring-[#D4A017]/20 transition-all"
                            value="{{ request('search') }}">
                    </div>

                    <select name="divisi"
                        id="divisiSelect"
                        class="px-4 py-2.5 rounded-xl border border-gray-200 bg-white focus:border-[#D4A017] focus:ring-2 focus:ring-[#D4A017]/20">

                        <option value="Semua" {{ request('divisi', 'Semua') === 'Semua' ? 'selected' : '' }}>
                            Semua Divisi
                        </option>

                        @foreach($divisiList as $divisi)
                        <option value="{{ $divisi }}" {{ request('divisi') === $divisi ? 'selected' : '' }}>
                            {{ $divisi }}
                        </option>
                        @endforeach
                    </select>
                </form>
            </div>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gradient-to-r from-[#0B3B5F] to-[#0A2E4A]">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Petugas</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Username</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">NIP</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Divisi</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Kontak</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-100">
                @forelse($users as $index => $user)
                <tr class="hover:bg-[#F5E6B8]/20 transition-all duration-200 group">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-[#0B3B5F] to-[#0A2E4A] flex items-center justify-center text-white font-bold shadow-md">
                                {{ strtoupper(substr($user->name ?? 'U', 0, 1)) }}
                            </div>

                            <div>
                                <p class="font-semibold text-gray-800">
                                    {{ $user->name }}
                                </p>

                                <p class="text-xs text-gray-400">
                                    {{ $user->jabatan ?? '-' }}
                                </p>
                            </div>
                        </div>
                    </td>

                    <td class="px-6 py-4">
                        <span class="inline-flex items-center rounded-full bg-blue-50 px-3 py-1 text-xs font-bold text-blue-700 border border-blue-100">
                            {{ $user->username ? '@' . $user->username : '-' }}
                        </span>
                    </td>

                    <td class="px-6 py-4">
                        <p class="text-sm text-gray-600 font-mono">
                            {{ $user->nip ?? '-' }}
                        </p>
                    </td>

                    <td class="px-6 py-4">
                        <span class="px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-700">
                            {{ $user->divisi ?? '-' }}
                        </span>
                    </td>

                    <td class="px-6 py-4">
                        <p class="text-sm text-gray-600">
                            {{ $user->email ?? '-' }}
                        </p>
                    </td>

                    <td class="px-6 py-4">
                        @if($user->role === 'admin')
                            <span class="inline-flex items-center px-3 py-2 rounded-lg bg-gray-100 text-gray-400 text-xs font-semibold cursor-not-allowed">
                                Tidak dapat dihapus
                            </span>
                        @else
                            <form action="{{ route('admin.akun.destroy', $user->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                    onclick="return confirm('Yakin ingin menghapus akun ini?')"
                                    class="px-3 py-2 rounded-lg bg-red-600 text-white text-xs font-semibold hover:bg-red-700 transition">
                                    Hapus
                                </button>
                            </form>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-10 text-center text-gray-400 font-semibold">
                        Data akun tidak ditemukan.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="border-t border-gray-100 px-6 py-5 bg-gray-50/40">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <p class="text-sm text-gray-500">
                Menampilkan
                <span class="font-bold text-[#0B3B5F]">{{ $users->firstItem() ?? 0 }}</span>
                sampai
                <span class="font-bold text-[#0B3B5F]">{{ $users->lastItem() ?? 0 }}</span>
                dari
                <span class="font-bold text-[#0B3B5F]">{{ $users->total() }}</span>
                data akun
            </p>

            @if($users->hasPages())
                {{ $users->links() }}
            @endif
        </div>
    </div>
</div>

<style>
    .stat-card-premium {
        background: white;
        border-radius: 24px;
        position: relative;
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .stat-card-premium:hover {
        transform: translateY(-6px);
        box-shadow: 0 25px 40px -12px rgba(11, 59, 95, 0.25);
    }

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

<script>
    const searchInput = document.getElementById('searchInput');
    const divisiSelect = document.getElementById('divisiSelect');
    const filterForm = document.getElementById('filterForm');

    let debounceTimer = null;

    if (searchInput) {
        searchInput.addEventListener('input', function() {
            clearTimeout(debounceTimer);

            debounceTimer = setTimeout(function() {
                filterForm.submit();
            }, 500);
        });
    }

    if (divisiSelect) {
        divisiSelect.addEventListener('change', function() {
            filterForm.submit();
        });
    }
</script>

@endsection