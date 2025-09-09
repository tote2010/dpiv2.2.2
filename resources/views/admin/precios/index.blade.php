@extends('adminlte::page')

@section('title', 'Precios')

@section('content_header')
    <h1><b>DPI</b> - Precios</h1>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    {{--  Revisar estas lineas de código --}} 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.3.0.css"> --}}
@stop

@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="container">
    <br>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>Lista de Productos</h3>
        <a href="{{ route('admin.precios.create') }}" class="btn btn-primary">Asignar Precio</a>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="">
                <table id="usuarios" class="table table-striped display responsive nowrap" width="100%">
                    <thead>
                        <tr>
                            {{-- <th>ID</th> --}}
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio Dolar</th>
                            <th>Precio Pesos</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($precios as $precio)
                        <tr>
                            {{-- <td>{{ $precio->id }}</td> --}}
                            <td>{{ $precio->producto }}</td>
                            <td>{{ $precio->rango }}</td>
                            <td>{{ $precio->precio }}</td>
                            <td>{{ dolar_a_pesos($precio->precio, $dolar) }}</td>
                            <td>
                                <a href="{{ route('admin.precios.edit', $precio->id) }}" class="btn btn-sm btn-primary">Editar</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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
                ]
            });
        

    </script>    
@stop