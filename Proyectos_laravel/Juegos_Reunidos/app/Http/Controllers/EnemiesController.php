<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enemies;

class EnemiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enemiesList = Enemies::all();
        return view('MM/enemies/showEnemiesMM', ['enemiesList' => $enemiesList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('formEnemiesMM');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $enemy = new Enemies();
        $enemy->name = $request->name;
        $enemy->health = $request->health;
        $enemy->image = $request->image;
        $enemy->atk_speed = $request->atk_speed;
        $enemy->atk_damage = $request->atk_damage;
        $enemy->route = $request->route;
        $enemy->bullet_type = $request->bullet_type;
        $enemy->save();
        return redirect()->route('enemies.index');
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
        $enemies = Enemies::find($id);
        return view('MM/enemies/formEnemiesMM', array('enemy' => $enemies));
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
        $enemy = Enemies::find($request->id);
        $enemy->name = $request->name;
        $enemy->health = $request->health;
        $enemy->image = $request->image;
        $enemy->atk_speed = $request->atk_speed;
        $enemy->atk_damage = $request->atk_damage;
        $enemy->route = $request->route;
        $enemy->bullet_type = $request->bullet_type;
        $enemy->save();
        return redirect()->route('enemies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $enemy = Enemies::find($id);
        $enemy->delete();
        return redirect()->route('enemies.index');
    }
}
