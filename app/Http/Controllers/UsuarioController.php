<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsuarioController extends Controller
{



    public function create_user(Request $request) {

        $request->validate([
            'nombre'=>'required|string',
            'email'=>'required|string|email',
            'password'  =>  'required|alphaNum|min:6'
        ]);


        $query = DB::table('users')->insert([
            'nombre'=>$request->input('nombre'),
            'email'=>$request->input('email'),
            'password' => Hash::make($request->input('password')),
            'remember_token' => Str::random(10)
        ]);

        return redirect()->intended('/home');

    }
    
}
