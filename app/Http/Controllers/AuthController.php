<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Models\Korisnik;

class AuthController extends Controller
{
    public function login(){
        return view("pages/login");
    }
    public function doLogin(LoginRequest $request){
        $email = $request->input("email");
        $lozinka = $request->input("lozinka");

        $model = new Korisnik();
        $korisnik = $model->getByEmailAndPassword($email, $lozinka);
        
        if($korisnik){
            $request->session()->put("user", $korisnik);

            // dd($request); // Testiranje u session->attributes da li postoji sesija!!
            return \redirect("/login")->with("message", "Uspesno ste se ulogovali!");
        } else {
            return redirect("/login")->with("message", "Niste registrovani!");
        }
        
    }
    public function logout(Request $request){
        $request->session()->forget("user");
        $request->session()->flush(); // = destroy()
        return redirect("/login")->with("message", "Izlogovali ste se");
    }
}
