<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Peminjaman;
use App\Models\pengembalian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.peminjaman" ,["peminjamans" => Peminjaman::all()]);
    }

    public function cekstatus($status){
        

        if(request('search')){
            $search = request('search');

            $data = Peminjaman::where("status", $status)->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'like', "%$search%");
            })->orWhereHas('item', function ($q) use ($search) {
                $q->where('name', 'like', "%$search%");
            })->paginate(10);;


            return view("admin.peminjaman" , ["peminjamans"=> $data, "status" => $status]);
        
        }else{
            $data = Peminjaman::with("item", "user")->where("status", $status)->paginate(10);

            return view("admin.peminjaman" , ["peminjamans"=> $data, "status" => $status]);
        }
    }

    public function accept($id)
    {
        $data = Peminjaman::where("id_peminjaman", $id)->first();
        $data->status = "borrowing";
        $data->save();

        return back()->with('succes', 'item succes borrowed.');

    }
    
    public function reject($id)
    {


        Peminjaman::where("id_peminjaman",$id)->delete();


        return back()->with('delete', 'requeest succes rejected');
    }
    
    public function pinjaman()
    {
        
        $pending = Peminjaman::with("item")->where("id_user", auth::user()->id)->where("status","pending")->paginate(5);
        $borrowing = Peminjaman::with("item")->where("id_user", auth::user()->id)->where("status","borrowing")->paginate(5);
        
        $prosesreturn = pengembalian::with("item", "user","peminjaman")->where("id_user", auth::user()->id)->where("status","pending")->paginate(5);
        $returned = pengembalian::with("item", "user","peminjaman")->where("id_user", auth::user()->id)->where("status","returned")->paginate(5);
        

        return view("pinjaman" ,["returned"=> $returned, "pending"=>$pending, "borrowing"=>$borrowing, "proses" => $prosesreturn]);
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
        ];

        Peminjaman::where("id_peminjaman",$id )->update($dataupdate);

        return back()->with("update", "data succes update");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Peminjaman::where("id_peminjaman",$id)->delete();
        return back()->with("delete", "data succes deleted");

    }
    public function generatePdf()
    {
        // Ambil data dari model Peminjaman
        $dataPeminjaman  = Peminjaman::with("user","item")->where("status" , "borrowing")->get();
        
        
        // Load view untuk PDF
        $pdf = Pdf::loadView('admin.laporan.peminjamanlaporan', compact('dataPeminjaman'));

        // Mengunduh file PDF
        return $pdf->download('laporan_peminjaman_succes.pdf');
    }
}
