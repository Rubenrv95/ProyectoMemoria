<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Plan;
use Datatables;

class PlanController extends Controller
{

    public function create(Request $request)
    {
        $request->validate([
            'nombre_plan'=>'required'
        ]);


        $query = DB::table('planes')->insert([
            'Nombre'=>$request->input('nombre_plan'),
        ]);


        return redirect()->intended('/carreras');

    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre_carrera'=>'required'

        ]);


        $query = DB::table('carreras')->where('Nombre de la carrera', $id)->update([
            'Nombre de la carrera'=>$request->input('nombre_carrera'),
            'Area profesional'=>$request->input('area'),
        ]);
        

        return redirect('/carreras')->with('success', 'Data actualizada');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $query = DB::table('carreras')->where('Nombre de la carrera', $id)->delete();
        
        return redirect('/carreras')->with('success', 'Logrado');
    }
}
