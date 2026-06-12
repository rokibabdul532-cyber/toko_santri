<?php

namespace App\Http\Controllers;

use App\Models\KaryawanModel;

class DashboardController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Dashboard',
            'list' => ['Home', 'Dashboard']
        ];
        $activeMenu = 'dashboard';
        $totalKaryawan = KaryawanModel::count();

        return view('dashboard', [
            'breadcrumb' => $breadcrumb,
            'activeMenu' => $activeMenu,
            'totalKaryawan' => $totalKaryawan
        ]);
    }
}