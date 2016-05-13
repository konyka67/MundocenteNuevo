<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;

class UsuarioController extends Controller
{
    //
    public function index(){
    	//return "index de usuario";
    	$users = User::all();

    	return view('usuario.index', compact('users'));
    }

    public function create(){
    	return view('usuario.create');
    }

    public function store(Request $request){
    	User::create([
    		'name' => $request['nombre'],
    		'email' => $request['correo'],
    		'password' => bcrypt($request['contrasena']),
		]);
    	//return "store";
    	//return "Usuario registrado";
    	return redirect('usuario')->with('mensaje', 'store');
    }

    public function show($id){
    	return "show usuario" .$id;
    }

    public function edit($id){
    	return "edit usuario" .$id;
    }
}
