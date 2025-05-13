<?php

use App\Http\Controllers\api\ApiCartController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\api\ApiItemController;
use App\Http\Controllers\api\ApiUserController;
use App\Http\Controllers\api\ApiCategoryController;
use App\Http\Controllers\api\ApiPeminjamanController;
use App\Http\Controllers\api\ApiPengembalianController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// });

route::post("login", [ApiUserController::class, "login"]);


route::get("user", [ApiUserController::class, "index"]);
route::post("user", [ApiUserController::class, "store"]);
route::get("user/{id}",  [ApiUserController::class, "show"]);

route::post("cart", [ApiCartController::class, "store"]);
route::get("cart/{id}",  [ApiCartController::class, "index"]);
Route::delete('cart/delete/{id}', [ApiCartController::class, 'destroy']);


route::get("pinjaman/{id}",  [ApiPeminjamanController::class, "pinjaman"]);
route::get("pinjam",  [ApiPeminjamanController::class, "store"]);
route::post("pinjam",  [ApiPeminjamanController::class, "store"]);

route::get("pengembalian/{id}",  [ApiPengembalianController::class, "pengembalian"]);
route::get("pengembalian",  [ApiPengembalianController::class, "store"]);
route::post("pengembalian",  [ApiPengembalianController::class, "store"]);
route::get("bukti_img/bukti/{fath}",  [ApiPengembalianController::class, "sendimg"]);
Route::post('/upload-image', [ApiPengembalianController::class, 'uploadImage']);



route::get("item", [ApiItemController::class, "index"]);
route::get("imgitem/item/{fath}",  [ApiItemController::class, "sendimg"]);


route::get("category", [ApiCategoryController::class, "index"]);
route::get("category/{id}",  [ApiCategoryController::class, "findcategory"]);
