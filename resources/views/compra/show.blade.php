@extends('layout')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">{{ __('Detalle de factura') }} 
                </div>
                <div class="card-body">
                    Datos del cliente:
                    
                    <div class="row">
                        <div class="col-md-3">
                            Nombre: {{ $cliente->nombre }}
                        </div>
                        <div class="col-md-3">
                            Apellidos: {{ $cliente->apellidos }}
                        </div>
                        <div class="col-md-3">
                            Correo: {{ $cliente->correo }}
                        </div>
                        <div class="col-md-3">
                            Fecha de emisión: {{ $factura->fecha_emision }}
                        </div>
                    </div>
                    <br><br>
                    Datos de la factura:
                    <div class="row">
                        <div class="col-md-3">
                            Importe: {{ $factura->importe }}
                        </div>
                        <div class="col-md-3">
                            Impuestos: {{ $factura->importe_impuesto - $factura->importe }}
                        </div>

                        <div class="col-md-3">
                            Importe con impuesto: {{ $factura->importe_impuesto }}
                        </div>
                        
                    </div>

                    <br><br>
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">Id de compra</th>
                            <th scope="col">Nombre del producto</th>
                            <th scope="col">Importe de compra producto</th>
                            <th scope="col">Impuesto</th>
                            <th scope="col">Importe con impuestos </th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($detalles as $detalle)
                                <tr>
                                    <td>{{$detalle->compras->id}}</td>
                                    <td>{{$detalle->compras->productos->nombre}}</td>
                                    <td>{{$detalle->compras->importe}}</td>
                                    <td>{{$detalle->compras->importe_impuesto - $detalle->compras->importe}}</td>
                                    <td>{{$detalle->compras->importe_impuesto}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection