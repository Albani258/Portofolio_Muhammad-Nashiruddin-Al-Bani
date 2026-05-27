@extends('layouts.user')
@section('content')

<!-- Welcome Banner -->
<div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-[#0B3B5F] to-[#0A2E4A] p-8 mb-8 shadow-xl">
    <div class="absolute top-0 right-0 w-64 h-64 bg-[#D4A017] opacity-10 rounded-full filter blur-3xl"></div>
    <div class="absolute bottom-0 left-0 w-48 h-48 bg-[#D4A017] opacity-5 rounded-full filter blur-2xl"></div>
    <div class="relative z-10">
        <div class="flex justify-between items-start flex-wrap gap-4">
            <div>
                <h1 class="text-1xl font-bold text-white mb-2">Selamat Datang di Dashboard Rumah Tangga - Badan Pengembangan Sumber Daya Manusia - Kementerian Imigrasi dan Pemasyarakatan</h1>
                <p class="text-white/80 text-sm">Pantau tren aktual pengajuan dan pengadaan, status proses, aktivitas bagian, serta evaluasi permintaan secara lebih profesional dan ringkas.</p>
            </div>
        </div>
    </div>
</div>

<!-- 4 Kartu Statistik Utama -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="stat-card-premium p-5">
        <div class="flex items-center justify-between mb-3">
            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-[#0B3B5F] to-[#0A2E4A] flex items-center justify-center shadow-md">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                </svg>
            </div>
            <span class="text-3xl font-bold text-[#0B3B5F]" id="total_stock">245</span>
        </div>
        <p class="text-xs font-medium text-gray-500 uppercase tracking-wide">Stock Barang</p>
        <div class="mt-2 flex items-center justify-between">
            <span class="text-sm text-gray-600">Stock aktif:</span>
            <span class="text-sm font-semibold text-green-600" id="active_stock">210</span>
        </div>
        <div class="mt-2 w-full bg-gray-200 rounded-full h-1.5">
            <div class="bg-green-500 h-1.5 rounded-full" style="width: 86%"></div>
        </div>
    </div>

    <div class="stat-card-premium p-5">
        <div class="flex items-center justify-between mb-3">
            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center shadow-md">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
            </div>
            <span class="text-3xl font-bold text-blue-700" id="total_pengajuan">18</span>
        </div>
        <p class="text-xs font-medium text-gray-500 uppercase tracking-wide">Data Pengajuan</p>
        <div class="mt-2 flex items-center justify-between">
            <span class="text-sm text-gray-600">Permintaan masuk:</span>
            <span class="text-sm font-semibold text-orange-600" id="pengajuan_masuk">5</span>
        </div>
        <div class="mt-2 w-full bg-gray-200 rounded-full h-1.5">
            <div class="bg-orange-500 h-1.5 rounded-full" style="width: 28%"></div>
        </div>
    </div>

    <div class="stat-card-premium p-5">
        <div class="flex items-center justify-between mb-3">
            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-purple-500 to-purple-600 flex items-center justify-center shadow-md">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                </svg>
            </div>
            <span class="text-3xl font-bold text-purple-700" id="total_pengadaan">12</span>
        </div>
        <p class="text-xs font-medium text-gray-500 uppercase tracking-wide">Data Pengadaan</p>
        <div class="mt-2 flex items-center justify-between">
            <span class="text-sm text-gray-600">Tahap pengadaan:</span>
            <span class="text-sm font-semibold text-yellow-600" id="tahap_pengadaan">3</span>
        </div>
        <div class="mt-2 w-full bg-gray-200 rounded-full h-1.5">
            <div class="bg-yellow-500 h-1.5 rounded-full" style="width: 25%"></div>
        </div>
    </div>

    <div class="stat-card-premium p-5">
        <div class="flex items-center justify-between mb-3">
            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-emerald-500 to-green-600 flex items-center justify-center shadow-md">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                </svg>
            </div>
            <span class="text-3xl font-bold text-emerald-700" id="permintaan_aktif">9</span>
        </div>
        <p class="text-xs font-medium text-gray-500 uppercase tracking-wide">Permintaan Aktif</p>
        <div class="mt-2 flex items-center justify-between">
            <span class="text-sm text-gray-600">Masih diproses:</span>
            <span class="text-sm font-semibold text-red-500" id="masih_diproses">4</span>
        </div>
        <div class="mt-2 w-full bg-gray-200 rounded-full h-1.5">
            <div class="bg-red-500 h-1.5 rounded-full" style="width: 44%"></div>
        </div>
    </div>
</div>


<!-- 3 Kolom: Peminat Aktif, Barang Sering Diminta, Bagian Sering Minta -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
    <!-- Peminat Paling Aktif -->
    <div class="premium-card shadow-md">
        <div class="p-5 border-b border-gray-100 bg-gradient-to-r from-white to-gray-50">
            <h3 class="font-bold text-[#0B3B5F] flex items-center gap-2">
                <div class="w-1 h-5 bg-[#D4A017] rounded-full"></div>
                Peminat Paling Aktif
            </h3>
            <p class="text-xs text-gray-500 mt-1">Siapa yang paling sering mengajukan barang</p>
        </div>
        <div class="p-5 space-y-4" id="top_peminat">
            <!-- Data akan diisi oleh JS -->
        </div>
    </div>

    <!-- Barang yang Paling Sering Diminta -->
    <div class="premium-card shadow-md">
        <div class="p-5 border-b border-gray-100 bg-gradient-to-r from-white to-gray-50">
            <h3 class="font-bold text-[#0B3B5F] flex items-center gap-2">
                <div class="w-1 h-5 bg-[#D4A017] rounded-full"></div>
                Barang Paling Sering Diminta
            </h3>
            <p class="text-xs text-gray-500 mt-1">Barang yang paling banyak muncul dalam pengajuan</p>
        </div>
        <div class="p-5 space-y-4" id="top_barang">
            <!-- Data akan diisi oleh JS -->
        </div>
    </div>

    <!-- Bagian Paling Sering Minta -->
    <div class="premium-card shadow-md">
        <div class="p-5 border-b border-gray-100 bg-gradient-to-r from-white to-gray-50">
            <h3 class="font-bold text-[#0B3B5F] flex items-center gap-2">
                <div class="w-1 h-5 bg-[#D4A017] rounded-full"></div>
                Bagian Paling Sering Minta
            </h3>
            <p class="text-xs text-gray-500 mt-1">Perbandingan frekuensi permintaan antar bagian</p>
        </div>
        <div class="p-5 space-y-4" id="top_bagian">
            <!-- Data akan diisi oleh JS -->
        </div>
    </div>
</div>

<!-- Tabel Evaluasi Pengajuan dan Pengadaan -->
<div class="premium-card shadow-xl">
    <div class="p-5 border-b border-gray-100 bg-gradient-to-r from-white to-gray-50">
        <h2 class="text-lg font-bold text-[#0B3B5F] flex items-center gap-2">
            <div class="w-1 h-6 bg-[#D4A017] rounded-full"></div>
            Tabel Evaluasi Pengajuan dan Pengadaan
        </h2>
        <p class="text-xs text-gray-500 mt-1">Menampilkan nama peminta, bagian, barang, jumlah, status, dan sumber proses</p>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full" id="evaluationTable">
            <thead class="bg-gradient-to-r from-[#0B3B5F] to-[#0A2E4A]">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Nama Peminta</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Bagian</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Nama Barang</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Kode</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Kategori</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Jumlah</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Status</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Sumber</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100" id="tableBody">
                <!-- Data akan diisi oleh JS -->
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.28/jspdf.plugin.autotable.min.js"></script>

<script>
// Data Statis
const peminatData = [
    { name: 'Rizky Ramadhan', bagian: 'Operasional', count: 6 },
    { name: 'Nadia Putri', bagian: 'Keuangan', count: 4 },
    { name: 'Fajar Hidayat', bagian: 'SDM', count: 3 }
];

const barangData = [
    { name: 'Sepatu Running Pro', kategori: 'Footwear', count: 5 },
    { name: 'Kaos Olahraga Dri-Fit', kategori: 'Apparel', count: 4 },
    { name: 'Topi Olahraga UV', kategori: 'Accessories', count: 3 }
];

const bagianData = [
    { name: 'Operasional', count: 5 },
    { name: 'Keuangan', count: 4 },
    { name: 'SDM', count: 3 },
    { name: 'Marketing', count: 2 },
    { name: 'IT', count: 1 }
];

const tableData = [
    { peminta: 'Rizky Ramadhan', bagian: 'Operasional', barang: 'Sepatu Running Pro', kode: 'MAP-001', kategori: 'Footwear', jumlah: 120, status: 'Disetujui semua', statusType: 'success', sumber: 'Pengadaan' },
    { peminta: 'Nadia Putri', bagian: 'Keuangan', barang: 'Kaos Olahraga Dri-Fit', kode: 'MAP-002', kategori: 'Apparel', jumlah: 80, status: 'Disetujui sebagian', statusType: 'warning', sumber: 'Pengadaan' },
    { peminta: 'Fajar Hidayat', bagian: 'SDM', barang: 'Tas Gym Active', kode: 'MAP-003', kategori: 'Accessories', jumlah: 30, status: 'Ditolak', statusType: 'danger', sumber: 'Pengadaan' },
    { peminta: 'Rizky Ramadhan', bagian: 'Operasional', barang: 'Celana Training Elite', kode: 'MAP-004', kategori: 'Apparel', jumlah: 60, status: 'Disetujui semua', statusType: 'success', sumber: 'Pengadaan' },
    { peminta: 'Alya Safira', bagian: 'Marketing', barang: 'Topi Olahraga UV', kode: 'MAP-005', kategori: 'Accessories', jumlah: 45, status: 'Disetujui semua', statusType: 'success', sumber: 'Pengadaan' },
    { peminta: 'Nadia Putri', bagian: 'Keuangan', barang: 'Agency Website', kode: 'PGJ-001', kategori: 'Active', jumlah: 3900, status: 'Pengajuan', statusType: 'pending', sumber: 'Pengajuan' }
];

// Data Chart
const chartData = {
    labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18],
    pengajuan: [2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 14, 13, 12, 11],
    pengadaan: [1, 2, 2, 3, 4, 5, 6, 7, 8, 9, 10, 10, 11, 12, 11, 10, 9, 8]
};

let chart;

// Inisialisasi Chart
function initChart() {
    const ctx = document.getElementById('trendChart').getContext('2d');
    chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: chartData.labels,
            datasets: [
                {
                    label: 'Pengajuan Aktual',
                    data: chartData.pengajuan,
                    borderColor: '#0B3B5F',
                    backgroundColor: 'rgba(11, 59, 95, 0.1)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4,
                    pointBackgroundColor: '#0B3B5F',
                    pointBorderColor: '#fff',
                    pointRadius: 5,
                    pointHoverRadius: 7
                },
                {
                    label: 'Pengadaan Aktual',
                    data: chartData.pengadaan,
                    borderColor: '#D4A017',
                    backgroundColor: 'rgba(212, 160, 23, 0.1)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4,
                    pointBackgroundColor: '#D4A017',
                    pointBorderColor: '#fff',
                    pointRadius: 5,
                    pointHoverRadius: 7
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            plugins: {
                legend: {
                    position: 'top',
                    labels: {
                        usePointStyle: true,
                        boxWidth: 10,
                        font: { size: 12, family: 'Inter' }
                    }
                },
                tooltip: {
                    backgroundColor: '#0B3B5F',
                    titleColor: '#D4A017',
                    bodyColor: '#fff',
                    borderColor: '#D4A017',
                    borderWidth: 1
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    max: 20,
                    title: {
                        display: true,
                        text: 'Jumlah',
                        font: { size: 12, weight: 'bold' }
                    },
                    grid: { color: '#E5E7EB' }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Periode (Bulan ke-)',
                        font: { size: 12, weight: 'bold' }
                    },
                    grid: { display: false }
                }
            }
        }
    });
}

