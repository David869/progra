<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Registro as RegistroResource;
use App\Models\Registro;

class RegistroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         //GET - Categories
         $registros=Registro::all();

         //retorna la coleccion de las categorias
         return RegistroResource::collection($registros);
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
         //permitira editar y guardar
         $registro = $request->isMethod('put') ? Registro::findOrFail($request->id) : new Registro;
         $registro->id = $request->input('id');
         $registro->nombre = $request->input('nombre');
         $registro->modelo = $request->input('modelo');
         $registro->precio = $request->input('precio');
 
         if($registro->save()){
             return new RegistroResource($registro);
         }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    
         //obtener categoria por id
         $registro = Registro::findOrFail($id);

         //retornar datos
         return new RegistroResource($registro);
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
        $registro=Registro::findOrFail($id);

        if($registro->delete()){
            return new RegistroResource($registro);
        }
    }
}
