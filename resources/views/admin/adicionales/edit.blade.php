@extends('adminlte::page')

@section('title', ' - Editar Adicional')

@section('content_header')
    <h1><b>Editar Adicional</b></h1>
@stop

@section('content')
<div class="card card-primary">
    <div class="card-header">Editar Adicional</div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.adicionales.update', $adicional) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Nombre *</label>
                <input type="text"
                       name="nombre"
                       class="form-control @error('nombre') is-invalid @enderror"
                       value="{{ old('nombre', $adicional->nombre) }}">
                @error('nombre')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="form-check mb-3">
                <input type="checkbox"
                       name="activo"
                       value="1"
                       class="form-check-input"
                       id="activo"
                       @checked(old('activo', $adicional->activo))>
                <label class="form-check-label" for="activo">
                    Adicional activo
                </label>
            </div>

            <button class="btn btn-primary">Actualizar</button>
            <a href="{{ route('admin.adicionales.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@stop