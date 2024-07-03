<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\petugas;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    public function index()
    {
        $petugas = petugas::all();
        if ($petugas->isEmpty()) {
            $response['message'] = 'Tidak ada petugas yang ditemukan.';
            $response['success'] = false;
            return response()->json($response, Response::HTTP_NOT_FOUND);
        }

        $response['success'] = true;
        $response['message'] = 'Petugas ditemukan.';
        $response['data'] = $petugas;
        return response()->json($response, Response::HTTP_OK);
        // atau
        // return response()->json($response, 200);
    }
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama_petugas'=>"required|unique:petugas",
            'nohp'=>"required",
            'alamat'=>"required",
        ]);

        $petugas = petugas::create($validate);
        if($petugas){
            $response['success'] = true;
            $response['message'] = 'petugas berhasil ditambahkan.';
            return response()->json($response, Response::HTTP_CREATED);
        }
    }
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'nama_anggota'=>"required|unique:anggotas",
            'nohp'=>'required',
            'alamat'=>'required',
        ]);

        petugas::where('id', $id)->update($validate);
        $response['success'] = true;
        $response['message'] = 'Petugas berhasil diperbarui.';
        return response()->json($response, Response::HTTP_OK);
    }
    public function destroy($id)
    {
        $petugas = petugas::where('id', $id);
        if(count($petugas->get())){
            $petugas->delete();
            $response['success'] = true;
            $response['message'] = 'Petugas berhasil dihapus.';
        return response()->json($response, Response::HTTP_OK);
        }else {
            $response['success'] = false;
            $response['message'] = 'Petugas tidak ditemukan.';
        return response()->json($response, Response::HTTP_NOT_FOUND);
        }    
    }
}
