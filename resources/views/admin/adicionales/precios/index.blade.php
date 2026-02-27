@extends('adminlte::page')

@section('css')
    <style>
        .precio-ars.flash {
            animation: flashBg 1.6s ease;
        }
        
        @keyframes flashBg {
            0%   { background-color: #d1e7dd; }
            100% { background-color: transparent; }
        }
    </style>
@endsection

@section('title', 'Adicionales - ' . $adicional->nombre)

@section('content_header')
    <h1>
        <b>Precios</b> – {{ $adicional->nombre }}
    </h1>
    <br>
    <div class="mb-2 text-muted medium">
        💱 Conversión automática según dólar actual:
        <strong>$ {{ number_format($dolar, 2, ',', '.') }}</strong>
    </div>
@stop

@section('content')

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>Rangos de precios</span>

            <a href="{{ route('admin.adicionales.precios.create', $adicional) }}"
               class="btn btn-primary btn-sm">
                + Nuevo precio
            </a>
        </div>

        <div class="card-body p-0">

            @if($precios->isEmpty())
                <div class="p-3">
                    <em>No hay precios definidos para este adicional.</em>
                </div>
            @else
                <table class="table table-striped mb-0">
                    <thead>
                        <tr>
                            <th>Cantidad desde</th>
                            <th>Cantidad hasta</th>
                            <th>Precio ARS</th>
                            <th class="text-end">Precio USD</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($precios as $precio)
                            <tr>
                                <td>{{ $precio->cantidad_desde }}</td>
                                <td>
                                    {{ $precio->cantidad_hasta ?? '∞' }}
                                </td>
                                <span class="badge bg-secondary">
                                    {{ $precio->cantidad_desde }} – {{ $precio->cantidad_hasta }}
                                </span>
                                <td class="text-end">
                                    <span class="precio-ars text-success fw-semibold"></span>
                                </td>
                                <td>
                                    {{-- $ {{ number_format($precio->precio_unitario, 3, ',', '.') }} --}}
                                    <form method="POST"
                                        action="{{ route('admin.adicionales.precios.update', [$adicional, $precio]) }}"
                                        class="d-flex gap-2">
                                        @csrf
                                        @method('PUT')

                                        <input type="number"
                                            name="precio_unitario"
                                            step="0.001"
                                            class="form-control precio-usd form-control-sm precio-input"
                                            data-original="{{ $precio->precio_unitario }}"
                                            value="{{ $precio->precio_unitario }}"
                                            {{-- value="{{ money($precio->precio_unitario) }}" --}}
                                            style="max-width: 120px">
                                    
                                        <button class="btn btn-sm d-none guardar-btn">
                                            💾
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif

        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('admin.adicionales.index') }}" class="btn btn-secondary">
            ← Volver a adicionales
        </a>
    </div>

@stop

@section('js')
    <script>
        window.DOLAR_ACTUAL = {{ $dolar }};

        function formatARS(value) {
            return '$ ' + value.toLocaleString('es-AR', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });
        }

        document.querySelectorAll('.precio-usd').forEach(input => {
            const row = input.closest('tr');
            const arsSpan = row.querySelector('.precio-ars');

            function updateARS() {
                const usd = parseFloat(input.value || 0);
                const ars = usd * window.DOLAR_ACTUAL;

                arsSpan.textContent = formatARS(ars);

                arsSpan.classList.remove('flash');
                void arsSpan.offsetWidth; // reflow
                arsSpan.classList.add('flash');                
            }

            // Inicial
            updateARS();

            // En vivo mientras escribe
            input.addEventListener('input', updateARS);
        });

        document.querySelectorAll('.precio-input').forEach(input => {
            const btn = input.closest('tr').querySelector('.guardar-btn');
            const original = input.dataset.original;

            input.addEventListener('input', () => {
                btn.classList.toggle('d-none', input.value == original);
            });
        });



        // document.querySelectorAll('.precio-input').forEach(input => {
        //     const guardarBtn = input.parentElement.querySelector('.guardar-btn');

        //     input.addEventListener('input', () => {
        //         if (input.value !== input.dataset.original) {
        //             guardarBtn.classList.remove('d-none');
        //         } else {
        //             guardarBtn.classList.add('d-none');
        //         }
        //     });
        // });
    </script>

@endsection