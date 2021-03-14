<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MapMM;

class MapMMController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mapMMList = MapMM::all();
        return view('MM/map/showMapMM', ['mapMMList' => $mapMMList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('MM/map/formMapMM');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mapMM = new MapMM();
        $mapMM->name = $request->name;
        $mapMM->image = $request->image;
        $mapMM->save();
        return redirect()->route('mapMM.index');
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
        $mapMM = MapMM::find($id);
        return view('MM/map/formMapMM', array('mapMM' => $mapMM));
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
        $mapMM = MapMM::find($request->id);
        $mapMM->name = $request->name;
        $mapMM->image = $request->image;
        $mapMM->save();
        return redirect()->route('mapMM.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mapMM = MapMM::find($id);
        $mapMM->delete();
        return redirect()->route('mapMM.index');
    }
}
