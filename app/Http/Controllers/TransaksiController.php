<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;

class TransaksiController extends Controller
{
    public function _construct()
    {
        $this->middleware('admin')->except(['index', 'show', 'store']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = Transaksi::all();
        return $transaksi;
    }

    public function store(Request $request)
    {
        $table = Transaksi::create([
          "nama_pemesan" => $request->nama_pemesan,
          "harga" => $request->harga,
          "merek_mobil" => $request->merek_mobil,
          "waktu_pembayaran" => $request->waktu_pembayaran,
          "metode_pembayaran" => $request->metode_pembayaran,
          "no_hp_pemesan" => $request->no_hp_pemesan,
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
        $Transaksi = Transaksi::find($id);
        if ($Transaksi) {
            return response()->json([
                'status' => 200,
                'data' => $Transaksi

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
        $Transaksi = Transaksi::find($id);
        if($Transaksi){
           $Transaksi->nama_pemesan = $request->nama_pemesan ? $request->nama_pemesan :$Transaksi->nama_pemesan;
           $Transaksi->harga = $request->harga ? $request->harga :$Transaksi->harga;
           $Transaksi->merek_mobil = $request->merek_mobil ? $request->merek_mobil :$Transaksi->merek_mobil;
           $Transaksi->waktu_pembayaran = $request->waktu_pembayaran ? $request->waktu_pembayaran :$Transaksi->waktu_pembayaran;
           $Transaksi->metode_pembayaran = $request->metode_pembayaran ? $request->metode_pembayaran :$Transaksi->metode_pembayaran;
           $Transaksi->no_hp_pemesan = $request->no_hp_pemesan ? $request->no_hp_pemesan :$Transaksi->no_hp_pemesan;
        $Transaksi->save();

            return response()->json([
                'status' => 200,
                'data' => $Transaksi
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
        $Transaksi = Transaksi::where('id', $id)->first();
        if($Transaksi){
            $Transaksi->delete();
            return response()->json([
                'status' =>200,
                'data' =>$Transaksi
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'id' . $id . 'tidak ditemukan'
            ], 404);
        }
    }
}
