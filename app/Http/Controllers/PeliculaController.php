<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PeliculaController extends Controller
{
    
	public function index($genero){

		switch ($genero) {
    		
    		case "Drama":
        	return view('pelicula/index')->with('genero', $genero);
        	break;

        	case 'Comedia':
        		return view('pelicula/index')->with('genero', $genero);
        	break;

        	case 'Accion':
        		return view('pelicula/index')->with('genero', $genero);
        	break;

        	case 'Terror':
        	return view('pelicula/index')->with('genero', $genero);
        	break;
    
    		default:
        	return view('pelicula/error');
}
	
	}




}

