<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function items()
    {
        $data = Item::where("stock",'>', 0)->get();
        return view("categorys", ['items'=>$data, "categorys" => Category::all()]);
    }
    
    public function itemtunggal($id)
    {
            $data = Item::find($id);
            return view("item" , ["barang" => $data]);
    }
    
    public function find($id)
    {
        $data = Item::where("id_category", $id)->where("stock",'>', 0)->get();
        return view("categorys", ['items'=>$data, "categorys" => Category::all()]);
    }
    public function itemadmin()
    {
        if(request('search')){
            return view("admin.items", [
            'items'=>Item::where("name", 'like','%'.request('search').'%')
            ->orWhere("description", 'like', '%' . request('search') . '%')
            ->orWhere("stock", 'like', '%' . request('search') . '%')
            ->paginate(10), 
            "categorys"=>Category::all()
        ]);
        }else{
            return view("admin.items", ['items'=>Item::paginate(10), "categorys"=>Category::all()]);
        }
    }

    public function search(){
        return view('search',[
            'items'=>Item::where("name",'like','%'.request('search').'%')
            ->orWhere("description", 'like', '%' . request('search') . '%')
            ->get()
        ]);
    }

    public function trendings(){
        $data = Item::where("stock",'>', 0)
        ->withCount("peminjaman")
        ->orderBy("peminjaman_count", "desc")
        ->take(10)
        ->get();

        return view("trandings", ['items'=>$data]);
    
    }
    
    public function news(){
        $data = Item::where("stock", '>', 0)->orderBy("created_at", "desc")->take(10)->get();
        return view("news", ['items'=>$data]);
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
        $request->validate([
            "image"=>"mimes:png,jpg,jpeg|required"
            
        ]);
        $filefath = $request->image->store("item", "public");
        $data = [
           "name" => $request->name,
           "id_category" => $request->category,
           "description" => $request->description,
           "stock" => $request->stock,
           "image" => $filefath
        ];
        Item::create($data);

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

        $dataupdate = [
            "name" => $request->name,
            "id_category" => $request->category,
            "description" => $request->description,
            "stock" => $request->stock,
         ];





        Item::where("id_item", $id)->update($dataupdate);

        return back()->with("update","Item Succes updated");

        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Item::where('id_item', $id)->delete();

        return back()->with("delete" , "item deleted");
    }

    public function generatePdf()
    {
        // Ambil data dari model Peminjaman
        $dataitem = Item::with("category")->get();
        
        
        // Load view untuk PDF
        $pdf = Pdf::loadView('admin.laporan.itemlaporan', compact('dataitem'));

        // Mengunduh file PDF
        return $pdf->download('laporan_item.pdf');
    }
}
