@extends('adminlte::page')

@section('title', 'Productos')

@section('content_header')
    <h1><b>DPI</b> - Productos</h1>
@stop

@section('css')

@stop

@section('content')

<div class="row">
    <div class="col-12">
        
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>Lista de Productos</h3>
        <a href="{{ route('admin.productos.create') }}" class="btn btn-primary">Nuevo Productos</a>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="">
                <table id="productos" class="table table-striped display responsive nowrap" width="100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Categoría</th>
                            <th>Estado</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($productos as $producto)
                        <tr>
                            <td>{{ $producto->id }}</td>
                            <td>{{ $producto->nombre }}</td>
                            <td>{{ $producto->categorias->nombre }}</td>
                            <td>
                                <form action="{{ route('admin.productos.toggle-active', $producto) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-sm {{ $producto->activo ? 'btn-success' : 'btn-danger' }}">
                                        {{ $producto->activo ? 'Activo' : 'Inactivo' }}
                                    </button>
                                </form>
                            </td>
                            <td>
                                <a href="{{ route('admin.productos.edit', $producto) }}" class="btn btn-sm btn-primary">Editar</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            </div>
        </div>  
    </div>
    @endsection

@section('js')
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> --}}
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>
    <script>        	
        new DataTable('#productos', {
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-AR.json'
            },
            columnDefs: [
                { target: [3], orderable: false },
                { target: [4], orderable: false },
            ]
        });
    </script>    
@stop