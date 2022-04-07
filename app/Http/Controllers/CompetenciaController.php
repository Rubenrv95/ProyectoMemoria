<?php

namespace App\Http\Controllers;

use App\Models\Competencia;
use Illuminate\Http\Request;
use App\Models\Carrera;
use App\Models\Plan;
use Illuminate\Support\Facades\DB;
use Datatables;

class CompetenciaController extends Controller
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
    public function index($id_carrera, $id_plan)
    {

        $plan = DB::table('planes')->where('id', $id_plan)->get();
        $carrera = DB::table('carreras')->where('id', $id_carrera)->get(); 
        $plan = json_decode($plan, true);
        $carrera = json_decode($carrera, true);
        $competencia = DB::table('competencias')->where('refPlan', $id_plan)->get();
        $competencia = json_decode($competencia, true);
        $aprendizaje = DB::table('aprendizajes')->join('competencias', 'aprendizajes.refCompetencia', '=', 'competencias.id')->select('competencias.Descripcion', 'aprendizajes.*')->get();
        $aprendizaje = json_decode($aprendizaje, true);
        return view('planes.competencias')->with('plan', $plan)->with('carrera', $carrera)->with('competencia', $competencia)->with('aprendizaje', $aprendizaje);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_carrera, $id_plan, Request $request)
    {
        $request->validate([
            'desc_competencia'=>'required'
        ]);


        $query = DB::table('competencias')->insert([
            'Descripcion'=>$request->input('desc_competencia'),
            'Tipo'=>$request->input('tipo'),
            'Nivel'=>$request->input('nivel'),
            'refPlan'=>$id_plan,
        ]);

        return back();
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
     * @param  \App\Models\Competencia  $competencia
     * @return \Illuminate\Http\Response
     */
    public function show(Competencia $competencia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Competencia  $competencia
     * @return \Illuminate\Http\Response
     */
    public function edit(Competencia $competencia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Competencia  $competencia
     * @return \Illuminate\Http\Response
     */
    public function update($id_carrera, $id_plan, Request $request, $id_comp)
    {
        $request->validate([
            'desc_competencia'=>'required'
        ]);


        $query = DB::table('competencias')->where('id', $id_comp)->update([
            'Descripcion'=>$request->input('desc_competencia'),
            'Tipo'=>$request->input('tipo'),
            'Nivel'=>$request->input('nivel'),
        ]);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Competencia  $competencia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_carrera, $id_plan, $id_comp)
    {
        $query = DB::table('competencias')->where('id', $id_comp)->delete();
        
        return back();
    }
}
