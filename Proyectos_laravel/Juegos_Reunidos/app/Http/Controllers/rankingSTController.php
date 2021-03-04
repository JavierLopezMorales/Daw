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
      $rankingList = RankingST::all();
      return view('ST/Ranking/showRankingST', ['rankingList' => $rankingList]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      return view('formRankingST');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      $ranking = new RankingST();
      $ranking->score = $request->score;
      $ranking->date = $request->date;
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
      $ranking = RankingST::find($request->id);
      $ranking->score = $request->score;
      $ranking->date = $request->date;
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
