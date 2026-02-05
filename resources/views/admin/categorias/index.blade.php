@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
    <h1><b>DPI</b> - Categorías</h1>
@stop

@section('css')
   
@stop

@section('content')

<div class="container">
    <br>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>Lista de Categorías de los Productos</h3>
        <a href="{{ route('admin.categorias.create') }}" class="btn btn-primary">Nueva Categoría</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="">
                <table id="usuarios" class="table table-striped display responsive nowrap" width="100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Categoría</th>
                            <th>Estado</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categorias as $categoria)
                        <tr>
                            <td>{{ $categoria->id }}</td>
                            <td>{{ $categoria->nombre }}</td>
                            <td>
                                <form action="{{ route('admin.categorias.toggle-active', $categoria) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-sm {{ $categoria->activo ? 'btn-success' : 'btn-danger' }}">
                                        {{ $categoria->activo ? 'Activo' : 'Inactivo' }}
                                    </button>
                                </form>
                            </td>
                            <td>
                                <a href="{{ route('admin.categorias.edit', $categoria) }}" class="btn btn-sm btn-primary">Editar</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
                {{-- {{ $users->links() }} --}}
            </div>
        </div>
    </div>
    @endsection

@section('js')
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>
    <script>        	
        new DataTable('#usuarios', {
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-AR.json'
            },
            columnDefs: [
                { target: [2], orderable: false },
                { target: [3], orderable: false },
            ]
        });
    </script>    
@stop