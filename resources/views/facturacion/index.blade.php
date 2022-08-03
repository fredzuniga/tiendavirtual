@extends('layout')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">{{ __('Lista de facturas') }} 
                    
                    <a href="{{ route('facturas.create') }}" class="btn btn-dangerous" style="float: right;">
                        <i class="fas fa-plus"></i> Facturar todas las compras
                    </a>
                </div>
                <div class="card-body">
                    @if(session()->get('success'))
                        <div class="alert alert-success">
                        {{ session()->get('success') }}  
                        </div><br />
                    @endif


                    @if(session()->get('error'))
                        <div class="alert alert-danger">
                        {{ session()->get('error') }}  
                        </div><br />
                    @endif

                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Importe</th>
                            <th scope="col">Fecha de emision</th>
                            <th scope="col">Detalle</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($facturas as $factura)
                                <tr>
                                    <td>{{$factura->id}}</td>
                                    <td>{{$factura->importe_impuesto}}</td>
                                    <td>{{$factura->fecha_emision}}</td>
                                    <td>
                                        <a href="{{ route('facturas.show',$factura->id) }}" class="btn btn-dangerous">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
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