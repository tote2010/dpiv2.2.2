@extends('adminlte::page')

@section('title', ' - Categorías')

@section('content_header')
    <h1><b>Productos</b></h1>
@stop
@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">  
@stop

@section('content')
<div class="card card-primary">
    <div class="card-header">Crear Producto</div>
    <div class="card-body">
        <div class="container">
            <form action="{{ route('admin.productos.store') }}" method="POST">
                @csrf                
                <div class="row mb-3">
                    <label for="nombre" class="col-sm-2 col-form-label">Nombre *</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{old('nombre')}}"> 
                    </div>
                    <div class="col-sm-3"> @error('nombre')<div class="col-form-label text-danger">{{$message}}</div>@enderror </div>
                </div>
                <div class="row mb-3">
                    <label for="categoria_id" class="col-sm-2 col-form-label">Categoría *</label>
                    <div class="col-sm-3">
                        <select class="form-select" id="categoria_id" name="categoria_id">
                            <option value="">Seleccione una categoría</option>
                            @foreach($categorias as $categoria)
                                <option value="{{ $categoria->id }}" {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>
                                    {{ $categoria->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-3"> @error('categoria_id')<div class=" col-form-label text-danger">{{$message}}</div>@enderror </div>
                </div> 
                <div class="row mb-3">
                    <label for="comentarios" class="col-sm-2 col-form-label">Comentarios</label>
                    <div class="col-sm-5">
                        <textarea class="form-control" id="comentarios" name="comentarios" row=3>{{old('comentarios')}}</textarea> 
                    </div>
                    <div class="col-sm-3"> @error('comentarios')<div class="col-form-label text-danger">{{$message}}</div>@enderror </div> 
                </div> 
                <div class="row mb-3">
                    <div class="col-sm-10 offset-sm-2">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="{{ route('admin.productos.index') }}" class="btn btn-secondary">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@stop
{{-- @section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
@stop --}}
