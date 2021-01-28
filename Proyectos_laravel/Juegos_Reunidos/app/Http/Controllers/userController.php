<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //
    public function index() {
        $userList = User::all();
        return view('showUsuarios', ['userList'=>$userList]);
    }



    public function create() {
        return view('formUsuarios');
    }

    public function store(Request $r) {
        $usuario = new User();
        $usuario->name = $r->name;
        $usuario->email = $r->email;
        $usuario->password = $r->password;
        $usuario->save();
        return redirect()->route('User.index');
    }
    public function show($id)
        {
            //
        }

    public function edit($id) {
        $usuarios = User::find($id);
        return view('formusuarios', array('User' => $usuarios));
    }

    public function update(Request $r,$id) {
        $usuario = User::find($r->id);
        $usuario->name = $r->name;
        $usuario->email = $r->email;
        $usuario->password = $r->password;
        $usuario->save();
        return redirect()->route('User.index');
    }

    public function destroy($id) {
        $usuario = User::find($id);
        $usuario->delete();
        return redirect()->route('User.index');
    }
}
