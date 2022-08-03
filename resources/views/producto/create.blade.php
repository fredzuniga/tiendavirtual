@extends('layout')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Nuevo producto') }}</div>
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
                    <form method="post" action="{{ route('productos.store') }}">
                        <div class="form-group">
                            @csrf
                            <label for="country_name">Nombre:</label>
                            <input type="text" class="form-control" name="nombre"/>
                        </div>
                        <div class="form-group">
                            <label for="cases">Precio :</label>
                            <input type="text" class="form-control" name="precio"/>
                        </div>

                        <div class="form-group">
                            <label for="cases">Porcentaje precio :</label>
                            <input type="text" class="form-control" name="porcentaje_impuesto"/>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar producto</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection