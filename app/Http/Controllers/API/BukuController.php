<?php

namespace App\Http\Controllers\API;

// use Illuminate\Routing\Controller as BaseController;
use App\Http\Controllers\Controller;
use App\Models\buku;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        $buku = buku::all();
        if ($buku->isEmpty()) {
            $response['message'] = 'Tidak ada buku yang ditemukan.';
            $response['success'] = false;
            return response()->json($response, Response::HTTP_NOT_FOUND);
        }

        $response['success'] = true;
        $response['message'] = 'Buku ditemukan.';
        $response['data'] = $buku;
        return response()->json($response, Response::HTTP_OK);
        // atau
        // return response()->json($response, 200);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'kode_buku' => 'required|unique:bukus',
            'nama_buku' => "required",
            'pengarang' => "required",
            'kategori' => "required"
        ]);

        $buku = buku::create($validate);
        if($buku){
            $response['success'] = true;
            $response['message'] = 'Buku berhasil ditambahkan.';
            return response()->json($response, Response::HTTP_CREATED);
        }
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'kode_buku'=>"required|unique:bukus",
            'nama_buku'=>'required',
            'pengarang'=>'required',
            'kategori'=>'required',
        ]);

        buku::where('id', $id)->update($validate);
        $response['success'] = true;
        $response['message'] = 'Buku berhasil diperbarui.';
        return response()->json($response, Response::HTTP_OK);
    }
    public function destroy($id)
    {
        $buku = buku::where('id', $id);
        if(count($buku->get())){
            $buku->delete();
            $response['success'] = true;
            $response['message'] = 'Buku berhasil dihapus.';
        return response()->json($response, Response::HTTP_OK);
        }else {
            $response['success'] = false;
            $response['message'] = 'Buku tidak ditemukan.';
        return response()->json($response, Response::HTTP_NOT_FOUND);
        }    
    }
}
