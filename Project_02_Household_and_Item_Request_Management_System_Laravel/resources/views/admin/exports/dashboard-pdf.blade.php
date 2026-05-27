<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Dashboard Admin</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            color: #1f2937;
            font-size: 12px;
        }

        .header {
            background: #0B3B5F;
            color: white;
            padding: 18px;
            border-radius: 8px;
            margin-bottom: 18px;
        }

        .header h1 {
            margin: 0;
            font-size: 20px;
        }

        .header p {
            margin: 4px 0 0;
            font-size: 11px;
            opacity: 0.9;
        }

        .summary {
            width: 100%;
            margin-bottom: 18px;
            border-collapse: collapse;
        }

        .summary td {
            width: 25%;
            padding: 12px;
            border: 1px solid #d1d5db;
            text-align: center;
        }

        .summary .label {
            font-size: 10px;
            color: #6b7280;
            text-transform: uppercase;
        }

        .summary .value {
            font-size: 20px;
            font-weight: bold;
            color: #0B3B5F;
            margin-top: 4px;
        }

        h2 {
            font-size: 15px;
            color: #0B3B5F;
            margin: 18px 0 8px;
            border-left: 4px solid #D4A017;
            padding-left: 8px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 14px;
        }

        th {
            background: #0B3B5F;
            color: white;
            padding: 8px;
            font-size: 11px;
            text-align: left;
        }

        td {
            border: 1px solid #e5e7eb;
            padding: 7px;
            font-size: 10px;
        }

        tr:nth-child(even) td {
            background: #f9fafb;
        }

        .footer {
            margin-top: 20px;
            font-size: 10px;
            color: #6b7280;
            text-align: right;
        }
    </style>
</head>
<body>

    <div class="header">
        <h1>Laporan Dashboard Admin</h1>
        <p>Sistem Pengajuan dan Pengadaan Barang BPSDM</p>
        <p>Dicetak pada: {{ now()->format('d-m-Y H:i') }}</p>
    </div>

    <table class="summary">
        <tr>
            <td>
                <div class="label">Stock Barang</div>
                <div class="value">{{ $totalStockBarang ?? 0 }}</div>
            </td>
            <td>
                <div class="label">Data Pengajuan</div>
                <div class="value">{{ $totalPengajuan ?? 0 }}</div>
            </td>
            <td>
                <div class="label">Data Pengadaan</div>
                <div class="value">{{ $totalPengadaan ?? 0 }}</div>
            </td>
            <td>
                <div class="label">Permintaan Aktif</div>
                <div class="value">{{ $permintaanAktif ?? 0 }}</div>
            </td>
        </tr>
    </table>

    <h2>Pengaju Paling Aktif</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pengaju</th>
                <th>Divisi</th>
                <th>Total Pengajuan</th>
                <th>Total Barang Diminta</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pengajuPalingAktif as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->nama_pengaju ?? '-' }}</td>
                    <td>{{ $item->divisi_pengaju ?? '-' }}</td>
                    <td>{{ $item->total_pengajuan ?? 0 }}</td>
                    <td>{{ $item->total_barang_diminta ?? 0 }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Belum ada data.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <h2>Barang yang Sering Diajukan</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Total Pengajuan</th>
                <th>Total Diminta</th>
                <th>Total Disetujui</th>
            </tr>
        </thead>
        <tbody>
            @forelse($barangSeringDiajukan as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->stock->kode_barang ?? '-' }}</td>
                    <td>{{ $item->stock->nama_barang ?? '-' }}</td>
                    <td>{{ $item->stock->kategori ?? '-' }}</td>
                    <td>{{ $item->total_pengajuan ?? 0 }}</td>
                    <td>{{ $item->total_diminta ?? 0 }}</td>
                    <td>{{ $item->total_disetujui ?? 0 }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">Belum ada data.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <h2>Divisi yang Paling Sering Mengajukan</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Divisi</th>
                <th>Total Pengajuan</th>
                <th>Total Barang Diminta</th>
            </tr>
        </thead>
        <tbody>
            @forelse($divisiSeringMengajukan as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->divisi_pengaju ?? '-' }}</td>
                    <td>{{ $item->total_pengajuan ?? 0 }}</td>
                    <td>{{ $item->total_barang_diminta ?? 0 }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Belum ada data.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        Laporan ini dihasilkan secara otomatis oleh sistem.
    </div>

</body>
</html>