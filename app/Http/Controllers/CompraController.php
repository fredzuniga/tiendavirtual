<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productos;
use App\Models\Compras;
use Illuminate\Support\Facades\Auth;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $productos = Productos::all();
        return view('compra.index', ['productos' => $productos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $validatedData = $request->validate([
            'cantidad' => 'required'
        ]);

        $data = $request->all();

        $producto = Productos::findOrFail($data['producto_id']);
        $importe = $producto->precio  * $data['cantidad'];
        $importe_impuesto = ( $producto->precio + ( $producto->precio * ( $producto->porcentaje_impuesto / 100) ) ) * $data['cantidad'];
        $show = Compras::create([
            'producto_id' => $data['producto_id'],
            'cantidad' => $data['cantidad'],
            'importe' => $importe,
            'importe_impuesto' => $importe_impuesto,
            'usuario_id' => Auth::user()->id,
            'fecha_compra' => date("Y-m-d H:i:s"),
            'estatus_facturacion' => 0
        ]);

        return redirect('/compras/create')->with('success', 'Compra guardada correctamente');
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
        //
    }
}