// Render Peminat
function renderPeminat() {
    const container = document.getElementById('top_peminat');
    const colors = ['from-[#0B3B5F] to-[#0A2E4A]', 'from-purple-500 to-purple-600', 'from-emerald-500 to-emerald-600'];
    container.innerHTML = peminatData.map((item, idx) => `
        <div class="flex items-center justify-between p-3 ${idx === 0 ? 'bg-blue-50/50' : idx === 1 ? 'bg-purple-50/50' : 'bg-emerald-50/50'} rounded-xl">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-gradient-to-br ${colors[idx]} flex items-center justify-center text-white font-bold shadow-md">${item.name.charAt(0)}${item.name.split(' ')[1]?.charAt(0) || item.name.charAt(1)}</div>
                <div>
                    <p class="font-semibold text-gray-800">${item.name}</p>
                    <p class="text-xs text-gray-500">${item.bagian}</p>
                </div>
            </div>
            <div class="text-right">
                <span class="text-2xl font-bold text-[#D4A017]">${item.count}</span>
                <p class="text-xs text-gray-400">Kali</p>
            </div>
        </div>
    `).join('');
}

// Render Barang
function renderBarang() {
    const container = document.getElementById('top_barang');
    container.innerHTML = barangData.map((item, idx) => `
        <div class="flex items-center justify-between p-3 ${idx === 0 ? 'bg-blue-50/50' : idx === 1 ? 'bg-purple-50/50' : 'bg-emerald-50/50'} rounded-xl">
            <div>
                <p class="font-semibold text-gray-800">${item.name}</p>
                <p class="text-xs text-gray-500">${item.kategori}</p>
            </div>
            <div class="text-right">
                <span class="text-2xl font-bold text-[#D4A017]">${item.count}</span>
                <p class="text-xs text-gray-400">Kali</p>
            </div>
        </div>
    `).join('');
}

// Render Bagian
function renderBagian() {
    const container = document.getElementById('top_bagian');
    const maxCount = Math.max(...bagianData.map(d => d.count));
    container.innerHTML = bagianData.map((item) => `
        <div>
            <div class="flex justify-between items-center mb-1">
                <span class="text-sm font-medium text-gray-700">${item.name}</span>
                <span class="text-sm font-bold text-[#D4A017]">${item.count} Kali</span>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-2">
                <div class="bg-gradient-to-r from-[#0B3B5F] to-[#D4A017] h-2 rounded-full" style="width: ${(item.count / maxCount) * 100}%"></div>
            </div>
        </div>
    `).join('');
}

// Render Tabel
function renderTable() {
    const tbody = document.getElementById('tableBody');
    const statusClass = {
        success: 'badge-success',
        warning: 'badge-warning',
        danger: 'badge-danger',
        pending: 'badge-pending'
    };
    const statusIcon = {
        success: '✅',
        warning: '⚠️',
        danger: '❌',
        pending: '📋'
    };
    
    tbody.innerHTML = tableData.map(item => `
        <tr class="hover:bg-[#F5E6B8]/20 transition-all">
            <td class="px-6 py-4 font-medium text-gray-800">${item.peminta}</td>
            <td class="px-6 py-4 text-gray-600">${item.bagian}</td>
            <td class="px-6 py-4 text-gray-800">${item.barang}</td>
            <td class="px-6 py-4 font-mono text-gray-600">${item.kode}</td>
            <td class="px-6 py-4"><span class="px-2 py-1 rounded-full text-xs ${item.kategori === 'Footwear' ? 'bg-blue-100 text-blue-700' : item.kategori === 'Apparel' ? 'bg-purple-100 text-purple-700' : item.kategori === 'Accessories' ? 'bg-orange-100 text-orange-700' : 'bg-green-100 text-green-700'}">${item.kategori}</span></td>
            <td class="px-6 py-4 text-gray-700">${item.jumlah.toLocaleString()}</td>
            <td class="px-6 py-4"><span class="${statusClass[item.statusType]}">${statusIcon[item.statusType]} ${item.status}</span></td>
            <td class="px-6 py-4"><span class="px-2 py-1 rounded-full text-xs ${item.sumber === 'Pengadaan' ? 'bg-purple-100 text-purple-700' : 'bg-blue-100 text-blue-700'}">${item.sumber}</span></td>
        </tr>
    `).join('');
}

// Filter Data (simulasi)
function filterData() {
    const startDate = document.getElementById('start_date').value;
    const endDate = document.getElementById('end_date').value;
    alert(`Filter data dari ${startDate} sampai ${endDate}`);
    // Di implementasi nyata, ini akan memanggil API
}

// Export ke Excel
function exportToExcel() {
    const data = tableData.map(item => ({
        'Nama Peminta': item.peminta,
        'Bagian': item.bagian,
        'Nama Barang': item.barang,
        'Kode': item.kode,
        'Kategori': item.kategori,
        'Jumlah': item.jumlah,
        'Status': item.status,
        'Sumber': item.sumber
    }));
    
    const ws = XLSX.utils.json_to_sheet(data);
    const wb = XLSX.utils.book_new();
    XLSX.utils.book_append_sheet(wb, ws, 'Evaluasi Pengajuan');
    XLSX.writeFile(wb, `Evaluasi_Pengajuan_${new Date().toISOString().split('T')[0]}.xlsx`);
}

// Export ke PDF
function exportToPDF() {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF({ orientation: 'landscape', unit: 'mm' });
    
    doc.setFontSize(16);
    doc.setTextColor(11, 59, 95);
    doc.text('Laporan Evaluasi Pengajuan dan Pengadaan', 20, 20);
    doc.setFontSize(10);
    doc.setTextColor(100, 100, 100);
    doc.text(`Tanggal: ${new Date().toLocaleDateString('id-ID')}`, 20, 30);
    
    const tableColumn = ["Nama Peminta", "Bagian", "Nama Barang", "Kode", "Kategori", "Jumlah", "Status", "Sumber"];
    const tableRows = tableData.map(item => [
        item.peminta, item.bagian, item.barang, item.kode, item.kategori, item.jumlah.toString(), item.status, item.sumber
    ]);
    
    doc.autoTable({
        head: [tableColumn],
        body: tableRows,
        startY: 40,
        theme: 'grid',
        styles: { fontSize: 8, cellPadding: 2 },
        headStyles: { fillColor: [11, 59, 95], textColor: 255, fontStyle: 'bold' },
        alternateRowStyles: { fillColor: [245, 245, 245] }
    });
    
    doc.save(`Evaluasi_Pengajuan_${new Date().toISOString().split('T')[0]}.pdf`);
}

