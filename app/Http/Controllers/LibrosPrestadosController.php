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
    public function index()   
    {

       $usuario = Usuario::All();

       foreach($usuario as $us){
           return $us->libros;
       }
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'usuario_id' => 'required',
            'libro_id' => 'required',

        ];
        $messages = [
            'usuario_id' => 'El campo :attribute es obligatorio.',
            'libro_id' => 'El campo :attribute es obligatorio',
        ];
        $validatedData = $request->validate($rules, $messages);
        // $validatedData['contraseña'] = bcrypt($validatedData['contraseña']);
        $libro = Libro::create($validatedData);
        return $this->showOne($libro,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user_id)
    {
        return DB::table('libro_usuario')->where('usuario_id', $user_id)->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $valor_borrado = DB::table('libro_usuario')->where('usuario_id', $id)->get();
        DB::table('libro_usuario')->where('usuario_id',$id)->delete();
        return $valor_borrado;
    }
}
