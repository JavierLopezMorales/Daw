<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ships;

class ShipsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shipsList = Ships::all();
        return view('MM/ships/showShipsMM', ['shipsList' => $shipsList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('MM/ships/formShipsMM');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ship = new Ships();
        $ship->name = $request->name;
        $ship->health = $request->health;
        $ship->image = $request->image;
        $ship->atk_speed = $request->atk_speed;
        $ship->atk_damage = $request->atk_damage;
        $ship->speed = $request->speed;
        $ship->bullet_type = $request->bullet_type;
        $ship->save();
        return redirect()->route('ships.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('MM/game');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ships = Ships::find($id);
        return view('MM/ships/formShipsMM', array('ship' => $ships));
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
        $ship = Ships::find($request->id);
        $ship->name = $request->name;
        $ship->health = $request->health;
        $ship->image = $request->image;
        $ship->atk_speed = $request->atk_speed;
        $ship->atk_damage = $request->atk_damage;
        $ship->speed = $request->speed;
        $ship->bullet_type = $request->bullet_type;
        $ship->save();
        return redirect()->route('ships.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ship = Ships::find($id);
        $ship->delete();
        return redirect()->route('ships.index');
    }
}
