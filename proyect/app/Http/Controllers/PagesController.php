<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App;

class PagesController extends Controller
{
    public function index(){
        $notas = App\Nota::all();
        return view('welcome', compact('notas'));
    }
    public function detalle($id){
        $nota = App\Nota::findOrFail($id);
        return view('notas.detalle',compact('nota'));
    }
    public function inicio(){
    	return view('uno');
    }

    public function nosotros($nombre = null){

	$equipo=['Angel', 'Miguel', 'Victor']; //arreglo

	// return view('nosotros', ['equipo'=>$equipo]);
	return view('nosotros',compact('equipo','nombre'));
    }

    public function fotos(){
    	return view('fotos');
    }

    public function lista(){
        $lista = Product::get();
        return $lista;
    }

    public function crear(Request $request){
        // return $request->all();

        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required'
        ]);

       $notaNueva = new App\Nota;

       $notaNueva->nombre = $request->nombre;
       $notaNueva->descripcion = $request->descripcion;

       $notaNueva->save();

       return back()->with('mensaje','Nota agregada!'); //retorna a la misma pagina
    }

    public function editar($id){
        $nota = App\Nota::findOrFail($id);
        return view('notas.editar', compact('nota'));
    }

    public function update(Request $request, $id){
            $notaUpdate = App\Nota::findOrFail($id);

            $notaUpdate->nombre = $request->nombre;    
            $notaUpdate->descripcion = $request->descripcion;

            $notaUpdate->save();
    }
}
