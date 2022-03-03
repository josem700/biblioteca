<?php

namespace App\Http\Controllers;

use App\Libro;
use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LibrosPrestadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Usuario $usuario){   

       $users = $usuario->with('libros')->get();
       return $this->showAll($users);
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Usuario $usuario)
    {
        $rules = [
            'libro_id' => 'required|integer'
        ];
        $messages = [
            
            'libro_id' => 'El campo :attribute es obligatorio',
        ];

        $validatedData = $request->validate($rules, $messages);
        $usuario->libros()->syncWithoutDetaching($validatedData);

        return $this->showOne($usuario);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user_id)
    {
       $usuario = Usuario::find($user_id)->libros;
       //$users = $usuario->with('libros')->get();
        return $this->showAll($usuario);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Libro $libro)
    {
        $rules = [
            'titulo' => 'min:5|max:255',
            'descripcion' => 'min:5|max:255'
        ];
        $validatedData = $request->validate($rules);

        $libro->fill($validatedData);

        if(!$libro->isDirty()){
            return response()->json(['error'=>['code' => 422, 'message' => 'please specify at least one different value' ]], 422);
        }
        $libro->save();
        return $this->showOne($libro);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario, Libro $libro)
    {  
        $usuario->libros()->detach($libro->libro_id);
        return $this->showOne($usuario);
    }
}
