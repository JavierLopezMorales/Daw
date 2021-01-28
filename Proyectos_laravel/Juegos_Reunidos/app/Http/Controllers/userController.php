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
         return view('usuarios.form');
     }
    
     public function store(Request $r) {
         $usuario = new User();
         $usuario->email = $r->email;
         $usuario->name = $r->name;
         $usuario->password = $r->password;
         $usuario->save();
         return redirect()->route('user.index');
     }
    
     public function edit($id) {
         $usuario = User::find($id);
         return view('usuarios.form', array('user' => $user));
     }
    
     public function update(Request $r) {
         $usuario = User::find($r->id);
         $usuario->email = $r->email;
         $usuario->name = $r->name;
         $usuario->password = $r->password;
         $usuario->save();
         return redirect()->route('user.index');
     }
    
      public function destroy($id) {
         $usuario = User::find($id);
         $usuario->delete();
         return redirect()->route('user.index');
     }
}
