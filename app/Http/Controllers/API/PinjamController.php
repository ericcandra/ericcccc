<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\pinjam;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class PinjamController extends Controller
{
    public function index()
    {
        $pinjam = pinjam::all();
        if ($pinjam->isEmpty()) {
            $response['message'] = 'Tidak ada pinjam yang ditemukan.';
            $response['success'] = false;
            return response()->json($response, Response::HTTP_NOT_FOUND);
        }

        $response['success'] = true;
        $response['message'] = 'pinjam ditemukan.';
        $response['data'] = $pinjam;
        return response()->json($response, Response::HTTP_OK);
        // atau
        // return response()->json($response, 200);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'jumlah_pinjam'=>"required|unique:pinjams",
            'tanggal_pinjam'=>"required",
            'tanggal_kembalian'=>"required",
            'buku_id'=>"required",
            'anggota_id'=>"required",
            'petugas_id'=>"required"
        ]);

        $pinjam = pinjam::create($validate);
        if($pinjam){
            $response['success'] = true;
            $response['message'] = 'Pinjam berhasil ditambahkan.';
            return response()->json($response, Response::HTTP_CREATED);
        }
    }
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'jumlah_pinjam'=>"required|unique:pinjams",
            'tanggal_pinjam'=>"required",
            'tanggal_kembalian'=>"required",
            'buku_id'=>"required",
            'anggota_id'=>"required",
            'petugas_id'=>"required"
        ]);

        pinjam::where('id', $id)->update($validate);
        $response['success'] = true;
        $response['message'] = 'Pinjam berhasil diperbarui.';
        return response()->json($response, Response::HTTP_OK);
    }
    public function destroy($id)
    {
        $pinjam = pinjam::where('id', $id);
        if(count($pinjam->get())){
            $pinjam->delete();
            $response['success'] = true;
            $response['message'] = 'Pinjam berhasil dihapus.';
        return response()->json($response, Response::HTTP_OK);
        }else {
            $response['success'] = false;
            $response['message'] = 'Pinjam tidak ditemukan.';
        return response()->json($response, Response::HTTP_NOT_FOUND);
        }    
    }
}
