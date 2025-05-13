<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use App\Models\Peminjaman;
use App\Models\pengembalian;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function loginview() {
        return view('login');
    }
    public function store(Request $request)
    {   
        //rwgister
        if($request->input("action") == "register"){
            $email = User::where("email" , $request->email)->first();
            if($email == null){
                User::create([
                    "name" => $request->username,
                    "no_tlf" => $request->notlf,
                    "email" => $request->email,
                    "password" => $request->password
                ]);
                return back()->with("succes", "you succes sign up");
            }else{
                return back()->with("error", "email already exist");
            }

            

        //login
        }else if($request->input("action") == "login"){

                $field = $request->validate(
                    [
                        "email"=>"required",
                        "password"=>"required"
                    ]
                    );

                if(Auth::attempt($field, )){
                    if(auth::user()->role == "admin"){
                        return redirect("admin");
                    }else if(auth::user()->role == "user"){
                        return redirect("/");
                    }
                }else{
                    return back()->with("error","Email atau password salah");          
                }

            // $user = User::where("email", $request->email)->first();
            // if($user ){
            //     Auth::login($user); 
            //     if(Auth::check()){
            //         return redirect("profile");
            //     }else{
            //         return "nooooo";
            //     }
            // }else{
            //     return back()->with("error","username atau password salah");
            // }

        }
        
        
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Anda telah berhasil logout.');
    }

    public function profile()
    {
        $borrowing = Peminjaman::with("item")->where("id_user", auth::user()->id)->where("status","borrowing")->get();
        $pending = Peminjaman::with("item")->where("id_user", auth::user()->id)->where("status","pending")->get();
        $returned = pengembalian::with("item")->where("id_user", auth::user()->id)->where("status","returned")->get();
        $user = Auth::user(); // Mendapatkan data pengguna yang sedang login
        return view('profile', compact('user','returned','borrowing','pending')); 

        // if (auth::check()) {
        //     return view("profile"  );

        // } else {
        //     return redirect('login');

        // }
        
    }
    public function index()
    {
        if(request('search')){
            return view("admin.users", ['users'=>User::where("name",'like','%'.request('search').'%')
            ->orWhere("email",'like','%'.request('search').'%')
            ->orWhere("no_tlf",'like','%'.request('search').'%')
            ->paginate(10)]);
        }else{
            return view("admin.users" , ["users" => User::paginate(10)]);
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
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {   
        $user = User::find($id);
        $dataupdate = [
            'name' => $request->name,
            'no_tlf' => $request->notlf,
            "email" => $request->email,
        ];

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        User::where("id" , $id)->update($dataupdate);
        return back()->with("update", "user succes update");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::where('id', $id)->delete();

        return back()->with("delete", "user deleted");
    }

    public function generatePdf()
    {
        // Ambil data dari model Peminjaman
        $datauser = User::all();
        
        
        // Load view untuk PDF
        $pdf = Pdf::loadView('admin.laporan.userlaporan', compact('datauser'));

        // Mengunduh file PDF
        return $pdf->download('laporan_user.pdf');
    }
}
