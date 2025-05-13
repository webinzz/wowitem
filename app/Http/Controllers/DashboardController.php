<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use App\Models\Peminjaman;
use App\Models\pengembalian;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function index(){
        $item = Item::where("stock",'>', 0)->get();
        $categorys  = Category::all();

        $news = Item::where("stock",'>', 0)->orderBy("created_at", "desc")->take(10)->get();
        $trending = Item::where("stock",'>', 0)
        ->withCount("peminjaman")
        ->orderBy("peminjaman_count", "desc")
        ->take(10)
        ->get();
        if(auth::user()){
            $returned = pengembalian::with("item")->where("id_user", auth::user()->id)->where("status","returned")->get();
            $borrowing = Peminjaman::with("item")->where("id_user", auth::user()->id)->where("status","borrowing")->get();
        }else{
            $returned =[];
            $borrowing =[];
        }
        

        return view('dashboard', 
        [
            "items"=>$item, 
            "news"=>$news,
            "categorys"=>$categorys,
            "trendings"=>$trending,
            "returned"=>$returned,
            "borrow"=>$borrowing,
        
        ]);
    }

    public function admindashboard()
    {
        // Mengambil data jumlah peminjaman per bulan
        $data = Peminjaman::selectRaw('DATE(tgl_pinjam) as day, COUNT(*) as count')
                          ->groupBy('day')
                          ->orderBy('day')
                          ->get();

        $datauser = User::selectRaw('DATE(created_at) as daycreate, COUNT(*) as countuser')
                          ->groupBy('daycreate')
                          ->orderBy('daycreate')
                          ->get();

        // Memecah data menjadi dua bagian: bulan dan jumlah peminjaman
        $day = $data->pluck('day'); 
        $counts = $data->pluck('count'); 
        
        $daycreate = $datauser->pluck('daycreate'); 
        $countuser = $datauser->pluck('countuser');
        

        $item = Item::all(); 
        $user = User::where("role",  "user" )->get(); 
        $admin = User::where("role",  "admin" )->get(); 
        $category = Category::all(); 

        $borrowing = Peminjaman::where("status", "borrowing")->get(); 
        $returned = Peminjaman::where("status", "returned")->get(); 
        $pending = Peminjaman::where("status", "pending")->get(); 

        return view('admin.dashboard', compact(
            'day',
             'counts',
             'daycreate',
             'countuser',
             
             'item',
             'user',
             'category', 
             "admin",

             'borrowing',
             'returned',
             'pending'     
            ));
    }
}
