<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class configuracion_ST extends Controller
{
  public function index() {
       $configuracion = TematicasST::all();
       return view('ST/Tematicas/showTematicasST', ['tematicasList'=>$tematicasList]);
   }
}
