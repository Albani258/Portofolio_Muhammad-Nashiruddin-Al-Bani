<?php

namespace App\Http\Controllers;

use App\Models\PengajuanBarang;
use App\Models\Stock;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class PengajuanController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | ADMIN: Menampilkan semua pengajuan
    |--------------------------------------------------------------------------
    */
public function index(Request $request)
{
    $query = PengajuanBarang::with(['stock', 'user']);

    /*
    |--------------------------------------------------------------------------
    | Search Pengajuan
    |--------------------------------------------------------------------------
    */
    if ($request->filled('search')) {
        $search = $request->search;

        $query->where(function ($q) use ($search) {
            $q->where('nama_pengaju', 'like', "%{$search}%")
                ->orWhere('divisi_pengaju', 'like', "%{$search}%")
                ->orWhere('prioritas', 'like', "%{$search}%")
                ->orWhere('keterangan', 'like', "%{$search}%")
                ->orWhereHas('stock', function ($stockQuery) use ($search) {
                    $stockQuery->where('kode_barang', 'like', "%{$search}%")
                        ->orWhere('nama_barang', 'like', "%{$search}%")
                        ->orWhere('kategori', 'like', "%{$search}%")
                        ->orWhere('satuan', 'like', "%{$search}%")
                        ->orWhere('lokasi', 'like', "%{$search}%");
                });
        });
    }

    /*
    |--------------------------------------------------------------------------
    | Filter Status Pengajuan
    |--------------------------------------------------------------------------
    */
    if ($request->filled('status') && $request->status !== 'Semua') {
        $query->where('status_pengajuan', $request->status);
    }

    /*
    |--------------------------------------------------------------------------
    | Data Pengajuan dengan Pagination
    |--------------------------------------------------------------------------
    */
    $pengajuan = $query
        ->orderBy('tanggal_pengajuan', 'desc')
        ->orderBy('id', 'desc')
        ->paginate(10)
        ->withQueryString();

    /*
    |--------------------------------------------------------------------------
    | Statistik Pengajuan
    |--------------------------------------------------------------------------
    */
    $totalPengajuan = PengajuanBarang::count();

    $totalPending = PengajuanBarang::where('status_pengajuan', 'Pending')
        ->count();

    $totalDisetujuiSemua = PengajuanBarang::where('status_pengajuan', 'Disetujui semua')
        ->count();

    $totalDisetujuiSebagian = PengajuanBarang::where('status_pengajuan', 'Disetujui sebagian')
        ->count();

    $totalDitolak = PengajuanBarang::where('status_pengajuan', 'Ditolak')
        ->count();

    return view('admin.pengajuan.index', compact(
        'pengajuan',
        'totalPengajuan',
        'totalPending',
        'totalDisetujuiSemua',
        'totalDisetujuiSebagian',
        'totalDitolak'
    ));
}

    /*
    |--------------------------------------------------------------------------
    | USER: Menampilkan pengajuan milik akun yang sedang login
    |--------------------------------------------------------------------------
    */
    public function index_user(Request $request)
    {
        $userId = auth()->id();

        $query = PengajuanBarang::with(['stock', 'user'])
            ->where('user_id', $userId);

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('prioritas', 'like', "%{$search}%")
                    ->orWhere('keterangan', 'like', "%{$search}%")
                    ->orWhereHas('stock', function ($stockQuery) use ($search) {
                        $stockQuery->where('kode_barang', 'like', "%{$search}%")
                            ->orWhere('nama_barang', 'like', "%{$search}%")
                            ->orWhere('kategori', 'like', "%{$search}%");
                    });
            });
        }

        if ($request->filled('status') && $request->status !== 'Semua') {
            $query->where('status_pengajuan', $request->status);
        }

        $pengajuan = $query
            ->orderBy('tanggal_pengajuan', 'desc')
            ->orderBy('id', 'desc')
            ->paginate(10)
            ->withQueryString();

        $totalPengajuan = PengajuanBarang::where('user_id', $userId)->count();

        $pending = PengajuanBarang::where('user_id', $userId)
            ->where('status_pengajuan', 'Pending')
            ->count();

        $disetujui = PengajuanBarang::where('user_id', $userId)
            ->whereIn('status_pengajuan', [
                'Disetujui semua',
                'Disetujui sebagian'
            ])
            ->count();

        $ditolak = PengajuanBarang::where('user_id', $userId)
            ->where('status_pengajuan', 'Ditolak')
            ->count();

        return view('user.pengajuan.index', compact(
            'pengajuan',
            'totalPengajuan',
            'pending',
            'disetujui',
            'ditolak'
        ));
    }
    /*
    |--------------------------------------------------------------------------
    | Ambil nilai enum satuan dari tabel pengajuan_barang
    |--------------------------------------------------------------------------
    */
    private function getSatuanEnum()
    {
        $columns = DB::select("SHOW COLUMNS FROM pengajuan_barang WHERE Field = 'satuan'");

        if (empty($columns)) {
            return [];
        }

        $type = $columns[0]->Type;

        if (preg_match("/^enum\('(.*)'\)$/", $type, $matches)) {
            return explode("','", $matches[1]);
        }

        return [];
    }

    /*
    |--------------------------------------------------------------------------
    | USER: Menampilkan form create pengajuan
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        $stock = Stock::orderBy('nama_barang', 'asc')->get();
        $users = User::orderBy('name', 'asc')->get();
        $satuan = $this->getSatuanEnum();

        return view('user.pengajuan.create', compact('stock', 'users', 'satuan'));
    }

    /*
    |--------------------------------------------------------------------------
    | USER: Menyimpan pengajuan baru
    |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'stock_id' => 'required|integer|exists:stock,id',
            'jumlah_pengajuan' => 'required|integer|min:1',
            'prioritas' => 'required|string|max:50',
            'tanggal_pengajuan' => 'required|date',
            'tanggal_dibutuhkan' => 'nullable|date',
            'keterangan' => 'nullable|string',
        ]);

        $stock = Stock::findOrFail($validated['stock_id']);

        PengajuanBarang::create([
            'user_id' => auth()->id(),
            'stock_id' => $stock->id,
            'jumlah_pengajuan' => $validated['jumlah_pengajuan'],
            'jumlah_disetujui' => null,
            'satuan' => $stock->satuan,
            'prioritas' => $validated['prioritas'],
            'tanggal_pengajuan' => $validated['tanggal_pengajuan'],
            'tanggal_dibutuhkan' => $validated['tanggal_dibutuhkan'] ?? null,
            'keterangan' => $validated['keterangan'] ?? null,
            'status_pengajuan' => 'Pending',
            'divisi_pengaju' => auth()->user()->divisi ?? null,
            'nama_pengaju' => auth()->user()->name ?? null,
            'created_by' => auth()->id(),
        ]);

        return redirect()
            ->route('user.pengajuan.index')
            ->with('success', 'Pengajuan berhasil dikirim dan menunggu persetujuan admin.');
    }

    /*
    |--------------------------------------------------------------------------
    | USER: Menghapus pengajuan miliknya sendiri
    |--------------------------------------------------------------------------
    */
    public function destroy($id)
    {
        $pengajuan = PengajuanBarang::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        if ($pengajuan->status_pengajuan !== 'Pending') {
            return back()->with('error', 'Pengajuan yang sudah diproses tidak dapat dihapus.');
        }

        $pengajuan->delete();

        return redirect()
            ->back()
            ->with('success', 'Pengajuan berhasil dihapus.');
    }

    /*
    |--------------------------------------------------------------------------
    | ADMIN: Update status pengajuan dan pengurangan stok
    |--------------------------------------------------------------------------
    */
    public function updateStatus(Request $request, $id)
    {
        $validated = $request->validate([
            'aksi_persetujuan' => 'required|in:approve_all,approve_partial,reject',
            'jumlah_disetujui' => 'nullable|integer|min:1',
            'alasan_penolakan' => 'nullable|string|max:1000',
        ]);

        DB::transaction(function () use ($validated, $id) {
            $pengajuan = PengajuanBarang::where('id', $id)
                ->lockForUpdate()
                ->firstOrFail();

            if ($pengajuan->status_pengajuan !== 'Pending') {
                throw ValidationException::withMessages([
                    'status_pengajuan' => 'Pengajuan ini sudah diproses sebelumnya.',
                ]);
            }

            $stock = Stock::where('id', $pengajuan->stock_id)
                ->lockForUpdate()
                ->firstOrFail();

            $jumlahPengajuan = (int) $pengajuan->jumlah_pengajuan;
            $stokTersedia = (int) $stock->jumlah_stock;

            /*
            |--------------------------------------------------------------------------
            | Setujui Semua
            |--------------------------------------------------------------------------
            */
            if ($validated['aksi_persetujuan'] === 'approve_all') {
                if ($stokTersedia < $jumlahPengajuan) {
                    throw ValidationException::withMessages([
                        'stok' => 'Stok tidak mencukupi untuk menyetujui semua pengajuan. Stok tersedia hanya ' . $stokTersedia . ' ' . $stock->satuan . '. Silakan setujui sebagian.',
                    ]);
                }

                $stock->update([
                    'jumlah_stock' => $stokTersedia - $jumlahPengajuan,
                ]);

                $pengajuan->update([
                    'status_pengajuan' => 'Disetujui semua',
                    'jumlah_disetujui' => $jumlahPengajuan,
                    'updated_at' => now(),
                ]);

                return;
            }

            /*
            |--------------------------------------------------------------------------
            | Setujui Sebagian
            |--------------------------------------------------------------------------
            */
            if ($validated['aksi_persetujuan'] === 'approve_partial') {
                $jumlahDisetujui = (int) ($validated['jumlah_disetujui'] ?? 0);

                if ($jumlahDisetujui < 1) {
                    throw ValidationException::withMessages([
                        'jumlah_disetujui' => 'Jumlah disetujui wajib diisi.',
                    ]);
                }

                if ($jumlahDisetujui > $jumlahPengajuan) {
                    throw ValidationException::withMessages([
                        'jumlah_disetujui' => 'Jumlah disetujui tidak boleh melebihi jumlah pengajuan.',
                    ]);
                }

                if ($jumlahDisetujui > $stokTersedia) {
                    throw ValidationException::withMessages([
                        'stok' => 'Stok tidak mencukupi. Stok tersedia hanya ' . $stokTersedia . ' ' . $stock->satuan . '.',
                    ]);
                }

                $stock->update([
                    'jumlah_stock' => $stokTersedia - $jumlahDisetujui,
                ]);

                $pengajuan->update([
                    'status_pengajuan' => 'Disetujui sebagian',
                    'jumlah_disetujui' => $jumlahDisetujui,
                    'updated_at' => now(),
                ]);

                return;
            }

            /*
            |--------------------------------------------------------------------------
            | Tolak Pengajuan
            |--------------------------------------------------------------------------
            */
            if ($validated['aksi_persetujuan'] === 'reject') {
                $alasan = $validated['alasan_penolakan'] ?? null;

                $pengajuan->update([
                    'status_pengajuan' => 'Ditolak',
                    'jumlah_disetujui' => 0,
                    'keterangan' => $alasan
                        ? trim(($pengajuan->keterangan ?? '') . "\nAlasan ditolak: " . $alasan)
                        : $pengajuan->keterangan,
                    'updated_at' => now(),
                ]);

                return;
            }
        });

        return back()->with('success', 'Status pengajuan berhasil diperbarui dan stok berhasil disesuaikan.');
    }

    /*
    |--------------------------------------------------------------------------
    | Backward compatibility jika route lama masih ada
    |--------------------------------------------------------------------------
    */
    public function approveAll($id)
    {
        $request = new Request([
            'aksi_persetujuan' => 'approve_all',
        ]);

        return $this->updateStatus($request, $id);
    }

    public function approvePartial(Request $request, $id)
    {
        $request->merge([
            'aksi_persetujuan' => 'approve_partial',
        ]);

        return $this->updateStatus($request, $id);
    }

    public function reject(Request $request, $id)
    {
        $request->merge([
            'aksi_persetujuan' => 'reject',
        ]);

        return $this->updateStatus($request, $id);
    }
}
