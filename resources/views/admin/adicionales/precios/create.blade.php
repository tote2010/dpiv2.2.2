@extends('adminlte::page')

@section('title', 'Nuevo precio')

@section('content_header')
    <h1>
        Nuevo precio – <b>{{ $adicional->nombre }}</b>
    </h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">

        <form method="POST"
              action="{{ route('admin.adicionales.precios.store', $adicional) }}">
            @csrf

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label>Cantidad desde *</label>
                    <input type="number"
                           name="cantidad_desde"
                           class="form-control @error('cantidad_desde') is-invalid @enderror"
                           value="{{ old('cantidad_desde') }}">
                    @error('cantidad_desde')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4 mb-3">
                    <label>Cantidad hasta *</label>
                    <input type="number"
                           name="cantidad_hasta"
                           class="form-control @error('cantidad_hasta') is-invalid @enderror"
                           value="{{ old('cantidad_hasta') }}">
                    @error('cantidad_hasta')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4 mb-3">
                    <label>Precio unitario *</label>
                    <input type="number"
                           step="0.001"
                           name="precio_unitario"
                           class="form-control @error('precio') is-invalid @enderror"
                           value="{{ old('precio_unitario') }}">
                    @error('precio_unitario')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <button class="btn btn-primary">
                Guardar
            </button>

            <a href="{{ route('admin.adicionales.precios.index', $adicional) }}"
               class="btn btn-secondary">
                Cancelar
            </a>

        </form>

    </div>
</div>
@stop