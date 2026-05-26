<?php

namespace App\Http\Controllers;

use App\Models\PengajuanBarangBaru;
use App\Models\User;
use Illuminate\Http\Request;


class PengadaanUserController extends Controller
{
    public function index()
    {
        $query = PengajuanBarangBaru::with('user');

        // Filter search
        if ($search = request()->search) {
            $query->where(function ($q) use ($search) {
                $q->where('nama_barang', 'like', "%{$search}%")
                    ->orWhere('prioritas', 'like', "%{$search}%")
                    ->orWhere('keterangan', 'like', "%{$search}%")
                    ->orWhereHas('user', function ($q2) use ($search) {
                        $q2->where('name', 'like', "%{$search}%")
                            ->orWhere('divisi', 'like', "%{$search}%");
                    });
            });
        }

        // Filter status
        if ($status = request()->status) {
            if ($status !== 'Semua') {
                $query->where('status_pengajuan', $status);
            }
        }

        $pengadaan = $query->orderBy('tanggal_pengajuan', 'desc')
            ->orderBy('id', 'desc')
            ->paginate(10)
            ->withQueryString();

        // Statistik dashboard (Menyesuaikan dengan Enum database Anda)
        $total = PengajuanBarangBaru::count();
        $pending = PengajuanBarangBaru::where('status_pengajuan', 'Pending')->count();
        $disetujui = PengajuanBarangBaru::whereIn('status_pengajuan', ['Disetujui semua', 'Disetujui sebagian'])->count();
        $ditolak = PengajuanBarangBaru::where('status_pengajuan', 'Ditolak')->count();

        return view('admin.permintaan_user.index', compact(
            'pengadaan',
            'total',
            'pending',
            'disetujui',
            'ditolak'
        ));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'aksi_persetujuan' => 'required|in:approve_all,approve_partial,reject',
            'alasan_penolakan' => 'required_if:aksi_persetujuan,reject|nullable|string'
        ]);

        $pengajuan = PengajuanBarangBaru::findOrFail($id);

        switch ($request->aksi_persetujuan) {
            case 'approve_all':
                $pengajuan->status_pengajuan = 'Disetujui semua';
                // Jika ingin otomatis mengisi jumlah_disetujui sama dengan jumlah_pengajuan:
                $pengajuan->jumlah_disetujui = $pengajuan->jumlah_pengajuan;
                break;

            case 'approve_partial':
                $pengajuan->status_pengajuan = 'Disetujui sebagian';
                $pengajuan->jumlah_disetujui = $request->jumlah_disetujui ?? 0;
                break;

            case 'reject':
                $pengajuan->status_pengajuan = 'Ditolak';
                $pengajuan->jumlah_disetujui = 0;
                // Simpan alasan ke kolom keterangan jika tidak ada kolom khusus alasan_penolakan
                $pengajuan->keterangan = $pengajuan->keterangan . " (Ditolak karena: " . ($request->alasan_penolakan ?? '-') . ")";
                break;
        }

        $pengajuan->save();

        return redirect()->back()->with('success', 'Status pengajuan berhasil diperbarui.');
    }
    public function index_user(Request $request)
    {
        $userId = auth()->id();

        $query = PengajuanBarangBaru::where('user_id', $userId);

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama_barang', 'like', "%{$search}%")
                    ->orWhere('prioritas', 'like', "%{$search}%")
                    ->orWhere('keterangan', 'like', "%{$search}%");
            });
        }

        if ($request->filled('status') && $request->status !== 'Semua') {
            $query->where('status_pengajuan', $request->status);
        }

        $pengadaan = $query->orderBy('tanggal_pengajuan', 'desc')
            ->orderBy('id', 'desc')
            ->paginate(10)
            ->withQueryString();

        $total = PengajuanBarangBaru::where('user_id', $userId)->count();
        $pending = PengajuanBarangBaru::where('user_id', $userId)
            ->where('status_pengajuan', 'Pending')
            ->count();
        $disetujui = PengajuanBarangBaru::where('user_id', $userId)
            ->whereIn('status_pengajuan', ['Disetujui semua', 'Disetujui sebagian'])
            ->count();
        $ditolak = PengajuanBarangBaru::where('user_id', $userId)
            ->where('status_pengajuan', 'Ditolak')
            ->count();

        return view('user.pengadaan.index', compact(
            'pengadaan',
            'total',
            'pending',
            'disetujui',
            'ditolak'
        ));
    }

    /**
     * USER: Menampilkan form create pengadaan
     */
    public function create()
    {
        $users = User::orderBy('name', 'asc')->get();

        // Misal satuan dari enum
        $satuan = ['Pcs', 'Box', 'Pack', 'Lusin'];

        return view('user.pengadaan.create', compact('satuan', 'users'));
    }

    /**
     * USER: Menyimpan pengadaan baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_barang' => 'required|string|max:255',
            'satuan' => 'required|string|max:50',
            'jumlah_pengajuan' => 'required|integer|min:1',
            'prioritas' => 'nullable|string|max:50',
            'tanggal_pengajuan' => 'required|date',
            'tanggal_dibutuhkan' => 'nullable|date',
            'keterangan' => 'nullable|string',
        ]);

        PengajuanBarangBaru::create([
            'user_id' => auth()->id(),
            'nama_barang' => $validated['nama_barang'],
            'satuan' => $validated['satuan'],
            'jumlah_pengajuan' => $validated['jumlah_pengajuan'],
            'prioritas' => $validated['prioritas'] ?? null,
            'tanggal_pengajuan' => $validated['tanggal_pengajuan'],
            'tanggal_dibutuhkan' => $validated['tanggal_dibutuhkan'] ?? null,
            'keterangan' => $validated['keterangan'] ?? null,
            'status_pengajuan' => 'Pending',
            'divisi_pengaju' => auth()->user()->divisi ?? null,
            'nama_pengaju' => auth()->user()->name ?? null,
            'created_by' => auth()->id(),
        ]);

        return redirect()
            ->route('user.pengadaan.index')
            ->with('success', 'Pengadaan berhasil dikirim dan menunggu persetujuan.');
    }

    /**
     * USER: Menghapus pengadaan miliknya sendiri
     */
    public function destroy($id)
    {
        $pengadaan = PengajuanBarangBaru::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        if ($pengadaan->status_pengajuan !== 'Pending') {
            return back()->with('error', 'Pengadaan yang sudah diproses tidak dapat dihapus.');
        }

        $pengadaan->delete();

        return back()->with('success', 'Pengadaan berhasil dihapus.');
    }
}
