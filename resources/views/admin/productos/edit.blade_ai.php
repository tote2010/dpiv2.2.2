@extends('adminlte::page')

@section('title', 'Editar producto')

@section('content_header')
    <h1>Editar producto</h1>
@stop

@section('content')

{{-- ERRORES DE VALIDACIÓN --}}
@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('admin.productos.update', $producto) }}">
    @csrf
    @method('PUT')

    <div class="card">
        <div class="card-body">

            {{-- NOMBRE --}}
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text"
                       name="nombre"
                       class="form-control"
                       value="{{ old('nombre', $producto->nombre) }}"
                       required>
            </div>

            {{-- CATEGORIA --}}
            <div class="mb-3">
                <label class="form-label">Categoría</label>
                <select name="categorias_id" class="form-control" required>
                    <option value="">Seleccione una categoría</option>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}"
                            @selected(old('categorias_id', $producto->categorias_id) == $categoria->id)>
                            {{ $categoria->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- ACTIVO --}}
            <div class="mb-3 form-check">
                <input type="hidden" name="activo" value="0">
                <input type="checkbox"
                       name="activo"
                       value="1"
                       class="form-check-input"
                       id="activo"
                       {{ old('activo', $producto->activo) ? 'checked' : '' }}>
                <label class="form-check-label" for="activo">Activo</label>
            </div>

            {{-- BOTONES --}}
            <div class="d-flex justify-content-between">
                <a href="{{ route('admin.productos.index') }}" class="btn btn-secondary">
                    Volver
                </a>
                <button type="submit" class="btn btn-primary">
                    Actualizar
                </button>
            </div>

        </div>
    </div>
</form>

@stop
