@extends('adminlte::page')

@section('content')
    <div class="container">
        <hr>
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row justify-content-between">
                    <div class="col-sm-4">
                        <h2><b>Estado de Usuarios</b></h2>
                        <form action="{{ route('habilitarUsuarios') }}">
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
                        <th>ROL</th>
                        <th>CAMBIAR ESTADO</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>{{ $user->rut }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->apellido }}</td>
                            <td>{{ $user->telefono }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->rol }}</td>
                            @if ($user->status === 1)
                                <td><form class="formulario" method="GET" data-toggle="tooltip" data-placement="top"
                                    title="Deshabilita al usuario"
                                    action="{{ route('cambiarEstado', ['id' => $user->id]) }}">
                                    <button type="submit" class="btn btn-success"><i class="fas fa-check"></i>
                                    </button>
                                </form></td>
                            @else
                                <td><form class="formulario" method="GET" data-toggle="tooltip" data-placement="top"
                                    title="habilita al usuario"
                                    action="{{ route('cambiarEstado', ['id' => $user->id]) }}">
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-ban"></i>
                                    </button></td>
                            @endif

                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No hay users en la base de datos</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>




        </div>
    </div>
    @if ($users->links())
        <div class="d-flex justify-content-center">
            {!! $users->links() !!}
        </div>
    @endif



    <script>
        const formularios = document.getElementsByClassName("formulario");
        for (const form of formularios) {
            form.addEventListener('submit', (e) => {
                e.preventDefault();
                Swal.fire({
                    title: '¿Estás seguro que quieres habilitar/deshabilitar a este usuario?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#4DD091',
                    cancelButtonColor: '#FF5C77',
                    confirmButtonText: 'Confirmar',
                    cancelButtonText: 'Cancelar',
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'La acción se ha realizado con exito!',
                            showConfirmButton: false,
                            timer: 10000,
                        })
                        form.submit();
                    }
                })
            })
        }
    </script>


<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.all.min.js"></script>
@endsection
