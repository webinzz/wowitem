<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        if(request('search')){
            return view("admin.category", ['data'=>Category::where("name",'like','%'.request('search').'%')->paginate(10)]);
        }else{
            return view("admin.category", [ 'data'=> Category::paginate(10)]);

        }
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
        $data = [
           "name" => $request->name,
           "icon" => $request->icon,
        ];
        Category::create($data);

        return back()->with("succes","Category Succes added");
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

        $dataupdate = [
            "name" => $request->name,
            "icon" => $request->icon,
         ];





        Category::where("id_category", $id)->update($dataupdate);

        return back()->with("update","Category Succes updated");

        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::where('id_category', $id)->delete();

        return back()->with("delete" , "Category deleted");
    }
}
