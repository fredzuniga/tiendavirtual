@extends('layout')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">{{ __('Comprar') }} 
                    
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

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
                    @endif

                    <form method="POST" action="{{ route('compras.store') }}">
                        <div class="form-group">
                            @csrf
                            <label for="country_name">Producto:</label>
                            <select class="form-control" name="producto_id">
                                
                                @foreach ($productos as $producto)
                                    <option value="{{$producto->id}}">{{$producto->nombre}}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="cases">Cantidad :</label>
                            <input type="text" class="form-control" name="cantidad" value=""/>
                        </div>

                        <button type="submit" class="btn btn-primary">Comprar producto</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection