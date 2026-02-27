@extends('adminlte::page')

@section('title', 'Productos')

@section('content_header')
    <h1>Listado de <b>Productos</b></h1>
@stop

@section('content')
<div class="container-fluid">

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="d-flex justify-content-between mb-3">
        <h3> </h3>
        <a href="{{ route('admin.productos.create') }}" class="btn btn-primary">
            Nuevo Producto
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Categoría</th>
                        <th>Adicionales</th>
                        <th>Estado</th>
                        <th class="text-end">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($productos as $producto)
                    <tr>
                        <td>{{ $producto->nombre }}</td>
                        <td>{{ $producto->categorias->nombre }}</td>
                        <td>
                            {{ $producto->acepta_adicionales ? 'Sí' : 'No' }}
                        </td>
                        <td>
                            <span class="badge bg-{{ $producto->activo ? 'success' : 'danger' }}">
                                {{ $producto->activo ? 'Activo' : 'Inactivo' }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('admin.productos.precios.index', $producto) }}"
                                class="btn btn-sm btn-outline-primary">
                                Precios
                            </a>

                            <a href="{{ route('admin.productos.edit', $producto) }}"
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