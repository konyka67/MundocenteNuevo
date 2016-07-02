<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Publicacion;
use Illuminate\Support\Facades\Input;
use Session;
use Redirect;
use App\Http\Requests\PublicacionUpdateRequest;
use Auth;
use App\User;
use App\Area;
use App\Establecimiento;
use App\Funcionario;
use App\Grupo;
use App\Lugar;

class PublicacionController extends Controller
{
    //
    public function index(){
        //return "index";
        //return view('publicacion.index');
        //$valor = Input::get('valor');
        $publicaciones = Publicacion::all();
        if( Auth::check() ){
            $user = User::find(Auth::user()->id);
            $areas = Area::all();
            $establecimientos = Establecimiento::all();
            $lugares = Lugar::all();
            if ( $user->idrol === 2) {      
                $funcionario = Funcionario::where('user_id', $user->id)
                    ->first();
                $publicaciones = Publicacion::where('funcionario_id', $funcionario->id)
                    ->where('estado', '=', 'activa')
                    ->orderBy('created_at', 'DESC')->get()->all();
                
                //return $publicaciones;
                //return $funcionario->publicacion;
                //$publicaciones = $funcionario->publicaciones;
                //return $publicaciones;
               return view('publicacion.index', [
                    'areas' => $areas,
                    'user' => Auth::user(),
                    'publicaciones' => $publicaciones,
                    'establecimientos' => $establecimientos,
                    'lugares' => $lugares,
                ]);
            } else {
                return redirect()->to('/busqueda');
            }
        }
        return redirect()->to('/');

        /*
        $publicaciones = Publicacion::where('nombre', 'like', '%'.$valor.'%')
          ->orwhere('descripcion', 'like', '%'.$valor.'%')->get();
        return view('publicacion.index')->with('publicaciones', $publicaciones);
        return $valor;
        */
    }

    public function create(){
        //return "create";
        $areas = Area::all();
        $lugares = Lugar::all();
        $areas_publicacion = array();
        return view('publicacion.create', [
            'areas' => $areas,
            'areas_publicacion' => $areas_publicacion,
            'lugares' => $lugares,
        ]);
        //return "index";
    }

    public function store(PublicacionUpdateRequest $request){
        //return "store";
        //return $request['tipo'] ." ". $request['fecha_cierre'];
        $publicacion = Publicacion::create([
            'funcionario_id' => Auth::user()->funcionario->id,
            'nombre' => $request['nombre'],
            'resumen' => $request['resumen'],
            'descripcion' => $request['descripcion'],
            'lugar_id' => $request['lugar'],
            'tipo' => $request['tipo'],
            'fecha_cierre' => $request['fecha_cierre'],
            'estado' => 'activa',
        ]);

        $this->crear_grupos($publicacion, $request);

        Session::flash('mensaje', 'Publicacion creada');
        return Redirect::to('publicacion');        
    }

    public function crear_grupos($publicacion, PublicacionUpdateRequest $request){
        $areas = $request['areas'];
        if(!empty($areas)){
            foreach ($areas as $area) {
                Grupo::create([
                    'publicacion_id' => $publicacion->id,
                    'area_id' => $area,
                ]);
            }            
        }
    }

    public function show($id){
        //return "show";
        $publicacion = Publicacion::find($id);
        return view('publicacion')->with([
            'publicacion' => $publicacion,
        ]);
        //$publicaciones = Publicacion::find($id);
        //return view('index')->with('publicaciones', $publicaciones);
    }

    public function edit($id){
        //return "edit";
        $publicacion = publicacion::find($id);
        $areas = Area::all();
        $grupos = Grupo::where('publicacion_id', $id)->get();
        $areas_publicacion = array();
        foreach ($grupos as $grupo) {
            $areas_publicacion[] = $grupo->area_id;
        }


        $lugares = Lugar::all();
        return view('publicacion.edit', [
            'publicacion' => $publicacion,
            'areas' => $areas,
            'areas_publicacion' => $areas_publicacion,
            'user' => Auth::user(),
            'lugares' => $lugares,
        ]);        
    }

    public function update($id, PublicacionUpdateRequest $request){
        //return "update";
        $publicacion = Publicacion::find($id);
            $publicacion->update([
                'lugar_id' => $request['lugar'],
            ]);
        $publicacion->fill($request->all());
        $publicacion->save();

        Grupo::where('publicacion_id', $id)->delete();
        $this->crear_grupos($publicacion, $request);

        Session::flash('mensaje', 'Publicacion Editada');
        return Redirect::to('publicacion');
    }

    public function borradas(){
        $publicaciones = Publicacion::all();
        if( Auth::check() ){
            $user = User::find(Auth::user()->id);
            $areas = Area::all();
            $establecimientos = Establecimiento::all();
            $lugares = Lugar::all();
            if ( $user->idrol === 2) {      
                $funcionario = Funcionario::where('user_id', $user->id)
                    ->first();
                $publicaciones = Publicacion::where('funcionario_id', $funcionario->id)
                    ->where('estado', '=', 'inactiva')
                    ->orderBy('created_at', 'DESC')->get()->all();

               return view('publicacion.borradas', [
                    'areas' => $areas,
                    'user' => Auth::user(),
                    'publicaciones' => $publicaciones,
                    'establecimientos' => $establecimientos,
                    'lugares' => $lugares,
                ]);
            } else {
                return redirect()->to('/busqueda');
            }
        }
        return redirect()->to('/');
    }

    public function recover($id){
         $publicacion = Publicacion::find($id);
         //return $publicacion;
            $publicacion->update([
                'estado' => 'activa',
            ]);

        Session::flash('mensaje', 'Publicacion recuperada');
        return Redirect::to('publicacion/borradas');
    }

    public function destroy($id){
    	//return "destroy";

        /*
        Publicacion::destroy($id);
        Grupo::where('publicacion_id', $id)->delete();
        */
        $publicacion = Publicacion::find($id);
            $publicacion->update([
                'estado' => 'inactiva',
            ]);

        Session::flash('mensaje', 'Publicacion borrada');
        return Redirect::to('publicacion');
    }
}