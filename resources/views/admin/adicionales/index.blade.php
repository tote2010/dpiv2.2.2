@extends('adminlte::page')

@section('title', 'Adicionales')

@section('content_header')
    <h1>Listado de <b>Adicionales</b></h1>
@stop

@section('content')
<div class="card">
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card-header d-flex justify-content-between align-items-center">
        <span>Listado de adicionales</span>
        <a href="{{ route('admin.adicionales.create') }}" class="btn btn-primary btn-sm">
            Nuevo adicional
        </a>
    </div>

    <div class="card-body">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th class="text-center">Activo</th>
                    <th class="text-end">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($adicionales as $adicional)
                    <tr>
                        <td>{{ $adicional->nombre }}</td>

                        <td class="text-center">
                            @if($adicional->activo)
                                <span class="badge bg-success">Activo</span>
                            @else
                                <span class="badge bg-danger">Inactivo</span>
                            @endif
                        </td>

                        <td class="text-end">
                            <a href="{{ route('admin.adicionales.precios.index', $adicional) }}"
                                class="btn btn-sm btn-outline-primary">
                                Precios
                            </a>

                            <a href="{{ route('admin.adicionales.edit', $adicional) }}"
                               class="btn btn-sm btn-warning">
                                Editar
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center text-muted">
                            No hay adicionales cargados
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@stop