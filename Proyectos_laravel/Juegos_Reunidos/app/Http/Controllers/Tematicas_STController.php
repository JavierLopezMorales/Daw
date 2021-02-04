<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TematicasST;

class Tematicas_STController extends Controller
{
  public function index() {
       $tematicasList = TematicasST::all();
       return view('showTematicasST', ['tematicasList'=>$tematicasList]);
   }



   public function create() {
       return view('formTematicasST');
   }

   public function store(Request $r) {
       $tematica = new TematicasST();
       $tematica->type = $r->type;
       $tematica->name = $r->name;
       $tematica->description = $r->description;
       $tematica->img_fondo = $r->img_fondo;
       $tematica->img_puzzle = $r->img_puzzle;
       $tematica->save();
       return redirect()->route('TematicasST.index');
   }
   public function show($id)
       {
           //
       }

   public function edit($id) {
       $tematicas = TematicasST::find($id);
       return view('formTematicasST', array('tematica' => $tematicas));
   }

   public function update(Request $r,$id) {
       $tematica = TematicasST::find($r->id);
       $tematica->type = $r->type;
       $tematica->name = $r->name;
       $tematica->description = $r->description;
       $tematica->img_fondo = $r->img_fondo;
       $tematica->img_puzzle = $r->img_puzzle;
       $tematica->save();
       return redirect()->route('TematicasST.index');
   }

   public function destroy($id) {
       $tematica = TematicasST::find($id);
       $tematica->delete();
       return redirect()->route('TematicasST.index');
   }
}
