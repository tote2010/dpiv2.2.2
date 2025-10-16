@extends('adminlte::page')

@section('title', ' - Clientes')

@section('content_header')
    <h1><b>Clientes</b></h1>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

@stop

@section('content')
<div class="card card-primary">
    <div class="card-header">Crear Cliente</div>
    <div class="card-body">
        <div class="container">
            <form action="{{ route('admin.clientes.store') }}" method="POST">
                @csrf                
                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">Nombre *</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}"> 
                    </div>
                    <div class="col-sm-3"> @error('name')<div class="col-form-label text-danger">{{$message}}</div>@enderror </div>
                </div>

                <div class="row mb-3">
                    <label for="lastname" class="col-sm-2 col-form-label">Apellido *</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="lastname" name="lastname" value="{{old('lastname')}}"> 
                    </div>
                    <div class="col-sm-3"> @error('lastname')<div class="col-form-label text-danger">{{$message}}</div>@enderror </div>
                </div>

                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Email *</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="email" name="email" value="{{old('email')}}"> 
                    </div>
                    <div class="col-sm-3"> @error('email')<div class="col-form-label text-danger">{{$message}}</div>@enderror </div>
                </div>
                
                <div class="row mb-3">
                    <label for="password" class="col-sm-2 col-form-label">Contraseña *</label>
                    <div class="col-sm-2">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password"> 
                    </div>
                    <div class="col-sm-3"> @error('password')<div class="col-form-label text-danger">{{$message}}</div>@enderror </div>
                </div>
                
                <div class="row mb-3">
                    <label for="password_confirmation" class="col-sm-2 col-form-label">Confirmar Contraseña *</label>
                    <div class="col-sm-2">
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" value="{{old('password_confirmation')}}"> 
                    </div>
                    <div class="col-sm-3"> @error('password_confirmation')<div class="col-form-label text-danger">{{$message}}</div>@enderror </div>
                </div>

                <div class="row mb-3">
                    <label for="email2" class="col-sm-2 col-form-label">Email Alternativo</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="email2" name="email2" value="{{old('email2')}}"> 
                    </div>
                    <div class="col-sm-3"> @error('email2')<div class="col-form-label text-danger">{{$message}}</div>@enderror </div>
                </div>

                <div class="row mb-3">
                    <label for="dni" class="col-sm-2 col-form-label">DNI / Pasaporte</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="dni" name="dni" value="{{old('dni')}}"> 
                    </div>
                    <div class="col-sm-3"> @error('dni')<div class="col-form-label text-danger">{{$message}}</div>@enderror </div>
                </div>

                <div class="row mb-3">
                    <label for="fechanacimiento" class="col-sm-2 col-form-label">Fecha de Nacimiento</label>
                    <div class="col-sm-2">
                        <input type="date" class="form-control" id="fechanacimiento" name="fechanacimiento" value="{{old('fechanacimiento')}}"> 
                    </div>
                    <div class="col-sm-3"> @error('fechanacimiento')<div class="col-form-label text-danger">{{$message}}</div>@enderror </div>
                </div>
                
                <div class="row mb-3">
                    <label for="empresa" class="col-sm-2 col-form-label">Empresa</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="empresa" name="empresa" value="{{old('empresa')}}"> 
                    </div>
                    <div class="col-sm-3"> @error('empresa')<div class="col-form-label text-danger">{{$message}}</div>@enderror </div>
                </div>

                <div class="row mb-3">
                    <label for="telefonos" class="col-sm-2 col-form-label">Teléfonos</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="telefonos" name="telefonos" value="{{old('telefonos')}}"> 
                    </div>
                    <div class="col-sm-3"> @error('telefonos')<div class="col-form-label text-danger">{{$message}}</div>@enderror </div>
                </div>

                <div class="row mb-3">
                    <label for="direccion" class="col-sm-2 col-form-label">Dirección</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="direccion" name="direccion" value="{{old('direccion')}}"> 
                    </div>
                    <div class="col-sm-3"> @error('direccion')<div class="col-form-label text-danger">{{$message}}</div>@enderror </div>
                </div>

                <div class="row mb-3">
                    <label for="localidad" class="col-sm-2 col-form-label">Localidad</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="localidad" name="localidad" value="{{old('localidad')}}"> 
                    </div>
                    <div class="col-sm-3"> @error('localidad')<div class="col-form-label text-danger">{{$message}}</div>@enderror </div>
                </div>

                <div class="row mb-3">
                    <label for="provincia" class="col-sm-2 col-form-label">Provincia</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="provincia" name="provincia" value="{{old('provincia')}}"> 
                    </div>
                    <div class="col-sm-3"> @error('provincia')<div class="col-form-label text-danger">{{$message}}</div>@enderror </div>
                </div>

                <div class="row mb-3">
                    <label for="rol" class="col-sm-2 col-form-label">Rol</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="rol" name="rol" value="{{ $rol[0] }}" readonly>
                </div>

                <br>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <button type="button" onclick="window.location='{{route('admin.clientes.index')}}'" class="btn btn-secondary">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection


