<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Carrera;
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
        //return Carrera::where('usuario_id', auth()->id()->get());
        $data = Carrera::orderBy('Nombre de la Carrera')->get(); 
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
            'Nombre de la carrera'=>$request->input('nombre_carrera'),
            'Área profesional'=>$request->input('area'),
            /*'id' -> rand(1, 999)*/
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data = Carrera::orderBy('Nombre de la Carrera')->get(); 
        return view ('/carreras', ['carreras'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Carrera::select('select * from carreras where id = ?', [$id]);
        return view ('modificarCarrera', ['data'=>$data]);
    }


    public function verPlan() {

        return view ('planes');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data= Carrera::find($id);
        $data->delete();
        return redirect('/carreras')->with('success', 'Logrado');
    }
}
