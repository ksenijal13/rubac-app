<?php

namespace App\Models;


class Korisnik {

    public function getByEmailAndPassword($email, $password){
        return \DB::table("korisnik AS k")
                ->join("uloga AS u", "k.uloga_id", "=", "u.id")
                ->select("k.*", "u.naziv")
                ->where([
                    ["email", "=", $email],
                    ["lozinka", "=", md5($password)]
                ])
                ->first(); 
    }
}