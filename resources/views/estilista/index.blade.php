@extends('adminlte::page')
@section('content')
<div class="container">
    <div class="table-wrapper">
        <div class="table-title">
            <br>
            <div class="row justify-content-between">
                <div class="col-sm-4">
                    <h2><b>Atender Solicitudes</b></h2>

                    <form action="{{ route('BuscarPorFecha') }}">
                        <div class="form-row">
                            <input id="fecha_solicitud" type="date" min="1970-01-01" max="9999-12-31"
                                class="form-control @error('fecha_solicitud') is-invalid @enderror"
                                name="fecha_solicitud" value="{{ old('fecha_solicitud') }}" required
                                autocomplete="fecha_solicitud" autofocus>
                            <div class="col-auto my-2">
                                <input type="submit" class="btn btn-secondary
                                " style="background-color: #00a5e3" value="Buscar">

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <table class="table table-striped table-hover">

            <thead>
                <tr>

                    <th>Nº Solicitud</th>
                    <th>Fecha y Hora Solicitud</th>
                    <th>Estado</th>
                    <th>Ver solicitud</th>

                </tr>
            </thead>
            <tbody>
                @forelse ($solicituds as $solicitud)
                    <tr>
                        <td>{{ $solicitud->id }}</td>
                        <td>{{ date('d-m-Y', strtotime($solicitud->fecha_solicitud)) }} -
                            {{ $solicitud->hora_solicitud }}</td>
                        <td>{{ $solicitud->estado }}</td>
                        <td>
                            <form class="formulario" method="GET" data-toggle="tooltip" data-placement="top"
                                action="{{ route('AceptarServicio', ['id' => $solicitud->id]) }}">
                                <button
                                    type="button" class="btn btn-default" style="background-color: #ffd782" data-backdrop="static"
                                    data-toggle="modal" data-target="#Modal-{{ $solicitud->id }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-event-fill" viewBox="0 0 16 16">
                                        <path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zm-3.5-7h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5z"/>
                                      </svg>
                                </button>
                                <div class="modal fade" id="Modal-{{ $solicitud->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <form method="GET"
                                                action="{{ route('AceptarServicio', ['id' => $solicitud->id]) }}">
                                                <div class="modal-header" style="background-color: #00a5e3">
                                                    <h5 class="modal-title " style="color:#ffffff" id="exampleModalLongTitle">Detalles de la solicitud
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body" style="background-color: #00a5e3">
                                                    <div class="card mb-3" style="max-width: 540px;">



                                                            <div class="col-md-8">
                                                                <div class="card-body">
                                                                    <h5 class="card-title">Datos Cliente</h5>
                                                                    <p class="card-text">

                                                                    <h6>


                                                                        <div class="container">
                                                                            <div class="row">

                                                                                <div class="col-sm-6 col-md-5 col-lg-6">
                                                                                    Nombre</div>
                                                                                <div
                                                                                    class="col-sm-6 col-md-5 offset-md-2 col-lg-6 offset-lg-0">
                                                                                    {{ App\Models\User::getUserDates($solicitud->cliente_id)->name }}
                                                                                    {{ App\Models\User::getUserDates($solicitud->cliente_id)->apellido}}
                                                                                </div>

                                                                                <div class="col-sm-6 col-md-5 col-lg-6">
                                                                                    Rut</div>
                                                                                <div
                                                                                    class="col-sm-6 col-md-5 offset-md-2 col-lg-6 offset-lg-0">
                                                                                    {{ App\Models\User::getUserDates($solicitud->cliente_id)->rut }}
                                                                                </div>

                                                                                <div class="col-sm-6 col-md-5 col-lg-6">
                                                                                    Telefono</div>
                                                                                <div
                                                                                    class="col-sm-6 col-md-5 offset-md-2 col-lg-6 offset-lg-0">
                                                                                    {{ App\Models\User::getUserDates($solicitud->cliente_id)->telefono }}
                                                                                </div>

                                                                                <div class="col-sm-6 col-md-5 col-lg-6">
                                                                                    Email</div>
                                                                                <div
                                                                                    class="col-sm-6 col-md-5 offset-md-2 col-lg-6 offset-lg-0">
                                                                                    {{ App\Models\User::getUserDates($solicitud->cliente_id)->email }}
                                                                                </div>

                                                                                <div class="col-sm-6 col-md-5 col-lg-6">
                                                                                    Dirección</div>
                                                                                <div
                                                                                    class="col-sm-6 col-md-5 offset-md-2 col-lg-6 offset-lg-0">
                                                                                    {{ App\Models\User::getUserDates($solicitud->cliente_id)->direccion }}
                                                                                </div>
                                                                            </div>
                                                                    </h6>
                                                                    </p>

                                                                </div>

                                                            </div>
                                                            <div
                                                                class="modal-footer justify-content-center align-content-center">
                                                                <button type="submit" class="btn btn-success">Atender
                                                                    Solicitud
                                                                </button>
                                                                <button type="button" class="btn btn-danger"
                                                                    data-dismiss="modal">Cerrar
                                                                    solicitud</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No hay solicitudes por mostrar</td>
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
@endsection
