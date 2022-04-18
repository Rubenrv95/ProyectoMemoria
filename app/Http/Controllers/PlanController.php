<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Carrera;
use App\Models\Modulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Datatables;


class PlanController extends Controller
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
        $query = DB::table('planes')->orderBy('Nombre')->join('carreras', 'planes.Carrera_asociada', '=', 'carreras.id')->select('planes.Nombre', 'planes.id', 'carreras.nombre as Ncarrera', 'carreras.id as idCarrera')->get();
        $query = json_decode($query, true);
        return view ('planes.vistaplanes')->with('data', $query);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $id)
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
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function show($id, $plan)
    {

        $query = DB::table('planes')->where('id', $plan)->get();
        $carrera = DB::table('carreras')->where('id', $id)->get(); 
        $modulo =  DB::table('modulos')->where('refPlan', $plan)->get(); 
        $query = json_decode($query, true);
        $carrera = json_decode($carrera, true);
        return view('editar')->with('plan', $query)->with('carrera', $carrera);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function edit(Plan $plan)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function update($id, $plan, Request $request)
    {

        $request->validate([
            'nombre_plan'=>'required'

        ]);


        $query = DB::table('planes')->where('id', $plan)->update([
            'Nombre'=>$request->input('nombre_plan'),
        ]);
        

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $plan)
    {
        $query = DB::table('planes')->where('id', $plan)->delete();

        return back();
    }
}
