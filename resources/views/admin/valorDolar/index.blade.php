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

    <div class="card card-success">
        <div class="card-header">
            Dólar Actual
          </div>
        <div class="card-body">
            <h3><div id="valor">u$s {{ $dolar->valor }}</div></h3>
            <br>
            <h5><div id="fecha">Última Actualización:  {{ $dolar->created_at->format('d/m/Y') }}</div></h5>
            <br>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal">
                Modificar
            </button>
        </div>
    </div>

      <div class="card">
        <div class="card-body">
            <div class="">
                <table id="dolar" class="table table-striped display responsive nowrap" width="100%">
                    <thead>
                        <tr>
                            <th>Valor</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($valores as $valor)
                        <tr>
                            <td>{{ $valor->valor }}</td>
                            <td>{{ $valor->created_at->format('d/m/Y') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @include('admin.valorDolar.modal')

    @endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>
    <script>     
        $(document).ready(function() {

            new DataTable('#dolar', {
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-AR.json'
                },
                order: {
                    name: 'id',
                    dir: 'desc'
                }
            });
            
            $('#dollar-rate-form').on('submit', function(e) {
                e.preventDefault();
                
                $.ajax({
                    url: "{{ route('admin.valorDolar.store') }}",
                    type: "POST",
                    _token: $('input[name="_token"]').val(),
                    data:  $(this).serialize(),
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            // Cerrar modal
                            $('#modal').modal('hide');
                            
                            // Limpiar formulario
                            $('#dollar-rate-form')[0].reset();

                            //Redirect
                            window.location = 'valorDolar';
                                            
                        } else {
                            alert(response.message);
                        }
                    }
                });
            });
        });

    </script>    
@stop