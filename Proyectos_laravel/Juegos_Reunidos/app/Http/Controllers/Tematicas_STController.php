<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TematicasST;

class Tematicas_STController extends Controller
{
  public function index() {
       $tematicasList = TematicasST::all();
       return view('ST/Tematicas/showTematicasST', ['tematicasList'=>$tematicasList]);
   }



   public function create() {
       return view('ST/Tematicas/formTematicasST');
   }

   public function store(Request $r) {

        if($r->hasFile('img_puzzle')){
       $file = $r->file('img_puzzle');
       $name_puzzle = $file->getClientOriginalName();
       $file->move(public_path().'/images/imagesST', $name_puzzle);

     }
     if($r->hasFile('img_fondo')){
    $file = $r->file('img_fondo');
    $name_fondo =$file->getClientOriginalName();
    $file->move(public_path().'/images/imagesST', $name_fondo);

  }

       $tematica = new TematicasST();
       $tematica->type = $r->type;
       $tematica->name = $r->name;
       $tematica->description = $r->description;
       $tematica->img_fondo = $name_fondo;
       $tematica->img_puzzle = $name_puzzle;
       $tematica->modo = $r->modo;
       $tematica->save();
       return redirect()->route('TematicasST.index');

   }
   public function show()
       {

    $data['name_fondo'] = TematicasST::find(2)->img_fondo;
    $data['name_puzzle'] = TematicasST::find(2)->img_puzzle;

    return view('ST/Juego', $data);
}



   public function edit($id) {
       $tematicas = TematicasST::find($id);
       return view('ST/Tematicas/formTematicasST', array('tematica' => $tematicas));
   }

   public function update(Request $r,$id) {
     if($r->hasFile('img_puzzle')){
    $file = $r->file('img_puzzle');
    $name_puzzle = $file->getClientOriginalName();
    $file->move(public_path().'/images/imagesST', $name_puzzle);

  }
  if($r->hasFile('img_fondo')){
 $file = $r->file('img_fondo');
 $name_fondo =$file->getClientOriginalName();
 $file->move(public_path().'/images/imagesST', $name_fondo);

}
       $tematica = TematicasST::find($r->id);
       $tematica->type = $r->type;
       $tematica->name = $r->name;
       $tematica->description = $r->description;
       $tematica->img_fondo =  $name_fondo;
       $tematica->img_puzzle = $name_puzzle;
        $tematica->modo = $r->modo;
       $tematica->save();
       return redirect()->route('TematicasST.index');
   }

   public function destroy($id) {
       $tematica = TematicasST::find($id);
       $tematica->delete();
       return redirect()->route('TematicasST.index');
   }
}
