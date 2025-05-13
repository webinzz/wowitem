<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::all();
        return response()->json($data);
    }
    
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'=>"required",
             'password'=>"required"
        ]);
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            
            return response()->json($user->id, 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid credentials',
            ], 401);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        User::create([
            "name" => $request->username,
            "no_tlf" => $request->notlf,
            "email" => $request->email,
            "password" => $request->password
        ]);
        return response()->json([
            "status"=>"succes"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        $user = User::find($id);
        $data = Peminjaman::where( "id_user", $id)->with("user")->get();
        if (!$data) {
            return response()->json(['message' => 'User not found'], 404);
        }
        
        return response()->json([$user, $data], 200);
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
