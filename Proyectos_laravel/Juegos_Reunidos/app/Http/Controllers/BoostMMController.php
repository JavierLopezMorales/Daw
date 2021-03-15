<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BoostMM;

class BoostMMController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $boostsList = BoostMM::all();
        return view('MM/boosts/showBoostsMM', ['boostsList' => $boostsList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('MM/boosts/formBoostsMM');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $boost = new BoostMM();
        $boost->name = $request->name;
        $boost->amount = $request->amount;
        $boost->icon = $request->icon;
        $boost->selector = $request->selector;
        $boost->save();
        return redirect()->route('boosts.index');
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
        $boosts = BoostMM::find($id);
        return view('MM/boosts/formBoostsMM', array('boosts' => $boosts));
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
        $boost = BoostMM::find($request->id);
        $boost->name = $request->name;
        $boost->amount = $request->amount;
        $boost->icon = $request->icon;
        $boost->selector = $request->selector;
        $enemy->save();
        return redirect()->route('boosts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $boost = BoostMM::find($id);
        $boost->delete();
        return redirect()->route('boosts.index');
    }
}
