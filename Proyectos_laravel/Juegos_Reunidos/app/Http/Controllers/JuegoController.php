<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TematicasST;

class JuegoController extends Controller
{
  public function index()
  {
return view('ST/JuegoST/Juego');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
//
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
   public function show($id)
   {
    $tematicas = TematicasST::find($id);
    $data['name_fondo'] = $tematicas->img_fondo;
    $data['name_puzzle'] = $tematicas->img_puzzle;


    return view('ST/JuegoST/Juego',$data);
   }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
//
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update()
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
//
  }
}
