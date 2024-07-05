<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\buku;
use App\Models\petugas;
use App\Models\pinjam;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class PinjamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pinjam = Pinjam::all();
        return view('Pinjam.index')
            ->with('pinjam',$pinjam);
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $buku = buku::all();
        $anggota = Anggota::all();
        $petugas = Petugas::all();
        return view('Pinjam.create')
        ->with('buku',$buku)
        ->with('anggota',$anggota)
        ->with('petugas',$petugas);
        // $anggota = anggota::all();
        // return view('pinjam.create')
        // ->with('anggota',$anggota);

        // $petugas = Petugas::all();
        // return view('pinjam.create')
        // ->with('petugas',$petugas);


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->user()->cannot('create', pinjam::class)){
            abort(403);
        }
        // dd($request);
        // validasi form
        $val = $request->validate([
            'jumlah_pinjam'=>"required|unique:pinjams",
            'tanggal_pinjam'=>"required",
            'tanggal_kembalian'=>"required",
            'buku_id'=>"required",
            'anggota_id'=>"required",
            'petugas_id'=>"required"
        ]);

        // simpan ke tabel fakultas
        Pinjam::create($val);

        // redirect ke halaman list fakultas
        return redirect()->route('pinjam.index')->with('success',$val['jumlah_pinjam'].'berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(pinjam $pinjam)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pinjam $pinjam)
    {
        $buku = buku::all();
        $anggota = Anggota::all();
        $petugas = petugas::all(); 
        return view('Pinjam.edit')
        ->with('buku',$buku)
        ->with('anggota',$anggota)
        ->with('petugas',$petugas)
        ->with('pinjam',$pinjam);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, pinjam $pinjam)
    {
        if (auth()->user()->cannot('update', $pinjam)){
            abort(403);
        }
        // dd($request);
        if($request->jumlah_pinjam) {
            $val = $request->validate([
                // 'id'=> 'required',
                // 'npm'=>'required',
                'jumlah_pinjam'=>"required|unique:pinjams",
                'tanggal_pinjam'=>"required",
                'tanggal_kembalian'=>"required",
                'buku_id'=>"required",
                'anggota_id'=>"required",
                'petugas_id'=>"required"
            ]);
    
        } else {
            $val = $request->validate([
                // 'id'=> 'required',
                // 'npm'=>'required',
                'jumlah_pinjam'=>"required|unique:pinjams",
                'tanggal_pinjam'=>"required",
                'tanggal_kembalian'=>"required",
                'buku_id'=>"required",
                'anggota_id'=>"required",
                'petugas_id'=>"required"
            ]);
            // ekstenso file yang di upload
        // $ext = $request->id->getClientOriginalExtension();
        
        // // rename misal : npm.extense
        // $val['id'] = $request->npm.".".$ext;

        // // upload ke tabel mahasiswa
        // $request->id->move('id',$val['id']);
    
        }

        // simpan ke tabel mahasiswa
        Pinjam::where('id',$pinjam['id'])->update($val);

        // redirect ke halaman list fakultas
        return redirect()->route('pinjam.index')->with('success',$val['jumlah_pinjam'].'berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pinjam $pinjam)
    {
        if (auth()->user()->cannot('delete', $pinjam)){
            abort(403);
        }
        // dd($mahasiswa);
        
        $pinjam->delete();
        return redirect()->route('pinjam.index')->with('success',' berhasil dihapus.');
    }
}
