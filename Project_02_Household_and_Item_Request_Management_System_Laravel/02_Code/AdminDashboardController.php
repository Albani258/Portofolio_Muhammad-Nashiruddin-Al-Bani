<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Pengadaan;
use App\Models\PengajuanBarang;
use App\Exports\DashboardReportExport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminDashboardController extends Controller
{
    private function dashboardData()
    {
        $totalStockBarang = Stock::count();

        $totalPengajuan = PengajuanBarang::count();

        $totalPengadaan = Pengadaan::count();

        $permintaanAktif = PengajuanBarang::where('status_pengajuan', 'Pending')->count();

        $pengajuPalingAktif = PengajuanBarang::select(
                'nama_pengaju',
                'divisi_pengaju',
                DB::raw('COUNT(*) as total_pengajuan'),
                DB::raw('SUM(jumlah_pengajuan) as total_barang_diminta')
            )
            ->whereNotNull('nama_pengaju')
            ->groupBy('nama_pengaju', 'divisi_pengaju')
            ->orderByDesc('total_pengajuan')
            ->limit(5)
            ->get();

        $barangSeringDiajukan = PengajuanBarang::with('stock')
            ->select(
                'stock_id',
                DB::raw('COUNT(*) as total_pengajuan'),
                DB::raw('SUM(jumlah_pengajuan) as total_diminta'),
                DB::raw('SUM(COALESCE(jumlah_disetujui, 0)) as total_disetujui')
            )
            ->whereNotNull('stock_id')
            ->groupBy('stock_id')
            ->orderByDesc('total_pengajuan')
            ->limit(5)
            ->get();

        $divisiSeringMengajukan = PengajuanBarang::select(
                'divisi_pengaju',
                DB::raw('COUNT(*) as total_pengajuan'),
                DB::raw('SUM(jumlah_pengajuan) as total_barang_diminta')
            )
            ->whereNotNull('divisi_pengaju')
            ->groupBy('divisi_pengaju')
            ->orderByDesc('total_pengajuan')
            ->limit(5)
            ->get();

        $pengajuanTerbaru = PengajuanBarang::with(['stock', 'user'])
            ->orderBy('tanggal_pengajuan', 'desc')
            ->orderBy('id', 'desc')
            ->limit(10)
            ->get();

        return compact(
            'totalStockBarang',
            'totalPengajuan',
            'totalPengadaan',
            'permintaanAktif',
            'pengajuPalingAktif',
            'barangSeringDiajukan',
            'divisiSeringMengajukan',
            'pengajuanTerbaru'
        );
    }

    public function index()
    {
        return view('admin.index', $this->dashboardData());
    }

    public function exportPdf()
    {
        $data = $this->dashboardData();

        $pdf = Pdf::loadView('admin.exports.dashboard-pdf', $data)
            ->setPaper('a4', 'portrait');

        return $pdf->download('laporan-dashboard-admin.pdf');
    }

    public function exportExcel()
    {
        return Excel::download(
            new DashboardReportExport($this->dashboardData()),
            'laporan-dashboard-admin.xlsx'
        );
    }
}