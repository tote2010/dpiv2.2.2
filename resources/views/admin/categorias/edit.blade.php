@extends('adminlte::page')

@section('title', 'Editar Categoría')

@section('content_header')
    <h1><b>Editar Categoría</b></h1>
@stop

@section('content')
<div class="card card-warning">
    <div class="card-body">

        <form method="POST"
              action="{{ route('admin.categorias.update', $categoria) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Nombre *</label>
                <input type="text"
                       name="nombre"
                       class="col-sm-4 form-control"
                       value="{{ old('nombre', $categoria->nombre) }}">
            </div>

            <div class="form-check mb-4">
                <input type="hidden" name="activo" value="0">
                <input class="form-check-input"
                       type="checkbox"
                       name="activo"
                       value="1"
                       @checked(old('activo', $categoria->activo))>
                <label class="form-check-label">
                    Categoría activa
                </label>
            </div>

            <div class="d-flex gap-2">
                <button class="btn btn-warning">Actualizar</button>
                &nbsp;
                <a href="{{ route('admin.categorias.index') }}" class="btn btn-secondary">
                    Cancelar
                </a>
            </div>
        </form>

    </div>
</div>
@stop
