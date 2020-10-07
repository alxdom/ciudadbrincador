<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Usuario;
use App\Tiempo;
use App\Pulsera;
use App\Asignar;

class controlAccesoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('haveaccess','accesos.index');

        return view('controlAcceso.index');
    }

    public function morros()
    {
        $tiempos = Tiempo::all();
        return view('controlAcceso.sala', compact('tiempos'));

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function asignar(Request $request)
    {
        $pulseras = Pulsera::all();

        $usuarios = Usuario::all();

        $asigna = Asignar::all();

        return (json_decode($asigna));

        return view('controlAcceso.asignar', compact('pulseras', 'usuarios'));
    }


 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function asignarStore(Request $request)
    {
        $request->validate([
            'usuario'=>'required',
            'pulsera'=>'required']);
            //$rata = $request->only(['usuario', 'pulsera', '_token']);
            //$asignar = Asignar::create($rata);
            $rata = Asignar::create($request->all());
            return $rata;
            //dd($request->only(['usuario', 'pulsera', '_token']));
        //return redirect()->route('accesos.asignar')->with('status_success', 'El registro se guardo correctamente');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre'    => 'required',
            'apellidoP' => 'required',
            'apellidoM' => 'required',
            'tel'       => 'required',
            'domicilio' => 'required',
        ]);
        $usuario = Usuario::create($request->all());
        return redirect()
                        ->route('accesos.index')
                        ->with('status_success', 'El registro se guardo correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    public function pivote()
    {
        
    }
}
