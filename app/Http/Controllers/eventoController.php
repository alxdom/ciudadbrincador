<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evento;
use App\TipoEvento;
use App\User;
use Session;
use Illuminate\Support\Facades\Auth;

class eventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth')->only('create');
        $this->middleware('auth')->only('edit');
        $this->middleware('auth')->only('destroy');
    }

    public function index()
    {
        $userId = Auth::user()->id;
        $eventosUsuario = Evento::with('usuarios', 'tipoEvento')->where('id_users', $userId)->get();
        //$tipo = Evento::with('tipoEvento')->where('id_users', $userId)->get();

        //return $eventosUsuario;
        return view('eventos.index', compact('eventosUsuario'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipos = TipoEvento::all();
        return view('eventos.create', compact('tipos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$kk = $request->fecha_reservacion;
        $mea2 = $request->hora;
        $fecha_reservacion = $kk." ".$mea2;*/
        //return $fecha_reservacion;
        $this->validate($request,['fecha_reservacion'=>'required','cantidad_personas'=>'required','id_tipo_evento'=>'required','id_users'=>'required']);
        Evento::create($request->all());
        return redirect()->action('EventoController@index')->with('message','Evento agendado satisfactoriamente');
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
    public function edit(Evento $evento)
    {

        $tipos = TipoEvento::all();
        return view('eventos.edit', compact('evento', 'tipos'));
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
        $this->validate($request,['fecha_reservacion'=>'required','cantidad_personas'=>'required','id_tipo_evento'=>'required','id_users'=>'required']);
        Evento::find($id)->update($request->all());
        return redirect()->action('EventoController@index')->with('message','Evento actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Evento::destroy($id);
        return redirect()->action('EventoController@index')->with('message','Evento eliminado satisfactoriamente');
    }
}
