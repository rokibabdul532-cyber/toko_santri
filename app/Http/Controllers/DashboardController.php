<?php

namespace App\Http\Controllers;

use App\Models\KitabModel;
use App\Models\KaryawanModel;
use App\Models\PenjualanModel;
use App\Models\PembelianModel;
use App\Models\PenjualanDetailModel;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Dashboard',
            'list' => ['Home', 'Dashboard']
        ];
        $activeMenu = 'dashboard';

        // Statistik
        $totalKitab = KitabModel::count();
        $totalKaryawan = KaryawanModel::count();
        $totalPenjualan = PenjualanModel::count();
        $totalPembelian = PembelianModel::count();

        // Stok menipis (stok <= stok_minimal)
        $stokMenipis = KitabModel::whereColumn('stok', '<=', 'stok_minimal')->count();

        // Total penjualan hari ini
        $penjualanHariIni = PenjualanModel::whereDate('tanggal_penjualan', date('Y-m-d'))->sum('total');

        // 5 Kitab Terlaris - PERBAIKI INI
        $kitabTerlaris = PenjualanDetailModel::selectRaw('kitab_id, SUM(jumlah) as total_jual')
            ->with('kitab') // Relasi ke KitabModel
            ->groupBy('kitab_id')
            ->orderBy('total_jual', 'desc')
            ->limit(5)
            ->get();

        // Data untuk chart (penjualan per bulan)
        $chartData = PenjualanModel::selectRaw('MONTH(tanggal_penjualan) as bulan, SUM(total) as total')
            ->whereYear('tanggal_penjualan', date('Y'))
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get();

        $bulan = [];
        $total = [];
        for ($i = 1; $i <= 12; $i++) {
            $bulan[] = $this->getBulanName($i);
            $found = $chartData->firstWhere('bulan', $i);
            $total[] = $found ? $found->total : 0;
        }

        return view('dashboard', [
            'breadcrumb' => $breadcrumb,
            'activeMenu' => $activeMenu,
            'totalKitab' => $totalKitab,
            'totalKaryawan' => $totalKaryawan,
            'totalPenjualan' => $totalPenjualan,
            'totalPembelian' => $totalPembelian,
            'stokMenipis' => $stokMenipis,
            'penjualanHariIni' => $penjualanHariIni,
            'kitabTerlaris' => $kitabTerlaris,
            'chartBulan' => json_encode($bulan),
            'chartTotal' => json_encode($total)
        ]);
    }

    private function getBulanName($bulan)
    {
        $nama = [
            1 => 'Jan', 2 => 'Feb', 3 => 'Mar', 4 => 'Apr', 5 => 'Mei', 6 => 'Jun',
            7 => 'Jul', 8 => 'Agu', 9 => 'Sep', 10 => 'Okt', 11 => 'Nov', 12 => 'Des'
        ];
        return $nama[$bulan];
    }
}