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

                        <th>N°SOLICITUD</th>
                        <th>FECHA Y HORA SOLICITUD</th>
                        <th>ESTADO</th>
                        <th>ESTILISTA</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($solicituds as $solicitud)
                        <tr>
                            <td>{{ $solicitud->id}}</td>
                            <td>{{ $solicitud->fecha_solicitud }} - {{ $solicitud->hora_solicitud }}</td>
                            <td>{{ $solicitud->estado }}</td>
                            @if ($solicitud->estilista_id)
                                <td>{{ App\Models\User::getUserNameById($solicitud->estilista_id) }}

                                </div>
                                </td>
                                <td>
                                    <a href="" class="edit"><i class="fa-solid fa-comment-dots"></i></a>
                                </td>
                            @else
                                <td>-</td>

                                <a href="" class="edit"><i class="fa-solid fa-trash-can"></i></a>
                                </td>
                            @endif
                            <td>
                                @if ($solicitud->estado == 'INGRESADA')
                                <a href="/cliente/edit" class="btn bg-gradient-secondary" style="background-color: #74737A">Anular</a>


                                @endif
                            </td>



                        </tr>

                        <tr>


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
@endsection
