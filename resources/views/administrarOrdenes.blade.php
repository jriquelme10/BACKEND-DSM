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
                        <a href="/home" class="btn btn-secondary" style= "background-color: #74737A"><span>Volver</span></a>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>

                        <th>N° ORDEN</th>
                        <th>N° MESA</th>
                        <th>MONTO TOTAL</th>
                        <th>VER DETALLE</th>
                        <th>TIEMPO PEDIDO</th>
                        <th>ESTADO</th>
                        <th>CAMBIAR ESTADO</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Orders as $pedido)
                    <tr>
                        <td>#{{ $pedido->id }}</td>
                        <td>Mesa: N°{{ $pedido->number_table }}</td>


                        <td>${{ $pedido->totalAmount }}</td>

                        <td><button type="button" class="btn btn-info" data-toggle="modal"
                                data-target="#Modal-{{ $pedido->id }}">Ver detalle</button></td>

                        <td><button type="button" class="btn btn-info" data-toggle="modal"
                            data-target="#Tiempo-{{ $pedido->id }}">Asignar tiempo</button></td>

                            <td>{{ $pedido->status }}</td>

                            <td><button type="button" class="btn btn-danger" data-toggle="modal"
                                data-target="#Tiempo-{{ $pedido->id }}">Finalizar pedido</button></td>
                        </tr>


                    <div class="modal fade" id="Modal-{{ $pedido->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Detalle del pedido
                                        #{{ $pedido->id }}</h1>
                                    <button type="button" class="btn" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <div>Productos de la orden:</div>
                                    @foreach ($pedido->detallesOrden as $detail)
                                        <p>{{ $detail->quantity }}x  {{ $detail->productoId->nombre }}
                                            Monto: ${{ $detail->productoId->precio * $detail->quantity }}

                                        </p>
                                    @endforeach

                                    <div class="mt-3">Total: ${{ $pedido->totalAmount }}</div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">Cerrar</button>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="Tiempo-{{ $pedido->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Ingrese el tiempo de preparación:</h1>
                                    <button type="button" class="btn" data-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <input type="numeric" style="align-items: center" placeholder="Tiempo de preparación">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">Cerrar</button>
                                    <button type="button" class="btn btn-success">Atender pedido</button>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach

                </tbody>
            </table>




        </div>

    </div>

@endsection
