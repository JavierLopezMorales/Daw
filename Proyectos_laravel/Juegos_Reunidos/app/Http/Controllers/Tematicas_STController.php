<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use Image;
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
       $name_puzzle =$file->getClientOriginalName();
       $imag =Image::make(public_path().'images/imagesST',$name_puzzle);
       $imag->resize(150, 150);
       $file->move(public_path().'/images/imagesST', $imag);

     }
  if($r->hasFile('img_fondo')){
    $file = $r->file('img_fondo');
    $name_fondo = $file->getClientOriginalName();
    $img=Image::make(public_path().'images/imagesST',$name_fondo);
    $img->resize(150, 150);
    $file->move(public_path().'/images/imagesST', $img);

  }

       $tematica = new TematicasST();
       $tematica->type = $r->type;
       $tematica->name = $r->name;
       $tematica->description = $r->description;
       $tematica->img_fondo = $img;
       $tematica->img_puzzle = $imag;
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
     $tematica = TematicasST::find($id);
     File::delete('images/imagesST/' . $tematica->img_puzzle);
     if($r->hasFile('img_puzzle')){
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
