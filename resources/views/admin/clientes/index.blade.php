@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
    <h1><b>DPI</b> - Clientes</h1>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
{{-- 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.3.0.css">

@stop

@section('content')

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>Lista de Clientes</h3>
        <a href="{{ route('admin.usuarios.create') }}" class="btn btn-primary">Crear Cliente</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="">
                <table id="usuarios" class="table table-striped display responsive nowrap" width="100%"">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Email</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Roles</th>
                            <th>Estado</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->lastname }}</td>
                                <td>
                                    @foreach($user->roles as $role)
                                        {{ $role->name }}
                                    @endforeach    
                                </td>
                                <td>
                                    <form action="{{ route('admin.usuarios.toggle-active', $user) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-sm {{ $user->activo ? 'btn-success' : 'btn-danger' }}">
                                            {{ $user->activo ? 'Activo' : 'Inactivo' }}
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <a href="{{ route('admin.usuarios.edit', $user) }}" class="btn btn-sm btn-primary">Editar</a>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>
    <script>        	
        new DataTable('#usuarios', {
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-AR.json'
            },
            columnDefs: [
                { target: [4], orderable: false },
                { target: [5], orderable: false },
            ]
        });
    </script>    
@stop