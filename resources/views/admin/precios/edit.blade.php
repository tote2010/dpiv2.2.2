@extends('adminlte::page')

@section('title', ' - Precios')

@section('content_header')
    <h1><b>Precios</b></h1>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

@stop

@section('content')
<div class="card card-success">
    <div class="card-header">Editar Precio del Producto</div>
    <div class="card-body">
        <div class="container">
                        
            @if(session('error'))
                <div class="alert alert-error">
                    {{ session('error') }}
                </div>
            @endif
            <br>

            <form action="{{ route('admin.precios.update', $precios) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">Precio Dolar*</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="precio" name="precio" value="{{old('precio', $precios->precio)}}"> 
                    </div>
                    <div class="col-sm-3"> @error('precio')<div class="col-form-label text-danger">{{$message}}</div>@enderror </div>
                </div>

                <div class="row mb-3">
                    <label for="lastname" class="col-sm-2 col-form-label">Producto</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="producto" name="producto" value="{{ $precios->productos->nombre }}" disabled > 
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Rango de Cantidades</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="rango" name="rango" value="{{ $precios->precios_cantidad->rango }}" disabled > 
                    </div>
                </div>
                
                <div class="row mb-3">
                    <label for="update" class="col-sm-2 col-form-label">Últina Actualización</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" id="updated_at" name="updated_at" value="{{ $precios->updated_at }}" disabled > 
                    </div>
                </div>
                
                <br>
                <br>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <button type="button" onclick="window.location='{{route('admin.precios.index')}}'" class="btn btn-secondary">Volver</button>
                </div>    
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@stop

