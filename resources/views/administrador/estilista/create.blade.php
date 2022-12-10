@extends('adminlte::page')

@section('content')
<hr>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{'Agregar Estilista' }}</div>
                <style>
                    .card-header{
                        background-color: #00a5e3 !important;
                        color: #ffffff !important;
                    }
                </style>

                <div class="card-body">
                    <form id="form" method="POST" action="{{ route('crear_estilista_post') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="rut" class="col-md-4 col-form-label text-md-end">{{ __('rut') }}</label>

                            <div class="col-md-6">
                                <input id="rut" type="text" class="form-control @error('rut') is-invalid @enderror" name="rut" value="{{ old('rut') }}" required autocomplete="rut" autofocus>

                                @error('rut')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('nombre') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>



                        <div class="row mb-3">
                            <label for="apellido" class="col-md-4 col-form-label text-md-end">{{ __('Apellido
                                Paterno') }}</label>

                            <div class="col-md-6">
                                <input id="apellido" type="text" class="form-control @error('apellido') is-invalid @enderror" name="apellido" value="{{ old('apellido') }}" required autocomplete="apellido" autofocus>

                                @error('apellido')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="telefono" class="col-md-4 col-form-label text-md-end">{{ __('Teléfono
                                Movil') }}</label>

                            <div class="col-md-6">
                                <input id="telefono" type="number" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" required autocomplete="telefono" autofocus>

                                @error('telefono')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>




                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button class="formulario" id="boton" type="submit" class="btn btn-primary">
                                    {{ __('Agregar Estilista') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    const formularios = document.getElementsByClassName("formulario");
    for (const form of formularios) {
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            Swal.fire({
                title: 'tu contraseña es:' ,
                icon: 'check',
                showCancelButton: false,
                confirmButtonColor: '#4DD091',
                confirmButtonText: 'Confirmar'
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
