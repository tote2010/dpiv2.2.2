@extends('adminlte::page')

@section('title', 'Crear Categoría')

@section('content_header')
    <h1><b>Nueva Categoría</b></h1>
@stop

@section('content')
<div class="card card-primary">
    <div class="card-body">

        <form method="POST" action="{{ route('admin.categorias.store') }}">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nombre *</label>
                <input type="text"
                       name="nombre"
                       class="col-sm-4 form-control @error('nombre') is-invalid @enderror"
                       value="{{ old('nombre') }}">

                @error('nombre')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-check mb-4">
                <input type="hidden" name="activo" value="0">
                <input class="form-check-input"
                       type="checkbox"
                       name="activo"
                       value="1"
                       checked>
                <label class="form-check-label">
                    Categoría activa
                </label>
            </div>

            <div class="d-flex gap-2">
                <button class="btn btn-primary">Guardar</button>
                &nbsp;
                <a href="{{ route('admin.categorias.index') }}" class="btn btn-secondary">
                    Cancelar
                </a>
            </div>
        </form>

    </div>
</div>
@stop
