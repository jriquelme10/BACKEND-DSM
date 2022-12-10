@extends('adminlte::page')

@section('content')
<hr>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (Session::has('repetido_message'))
                    <div class="alert alert-danger">
                        {{ Session::get('repetido_message') }}
                    </div>
                @endif

                @if (Session::has('ingresado_message'))
                    <div class="alert alert-success">
                        {{ Session::get('ingresado_message') }}
                    </div>
                @endif

                <div class="card">
                    <div class="card-header">{{ __('Registrar Estilista') }} </div>
                    <style>
                        .card-header{
                            background-color: #00a5e3 !important;
                            color: #ffffff !important;
                        }
                    </style>

                    <div class="card-body ">
                        <form method="POST" action="{{ route('crear_estilista_post') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

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
                                    <input id="apellido" type="apellido"
                                        class="form-control @error('apellido') is-invalid @enderror" name="apellido"
                                        value="{{ old('apellido') }}" required autocomplete="apellido">

                                    @error('apellido')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ 'El campo apellido paterno debe tener más de 2 caracteres.' }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="rut"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Rut estilista') }}</label>

                                <div class="col-md-6">
                                    <input id="rut" type="text" class="form-control @error('rut') is-invalid @enderror"
                                        name="rut" value="{{ old('rut') }}" required autocomplete="rut">

                                    @error('rut')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="telefono"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Teléfono') }}</label>

                                <div class="col-md-6">
                                    <input id="telefono" type="text"
                                        class="form-control @error('telefono') is-invalid @enderror" name="telefono"
                                        value="{{ old('telefono') }}" required autocomplete="telefono">

                                    @error('telefono')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary" style="background-color: #00a5e3">
                                        {{ __('Registrar') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
