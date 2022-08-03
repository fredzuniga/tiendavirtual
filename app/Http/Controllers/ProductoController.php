<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productos;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Productos::paginate(15);
        return view('producto.index', ['productos' => $productos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('producto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|max:255',
            'precio' => 'required',
            'porcentaje_impuesto' =>'required'
        ]);

        $data = $request->all();

        $show = Productos::create([
            'nombre' => $data['nombre'],
            'precio' => $data['precio'],
            'porcentaje_impuesto' => $data['porcentaje_impuesto'],
            'precio_impuesto' => $data['precio'] + ( $data['precio'] * ($data['porcentaje_impuesto'] / 100))
        ]);

        return redirect('/productos')->with('success', 'Producto guardado correctamente');
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
        $producto = Productos::findOrFail($id);
        return view('producto.edit', ['producto' => $producto]);
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
        $validatedData = $request->validate([
            'nombre' => 'required|max:255',
            'precio' => 'required',
            'porcentaje_impuesto' =>'required'
        ]);

        $data = $request->all();

        $show = Productos::where('id', $id)->update([
            'nombre' => $data['nombre'],
            'precio' => $data['precio'],
            'porcentaje_impuesto' => $data['porcentaje_impuesto'],
            'precio_impuesto' => $data['precio'] + ( $data['precio'] * ($data['porcentaje_impuesto'] / 100))
        ]);

        return redirect('/productos')->with('success', 'Producto modificado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = Productos::findOrFail($id);
        $producto->delete();

        return redirect('/productos')->with('success', 'Producto eliminado correctamente');
    }
}
