@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="table-wrapper">

            <div class="table-title">
                <br>
                <div class="row justify-content-between">

                    <div class="col-sm-4">
                        <h2><b>Administrar Ordenes</b></h2>
                    </div>
                    <div class="col-sm-8">
                        <a href="/cliente/create" class="btn btn-secondary" style= "background-color: #74737A"><span>Volver</span></a>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>

                        <th>N°ORDEN</th>
                        <th>FECHA ORDEN</th>
                        <th>DETALLE DE ORDEN</th>
                        <th>ESTADO</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody>


                    @forelse ($solicituds as $solicitud)
                    <tr>
                        <td>{{ $solicitud->id }}</td>
                        <td>{{ $solicitud->fecha_solicitud }} - {{ $solicitud->hora_solicitud }}</td>
                        <td> {{$solicitud->detalleOrden}}</td>
                        <td>{{ $solicitud->estado }}</td>

                        @if ($solicitud->estilista_id)
                            <td>{{ App\Models\User::getUserNameById($solicitud->estilista_id) }}</td>
                            {{-- <td>
                                <a href="" class="edit"><i class="fa-solid fa-comment-dots"></i></a>
                            </td> --}}
                        @else
                            <td>-</td>
                            <a href="" class="edit"><i class="fa-solid fa-trash-can"></i></a>
                            </td>
                        @endif

                        @if ($solicitud->estado == 'INGRESADA')
                            <td>
                                <form class="formAnular" method="GET" data-toggle="tooltip" data-placement="top"
                                    title="Anula la Solicitud"
                                    action="{{ route('update.status', ['id' => $solicitud->id]) }}">
                                    <button type="submit" id="boton" class="btn btn-success"><i class="fas fa-check"></i>
                                    </button>
                                </form>
                            </td>
                        @endif
                        @if ($solicitud->estado == 'ATENDIDA A TIEMPO' || $solicitud->estado == 'ATENDIDA CON RETRASO')
                                @if ($solicitud->comentario == '')
                                    <td>
                                        <button type="button" title="Agrega un Comentario" class="btn btn-success"
                                            data-toggle="modal" data-backdrop="static"
                                            data-target="#ModalComentario-{{ $solicitud->id }}">
                                        </button>
                                    </td>

                                    <!-- Modal -->
                                    <div class="modal fade" id="ModalComentario-{{ $solicitud->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <form method="GET"
                                                    action="{{ route('agregar_comentario', ['id' => $solicitud->id]) }}">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Comparte tu
                                                            opinión
                                                            sobre el Servicio de
                                                            {{ App\Models\User::getUserDates($solicitud->estilista_id)->name }}
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <textarea name="comentario" class="text" value="" rows="5" cols="50"
                                                            placeholder="Ingrese un comentario." minlength="1" maxlength="100"></textarea>
                                                    </div>
                                                    <div class="modal-footer justify-content-center align-content-center">
                                                        <button type="submit" class="btn btn-success">
                                                            Publicar
                                                        </button>
                                                        <button type="button" class="btn btn-danger"
                                                            data-dismiss="modal">Cerrar
                                                            Comentario</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <td></td>
                                @endif
                            @endif

                    </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No hay solicitudes</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>




        </div>

    </div>
    @if ($solicituds->links())
        <div class="d-flex justify-content-center">
            {!! $solicituds->links() !!}
        </div>
    @endif


    <script>
        const boton = document.getElementById("boton");
        const formularioAnular = document.getElementsByClassName("formAnular");
        for (const form of formularioAnular) {
            form.addEventListener('click', (e) => {
                e.preventDefault();
                Swal.fire({
                    title: '¿Estás seguro que quieres anular la solicitud?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#4DD091',
                    cancelButtonColor: '#FF5C77',
                    confirmButtonText: 'Confirmar',
                    cancelButtonText: 'Cancelar',
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        form.submit();
                    }
                })
            })
        }
    </script>



<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.all.min.js"></script>


@endsection
