<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Pengadaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;


class PengadaanController extends Controller
{
    public function index()
    {
        $pengadaans = Pengadaan::with('stock')
            ->latest()
            ->get();

        return view('admin.pengadaan.index', compact('pengadaans'));
    }

    public function create()
    {
        $stocks = Stock::select(
            'id',
            'nama_barang',
            'kode_barang',
            'kategori',
            'jumlah_stock',
            'satuan',
            'minimal_stock',
            'lokasi'
        )
            ->orderBy('nama_barang', 'asc')
            ->get();

        $kategoriOptions = $this->kategoriOptions();
        $satuanOptions = $this->satuanOptions();

        return view('admin.pengadaan.create', compact(
            'stocks',
            'kategoriOptions',
            'satuanOptions',
        ));
    }

    private function kategoriOptions()
    {
        return [
            'ATK',
            'Elektronik',
            'Furniture',
            'Perlengkapan Kantor',
            'Perangkat Jaringan',
            'Komputer & Aksesoris',
            'Arsip dan Dokumen',
            'Perlengkapan Kebersihan',
            'Perlengkapan Rapat',
            'Operasional Kantor',
            'Lainnya',
        ];
    }

    private function satuanOptions()
    {
        return [
            'Pcs',
            'Box',
            'Rim',
            'Pak',
            'Unit',
            'Set',
            'Lembar',
            'Roll',
            'Botol',
            'Buah',
            'Dus',
            'Meter',
        ];
    }



    public function store(Request $request)
    {
        $rules = [
            'mode_pengadaan' => 'required|in:existing,new',
            'jumlah_masuk' => 'required|integer|min:1',
        ];

        if ($request->mode_pengadaan === 'existing') {
            $rules['stock_id'] = 'required|integer|exists:stock,id';
        }

        if ($request->mode_pengadaan === 'new') {
            $rules['nama_barang'] = 'required|string|max:255';
            $rules['kode_barang'] = 'required|string|max:50|unique:stock,kode_barang';
            $rules['kategori'] = ['required', 'string', Rule::in($this->kategoriOptions())];
            $rules['satuan'] = ['required', 'string', Rule::in($this->satuanOptions())];
            $rules['minimal_stock'] = 'nullable|integer|min:0';
            $rules['lokasi'] = 'required|string|max:255';
        }

        $validated = $request->validate($rules);

        DB::transaction(function () use ($validated) {
            if ($validated['mode_pengadaan'] === 'existing') {
                $stock = Stock::where('id', $validated['stock_id'])
                    ->lockForUpdate()
                    ->firstOrFail();

                $stock->update([
                    'jumlah_stock' => $stock->jumlah_stock + $validated['jumlah_masuk'],
                ]);
            } else {
                $stock = Stock::create([
                    'nama_barang' => $validated['nama_barang'],
                    'kode_barang' => $validated['kode_barang'],
                    'kategori' => $validated['kategori'],
                    'jumlah_stock' => $validated['jumlah_masuk'],
                    'satuan' => $validated['satuan'] ?? 'Pcs',
                    'minimal_stock' => $validated['minimal_stock'] ?? 0,
                    'lokasi' => $validated['lokasi'] ?? null,
                ]);
            }

            Pengadaan::create([
                'stock_id' => $stock->id,
                'nama_barang' => $stock->nama_barang,
                'kode_barang' => $stock->kode_barang,
                'kategori' => $stock->kategori,
                'jumlah_pengadaan' => $validated['jumlah_masuk'],
                'satuan' => $stock->satuan,
                'minimal_stock' => $stock->minimal_stock,
                'lokasi' => $stock->lokasi,
                'harga_satuan' => null,
                'nama_supplier' => null,
                'kontak_supplier' => null,
                'tanggal_pengadaan' => now()->toDateString(),
                'keterangan' => null,
                'status' => 'Selesai',
            ]);
        });

        return redirect('/admin/pengadaan')
            ->with('success', 'Data pengadaan berhasil diproses.');
    }
}
