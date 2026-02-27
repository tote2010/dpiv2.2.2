@extends('adminlte::page')

@section('title', ' - Adicionales')

@section('content_header')
    <h1><b>Nuevo adicional</b></h1>
@stop

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@section('content')
<div class="card card-primary">
    <div class="card-header">Crear adicional</div>

    <div class="card-body">
        <form method="POST" action="{{ route('admin.adicionales.store') }}">
            @csrf

            {{-- Nombre --}}
            <div class="mb-3 col-md-6">
                <label class="form-label">Nombre *</label>
                <input type="text"
                       name="nombre"
                       class="form-control @error('nombre') is-invalid @enderror"
                       value="{{ old('nombre') }}"
                       autofocus>
                @error('nombre')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Activo --}}
            <div class="form-check mb-3">
                <input type="checkbox"
                       name="activo"
                       value="1"
                       class="form-check-input"
                       id="activo"
                       @checked(old('activo', true))>

                <label class="form-check-label" for="activo">
                    Adicional activo
                </label>
            </div>

            <br>

            <button class="btn btn-primary">Guardar</button>
            <a href="{{ route('admin.adicionales.index') }}" class="btn btn-secondary">
                Cancelar
            </a>
        </form>
    </div>
</div>
@stop