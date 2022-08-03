@extends('layout')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar producto') }}</div>
                <div class="card-body">
                    
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
                    @endif
                    <form method="POST" action="{{ route('productos.update', $producto->id) }}">
                        <div class="form-group">
                            @csrf
                            @method('PUT')
                            <label for="country_name">Nombre:</label>
                            <input type="text" class="form-control" name="nombre" value="{{$producto->nombre}}"/>
                        </div>
                        <div class="form-group">
                            <label for="cases">Precio :</label>
                            <input type="text" class="form-control" name="precio" value="{{$producto->precio}}"/>
                        </div>

                        <div class="form-group">
                            <label for="cases">Porcentaje precio :</label>
                            <input type="text" class="form-control" name="porcentaje_impuesto" value="{{$producto->porcentaje_impuesto}}"/>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar cambio al producto</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection