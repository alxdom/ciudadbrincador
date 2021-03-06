<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Usuario;
use App\Tiempo;
use App\Pulsera;
use App\Asignar;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

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
        /*$pulseras = DB::select('select a.id_pulsera, a.id_usuarios, pulsera.ip 
            FROM `asignar_pulsera_al_cliente` a INNER JOIN pulsera where a.id_pulsera = id');  */
        
        $tiempos = DB::select('select a.*, p.ip, t.hora_salida, t.id_usuario AS idUsuarioTiempo,t.created_at, t.updated_at, u.* 
            FROM asignar_pulsera_al_cliente AS a INNER JOIN pulsera AS p 
                ON a.id_pulsera = p.id INNER JOIN usuarios AS u 
                ON a.id_usuarios = u.id INNER JOIN tiempo as t 
                ON a.id_usuarios = t.id_usuario 
                WHERE t.created_at > CURRENT_DATE ');

        //$tiempos = Tiempo::with('usuario')->get();
        //return $tiempos;
        //return $pulseras;
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

        //return (json_decode($asigna));

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
            'pulsera'=>'required',
            'tiempo'=>'required']);
            //$rata = $request->only(['usuario', 'pulsera', '_token']);
            //$asignar = Asignar::create($rata);
            //dd($request->all());
            $tiempo = $request->only(['tiempo']);
            echo gettype($tiempo) , "\n";
            $string = implode('',$tiempo);
            echo $string;
            $tiempoINT = (int)$string;
            //dd($tiempoINT);
            $tiempoBD = Carbon::now()->addHour($tiempoINT);
            //echo $tiempoBD;

            $id_usuario = $request->usuario;
            $usuarioINT = (int)$id_usuario;

            $id_pulsera = $request->pulsera;
            //$pulseraINT = intval($id_pulsera);
            //$pulseraINT = number_format($id_pulsera, 2); 
            settype($id_pulsera, "integer");

            

            $llegada = date("Y-m-d H:i:s");
            //echo $llegada;
            //dd($llegada);
            //$arreglo = [$tiempoBD, $id_usuario];
            //$aber = json_encode($tiempoBD);

            //dd($pulseraINT, $request->only(['pulsera']));
            //dd($request->only(['usuario']));
            DB::insert('insert into tiempo (hora_salida, id_usuario, created_at) values (?, ?, ?)', [$tiempoBD, $usuarioINT, $llegada]);
            DB::insert('insert into asignar_pulsera_al_cliente (id_pulsera, id_usuarios) values (?, ?)', [$id_pulsera, $usuarioINT]);

            
            //dd($query);
            //$registrarTiempo = Tiempo::create($arreglo);
            /*$usuario = $request->input("usuario");
            $pulsera = $request->input("pulsera");
            $arreglo = [$usuario, $pulsera];*/
            //dd($usuario);
            //$rata = Asignar::create($request->all());
            //return $rata;
            //dd($request->only(['usuario', 'pulsera', '_token']));
            return redirect()->route('accesos.asignar')->with('status_success', 'Pulsera y tiempo asignados correctamente!');
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
    public function destroy()
    {
        $myid = $_GET['id'];
        $myip = $_GET['ip'];
        sleep(5); //Espera x segundos a ejecutar las siguientes líneas
        $eiliminar = DB::delete('delete FROM `asignar_pulsera_al_cliente` WHERE id_usuarios = ?', [$myid]); //Desvincula al morro de la pulsera
        //Asignar::destroy($id);

        //Intento para deesvincular morros TODOOFF
        $res = Http::timeout(5, 5)->get("http://$myip/TODOOFF"); //APAGA LA PULSERA, espera 5 segundos la respuesta y 5 segundos después vuelve a intentarlo si falla
        echo $res->getStatusCode();           // 200
        //echo $res->getHeader('content-type'); // 'application/json; charset=utf8'
        //echo $res->getBody();                 
        //var_export($res->json());  
        return " Se ha desvinculado al usuario : $myid y se ha enviado la orden a: $myip $res";
    }

    public function fetch($ip)
    {
        //Hice esto pa ver si me respondían las peticiones fetch xd
        return "Recibi esta IP: $ip";
    }
}
