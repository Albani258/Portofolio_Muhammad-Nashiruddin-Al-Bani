<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class DashboardReportExport implements WithMultipleSheets
{
    protected array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function sheets(): array
    {
        $ringkasan = [
            ['Indikator', 'Jumlah'],
            ['Stock Barang', $this->data['totalStockBarang'] ?? 0],
            ['Data Pengajuan', $this->data['totalPengajuan'] ?? 0],
            ['Data Pengadaan', $this->data['totalPengadaan'] ?? 0],
            ['Permintaan Aktif', $this->data['permintaanAktif'] ?? 0],
        ];

        $pengaju = [
            ['No', 'Nama Pengaju', 'Divisi', 'Total Pengajuan', 'Total Barang Diminta'],
        ];

        foreach ($this->data['pengajuPalingAktif'] as $index => $item) {
            $pengaju[] = [
                $index + 1,
                $item->nama_pengaju ?? '-',
                $item->divisi_pengaju ?? '-',
                $item->total_pengajuan ?? 0,
                $item->total_barang_diminta ?? 0,
            ];
        }

        $barang = [
            ['No', 'Kode Barang', 'Nama Barang', 'Kategori', 'Total Pengajuan', 'Total Diminta', 'Total Disetujui'],
        ];

        foreach ($this->data['barangSeringDiajukan'] as $index => $item) {
            $barang[] = [
                $index + 1,
                $item->stock->kode_barang ?? '-',
                $item->stock->nama_barang ?? '-',
                $item->stock->kategori ?? '-',
                $item->total_pengajuan ?? 0,
                $item->total_diminta ?? 0,
                $item->total_disetujui ?? 0,
            ];
        }

        $divisi = [
            ['No', 'Divisi', 'Total Pengajuan', 'Total Barang Diminta'],
        ];

        foreach ($this->data['divisiSeringMengajukan'] as $index => $item) {
            $divisi[] = [
                $index + 1,
                $item->divisi_pengaju ?? '-',
                $item->total_pengajuan ?? 0,
                $item->total_barang_diminta ?? 0,
            ];
        }

        $pengajuanTerbaru = [
            ['No', 'Tanggal', 'Nama Pengaju', 'Divisi', 'Kode Barang', 'Nama Barang', 'Jumlah Diajukan', 'Jumlah Disetujui', 'Status'],
        ];

        foreach ($this->data['pengajuanTerbaru'] as $index => $item) {
            $pengajuanTerbaru[] = [
                $index + 1,
                $item->tanggal_pengajuan ?? '-',
                $item->nama_pengaju ?? '-',
                $item->divisi_pengaju ?? '-',
                $item->stock->kode_barang ?? '-',
                $item->stock->nama_barang ?? '-',
                ($item->jumlah_pengajuan ?? 0) . ' ' . ($item->satuan ?? ''),
                ($item->jumlah_disetujui ?? 0) . ' ' . ($item->satuan ?? ''),
                $item->status_pengajuan ?? '-',
            ];
        }

        return [
            new DashboardArraySheet('Ringkasan', $ringkasan),
            new DashboardArraySheet('Pengaju Aktif', $pengaju),
            new DashboardArraySheet('Barang Diajukan', $barang),
            new DashboardArraySheet('Divisi Aktif', $divisi),
            new DashboardArraySheet('Pengajuan Terbaru', $pengajuanTerbaru),
        ];
    }
}

class DashboardArraySheet implements FromArray, WithTitle, ShouldAutoSize, WithStyles
{
    protected string $title;
    protected array $rows;

    public function __construct(string $title, array $rows)
    {
        $this->title = $title;
        $this->rows = $rows;
    }

    public function array(): array
    {
        return $this->rows;
    }

    public function title(): string
    {
        return $this->title;
    }

    public function styles(Worksheet $sheet)
    {
        $highestColumn = $sheet->getHighestColumn();

        $sheet->getStyle("A1:{$highestColumn}1")->applyFromArray([
            'font' => [
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF'],
            ],
            'fill' => [
                'fillType' => 'solid',
                'startColor' => ['rgb' => '0B3B5F'],
            ],
            'alignment' => [
                'horizontal' => 'center',
            ],
        ]);

        $sheet->getStyle($sheet->calculateWorksheetDimension())->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => 'thin',
                    'color' => ['rgb' => 'D9E2EC'],
                ],
            ],
        ]);

        return [];
    }
}