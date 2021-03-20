<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BoostMM;
use App\Models\RankingMM;
use App\Http\Controllers\DB;

class GameMMController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $boostsList = BoostMM::all();
        $rankingList = RankingMM::orderBy('score', 'desc')->take(5)->get();
        return view('MM/game', ['boostsList' => $boostsList], ['rankingList' => $rankingList]);
    }
    
}
