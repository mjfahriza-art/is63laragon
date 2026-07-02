<?php
// app/Http/Controllers/DashboardController.php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Nilai;
use App\Models\Prodi;
use Illuminate\Support\Facades\Schema;

class DashboardController extends Controller
{
    public function index()
    {
        $hasProdiTable = Schema::hasTable('prodis');
        $hasMahasiswaTable = Schema::hasTable('mahasiswas');
        $hasNilaiTable = Schema::hasTable('nilais');

        $totalProdi = $hasProdiTable ? Prodi::count() : 0;
        $totalMahasiswa = $hasMahasiswaTable ? Mahasiswa::count() : 0;
        $totalNilai = $hasNilaiTable ? Nilai::count() : 0;
        $mahasiswaAktif = $hasMahasiswaTable ? Mahasiswa::where('status', 'aktif')->count() : 0;

        $mahasiswaTerbaru = $hasMahasiswaTable
            ? Mahasiswa::with('prodi')->latest()->take(5)->get()
            : collect();

        $statistikProdi = $hasProdiTable && $hasMahasiswaTable
            ? Prodi::withCount('mahasiswas')->orderByDesc('mahasiswas_count')->get()
            : collect();

        return view('dashboard', compact(
            'totalProdi',
            'totalMahasiswa',
            'totalNilai',
            'mahasiswaAktif',
            'mahasiswaTerbaru',
            'statistikProdi'
        ));
    }
}
