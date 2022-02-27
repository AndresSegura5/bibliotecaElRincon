<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prestamo;
use App\Models\Libro;
use App\Models\User;
use Carbon\Carbon;
use DB;

class PrestamosController extends Controller{

    public function index()
    {
        //Todos los usuarios
        $usuarios = User::all();

        //Todos los prestamos
        $prestamos = Prestamo::paginate();

        return view('prestamos.index', compact('prestamos', 'usuarios'))
            ->with('i', (request()->input('page', 1) - 1) * $prestamos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function create(){

        //Dia de hoy
        $mytime = Carbon::now();
        $fecha_actual =  $mytime->toDateString();


        $prestamo = new Prestamo();

        //Se seleccionan los libros que SI estan disponibles. Es decir, que no estan en prestamo activo
        $libros = Libro::select(['id', 'nombre'])->where('disponible','si')->get();


        /**
         * Seccion para mostrar los usuarios correctos en el dropdown
         * Reglas para poder pedir un prestamo:
         * Si un usuario TIENE SOLO 1 prestamo PENDIENTE
         * Si el usuario TIENE prestamos DEVUELTOS y NINGUNO PENDIENTE
         * Si el usuario TIENE prestamos ATRASADOS pero ya DEVUELTOS (Fecha de Devolucion NOT NULL)
         * Si el usuario NO TIENE prestamos PENDIENTES NI DEVUELTOS
         */
        $lista_usuarios=[];

        if(!Prestamo::exists()){
            $usuarios = User::select(['id','name'])->get();
        }else{

            $usuarios_total = User::select('id')->get();
            $usuarios_estado = Prestamo::select(['id_usuario', DB::raw('count(*) as count')])->groupBy('id_usuario')->get();

            foreach($usuarios_estado as $usr) {
                $user_prestamo = Prestamo::select('id_usuario', 'estado', 'fecha_devolucion_1', 'fecha_devolucion_2', 'diasDeRetraso', 'estaLibre', 'fechaLibre')->where('id_usuario', '=', $usr->id_usuario)->get();
                $pendientes_count = 0;
                $devueltos_count = 0;
                $atrasados_count = 0;

                /**
                 * En este proceso se contabiliza la cantidad de usuarios en los estados
                 * pendiente, devuelto y atrasado(con la consideración de que la fecha de devolucion2 esta vacia)
                 */

                foreach ($user_prestamo as $usrx) {
                    if ($usrx->estado == "pendiente") {
                        $pendientes_count = $pendientes_count + 1;
                    }

                    if ($usrx->estado == "devuelto") {
                        $devueltos_count = $devueltos_count + 1;
                    }

                    if ($usrx->estado == "atrasado" && $usrx->fecha_devolucion_2 == '') {
                        $atrasados_count = $atrasados_count + 1;

                    }
                    if ($usrx->estado == "atrasado" && $usrx->fecha_devolucion_2 != '' && $atrasados_count >= 1) {
                        $atrasados_count = $atrasados_count - 1;

                    }
                }

                /**
                 * Recuperando las Ids de los usuarios que si deben aparecer
                 * en el dropdown porque cumplen las condiciones
                 *
                 * Actualizando las condiciones para calcular cuando un prestamo esta atrasado.
                 * Actualizando las condiciones para cuando se entrega un prestamo atrasado asignar el numero de dias de penalizacion
                 * Actualizando las condiciones para cuando se cumple el dia de liberacion de un prestamo atrasado con sancion
                 */
                if($usrx->fecha_devolucion_2 != ''){
                    $fechaDev2aFecha = Carbon::createFromFormat('Y-m-d', $usrx->fecha_devolucion_2);
                    if ($usrx->estado == "atrasado" ){
                        Prestamo::where('id_usuario', $usrx->id_usuario)->update(array('diasDeRetraso' => $fechaDev2aFecha->diffInDays($usrx->fecha_devolucion_1)));
                        Prestamo::where('id_usuario', $usr->id_usuario)->update(array('estaLibre' => 0));
                        Prestamo::where('id_usuario', $usrx->id_usuario)->update(array('fechaLibre' => $fechaDev2aFecha->addDays($fechaDev2aFecha->diffInDays($usrx->fecha_devolucion_1))));
                    }

                    if($usrx->estado == "atrasado" && ($mytime->gte($fechaDev2aFecha->addDays($usrx->diasDeRetraso)))){
                        Prestamo::where('id_usuario', $usr->id_usuario)->update(array('estaLibre' => 1));
                        $lista_usuarios[] = $usrx->id_usuario;
                    }
                }
                if ($pendientes_count == 1 && $atrasados_count == 0) {
                    Prestamo::where('id_usuario', $usrx->id_usuario)->update(array('estaLibre' => 1));
                    $lista_usuarios[] = $usr->id_usuario;
                }elseif ($pendientes_count == 0 && $atrasados_count == 0 &&  ($devueltos_count > 0 || $atrasados_count > 0) && ($mytime->gt($fechaDev2aFecha->addDays($usrx->diasDeRetraso)))) {
                    Prestamo::where('id_usuario', $usrx->id_usuario)->update(array('estaLibre' => 1));
                    $lista_usuarios[] = $usr->id_usuario;
                }

            }

            if($lista_usuarios==null){

                /**
                 * ninguno cumple con la condicion
                 * Todos deben ser quitados de la lista principal
                 */
                $usuarios_quitar= Prestamo::select('id_usuario as id')->get();

                $result = $usuarios_total->diff($usuarios_quitar);

                $usuarios = User::select(['id','name'])->whereIn('id',$result)->get();
            }else{

                /**
                 * usuarios que cumplen con las condiciones
                 * entonces deben aparecer en la lista principal
                 */
                foreach($lista_usuarios as $usr){
                    $usuarios_q[]=$usr;
                }
                $usuarios_quitar1= Prestamo::select('id_usuario as id')->groupBy('id_usuario')->get();

                $usuarios_quitar2 = Prestamo::select('id_usuario as id')->whereIn('id_usuario',$usuarios_q)->groupBy('id_usuario')->get();

                $result = $usuarios_quitar1->diff($usuarios_quitar2);

                $usuarios = User::select(['id','name'])->whereNotIn('id',$result)->get();

            }
        }

        return view('prestamos.create', compact('prestamo', 'libros','usuarios', 'fecha_actual'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     */
    public function store(Request $request)
    {

        $input = $request ->all();
        $day = 5;
        $input['fecha_devolucion_1']= date('Y-m-d', strtotime($input['fecha_prestamo']. "+ $day days")); ;
        $input['estado']='pendiente';

        Prestamo::create($input);
        $success = 'Prestamo creado satisfactoriamente.';

        $this->changeDisponibleLibro($input['id_libro'],'no');

        $mytime = Carbon::now()->toDateString();

        Prestamo::where([
            ['fecha_devolucion_1', '<' , $mytime],
            ['estado','=','pendiente']
        ])
            ->update([
                'estado'=>'atrasado',
        ]);


        $prestamos = Prestamo::paginate();

        return redirect()->route('prestamos.index', compact('prestamos', 'success'))
            ->with('i', (request()->input('page', 1) - 1) * $prestamos->perPage());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     */
    public function update(Request $request){
        $fecha_devolucion_2 = Carbon::now()->toDateString();;

        if($request['estado_actual']=="pendiente"){
            if($fecha_devolucion_2 <= $request['fecha_devolucion_1']){
                $estado ="devuelto";
            }
        }else{
            $estado = "atrasado";
        }
        $success = 'Libro devuelto successfully.';

        Libro::where('id', $request['id_libro'])->update(array('disponible' => 'si'));

        Prestamo::where('id', $request['id_prestamo'])->update(array('fecha_devolucion_2' => $fecha_devolucion_2, 'estado'=> $estado));

        $prestamos = Prestamo::paginate();

        return view('prestamos.index', compact('prestamos', 'success'))
            ->with('i', (request()->input('page', 1) - 1) * $prestamos->perPage());

    }

    public static function getLibro($libro_id){
        $nombre = Libro::select('nombre')->where('id', $libro_id)->value('nombre');
        return $nombre;
    }

    public static function getUsuario($usuario_id){
        $nombre = User::select('name')->where('id', $usuario_id)->value('name');
        return $nombre;
    }

    public function changeDisponibleLibro($libro_id, $disponible){
        if($disponible=="si"){
            Libro::where('id', $libro_id)->update(array('disponible' => 'si'));
        }else{
            Libro::where('id', $libro_id)->update(array('disponible' => 'no'));
        }
    }
}
