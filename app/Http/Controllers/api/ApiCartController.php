<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Keranjang;
use Illuminate\Http\Request;

class ApiCartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id_user)
    {

            
            
             $data = Keranjang::with("item")->where("id_user", $id_user)->get();
            return response()->json($data);

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
    public function destroy($id)
    {
        $cartItem = Keranjang::find($id);

        $cartItem->delete();

        return response()->json([
            'message' => 'Item successfully deleted'
        ],);
    }
}
