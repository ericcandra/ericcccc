<?php

namespace App\Http\Controllers;

use App\Models\buku;
use App\Models\Pinjam;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buku = buku::all();
        // dd ($buku);
        return view('Buku.index')
            ->with('buku',$buku);
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('Buku.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->user()->cannot('create', Buku::class)){
            abort(403);
        }
        // dd($request);
        // validasi form
        $val = $request->validate([
            'kode_buku'=>"required|unique:bukus",
            'nama_buku'=>"required",
            'pengarang'=>"required",
            'kategori'=>"required",
            'stok'=>"required"
        ]);

        // simpan ke tabel fakultas
        buku::create($val);

        // redirect ke halaman list fakultas
        return redirect()->route('buku.index')->with('success',$val['kode_buku'].'berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(buku $buku)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(buku $buku)
    {
        //dd($buku);
        $buku = buku::find($buku); 
        return view('Buku.edit')
        ->with('buku',$buku);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, buku $Buku)
    {
        if (auth()->user()->cannot('update', $Buku)){
            abort(403);
        }
        // dd($request);
        if($request->kode_buku) {
            $val = $request->validate([
                // 'id'=> 'required',
                // 'npm'=>'required',
                'kode_buku'=>"required|unique:bukus",
                'nama_buku'=>'required',
                'pengarang'=>'required',
                'kategori'=>'required',
                'stok'=>'required'
                // 'url_foto' => 'Required|file|mimes:png,jpg|max:10000',
                // 'prodi_id' => 'required'
            ]);
    
        } else {
            $val = $request->validate([
                // 'id'=> 'required',
                // 'npm'=>'required',
                'kode_buku'=>"required|unique:bukus",
                'nama_buku'=>'required',
                'pengarang'=>'required',
                'kategori'=>'required',
                'stok'=>'required'
            ]);
            // ekstenso file yang di upload
        // $ext = $request->id->getClientOriginalExtension();
        
        // // rename misal : npm.extense
        // $val['id'] = $request->id.".".$ext;

        // // upload ke tabel mahasiswa
        // $request->id->move('id',$val['nama_buku']);
    
        }

        // simpan ke tabel mahasiswa
        buku::where('id',$Buku['id'])->update($val);

        // redirect ke halaman list fakultas
        return redirect()->route('buku.index')->with('success',$val['kode_buku'].'berhasil disimpan');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(buku $buku)
    {
        if (auth()->user()->cannot('delete', $buku)){
            abort(403);
        }
        // dd($buku);
        
        $buku->delete();
        return redirect()->route('buku.index')->with('success',' berhasil dihapus.');
    }
}
