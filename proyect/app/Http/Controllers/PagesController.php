<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function inicio(){
    	return view('uno');
    }

    public function uno(){
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
}
