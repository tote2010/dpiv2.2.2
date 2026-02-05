@extends('adminlte::page')

@section('title', 'Productos')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1>Productos</h1>

        <a href="{{ route('admin.productos.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Crear producto
        </a>
    </div>
@endsection

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Categoría</th>
                        <th>Activo</th>
                        <th>Creado</th>
                        <th class="text-right">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($productos as $producto)
                        <tr>
                            <td>{{ $producto->id }}</td>

                            <td>{{ $producto->nombre }}</td>

                            <td>
                                {{ $producto->categoria->nombre ?? '—' }}
                            </td>

                            <td>
                                @if ($producto->activo)
                                    <span class="badge badge-success">Activo</span>
                                @else
                                    <span class="badge badge-secondary">Inactivo</span>
                                @endif
                            </td>

                            <td>
                                {{ optional($producto->created_at)->format('d/m/Y') }}
                            </td>

                            <td class="text-right">
                                <a href="{{ route('admin.productos.edit', $producto) }}"
                                   class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <form action="{{ route('admin.productos.destroy', $producto) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('¿Eliminar producto?')">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">
                                No hay productos cargados
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($productos instanceof \Illuminate\Pagination\LengthAwarePaginator)
            <div class="card-footer clearfix">
                {{ $productos->links() }}
            </div>
        @endif
    </div>
@endsection
