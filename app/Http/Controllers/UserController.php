<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Trabajador;

class UserController extends Controller
{
    public function index()
    {
        return User::get();
    }
    
    public function store(Request $request)
    {
        $trabajador = Trabajador::find($request->input('trabajador'));
        $user = User::create([
            'name' => $trabajador['ape_paterno']." ".$trabajador['ape_materno']." ".$trabajador['nombres'],
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);
        Trabajador::find($request->input('trabajador'))->update(['user_id'=>$user->id]);
    }
    
    public function update(Request $request)
    {

    }
    
    public function destroy($id)
    {
        User::find($id)->delete();
    }

    public function roleSync(Request $request)
    {
        $user = User::find($request->input('user'));
        $user->roles()->sync($request->input('roles'));
    }
}
