<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index(Request $request)
    {
        $query = Stock::query();

        if ($request->filled('status') && $request->status !== 'Semua') {
            if ($request->status === 'Tersedia') {
                $query->whereColumn('jumlah_stock', '>', 'minimal_stock');
            } elseif ($request->status === 'Menipis') {
                $query->whereColumn('jumlah_stock', '<=', 'minimal_stock')
                    ->where('jumlah_stock', '>', 0);
            } elseif ($request->status === 'Habis') {
                $query->where('jumlah_stock', 0);
            }
        }

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('nama_barang', 'like', "%{$search}%")
                    ->orWhere('kode_barang', 'like', "%{$search}%")
                    ->orWhere('kategori', 'like', "%{$search}%")
                    ->orWhere('satuan', 'like', "%{$search}%")
                    ->orWhere('lokasi', 'like', "%{$search}%");
            });
        }

        $stock = $query
            ->orderBy('nama_barang', 'asc')
            ->paginate(10)
            ->withQueryString();

        $totalBarang = Stock::count();
        $totalStok = Stock::sum('jumlah_stock');

        $tersedia = Stock::whereColumn('jumlah_stock', '>', 'minimal_stock')->count();

        $menipis = Stock::whereColumn('jumlah_stock', '<=', 'minimal_stock')
            ->where('jumlah_stock', '>', 0)
            ->count();

        $habis = Stock::where('jumlah_stock', 0)->count();

        return view('admin.stock.index', compact(
            'stock',
            'totalBarang',
            'totalStok',
            'tersedia',
            'menipis',
            'habis'
        ));
    }

    public function create()
    {
        $kategori = Stock::select('kategori')
            ->distinct()
            ->whereNotNull('kategori')
            ->where('kategori', '!=', '')
            ->orderBy('kategori', 'asc')
            ->pluck('kategori');

        if ($kategori->isEmpty()) {
            $kategori = collect([
                'ALAT TULIS',
                'KERTAS HVS',
                'TINTA/TONER PRINTER',
                'OBAT CAIR (BARANG KONSUMSI)',
                'OBAT PADAT (BARANG KONSUMSI)',
                'ALAT PEREKAT',
                'BATU BATERAI',
                'AMPLOP',
            ]);
        }

        $satuan = Stock::select('satuan')
            ->distinct()
            ->whereNotNull('satuan')
            ->where('satuan', '!=', '')
            ->orderBy('satuan', 'asc')
            ->pluck('satuan');

        if ($satuan->isEmpty()) {
            $satuan = collect(['Pcs', 'Lembar', 'Pak', 'Botol', 'Box']);
        }

        return view('admin.stock.create', compact('kategori', 'satuan'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_barang' => 'required|string|max:255',
            'kode_barang' => 'required|string|max:50',
            'kategori' => 'required|string|max:100',
            'jumlah_stock' => 'required|integer|min:0',
            'satuan' => 'required|string|max:50',
            'minimal_stock' => 'required|integer|min:0',
            'lokasi' => 'required|string|max:255',
        ]);

        Stock::create($validated);

        return redirect()
            ->route('admin.stock.index')
            ->with('success', 'Stock barang berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $stock = Stock::findOrFail($id);

        $kategori = Stock::select('kategori')
            ->distinct()
            ->whereNotNull('kategori')
            ->where('kategori', '!=', '')
            ->orderBy('kategori', 'asc')
            ->pluck('kategori');

        $satuan = Stock::select('satuan')
            ->distinct()
            ->whereNotNull('satuan')
            ->where('satuan', '!=', '')
            ->orderBy('satuan', 'asc')
            ->pluck('satuan');

        return view('admin.stock.edit', compact('stock', 'kategori', 'satuan'));
    }

    public function update(Request $request, $id)
    {
        $stock = Stock::findOrFail($id);

        $validated = $request->validate([
            'nama_barang' => 'required|string|max:255',
            'kode_barang' => 'required|string|max:50',
            'kategori' => 'required|string|max:100',
            'jumlah_stock' => 'required|integer|min:0',
            'satuan' => 'required|string|max:50',
            'minimal_stock' => 'required|integer|min:0',
            'lokasi' => 'required|string|max:255',
        ]);

        $stock->update($validated);

        return redirect()
            ->route('admin.stock.index')
            ->with('success', 'Data stock barang berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $stock = Stock::findOrFail($id);
        $stock->delete();

        return redirect()
            ->route('admin.stock.index')
            ->with('success', 'Data stock barang berhasil dihapus.');
    }
}