<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

/**
 * Class LibroController
 * @package App\Http\Controllers
 */
class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $libros = Libro::where([
            ['nombre', '!=', null],
            [function ($query) use ($request){
                if(($term = $request->term)) {
                    $query->orWhere('nombre', 'LIKE', '%' . $term . '%')->get();
                    $query->orWhere('ISBN', 'LIKE', '%' . $term . '%')->get();
                    $query->orWhere('autor', 'LIKE', '%' . $term . '%')->get();
                    $query->orWhere('editorial', 'LIKE', '%' . $term . '%')->get();
                }
            }]
        ])
            ->orderBy('id','desc')
            ->paginate(10);
        Paginator::useBootstrap();
        return view('libros.index', compact('libros'))
            ->with('i', (request()->input('page', 1) - 1) * $libros->perPage());
    }

    public function visitor()
    {
        $libros = Libro::paginate();

        return view('libros.visitor', compact('libros'))
            ->with('i', (request()->input('page', 1) - 1) * $libros->perPage());
    }

    public static function getCategoria($categoria_id){
        $nombre = Categoria::select('categoria')->where('id', $categoria_id)->value('categoria');
        return $nombre;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $libro = new Libro();
        $categorias = Categoria::all(['id', 'categoria']);
        return view('libros.create', compact('libro', 'categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        request()->validate(Libro::$rules);

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = $profileImage;
        }

        if ($archivo = $request->file('archivo')) {
            $destinationPath = 'archivos/';
            $profileArchivo = date('YmdHis') . "." . $archivo->getClientOriginalExtension();
            $archivo->move($destinationPath, $profileArchivo);
            $input['archivo'] = $profileArchivo;
        }

        Libro::create($input);

        $libros = Libro::paginate();

        $success = 'Libro creado satisfactoriamente.';

        return view('libros.index', compact('libros', 'success'))
        ->with('i', (request()->input('page', 1) - 1) * $libros->perPage());
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $libro = Libro::find($id);

        return view('libros.show', compact('libro'));
    }

    /**
     * Este metodo carga datos de un Libro para Usuarios NO registrados.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {

        $libro = Libro::find($id);

        return view('libros.view', compact('libro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $libro = Libro::find($id);
        $categorias = Categoria::all(['id', 'categoria']);
        return view('libros.edit', compact('libro','categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Libro $libro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Libro $libro)
    {
        request()->validate(Libro::$rules);

        $input = $request->all();
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        } else{
            unset($input['image']);
        }

        if ($archivo = $request->file('archivo')) {
            $destinationPath = 'archivos/';
            $profileArchivo = date('YmdHis') . "." . $archivo->getClientOriginalExtension();
            $archivo->move($destinationPath, $profileArchivo);
            $input['archivo'] = $profileArchivo;
        } else{
            unset($input['archivo']);
        }

        $libro->update($input);

        $success = 'Libro creado satisfactoriamente.';
        $categorias = Categoria::all(['id', 'categoria']);
        return view('libros.edit', compact('libro','categorias','success'));

    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $libro = Libro::find($id);

        if ($libro != null) {
            $libro->delete();
        }

        $libros = Libro::paginate();
        return view('libros.index', compact('libros'))
            ->with('i', (request()->input('page', 1) - 1) * $libros->perPage());
    }
}
