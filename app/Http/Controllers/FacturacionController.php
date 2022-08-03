<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facturas;
use App\Models\Compras;
use App\Models\DetalleFactura;


class FacturacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $facturas = Facturas::paginate(15);
        return view('facturacion.index', ['facturas' => $facturas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $compras_sin_factura = Compras::where('estatus_facturacion',0)->get();
        /*foreach ($compras_sin_factura as $compra_sin_factura) {
            $usuario_id = $compra_sin_factura->usuarios->id;

        }*/
        if(count($compras_sin_factura) == 0){
            return redirect('/facturas')->with('error', 'No hay compras para facturar');
        }
        while(count($compras_sin_factura) > 0){
            $usuario_id = $compras_sin_factura->last()->usuarios->id;
            $compras_sin_factura = Compras::where('estatus_facturacion',0)->where('usuario_id', $usuario_id)->orderBy('fecha_compra', 'desc')->get();
            $nueva_factura = new Facturas;
            $nueva_factura->importe = 0;
            $nueva_factura->importe_impuesto = 0;
            $nueva_factura->fecha_emision = date("Y-m-d H:i:s");
            $nueva_factura->save();
            foreach ($compras_sin_factura as $compra_sin_factura) {
                $detalle_factura = new DetalleFactura;
                $nueva_factura->importe += $compra_sin_factura->importe;
                $nueva_factura->importe_impuesto += $compra_sin_factura->importe_impuesto;
                $compra_sin_factura->estatus_facturacion = 1;
                $compra_sin_factura->save();
                $detalle_factura->factura_id = $nueva_factura->id;
                $detalle_factura->compra_id = $compra_sin_factura->id;
                $detalle_factura->save();
            }
            $nueva_factura->fecha_emision = date("Y-m-d H:i:s");
            $nueva_factura->update();

            $compras_sin_factura = Compras::where('estatus_facturacion',0)->get();
        }

        return redirect('/facturas')->with('success', 'Facturas creadas correctamente');
        /*foreach ($compras_sin_factura as $compra_sin_factura) {

            if($compra_sin_factura->){

            }else{
                $nueva_factura = new Facturas;
            }
            
        }*/
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $factura = Facturas::findOrFail($id);
        $detalles = DetalleFactura::where('factura_id',$factura->id)->get();
        $cliente = $detalles->first();

        return view('facturacion.show', [
            'factura' => $factura,
            'detalles' => $detalles,
            'cliente' => $cliente->compras->usuarios
        ]);
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