// Inisialisasi semua
document.addEventListener('DOMContentLoaded', () => {
    initChart();
    renderPeminat();
    renderBarang();
    renderBagian();
    renderTable();
});
</script>

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

    .stat-card-premium {
        background: white;
        border-radius: 20px;
        position: relative;
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        border: 1px solid rgba(203, 213, 225, 0.3);
    }
    .stat-card-premium::after {
        content: '';
        position: absolute;
        bottom: 0;
        right: 0;
        width: 100px;
        height: 100px;
        background: radial-gradient(circle, rgba(212, 160, 23, 0.08), transparent);
        border-radius: 50%;
        pointer-events: none;
    }
    .stat-card-premium:hover {
        transform: translateY(-4px);
        box-shadow: 0 20px 40px -12px rgba(11, 59, 95, 0.15);
    }

    .btn-premium {
        background: linear-gradient(135deg, #0B3B5F, #0A2E4A);
        border: none;
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
    }
    .btn-premium::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s ease;
    }
    .btn-premium:hover::before {
        left: 100%;
    }
    .btn-premium:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(11, 59, 95, 0.3);
    }

    .badge-success {
        background: linear-gradient(135deg, #10B981, #059669);
        color: white;
        padding: 5px 12px;
        border-radius: 50px;
        font-size: 0.75rem;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 4px;
    }
    .badge-warning {
        background: linear-gradient(135deg, #F59E0B, #D97706);
        color: white;
        padding: 5px 12px;
        border-radius: 50px;
        font-size: 0.75rem;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 4px;
    }
    .badge-danger {
        background: linear-gradient(135deg, #EF4444, #DC2626);
        color: white;
        padding: 5px 12px;
        border-radius: 50px;
        font-size: 0.75rem;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 4px;
    }
    .badge-pending {
        background: linear-gradient(135deg, #6B7280, #4B5563);
        color: white;
        padding: 5px 12px;
        border-radius: 50px;
        font-size: 0.75rem;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 4px;
    }
</style>

@endsection