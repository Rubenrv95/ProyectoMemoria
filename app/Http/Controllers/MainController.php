<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;

class MainController extends Controller
{
    function index()
    {
        return view('welcome');
    }

    function checklogin(Request $request) {
        $this->validate($request, [
            'email' =>  'required|email',
            'password'  =>  'required|alphaNum|min:6'
        ]);

        $user_data = array(
            'email' =>  $request->get('email'),
            'password' => $request->get('password')
        );

        if (Auth::attempt($user_data)) 
        {
            return redirect('main/successlogin');
        }

        else {
            return back()->with('error', 'Datos incorrectos');
        }
    }

    function successlogin() {
        return view ('home');
    }

    function logout() {
        Auth::logout();
        return redirect('main');
    }
}
