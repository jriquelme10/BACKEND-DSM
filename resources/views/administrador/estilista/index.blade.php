@extends('adminlte::page')

@section('content')
    <div class="container">
        <hr>
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row justify-content-between">
                    <div class="col-sm-4">

                        <h2><b>Administrar Estilistas</b></h2>
                    </div>
                    <div class="col-sm-3">

                        <a href="estilista/create" class="btn btn-secondary" style="background-color: #74737A" data-toggle="">
                             <span>Agregar estilista</span></a>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>

                        <th>RUT</th>
                        <th>NOMBRE</th>
                        <th>APELLIDO P.</th>
                        <th>TELEFONO</th>
                        <th>EMAIL</th>
                        <th>EDITAR</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($estilistas as $estilista)
                        <tr>
                            <td>{{ $estilista->rut }}</td>
                            <td>{{ $estilista->name }}</td>
                            <td>{{ $estilista->apellido }}</td>
                            <td>{{ $estilista->telefono }}</td>
                            <td>{{ $estilista->email }}</td>
                            <td>
                                <a href={{ route('editar_estilista', ['id' => $estilista->id]) }} class="edit"
                                    data-toggle="tooltip" data-placement="top" title="Edita al Estilista"><img
                                        src="img/pencil.png" with="20" height="20"
                                        class="d-inline-block align-text-top"></a>
                            </td>
                        </tr>

                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No hay estilistas en la base de datos</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>

        </div>
    </div>
    @if ($estilistas->links())
        <div class="d-flex justify-content-center">
            {!! $estilistas->links() !!}
        </div>
    @endif
@endsection
