<?php

namespace App\Http\Controllers;

use App\Models\CategoriaProducto;
use Illuminate\Http\Request;

class CategoriaProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoriaProductos = CategoriaProducto::all(['id', 'nombre_categoria', 'descripcion_categoria']);
        return response()->json($categoriaProductos);
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
        $categoriaProducto = CategoriaProducto::create($request->post());
        return response()->json([           
            'categoriaProducto'=>$categoriaProducto
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoriaProducto  $categoriaProducto
     * @return \Illuminate\Http\Response
     */
    public function show(CategoriaProducto $categoriaProducto)
    {
        return response()->json($categoriaProducto);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoriaProducto  $categoriaProducto
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoriaProducto $categoriaProducto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategoriaProducto  $categoriaProducto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoriaProducto $categoriaProducto)
    {
        $categoriaProducto->fill($request->post())->save(); 
        return response()->json([
            'categoriaProducto'=>$categoriaProducto
        ]);  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoriaProducto  $categoriaProducto
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoriaProducto $categoriaProducto)
    {
        $categoriaProducto->delete();
        return response()->json([
            'mensaje'=>'¡Registro eliminado correctamente!'
        ]);
    }
}
