<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rental_Mobil;


class Rental_MobilController extends Controller
{
    public function _construct()
    {
        $this->middleware('admin')->except(['index']);
    }
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mobil = Rental_Mobil::get();
        return $mobil;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $table = Rental_mobil::create([
          "merek" => $request->merek,
          "warna" => $request->warna,
          "tahun_pembuatan" => $request->tahun_pembuatan,
          "tipe" => $request->tipe,
          "tempat_duduk" => $request->tempat_duduk,
          "bahan_bakar" => $request->bahan_bakar,
          "audio" => $request->audio,
          "aksesoris" => $request->aksesoris,
          "harga" => $request->harga
        ]);
       

        return response()->json([
            'success' => 201,
            'message' => 'data berhasil disimpan',
            'data' => $table
        ],201);
    }

    public function show($id)
    {
        // menampilkan data mobil berdasarkan id
        $rental_mobil = Rental_mobil::findOrFail($id);
        if ($rental_mobil) {
            return response()->json([
                'status' => 200,
                'data' => $rental_mobil

            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'id atas' . $id . 'tidak ditemukan'
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $rental_mobil = Rental_mobil::find($id);
        if($rental_mobil){
           $rental_mobil->merek = $request->merek ? $request->merek :$rental_mobil->merek;
           $rental_mobil->warna = $request->warna ? $request->warna :$rental_mobil->warna;
           $rental_mobil->tahun_pembuatan = $request->tahun_pembuatan ? $request->tahun_pembuatan :$rental_mobil->tahun_pembuatan;
           $rental_mobil->tipe = $request->tipe ? $request->tipe :$rental_mobil->tipe;
           $rental_mobil->tempat_duduk = $request->tempat_duduk ? $request->tempat_duduk :$rental_mobil->tempat_duduk;
           $rental_mobil->bahan_bakar = $request->bahan_bakar ? $request->bahan_bakar :$rental_mobil->bahan_bakar;
           $rental_mobil->audio = $request->audio ? $request->audio :$rental_mobil->audio;
           $rental_mobil->aksesoris = $request->aksesoris ? $request->aksesoris :$rental_mobil->aksesoris;
           $rental_mobil->harga = $request->harga ? $request->harga : $rental_mobil->harga;
            $rental_mobil->save();

            return response()->json([
                'status' => 200,
                'data' => $rental_mobil
            ],200);

        }else{
            return response()->json([
                'status'=>404,
                'message'=>$id. 'tidak ditemukan'
            ],404);
        }
    }

    public function destroy($id)
    {
        $rental_mobil = Rental_mobil::where('id', $id)->first();
        if($rental_mobil){
            $rental_mobil->delete();
            return response()->json([
                'status' =>200,
                'data' =>$rental_mobil
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'id' . $id . 'tidak ditemukan'
            ], 404);
        }
    }
}


    

