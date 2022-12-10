@extends('adminlte::page')

<script src="{{ asset('js/app.js') }}" defer></script>
<script src="/js/custom.js" defer></script>

<head>

    <link rel="stylessheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylessheet" href="/css/app.css">

</head>

@section('content')
<br>
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-8">
                @if (Session::has('contrasenia_message'))
                    <div class="alert alert-success">
                        {{ Session::get('contrasenia_message') }}
                    </div>
                @endif

                @if (Session::has('datos_message'))
                    <div class="alert alert-success">
                        {{ Session::get('datos_message') }}
                    </div>
                @endif
                <div class="card">

                    <div class="card-header">{{ __('Datos') }}

                        <style>
                            .card-header{
                                background-color: #00a5e3 !important;
                                color: #ffffff !important;
                            }
                        </style>
                    </div>

                    <div class="card-body ">
                        <form method="POST" action="{{ route('update') }}">
                            @method('PATCH')
                            @csrf

                            <div class="row mb-3">
                                <label for="rut" class="col-md-4 col-form-label text-md-end">{{ __('RUT') }}</label>

                                <div class="col-md-6">
                                    <input id="rut" type="text" value={{ Auth::user()->rut }} readonly="readonly"
                                        class="form-control @error('rut') is-invalid @enderror" name="rut"
                                        value="{{ old('rut') }}" required autocomplete="rut" autofocus>

                                    @error('rut')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" value={{ Auth::user()->name }}
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ 'El campo nombre debe tener más de 2 caracteres.' }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="apellido"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Apellido paterno') }}</label>

                                <div class="col-md-6">
                                    <input id="apellido" type="text" value={{ Auth::user()->apellido }}
                                        class="form-control @error('apellido') is-invalid @enderror" name="apellido"
                                        value="{{ old('apellido') }}" required autocomplete="apellido" autofocus>

                                    @error('apellido')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ 'El campo apellido paterno debe tener más de 2 caracteres.' }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="telefono"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Teléfono') }}</label>

                                <div class="col-md-6">
                                    <input id="telefono" type="text" value={{ Auth::user()->telefono }}
                                        class="form-control @error('telefono') is-invalid @enderror" name="telefono"
                                        value="{{ old('telefono') }}" required autocomplete="telefono" autofocus>

                                    @error('telefono')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" value={{ Auth::user()->email }}
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="direccion"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Domicilio') }}</label>

                                <div class="col-md-6">
                                    <input id="direccion" type="text" value={{ Auth::user()->direccion }}
                                        class="form-control @error('direccion') is-invalid @enderror" name="direccion"
                                        value="{{ old('direccion') }}" required autocomplete="direccion" autofocus>

                                    @error('direccion')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">

                                <div class="col-md-6 offset-md-4">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" style="background-color:#00a5e3" data-bs-target="#exampleModal">
                                        {{ __('Actualizar') }}
                                    </button>



                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

                                        <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Actualizar datos</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                ¿Está seguro que deseas actualizar tus datos?
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                            <button type="submit" class="btn btn-primary">Si</button>
                                            </div>
                                          </div>
                                        </div>
                                    </div>


                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>



    </div>
@endsection
