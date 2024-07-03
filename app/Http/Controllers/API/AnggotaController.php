<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function index()
    {
        $anggota = anggota::all();
        if ($anggota->isEmpty()) {
            $response['message'] = 'Tidak ada anggota yang ditemukan.';
            $response['success'] = false;
            return response()->json($response, Response::HTTP_NOT_FOUND);
        }

        $response['success'] = true;
        $response['message'] = 'Anggota ditemukan.';
        $response['data'] = $anggota;
        return response()->json($response, Response::HTTP_OK);
        // atau
        // return response()->json($response, 200);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama_anggota'=>"required|unique:anggotas",
            'alamat'=>"required",
            'nohp'=>"required",
        ]);

        $anggota = anggota::create($validate);
        if($anggota){
            $response['success'] = true;
            $response['message'] = 'anggota berhasil ditambahkan.';
            return response()->json($response, Response::HTTP_CREATED);
        }
    }
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'nama_anggota'=>"required|unique:anggotas",
            'alamat'=>'required',
            'nohp'=>'required',
        ]);

        anggota::where('id', $id)->update($validate);
        $response['success'] = true;
        $response['message'] = 'Anggota berhasil diperbarui.';
        return response()->json($response, Response::HTTP_OK);
    }
    public function destroy($id)
    {
        $anggota = anggota::where('id', $id);
        if(count($anggota->get())){
            $anggota->delete();
            $response['success'] = true;
            $response['message'] = 'Anggota berhasil dihapus.';
        return response()->json($response, Response::HTTP_OK);
        }else {
            $response['success'] = false;
            $response['message'] = 'Anggota tidak ditemukan.';
        return response()->json($response, Response::HTTP_NOT_FOUND);
        }    
    }
}
