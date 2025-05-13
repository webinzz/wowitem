<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Peminjaman;
use App\Models\pengembalian;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class PengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function cekstatus($status){
        

        if(request('search')){
            $search = request('search');

            $data = pengembalian::where("status", $status)->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'like', "%$search%");
            })->orWhereHas('item', function ($q) use ($search) {
                $q->where('name', 'like', "%$search%");
            })->paginate(10);;


            return view("admin.pengembalian" , ["pengembalians"=> $data, "status" => $status]);
        
        }else{
            $data = pengembalian::with("item", "user","peminjaman")->where("status", $status)->paginate(10);

            return view("admin.pengembalian" , ["pengembalians"=> $data, "status" => $status]);
        }
    }
    


    /**
     * Show the form for creating a new resource.
     */
    public function accept($id)
    {
        $data = pengembalian::find($id);
        $data->status = "returned";
        $data->save();

        $datapeminjaman = Peminjaman::where("id_peminjaman", $data->id_peminjaman)->first();

        $item = Item::where("id_item",$data->id_item)->first();
        $item->stock += $datapeminjaman->jumlah;
        $item->save();
        return back()->with('succes', 'item succes borrowed.');

    }
    
    public function reject($id)
    {
        $datapengembalian = pengembalian::find($id);

        $data = Peminjaman::find($datapengembalian->id_peminjaman);
        $data->status = "borrowing";
        $data->save();

        pengembalian::where("id",$id)->delete();


        return back()->with('delete', 'item back to borrowing .');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $filefath = $request->img->store("bukti", "public");


        pengembalian::create([
            "id_item"=>$request->id_item,
            "id_user"=>$request->id_user,
            "id_peminjaman"=>$request->id_peminjaman,
            "bukti_img"=> $filefath,
        ]);

        $peminjaman = Peminjaman::where("id_peminjaman","$request->id_peminjaman")->first();
        $peminjaman->status = "waiting" ;
        $peminjaman->save();


        return redirect("pinjaman")->with("pending"," waiting pending to admin");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $dataupdate = [

            "tgl_kembali" => $request->tgl_kembali,
            "jam_kembali" => $request->jam_kembali,
            "jumlah" => $request->jumlah,
            "status" => $request->status,
        ];

        Peminjaman::where("id_peminjaman",$id )->update($dataupdate);
        if($request->status == "returned"){
            $item = Item::where("id_item", $request->id_item)->first();
            $item->stock += $request->jumlah;
            $item->save();

        }
        return back()->with("update", "data succes update");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        pengembalian::where("id",$id)->delete();
        return back()->with("delete", "data succes deleted");

    }
    public function generatePdf()
    {
        // Ambil data dari model Peminjaman
        $dataPengembalian = pengembalian::with("user","item","peminjaman")->where("status" , "returned")->get();
        
        
        // Load view untuk PDF
        $pdf = Pdf::loadView('admin.laporan.pengembalianlaporan', compact('dataPengembalian'));

        // Mengunduh file PDF
        return $pdf->download('laporan_pengemblian_succes.pdf');
    }
}
