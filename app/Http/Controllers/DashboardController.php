<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Dokter;
use App\Models\RekamMedis; 
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Mengambil total jumlah data untuk Card Statistik
        $totalPasien = Pasien::count();
        $totalDokter = Dokter::count();
        $totalRekamMedis = RekamMedis::count(); 

        // 2. Mendefinisikan data untuk Grafik (CHART DATA)
        $chartData = [
            'labels' => ['Pasien', 'Dokter', 'Rekam Medis'],
            'data'   => [$totalPasien, $totalDokter, $totalRekamMedis]
        ];

        // 3. Mengirimkan semua variabel ke view dashboard
        return view('dashboard', compact('totalPasien', 'totalDokter', 'totalRekamMedis', 'chartData'));
    }
}