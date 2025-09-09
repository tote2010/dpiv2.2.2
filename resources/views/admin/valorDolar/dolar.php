@section('js')
<div class="card card-success">
        <div class="card-header">
          Dolar
        </div>
        <div class="card-body" id="formData">
          <h3><div id="valor">u$s {{ $dolar->valor }}</div></h3>
          <h5><div id="fecha">Al 25/11/2024</div></h5>
          <br>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal">
            Modificar
          </button>
        </div>
    </div>

    <div id="modal" class="modal" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Modal title</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p>Nuevo Valor</p>
              <form id="valorDolar">
                @csrf
                <div class="mb-3">
                  <input type="text" class="form-control" id="valor_dolar">
                </div>                
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <button type="button" class="btn btn-primary" id="ingresarValor">Modificar</button>
            </div>
          </div>
        </div>
    </div>

    <br>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>Lista de Precios de los Productos</h3>
        <a href="{{ route('admin.categorias.create') }}" class="btn btn-primary">Nuevo Precio</a>
    </div>
    


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

        //Modal
        const myModal = document.getElementById('modal');
        const valor = $('#valor_dolar');

        myModal.addEventListener('shown.bs.modal', () => {
        valor.focus()});

        //POST
        document.getElementById('ingresarValor').addEventListener('click', function() {
        
        const valor_dolar = $('#valor_dolar').val();

        $.ajax({
            url: '{{ route("admin.valor_dolar") }}', // Ruta para guardar el dato
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                dato: valor_dolar,
                },
            success: function(response) {
                if (response.success) {
                    alert('Dato agregado con éxito');
                    // Cerrar el modal
                    $('#modal').modal('hide');
                    // Limpiar el formulario
                    $('#formData')[0].reset();
                    // Agregar el nuevo dato
                    //let valor = document.getElementById('valor').append(response.valor);
                    //let fecha = document.getElementById('fecha').append(response.fecha);
                } else {
                    alert('Error al agregar el dato');
                }
            },
            error: function(xhr) {
                alert('Error al procesar la solicitud');
                console.error(xhr.responseText);
            }
        });
    });

    //     fetch('{{ route("admin.valor_dolar") }}', {
    //         method: 'POST',
    //         headers: {
    //             'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
    //         },
    //         body: JSON.parse('1001')
    //     })
    //     .then(response => response.json())
    //     .then(data => {
    //         if (data.success) {
    //             alert('Valor agregado con éxito');
    //             // Cerrar modal
    //             var addDataModal = bootstrap.Modal.getInstance(document.getElementById('modal'));
    //             addDataModal.hide();

    //             // Limpiar formulario
    //             document.getElementById('valor_dolar').reset();

    //             // Agregar el nuevo dato a la tabla
    //             let valor = document.getElementById('valor');
    //             let fecha = document.getElementById('fecha');
    //             // let fecha = table.insertRow();
    //             // newRow.innerHTML = `
    //             //     <td>${data.dato.id}</td>
    //             //     <td>${data.dato.nombre}</td>
    //             //     <td>${data.dato.descripcion}</td>
    //             // `;
    //         } else {
    //             alert('Error al agregar el dato');
    //         }
    //     })
    //     .catch(error => {
    //         console.error('Error:', error);
    //         alert('Error al procesar la solicitud.');
    //     });
    //});

    </script>    
@stop