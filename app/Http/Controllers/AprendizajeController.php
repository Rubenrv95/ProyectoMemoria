<?php

namespace App\Http\Controllers;

use App\Models\Aprendizaje;
use Illuminate\Http\Request;

class AprendizajeController extends Controller
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
        $plan = DB::table('planes')->where('id', $id_plan)->get();
        $carrera = DB::table('carreras')->where('id', $id_carrera)->get(); 
        $plan = json_decode($plan, true);
        $carrera = json_decode($carrera, true);
        $competencia = DB::table('aprendizajes')->where('refCompetencia', $id_plan)->get();
        $competencia = json_decode($competencia, true);
        return view('planes.aprendizajes')->with('plan', $plan)->with('carrera', $carrera)->with('competencia', $competencia);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\Aprendizaje  $aprendizaje
     * @return \Illuminate\Http\Response
     */
    public function show(Aprendizaje $aprendizaje)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Aprendizaje  $aprendizaje
     * @return \Illuminate\Http\Response
     */
    public function edit(Aprendizaje $aprendizaje)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Aprendizaje  $aprendizaje
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aprendizaje $aprendizaje)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Aprendizaje  $aprendizaje
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aprendizaje $aprendizaje)
    {
        //
    }
}
