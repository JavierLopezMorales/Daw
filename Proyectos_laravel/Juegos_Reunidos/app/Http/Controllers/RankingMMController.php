<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RankingMM;

class RankingMMController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rankingList = RankingMM::all();
        return view('showRankingMM', ['rankingList' => $rankingList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('formRankingMM');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ranking = new RankingMM();
        $ranking->name = $request->name;
        $ranking->score = $request->score;
        $ranking->level = $request->level;
        $ranking->save();
        return redirect()->route('rankingMM.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ranking = RankingMM::find($id);
        return view('formRankingMM', array('ranking' => $ranking));
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
        $ranking = RankingMM::find($request->id);
        $ranking->name = $request->name;
        $ranking->score = $request->score;
        $ranking->level = $request->level;
        $ranking->save();
        return redirect()->route('rankingMM.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ranking = RankingMM::find($id);
        $ranking->delete();
        return redirect()->route('rankingMM.index');
    }
}