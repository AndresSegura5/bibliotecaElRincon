<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
use App\Models\Prestamo;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        Session::put('dataUser', Auth::user());
        $usuarioObj = Auth::user();
        //$prestamos = Prestamo::where('id_usuario', $usuarioObj->id)->get();
        $prestamos = Prestamo::all();
        return view('home', compact('prestamos'));
    }

}
