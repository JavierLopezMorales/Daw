<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
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
       $validated = $r->validate([
     'type' => 'required|string',
     'name' => 'required|string',
     'description' => 'required',
     'img_fondo' => 'required|image|mimes:jpg',
     'img_puzzle' => 'required|image|mimes:jpg',
     'modo' => 'required',
   ]);

    if($r->hasFile('img_puzzle')){
       $file = $r->file('img_puzzle');
       $name_puzzle =$file->getClientOriginalName();
       $file->move(public_path().'/images/imagesST', $name_puzzle);

     }
  if($r->hasFile('img_fondo')){
    $file = $r->file('img_fondo');
    $name_fondo = $file->getClientOriginalName();
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
return view('inicio');

}



   public function edit($id) {
       $tematicas = TematicasST::find($id);
       return view('ST/Tematicas/formTematicasST', array('tematica' => $tematicas));
   }

   public function update(Request $r,$id) {
     $validated = $r->validate([
   'type' => 'required|string',
   'name' => 'required|string',
   'description' => 'required',
   'img_fondo' => 'required|image|mimes:jpg',
   'img_puzzle' => 'required|image|mimes:jpg',
   'modo' => 'required',
 ]);

    if($r->hasFile('img_puzzle')){
      $tematica = TematicasST::find($id);
      File::delete('images/imagesST/' . $tematica->img_puzzle);
      $file = $r->file('img_puzzle');
      $name_puzzle = $file->getClientOriginalName();
      $file->move(public_path().'/images/imagesST', $name_puzzle);

}
  if($r->hasFile('img_fondo')){
    $tematica = TematicasST::find($id);
    File::delete('images/imagesST/' . $tematica->img_fondo);
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
       File::delete('images/imagesST/' . $tematica->img_fondo);
       File::delete('images/imagesST/' . $tematica->img_puzzle);
       $tematica->delete();
       return redirect()->route('TematicasST.index');
   }
}
