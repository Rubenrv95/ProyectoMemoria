<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Datatables;

class CarreraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Carrera::orderBy('nombre')->get(); 
        return view ('/carreras', ['carrera'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'nombre_carrera'=>'required'
        ]);


        $query = DB::table('carreras')->insert([
            'nombre'=>$request->input('nombre_carrera'),
            'area'=>$request->input('area'),
        ]);


        return redirect()->intended('/carreras');
    }

    public function createForm()
    {
        return view('crearCarrera');
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
     * @param  \App\Models\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function show($id) {

        $carrera = DB::table('carreras')->where('id', $id)->get(); //carrera
        $result = DB::table('planes')->where('Carrera_asociada', $id)->get(); //los planes de la carrera
        $data = json_decode($result, true);
        $name = json_decode($carrera, true);
        return view ('planes.planes')->with('data', $data)->with('id', $id)->with('name', $name); //se envian los datos de los planes mas el nombre de la carrera y su id

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function edit(Carrera $carrera)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre_carrera'=>'required'

        ]);


        $query = DB::table('carreras')->where('nombre', $id)->update([
            'nombre'=>$request->input('nombre_carrera'),
            'area'=>$request->input('area'),
        ]);
        

        return redirect('/carreras')->with('success', 'Data actualizada');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $query = DB::table('carreras')->where('nombre', $id)->delete();
        
        return redirect('/carreras')->with('success', 'Logrado');
    }




    //Funciones para planes de estudio


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function createPlan(Request $request, $id)
    {
        $request->validate([
            'nombre_plan'=>'required'
        ]);


        $query = DB::table('planes')->insert([
            'Nombre'=>$request->input('nombre_plan'),
            'Carrera_asociada'=>$request->input('nombre_carrera'),
        ]);

        echo 'Entré';


        return back()->with('EXITO', 'Plan creado');
    }


}
