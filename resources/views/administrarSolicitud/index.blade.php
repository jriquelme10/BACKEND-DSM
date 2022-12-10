@extends('adminlte::page')
@section('content')
    <div class="container">
        <div class="table-wrapper">

            <div class="table-title">
                <br>
                <div class="row justify-content-between">

                    <div class="form-row">
                        <div class="col-auto my-1">
                            <h2>Administrar <b>Ordenes</b>

                                <a href="home" class="btn btn-secondary" style="background-color:#00a5e3"><span>Volver</span></a>


                            </h2>
                        </div>

                    </div>



                </div>
            </div>

            <table class="table table-striped table-hover">
                <thead>
                    <tr>

                        <th>Nº Solicitud</th>
                        <th>Nombre del cliente</th>
                        <th>Fecha y Hora</th>
                        <th>Estado</th>
                        <th>Ver</th>

                    </tr>
                </thead>
                <tbody>

                    @forelse ($solicitudes as $solicitud)
                        <tr>

                            <td><strong> {{ $solicitud->id }} </strong></td>

                            <td>{{ App\Models\User::getUserNameById($solicitud->cliente_id) }}
                                {{ App\Models\User::getUserApellidoById($solicitud->cliente_id) }}</td>

                            <td>{{ date('d/m/Y', strtotime($solicitud->fecha_solicitud)) }} -
                                {{ date('H:i', strtotime($solicitud->hora_solicitud)) }}</td>

                            <td>{{ $solicitud->estado }}</td>


                            <td>

                                <body>
                                    <button style="margin-left:0  !important" class="btn btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#Modal-{{ $solicitud->id }}" type="submit"
                                        title="Ver detalles"><i></i>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-event-fill" viewBox="0 0 16 16">
                                            <path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zm-3.5-7h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5z"/>
                                          </svg>

                                    </button>



                                    <div class="modal fade" id="Modal-{{ $solicitud->id }}" tabindex="-1"
                                        aria-hidden="true" aria-labelledby="modalTitle">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modaaaal-content">


                                                    <p>
                                                    <div class="card mb-3" style="max-width: 540px;">


                                                        <div class="row g-0">


                                                            <div class="col-md-8">
                                                                <div class="card-body">

                                                                    <h5 align="CENTER" noshadclass="card-title">
                                                                        Detalles de la solicitud</h5>

                                                                    <p class="card-text">

                                                                    <h6>

                                                                        <div class="container">
                                                                            <div class="row">

                                                                                <div class="col-sm-6 col-md-5 col-lg-6">
                                                                                    Nombre</div>
                                                                                <div
                                                                                    class="col-sm-6 col-md-5 offset-md-2 col-lg-6 offset-lg-0">
                                                                                    {{ App\Models\User::getUserNameById($solicitud->cliente_id) }}
                                                                                    {{ App\Models\User::getUserApellidoById($solicitud->cliente_id) }}
                                                                                </div>

                                                                                <div class="col-sm-6 col-md-5 col-lg-6">Rut
                                                                                </div>
                                                                                <div
                                                                                    class="col-sm-6 col-md-5 offset-md-2 col-lg-6 offset-lg-0">
                                                                                    {{ App\Models\User::getUserRut($solicitud->cliente_id) }}
                                                                                </div>

                                                                                <div class="col-sm-6 col-md-5 col-lg-6">
                                                                                    Telefono</div>
                                                                                <div
                                                                                    class="col-sm-6 col-md-5 offset-md-2 col-lg-6 offset-lg-0">
                                                                                    {{ App\Models\User::getUserTelefono($solicitud->cliente_id) }}
                                                                                </div>

                                                                                <div class="col-sm-6 col-md-5 col-lg-6">
                                                                                    Email</div>
                                                                                <div
                                                                                    class="col-sm-6 col-md-5 offset-md-2 col-lg-6 offset-lg-0">
                                                                                    {{ App\Models\User::getUserEmail($solicitud->cliente_id) }}
                                                                                </div>

                                                                                <div class="col-sm-6 col-md-5 col-lg-6">
                                                                                    Dirección</div>
                                                                                <div
                                                                                    class="col-sm-6 col-md-5 offset-md-2 col-lg-6 offset-lg-0">
                                                                                    {{ App\Models\User::getUserDireccion($solicitud->cliente_id) }}
                                                                                </div>

                                                                                <div class="col-sm-6 col-md-5 col-lg-6">
                                                                                    Estado</div>
                                                                                <div
                                                                                    class="col-sm-6 col-md-5 offset-md-2 col-lg-6 offset-lg-0">
                                                                                    {{ $solicitud->estado }}</div>



                                                                                @if ($solicitud->estado == 'ATENDIDA A TIEMPO' || $solicitud->estado == 'ATENDIDA CON RETRASO')
                                                                                    @if ($solicitud->comentario == '')
                                                                                        <div
                                                                                            class="col-sm-6 col-md-5 col-lg-6">
                                                                                            Comentario</div>
                                                                                        <div
                                                                                            class="col-sm-6 col-md-5 offset-md-2 col-lg-6 offset-lg-0">
                                                                                            Sin comentarios</div>

                                                                                        <br> <br>
                                                                                        <div class="accordion accordion-flush"
                                                                                            id="accordionFlushExample">
                                                                                            <div class="accordion-item">
                                                                                                <h2 class="accordion-header"
                                                                                                    id="flush-headingOne">
                                                                                                    <button
                                                                                                        class="accordion-button collapsed"
                                                                                                        type="button"
                                                                                                        data-bs-toggle="collapse"
                                                                                                        data-bs-target="#flush-collapseOne"
                                                                                                        aria-expanded="false"
                                                                                                        aria-controls="flush-collapseOne">

                                                                                                        Estilista:
                                                                                                        {{ App\Models\User::getUserNameById($solicitud->estilista_id) }}
                                                                                                        {{ App\Models\User::getUserApellidoById($solicitud->estilista_id) }}

                                                                                                    </button>
                                                                                                </h2>
                                                                                                <div id="flush-collapseOne"
                                                                                                    class="accordion-collapse collapse"
                                                                                                    aria-labelledby="flush-headingOne"
                                                                                                    data-bs-parent="#accordionFlushExample">
                                                                                                    <div
                                                                                                        class="accordion-body">

                                                                                                        <div
                                                                                                            class="container">
                                                                                                            <div
                                                                                                                class="row">

                                                                                                                <div
                                                                                                                    class="col-sm-6 col-md-5 col-lg-6">
                                                                                                                    Nombre
                                                                                                                </div>
                                                                                                                <div
                                                                                                                    class="col-sm-6 col-md-5 offset-md-2 col-lg-6 offset-lg-0">
                                                                                                                    {{ App\Models\User::getUserNameById($solicitud->estilista_id) }}
                                                                                                                </div>

                                                                                                                <div
                                                                                                                    class="col-sm-6 col-md-5 col-lg-6">
                                                                                                                    Rut
                                                                                                                </div>
                                                                                                                <div
                                                                                                                    class="col-sm-6 col-md-5 offset-md-2 col-lg-6 offset-lg-0">
                                                                                                                    {{ App\Models\User::getUserRut($solicitud->estilista_id) }}
                                                                                                                </div>

                                                                                                                <div
                                                                                                                    class="col-sm-6 col-md-5 col-lg-6">
                                                                                                                    Telefono
                                                                                                                </div>
                                                                                                                <div
                                                                                                                    class="col-sm-6 col-md-5 offset-md-2 col-lg-6 offset-lg-0">
                                                                                                                    {{ App\Models\User::getUserTelefono($solicitud->estilista_id) }}
                                                                                                                </div>

                                                                                                                <div
                                                                                                                    class="col-sm-6 col-md-5 col-lg-6">
                                                                                                                    Email
                                                                                                                </div>
                                                                                                                <div
                                                                                                                    class="col-sm-6 col-md-5 offset-md-2 col-lg-6 offset-lg-0">
                                                                                                                    {{ App\Models\User::getUserEmail($solicitud->estilista_id) }}
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        @else
                                                                                            <div
                                                                                                class="col-sm-6 col-md-5 col-lg-6">
                                                                                                Comentario</div>
                                                                                            <div
                                                                                                class="col-sm-6 col-md-5 offset-md-2 col-lg-6 offset-lg-0">
                                                                                                {{ $solicitud->comentario }}
                                                                                            </div>

                                                                                            <br> <br>
                                                                                            <div class="accordion accordion-flush"
                                                                                                id="accordionFlushExample">
                                                                                                <div
                                                                                                    class="accordion-item">
                                                                                                    <h2 class="accordion-header"
                                                                                                        id="flush-headingOne">
                                                                                                        <button
                                                                                                            class="accordion-button collapsed"
                                                                                                            type="button"
                                                                                                            data-bs-toggle="collapse"
                                                                                                            data-bs-target="#flush-collapseOne"
                                                                                                            aria-expanded="false"
                                                                                                            aria-controls="flush-collapseOne">
                                                                                                            Estilista:
                                                                                                            {{ App\Models\User::getUserNameById($solicitud->estilista_id) }}
                                                                                                            {{ App\Models\User::getUserApellidoById($solicitud->estilista_id) }}
                                                                                                        </button>
                                                                                                    </h2>
                                                                                                    <div id="flush-collapseOne"
                                                                                                        class="accordion-collapse collapse"
                                                                                                        aria-labelledby="flush-headingOne"
                                                                                                        data-bs-parent="#accordionFlushExample">
                                                                                                        <div
                                                                                                            class="accordion-body">

                                                                                                            <div
                                                                                                                class="container">
                                                                                                                <div
                                                                                                                    class="row">

                                                                                                                    <div
                                                                                                                        class="col-sm-6 col-md-5 col-lg-6">
                                                                                                                        Nombre
                                                                                                                    </div>
                                                                                                                    <div
                                                                                                                        class="col-sm-6 col-md-5 offset-md-2 col-lg-6 offset-lg-0">
                                                                                                                        {{ App\Models\User::getUserNameById($solicitud->estilista_id) }}
                                                                                                                    </div>

                                                                                                                    <div
                                                                                                                        class="col-sm-6 col-md-5 col-lg-6">
                                                                                                                        Rut
                                                                                                                    </div>
                                                                                                                    <div
                                                                                                                        class="col-sm-6 col-md-5 offset-md-2 col-lg-6 offset-lg-0">
                                                                                                                        {{ App\Models\User::getUserRut($solicitud->estilista_id) }}
                                                                                                                    </div>

                                                                                                                    <div
                                                                                                                        class="col-sm-6 col-md-5 col-lg-6">
                                                                                                                        Telefono
                                                                                                                    </div>
                                                                                                                    <div
                                                                                                                        class="col-sm-6 col-md-5 offset-md-2 col-lg-6 offset-lg-0">
                                                                                                                        {{ App\Models\User::getUserTelefono($solicitud->estilista_id) }}
                                                                                                                    </div>

                                                                                                                    <div
                                                                                                                        class="col-sm-6 col-md-5 col-lg-6">
                                                                                                                        Email
                                                                                                                    </div>
                                                                                                                    <div
                                                                                                                        class="col-sm-6 col-md-5 offset-md-2 col-lg-6 offset-lg-0">
                                                                                                                        {{ App\Models\User::getUserEmail($solicitud->estilista_id) }}
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                    @endif
                                                                                @else
                                                                                    @if ($solicitud->estado == 'ANULADA')
                                                                                    @else
                                                                                        @if ($solicitud->estado == 'INGRESADA')
                                                                                            <footer class="text-muted"><br>
                                                                                                <li>Estilista por asignar
                                                                                                </li>
                                                                                            </footer>
                                                                                        @endif
                                                                                    @endif
                                                                                @endif


                                                                            </div>
                                                                        </div>


                                                                    </h6>
                                                                    </p>






                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>



                                                    </p>

                                                </div>

                                            </div>
                                        </div>
                                    </div>



                                </body>
                            </td>


                        </tr>
                    @empty

                        <tr>
                            <td colspan="6" class="text-center">No hay solicitudes por mostrar</td>
                        </tr>
                    @endforelse


                </tbody>
            </table>
            @if ($solicitudes->links())
                <div class="d-flex justify-content-center">
                    {!! $solicitudes->links() !!}
                </div>
            @endif
        </div>

    </div>



@endsection
