@extends('adminlte::page')

@section('title', ' - Productos')

@section('content_header')
    <h1><b>Productos</b></h1>
@stop
@section('css')
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">   --}}
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
<div class="card card-success">
    <div class="card-header">Actualizar Producto</div>
    <div class="card-body">
        <div class="container">
            <form method="POST" 
                action="{{ route('admin.productos.update', $producto) }}">
                @method('PUT')
                @csrf
                
                <div class="mb-3">
                    <label class="form-label">Nombre *</label>
                    <input type="text"
                           name="nombre"
                           class="form-control col-sm-5 @error('nombre') is-invalid @enderror"
                           value="{{ old('nombre', $producto->nombre) }}">
                    @error('nombre')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Categoría *</label>
                    <select name="categoria_id"
                            class="form-select col-sm-3 @error('categoria_id') is-invalid @enderror">
                        <option value="{{ $producto->categorias->id }}">{{ $producto->categorias->nombre }}</option>
                        @foreach($categorias as $categoria)
                            <option value="{{ $categoria->id }}"
                                @selected(old('categoria_id') == $categoria->id)>
                                {{ $categoria->nombre }}
                            </option>
                        @endforeach
                    </select>
                    @error('categoria_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                
                <div class="form-check mb-3">
                    <input type="checkbox"
                           id="acepta_adicionales"
                           name="acepta_adicionales"
                           data-role="acepta-adicionales"
                           value="1"
                           class="form-check-input"
                           @checked(old('acepta_adicionales', $producto->acepta_adicionales))>

                    <label class="form-check-label"  for="acepta_adicionales">Acepta adicionales</label>
                </div>
                
                <div data-role="bloque-adicionales" class="{{ old('acepta_adicionales', $producto->acepta_adicionales) ? '' : 'd-none' }}">
                    {{-- TODO el bloque de checkboxes y orden --}}
                    
                    {{-- @if($producto->acepta_adicionales) --}}
    
                    <hr>
                    <h5>Adicionales permitidos</h5>
    
                    @foreach($adicionales as $adicional)
                        @php
                            $pivot = $productoAdicionales[$adicional->id]->pivot ?? null;
                        @endphp
    
                        <div class="row align-items-center mb-2">
                            <div class="col-md-5">
                                <div class="form-check">
                                    <input type="checkbox"
                                        name="adicionales[{{ $adicional->id }}][activo]"
                                        value="1"
                                        class="form-check-input"
                                        id="adicional_{{ $adicional->id }}"
                                        {{-- @checked($pivot) --}}
                                        @checked(old("adicionales.$adicional->id.activo", $pivot !== null))>

                                    <label class="form-check-label" for="adicional_{{ $adicional->id }}">
                                        {{ $adicional->nombre }}
                                    </label>
                                </div>
                            </div>
    
                            <div class="col-md-3">
                                <select name="adicionales[{{ $adicional->id }}][orden]"
                                        class="form-select">

                                    <option value="1" @selected(old("adicionales.$adicional->id.orden", $pivot?->orden) == 1)>Orden 1</option>
                                    <option value="2" @selected(old("adicionales.$adicional->id.orden", $pivot?->orden) == 2)>Orden 2</option>
               

                                        {{-- {{ $pivot ? '' : 'disabled' }}>
                                    <option value="1" @selected($pivot?->orden == 1)>Orden 1</option>
                                    <option value="2" @selected($pivot?->orden == 2)>Orden 2</option> --}}
                                </select>
                            </div>
                        </div>
                    @endforeach
                    {{-- @endif --}}
                </div>
                <hr>
                
                <div class="form-check mb-3">
                    <input type="checkbox"
                           name="activo"
                           value="1"
                           class="form-check-input"
                           id="activo"
                           @checked(old('activo', $producto->activo))>
                    <label class="form-check-label" for="activo">
                        Producto activo
                    </label>
                </div>

                <br>

                <button class="btn btn-warning">Actualizar</button>
                <a href="{{ route('admin.productos.index') }}" class="btn btn-secondary">Cancelar</a>
                
            </form>
        </div>
    </div>
</div>
@stop

@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // const acepta = document.getElementById('acepta_adicionales');
            // const bloque = document.getElementById('bloque-adicionales');

            const checkbox = document.querySelector('[data-role="acepta-adicionales"]');
            const bloque   = document.querySelector('[data-role="bloque-adicionales"]');

            if (!checkbox || !bloque) return;

            function toggleBloque() {
                bloque.classList.toggle('d-none', !checkbox.checked);
            }

            // checkbox.addEventListener('change', function () {
            //     console.log('Checkbox cambiado:', checkbox.checked);
            //     console.log('bloque:', bloque);
            // });

            toggleBloque(); // estado inicial
            checkbox.addEventListener('change', toggleBloque);

            // if (!acepta || !bloque) return;

            // const toggleAdicionales = () => {
            //     if (acepta.checked) {
            //         bloque.classList.remove('d-none');
            //         enableInputs(bloque);
            //     } else {
            //         bloque.classList.add('d-none');
            //         disableInputs(bloque);
            //     }
            // };

            // const disableInputs = (container) => {
            //     container.querySelectorAll('input, select').forEach(el => {
            //         el.disabled = true;
            //         if (el.type === 'checkbox') el.checked = false;
            //     });
            // };

            // const enableInputs = (container) => {
            //     container.querySelectorAll('input, select').forEach(el => {
            //         el.disabled = false;
            //     });
            // };

            // toggleAdicionales(); // estado inicial
            // acepta.addEventListener('change', toggleAdicionales);
        });
    </script>
@endsection
