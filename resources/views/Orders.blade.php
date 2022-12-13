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
                            data-target="#Time-{{ $pedido->id }}">Asignar tiempo</button></td>

                            <td>{{ $pedido->status }}</td>
                        </tr>


                    <div class="modal fade" id="Modal-{{ $pedido->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2 style="margin-left:auto;margin-right:auto" class="modal-title fs-5" id="exampleModalLabel">Detalle de orden
                                        #{{ $pedido->id }}</h2>
                                    <button name="finish" id="finish" type="button" class="btn" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <div style="text-align:center">
                                        <label> Pedido: </label>
                                    @foreach ($pedido->detallesOrden as $detail)
                                        {{ $detail->quantity }}x  {{ $detail->productoId->nombre }}
                                            Monto: ${{ $detail->productoId->precio * $detail->quantity }}


                                    @endforeach
                                    </div>
                                    <div style="text-align: center" class="mt-3">
                                        <label>TOTAL: ${{ $pedido->totalAmount }} </label>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">Cerrar</button>

                                </div>
                            </div>
                        </div>
                    </div>
                    <form class="formulario" method="GET" action="{{ route('attendOrder', ['id' => $pedido->id]) }}">

                                <div class="modal fade" id="Time-{{ $pedido->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h2 style="margin-left:auto;margin-right:auto"  id="exampleModalLabel">Asigna un tiempo al pedido:</h2>
                                                <button type="button" class="btn-close" data-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>

                                            <div class="form-group" style="text-align:center">
                                                <label for="minutes">Tiempo del pedido en minutos:</label>
                                                <select name="minutes" class="form-control" id="minutes">
                                                  <option>15 </option>
                                                  <option>30 </option>
                                                  <option>45 </option>
                                                  <option>60 </option>
                                                  <option>75 </option>
                                                  <option>90</option>
                                                  <option>105</option>
                                                  <option>120</option>
                                                </select>

                                            <div class="modal-footer">

                                                <button style="margin-left:auto;margin-right:auto" type="submit"  class="btn btn-success">Atender pedido</button>
                                                <button style="margin-left:auto;margin-right:auto" type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Cerrar</button>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                @endforeach

                </tbody>
            </table>




        </div>

    </div>

@endsection
