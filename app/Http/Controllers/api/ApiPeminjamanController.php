<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class ApiPeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function pinjaman($id)
    {
        $data = Peminjaman::with("item")->where("id_user", $id)->where("status", request("status"))->get();
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $item = Item::where("id_item","$request->id_item")->first();
        $item->stock -= $request->jumlah;
        $item->save();
        
        Peminjaman::create([
            "id_item"=>$request->id_item,
            "id_user"=>$request->id_user,
            "tgl_kembali" => $request->tgl_kembali,
            "jam_kembali" => $request->jam_kembali,
            "jumlah" => $request->jumlah,
        ]);
        return response()->json([
            "status"=>"succes"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
