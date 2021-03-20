<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RankingST;

class rankingSTController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $rankingList = RankingST::orderBy('moves','asc')->get();
      return view('ST/Ranking/showRankingST', ['rankingList' => $rankingList]);

  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      return view('ST/Ranking/formRankingST');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $validated = $request->validate([
        'name' => 'required|max:3',
        'moves' => 'required|numeric',
        'mode' => 'required',
    ]);
      $ranking = new RankingST();
      $ranking->name = $request->name;
      $ranking->moves = $request->moves;
      $ranking->mode = $request->mode;
      $ranking->save();
      return redirect()->route('RankingST.index');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
   public function show()

   {
     return view('ST/Configuracion/viewConfiguracion');
   }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
      $ranking = RankingST::find($id);
      return view('ST/Ranking/formRankingST', array('ranking' => $ranking));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $validated = $request->validate([
        'name' => 'required|max:3|string',
        'moves' => 'required|numeric',
    ]);
      $ranking = RankingST::find($request->id);
      $ranking->name = $request->name;
      $ranking->moves = $request->moves;
      $ranking->mode = $request->mode;
      $ranking->save();
      return redirect()->route('RankingST.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
      $ranking = RankingST::find($id);
      $ranking->delete();
      return redirect()->route('RankingST.index');
  }
}
