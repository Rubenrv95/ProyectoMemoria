<?php

namespace App\Http\Controllers;

use App\Models\Aprendizaje;
use Illuminate\Http\Request;

class AprendizajeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('aprendizajes');
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
