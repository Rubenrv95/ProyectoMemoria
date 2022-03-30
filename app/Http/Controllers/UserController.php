<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Carrera;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::orderBy('nombre')->where('nombre', '<>', 'Administrador')->get(); 
        $carreras = Carrera::orderBy('nombre')->get(); 
        return view ('/usuarios', ['user'=>$data], ['carrera'=>$carreras]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'nombre'=>'required|string',
            'email'=>'required|string|email',
            'password'  =>  'required|alphaNum|min:6|confirmed'
        ]);


        $query = DB::table('users')->insert([
            'nombre'=>$request->input('nombre'),
            'email'=>$request->input('email'),
            'password' => Hash::make($request->input('password')),
            'carrera'=>$request->input('carrera'),
            'remember_token' => Str::random(10)
        ]);

        return redirect()->intended('/usuarios');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre'=>'required|string',
            'email'=>'required|string|email'
        ]);


        $query = DB::table('users')->where('id', $id)->update([
            'nombre'=>$request->input('nombre'),
            'email'=>$request->input('email'),
            'carrera'=>$request->input('carrera')
        ]);
        

        return redirect('/usuarios')->with('success', 'Data actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $query = DB::table('users')->where('id', $id)->delete();
        
        return redirect('/usuarios')->with('success', 'Logrado');
    }
}
