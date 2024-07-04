<?php

namespace App\Http\Controllers;

use App\Models\petugas;
use App\Models\pinjam;
use App\Models\Anggota;
use App\Models\buku;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Symfony\Contracts\Service\Attribute\Required;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $petugas = petugas::all();
        return view('Petugas.index')
            ->with('petugas',$petugas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('petugas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->user()->cannot('create', petugas::class)){
            abort(403);
        }
        // return $request;
        $val = $request->validate([
            'nama_petugas'=>"required|unique:petugas",
            'nohp'=>"required",
            'alamat'=>"required"
        ]);

        // ekstenso file yang di upload
        // $ext = $request->url_foto->getClientOriginalExtension();
        
        // rename misal : npm.extense
        // $val['url_foto'] = $request->npm.".".$ext;

        // upload ke tabel mahasiswa
        // $request->url_foto->move('foto',$val['url_foto']);

        // simpan ke tabel mahasiswa
        petugas::create($val);

        // redirect ke halaman list fakultas
        return redirect()->route('petugas.index')->with('success',$val['nama_petugas'].'berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(petugas $petugas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(petugas $petugas)
    {
        // dd($mahasiswa);
        $petugas = petugas::all(); 
        return view('petugas.edit')
        ->with('petugas',$petugas);
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, petugas $petugas)
    {
        if (auth()->user()->cannot('update', $petugas)){
            abort(403);
        }
        // dd($request);
        if($request->nama_petugas) {
            $val = $request->validate([
                // 'id'=> 'required',
                // 'npm'=>'required',
                'nama_petugas'=>"required|unique:petugas",
                'nohp'=>'required',
                'alamat'=>'required',
            
                // 'url_foto' => 'Required|file|mimes:png,jpg|max:10000',
                // 'prodi_id' => 'required'
            ]);
    
        } else {
            $val = $request->validate([
                // 'id'=> 'required',
                // 'npm'=>'required',
                'nama_petugas'=>"required|unique:petugas",
                // 'nama_buku'=>'required',
                'nohp'=>'required',
                'alamat'=>'required',
            ]);
            // ekstenso file yang di upload
        // $ext = $request->id->getClientOriginalExtension();
        
        // // rename misal : npm.extense
        // $val['id'] = $request->npm.".".$ext;

        // // upload ke tabel mahasiswa
        // $request->id->move('id',$val['id']);
    
        }

        // simpan ke tabel mahasiswa
        petugas::where('id',$petugas['id'])->update($val);

        // redirect ke halaman list fakultas
        return redirect()->route('petugas.index')->with('success',$val['nama_petugas'].'berhasil disimpan');
    
    }

    /**
     * Remove the specified resource from storage.x
     */
    public function destroy(petugas $petugas)
    {
        if (auth()->user()->cannot('delete', $petugas)){
            abort(403);
        }
        // dd($mahasiswa);
        
        $petugas->delete();
        return redirect()->route('petugas.index')->with('success',' berhasil dihapus.');
    }

}