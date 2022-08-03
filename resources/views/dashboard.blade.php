@extends('layout')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    @if(auth()->user()->tipo_usuario == 1)
                    <a href="{{ route('productos.index') }}" class="btn btn-primary">Agregar producto</a>
                    <a href="{{ route('facturas.index') }}" class="btn btn-primary"> Facturación</a>
                    @endif

                    @if(auth()->user()->tipo_usuario == 2)
                    <a href="{{ route('compras.create') }}" class="btn btn-primary">Comprar producto</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection