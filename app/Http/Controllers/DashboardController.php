<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;

class DashboardController extends Controller
{
    public function index()
    {
        // Mengambil jumlah total pengaduan
        $totalPengaduan = Pengaduan::count();
        $pengaduanDalamProses = Pengaduan::where('status', 1)->count();
        $pengaduanSelesai = Pengaduan::where('status', 2)->count();

        // Data untuk Bar Chart (Jumlah Pengaduan per Bulan)
        $monthlyPengaduan = Pengaduan::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('count', 'month');

        // Inisialisasi array dengan 12 bulan (Januari - Desember)
        $barChartData = array_fill(1, 12, 0);
        foreach ($monthlyPengaduan as $month => $count) {
            $barChartData[$month] = $count;
        }

        // Data untuk Pie Chart (Status Pengaduan)
        $statusPengaduan = Pengaduan::selectRaw('status, COUNT(*) as count')
            ->groupBy('status')
            ->pluck('count', 'status');

        $pieChartData = [
            'Selesai' => $statusPengaduan[2] ?? 0,
            'Sedang Diproses' => $statusPengaduan[1] ?? 0,
            'Belum Ditangani' => $statusPengaduan[0] ?? 0,
        ];

        // Data untuk Line Chart (Tren Pengaduan dari Berbagai Kategori)
        $categories = ['INTALTUSKIM', 'INTELDAKIM', 'LANTASKIM', 'TIKIM'];
        $lineChartData = [];

        foreach ($categories as $category) {
            $data = Pengaduan::where('kategori', $category)
                ->selectRaw('MONTH(created_at) as month, COUNT(*) as count')
                ->groupBy('month')
                ->orderBy('month')
                ->pluck('count', 'month');

            // Inisialisasi data dengan 12 bulan (default 0)
            $lineChartData[$category] = array_fill(1, 12, 0);
            foreach ($data as $month => $count) {
                $lineChartData[$category][$month] = $count;
            }
        }

        dd($totalPengaduan, $pengaduanDalamProses, $pengaduanSelesai);

        return view('dashboard', [
            'totalPengaduan' => $totalPengaduan,
            'pengaduanDalamProses' => $pengaduanDalamProses,
            'pengaduanSelesai' => $pengaduanSelesai,
            'barChartData' => json_encode(array_values($barChartData)),
            'pieChartData' => json_encode(array_values($pieChartData)),
            'lineChartData' => json_encode($lineChartData),
        ]);
    }
}