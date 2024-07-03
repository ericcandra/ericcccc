<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
        $pinjamanggota = DB::select("SELECT anggotas.nama_anggota, COUNT(*) as jumlah_pinjam FROM pinjams 
        JOIN anggotas ON pinjams.anggota_id = anggotas.id GROUP BY anggotas.nama_anggota;");
        return view('dashboard')->with('pinjamanggota',$pinjamanggota);
    }
}
