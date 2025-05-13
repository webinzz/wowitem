<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Peminjaman;
use App\Models\pengembalian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ApiPengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function pengembalian($id)
    {
        $data = pengembalian::with("item", "peminjaman")->where("id_user", $id)->where("status", request("status"))->get();
        return response()->json($data);
    }

    public function sendimg($fath)
    {
        return response()->file(public_path("storage/bukti/$fath"));
    }

    /**
     * Store a newly created resource in storage.
     */

     public function uploadImage(Request $request)
    {

        if ($request->hasFile('image')) {
            // Simpan gambar di direktori 'public/uploads'
            $path = $request->file('image')->store('bukti', 'public');
            
            // Dapatkan URL untuk gambar yang diunggah
            $url = Storage::url($path);

            // Kembalikan URL gambar sebagai respons
            return response()->json(['url' => $url], 200);
        }

        return response()->json(['error' => 'Image upload failed'], 400);
    }
    public function store(Request $request)
    {
        try {
            // Simpan gambar ke storage dan dapatkan path-nya
            if ($request->hasFile('bukti_img')) {
                $path = $request->file('bukti_img')->store("bukti", "public");
                $fileName = basename($path); // Nama file yang disimpan
            } else {
                return response()->json(['message' => 'Bukti gambar tidak ditemukan'], 400);
            }

            // Buat record baru di tabel pengembalian
            $pengembalian = Pengembalian::create([
                'id_user' => $request->input('id_user'),
                'id_item' => $request->input('id_item'),
                'id_peminjaman' => $request->input('id_peminjaman'),
                'bukti_img' => 'bukti/'.$fileName, // Simpan nama file gambar
            ]);

            $peminjaman = Peminjaman::where("id_peminjaman","$request->id_peminjaman")->first();
            $peminjaman->status = "waiting" ;
            $peminjaman->save();

            return response()->json([
                'message' => 'Data pengembalian berhasil disimpan',
                'data' => $pengembalian
            ], 200);
            
        } catch (\Exception $e) {
            return response()->json(['message' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
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
