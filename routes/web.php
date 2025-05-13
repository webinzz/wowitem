<?php

use App\Models\Item;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckRole;
use App\Models\pengembalian;

// guest
Route::get('/', [DashboardController::class, "index"]);
Route::get('login', [UserController::class, "loginview"])->name('login');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');
Route::post('login', [UserController::class, "store"]);
Route::get('categorys', [ItemController::class, "items"]);
route::get("category/{id}", [ItemController::class, "find"]);
Route::get('trandings', [ItemController::class, "trendings"]);
Route::get('news', [ItemController::class, "news"]);
Route::get('item/search',[ItemController::class, "search"]);

// user
route::middleware([CheckRole::class. ":user"])->group(function(){
    route::post("item/{id}" , [PeminjamanController::class, "store"]);
    Route::get('pinjaman', [PeminjamanController::class, "pinjaman"]);
    Route::post('pinjaman', [PengembalianController::class, "store"]);
    Route::get('profile', [UserController::class,"profile"]);
    Route::get("item/{id}" , [ItemController::class, "itemtunggal"]);
    Route::get("chart" , [KeranjangController::class, "index"]);
    Route::post("chart" , [KeranjangController::class, "store"]);
    Route::delete('chart/{id}', [KeranjangController::class, "destroy"] );

});



// adminn
route::middleware([CheckRole::class. ":admin"])->group(function(){
    Route::get('admin', [DashboardController::class, "admindashboard"]);

    //items
    Route::get('admin/items', [ItemController::class, "itemadmin"]);
    Route::post('admin/items', [ItemController::class, "store"]);
    Route::put('admin/items/{id}', [ItemController::class, "update"] );
    Route::delete('admin/items/{id}', [ItemController::class, "destroy"] );
    Route::get('admin/laporanitem', [ItemController::class, 'generatePdf']);
    
    //user
    Route::get('admin/users', [UserController::class, "index"]);
    Route::delete("admin/users/{id}" , [UserController::class, "destroy"]);
    Route::get('admin/laporanuser', [UserController::class, 'generatePdf']);

    
    //peminjaman
    route::get("admin/peminjaman/{status}", [PeminjamanController::class, "cekstatus"]);
    route::put("admin/peminjaman/{id}", [PeminjamanController::class, "update"]);
    route::put("admin/peminjaman/pending/{id}/accept", [PeminjamanController::class, "accept"]);
    route::put("admin/peminjaman/pending/{id}/reject", [PeminjamanController::class, "reject"]);
    Route::delete("admin/peminjaman/{id}" , [PeminjamanController::class, "destroy"]);
    Route::get('admin/laporanpeminjaman', [PeminjamanController::class, 'generatePdf']);
    
    //pengembalian
    route::get("admin/pengembalian/{status}", [PengembalianController::class, "cekstatus"]);
    route::put("admin/pengembalian/pending/{id}/accept", [PengembalianController::class, "accept"]);
    route::put("admin/pengembalian/pending/{id}/reject", [PengembalianController::class, "reject"]);
    route::put("admin/pengembalian/{id}", [PengembalianController::class, "update"]);
    Route::delete("admin/pengembalian/{id}" , [PengembalianController::class, "destroy"]);
    Route::get('admin/laporanpengembalian', [PengembalianController::class, 'generatePdf']);
    
    //category
    route::get("admin/category", [CategoryController::class, "index"]);
    Route::post('admin/category', [CategoryController::class, "store"]);
    route::put("admin/category/{id}", [CategoryController::class, "update"]);
    Route::delete("admin/category/{id}" , [CategoryController::class, "destroy"]);
});

Route::put('admin/users/{id}', [UserController::class, "update"]);

//end admin



