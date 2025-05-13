<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;

class ApiItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if(request('search')){
            
            $data = Item::where("stock",'>', 0)->where("name", 'like','%'.request('search').'%')
            ->orWhere("description", 'like', '%' . request('search') . '%')
            ->get();
            return response()->json($data);
        }else{
             $data = Item::where("stock",'>', 0)->get();
            return response()->json($data);

        }
    }
    public function sendimg($fath)
    {
        return response()->file(public_path("storage/item/$fath"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
