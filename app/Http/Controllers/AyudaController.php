<?php

namespace App\Http\Controllers;
use App\Models\Admin\Categoria;
use App\Models\Admin\Notificaciones;

use Illuminate\Http\Request;

class AyudaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::all();
        return view('ayuda/ayuda', ['categorias' => $categorias, 'mensaje' => '']);
    }

    public function enviar_mail(Request $request)
    {
        $notaNueva = new Notificaciones;
        $notaNueva->nombre = $request->nombre;
        $notaNueva->email = $request->email;
        $notaNueva->mensaje = $request->mensaje;
        $notaNueva->save();

        return redirect('/enviado');
    }

    
    public function mensaje_enviado()
    {
        $categorias = Categoria::all();        
        $mensaje = "¡Gracias por contactar con nosotros! Nos pondremos en contacto a la brevedad.";
        return view('generico')->with(['mensaje' => $mensaje, "categorias" => $categorias]);
    }
}
