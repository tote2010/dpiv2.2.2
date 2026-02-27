@extends('adminlte::page')

@section('title', 'Categorías')

@section('content_header')
    <h1>Listado de <b>Categorías</b></h1>
@stop

@section('content')
<div class="container-fluid">

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="d-flex justify-content-between mb-3">
        <h3> </h3>
        <a href="{{ route('admin.categorias.create') }}" class="btn btn-primary">
            Nueva Categoría
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-striped align-middle">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Estado</th>
                        <th class="text-end">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($categorias as $categoria)
                    <tr>
                        <td>{{ $categoria->id }}</td>
                        <td>{{ $categoria->nombre }}</td>
                        <td>
                            <span class="badge {{ $categoria->activo ? 'bg-success' : 'bg-danger' }}">
                                {{ $categoria->activo ? 'Activa' : 'Inactiva' }}
                            </span>
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.categorias.edit', $categoria) }}"
                               class="btn btn-sm btn-warning">
                                Editar
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop
