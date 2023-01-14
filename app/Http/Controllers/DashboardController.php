<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Bimbingan;
use App\Models\Laporan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $mahasiswas = Mahasiswa::count();
        $bimbingans = Mahasiswa::with('bimbingan')->count();
        $laporans = Mahasiswa::with('laporan')->count();

        //menyiapkan data untuk chart
        // $kategori = [];
        
        // foreach ($bimbingans as $tm) {
        //     $kategori[] = $tm->mitra;
        // }
        
// dd($bimbingans);
        return view('dashboard.index', compact('mahasiswas','bimbingans','laporans'));
    }

    
 

   
}
