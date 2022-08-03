@extends('layout')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">{{ __('Lista de productos') }} 
                    
                    <a href="{{ route('productos.create') }}" class="btn btn-dangerous" style="float: right;">
                        <i class="fas fa-plus"></i>
                    </a>
                </div>
                <div class="card-body">
                    @if(session()->get('success'))
                        <div class="alert alert-success">
                        {{ session()->get('success') }}  
                        </div><br />
                    @endif

                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre del producto</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Porcentaje de impuesto</th>
                            <th scope="col">Precio con impuesto</th>
                            <th scope="col">Modificar</th>
                            <th scope="col">Eliminar</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($productos as $producto)
                                <tr>
                                    <th scope="row">{{$producto->id}}</th>
                                    <td>{{$producto->nombre}}</td>
                                    <td>{{$producto->precio}}</td>
                                    <td>{{$producto->porcentaje_impuesto}}</td>
                                    <td>{{$producto->precio_impuesto}}</td>
                                    <td>
                                        <a href="{{ route('productos.edit',$producto->id) }}" class="btn btn-dangerous">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{ route('productos.destroy', $producto->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit"><i class="fas fa-trash"></i></button>
                                        </form>
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