<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Keranjang;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class KeranjangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        

        $data = Keranjang::where("id_user", Auth::user()->id)->with("item")->get();
        return view("chart", compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Keranjang::create([
            "id_item"=>$request->id_item,
            "id_user"=>$request->id_user,
        ]);

        return back()->with("succes","Item Succes added");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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
        Keranjang::find($id)->delete();
        return back()->with("delete" , "item deleted");

    }
}
