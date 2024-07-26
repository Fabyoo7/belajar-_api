<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Aktor;
use Illuminate\Http\Request;

class AktorController extends Controller
{
    public function index()
    {
        $aktor = Aktor::latest()->get();
        $response = [
            'success' => true,
            'message' => 'Daftar Aktor',
            'data' => $Aktor,
        ];

        return response()->json($response, 200);
    }

  
    // public function create()
    // {
        
    // }

   
    public function store(Request $request)
    {
        $aktor = new Aktor();
        $aktor->nama_aktor = $request->nama_aktor;
        $aktor->bio = $request->bio;
        $aktor->save();
        return response()->json([
            'success'=> true,
            'message'=> 'data berhasil disimpan'
        ], 201);
    }

    
    public function show($id)
    {
        $aktor = Aktor::find($id);
        if ($aktor) {
            return response([
                'success' => true,
                'message' => 'Detail Aktor disimpan',
                'data' => $aktor,
            ],200 );
        } else {
            return response()->json([
                'success'=> false,
                'message'=> 'data tidak ditemukan'
            ]);
        }
    }

    
    // public function edit(Aktor $Aktor)
    // {
        
    // }

    
    public function update(Request $request, $id)
    {
        $aktor = Aktor::find($id);
        if ($aktor) {
            $aktor->nama_aktor = $request->nama_aktor;
            $aktor->bio = $request->bio;
            $aktor->save();
            return response([
                'success' => true,
                'message' => 'Data berhasil diperbarui',
                'data' => $Aktor,
            ],200 );
        } else {
            return response()->json([
                'success'=> false,
                'message'=> 'data gagal diperbarui'
            ]);
        }   
    }

    public function destroy(Aktor $id)
    {
        $aktor = Aktor::find($id);
        if ($aktor) {
            $aktor->delete();
            return response()->json([
                'success'=> true,
                'message'=> 'Data' . $aktor->nama_aktor . 'Berhasil dihapus',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'data tidak ditemukan'
            ]);
    }
    }
}