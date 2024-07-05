<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
// use App\Models\buku;
// use App\Models\Petugas;
// use App\Models\pinjam;
use Illuminate\Http\Request;


class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // if(auth()->user()->role == 'D'){
        //     $mahasiswa = Anggota::where('user_id', auth()->user()->id)->get();
        // }else{
        //     $mahasiswa = Anggota::all();
        // }
        $anggota = anggota::all();
        return view('Anggota.index')
            ->with('anggota',$anggota);
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $anggota = anggota::all();
        return view('Anggota.create');
        // ->with('buku',$anggota);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->user()->cannot('create', Anggota::class)){
            abort(403);
        }
        // return($request);
        // validasi form
        $val = $request->validate([
            'nama_anggota'=>"required|unique:anggotas",
            'alamat'=>"required",
            'nohp'=>"required",
            // 'buku_id'=>'required'
        ]);

        // return $val;
        // $ext = $request->url_foto->getClientOriginalExtension();
        
        // rename misal : npm.extense
        // $val['url_foto'] = $request->npm.".".$ext;

        // // upload ke tabel mahasiswa
        // $request->url_foto->move('foto',$val['url_foto']);

        // simpan ke tabel fakultas
        anggota::create($val);

        // redirect ke halaman list fakultas
        return redirect()->route('anggota.index')->with('success',$val['nama_anggota'].'berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(anggota $anggota)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(anggota $anggota)
    {
        $anggota = anggota::all(); 
        return view('Anggota.edit')
        ->with('anggota',$anggota);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, anggota $anggota)
    {
        if (auth()->user()->cannot('update', $anggota)){
            abort(403);
        }
        // dd($request);
        if($request->nama_anggota) {
            $val = $request->validate([
                // 'id'=> 'required',
                // 'npm'=>'required',
                'nama_anggota'=>"required|unique:anggotas",
                'alamat'=>'required',
                'nohp'=>'required',
            
                // 'url_foto' => 'Required|file|mimes:png,jpg|max:10000',
                // 'prodi_id' => 'required'
            ]);
    
        } else {
            $val = $request->validate([
                // 'id'=> 'required',
                // 'npm'=>'required',
                'nama_anggota'=>"required|unique:anggotas",
                // 'nama_buku'=>'required',
                'alamat'=>'required',
                'nohp'=>'required',
            ]);
        //     // ekstenso file yang di upload
        // // $ext = $request->id->getClientOriginalExtension();
        
        // // // rename misal : npm.extense
        // // $val['kode_buku'] = $request->npm.".".$ext;

        // // // upload ke tabel mahasiswa
        // // $request->kode_buku->move('kode_buku',$val['kode_buku']);
    
        // }

        // // simpan ke tabel mahasiswa
        anggota::where('id',$anggota['id'])->update($val);

        // // redirect ke halaman list fakultas
        return redirect()->route('anggota.index')->with('success',$val['nama_anggota'].'berhasil disimpan');
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(anggota $anggota)
    {
        if (auth()->user()->cannot('delete', $anggota)){
            abort(403);
        }
        // dd($mahasiswa);
        
        $anggota->delete();
        return redirect()->route('Anggota.index')->with('success',' berhasil dihapus.');
    }
}
