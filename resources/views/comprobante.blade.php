@extends('layouts.appComprobante')

@section('content')     
<h3 class="text-center text-dark mb-1" style="padding-top: 20px;background-color: #ffffff;">COMPROBANTE DE REPARACIÓN</h3>
<!-- End: #cnt-header -->
<!-- Start: #cnt-client -->
<div class="container" style="width: 100%;max-width: 100%;background-color: #ffffff;">
    <div class="row">
        <!-- Start: #client -->
        <div class="col">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Datos del cliente</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Nombre</td>
                            <td>{{$reparacion[0]->cliente->nombre}}</td>
                        </tr>
                        <tr>
                            <td>Apellido</td>
                            <td>{{$reparacion[0]->cliente->apellido}} </td>
                        </tr>
                        <tr>
                            <td>DNI</td>
                            <td>{{$reparacion[0]->cliente->dni}}</td>
                        </tr>
                        <tr>
                            <td>Patente</td>
                            <td>{{$reparacion[0]->patente}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- End: #client -->
        <!-- Start: #shop -->
        <div class="col" style="background-color: #ffffff;">
            <h3 class="text-center" style="padding-top: 9px;">INFOMEC</h3>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>De entrada</td>
                            <td>{{date('d/m/y', strtotime($reparacion[0]->fechaDeEntrada))}}</td>
                        </tr>
                        <tr>
                            <td>De salida</td>
                            <td>{{date('d/m/y', strtotime($reparacion[0]->fechaDeSalida))}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- End: #shop -->
    </div>
</div>
<!-- End: #cnt-client -->
<!-- Start: #details -->
<div class="container" style="width: 100%;max-width: 100%;">
    <h4 class="text-center" style="padding-top: 30px;">DETALLE</h4>
    <!-- Start: #tarea1 -->
    @foreach ($tareas as $tarea)
    <div class="row" style="border-bottom: 1px solid black;">
        <!-- Start: #tarea -->
        <div class="col">
            <p>Tarea {{$loop->index+1}}</p>
        </div>
        <!-- End: #tarea -->
        <!-- Start: #detalle-tarea -->
        <div class="col">
            <!-- Start: #accion -->
            <div class="row">
                <div class="col">
                    <div class="row">
                        <div class="col" style="width: 20%;max-width: 20%;">
                            <p style="font-weight: 700;">Acción:</p>
                        </div>
                        <div class="col">
                            <p style="font-weight: 400;">{{$tarea->accion->nombre}} (${{$tarea->accion->precio}})</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End: #accion -->
            <!-- Start: #piezas -->
            <div class="row">
                <div class="col" style="width: 20%;max-width: 20%;">
                    <p style="font-weight: 700;">Piezas:</p>
                </div>
           
                <div class="col">
                    @foreach ($tarea->pieza as $pieza)
                    <p style="font-weight: 400;">{{$pieza->nombre.' '.$pieza->modelo.' x'.$pieza->pivot->cantidad. "($".$pieza->pivot->precio.")"}}</p><br>
                    @endforeach
                </div>
            </div>
 
            <!-- End: #piezas -->
            <!-- Start: #subtotal -->
            <div class="row">
                <div class="col" style="width: 20%;max-width: 20%;">
                    <p style="font-weight: 700;">Subtotal:</p>
                </div>
                <div class="col">
                    <p style="font-weight: 400;">${{$tarea->precio}}</p>
                </div>
            </div>
            <!-- End: #subtotal -->
        </div>
        <!-- End: #detalle-tarea -->
    </div>
    @endforeach
    <!-- End: #tarea1 -->
    <!-- Start: #tarea2 -->
    {{-- <div class="row" style="border-bottom: 1px solid black;">
        <!-- Start: #tarea -->
        <div class="col">
            <p>Tarea 2</p>
        </div>
        <!-- End: #tarea -->
        <!-- Start: #detalle-tarea -->
        <div class="col">
            <!-- Start: #accion -->
            <div class="row">
                <div class="col">
                    <div class="row">
                        <div class="col" style="width: 20%;max-width: 20%;">
                            <p style="font-weight: 700;">Acción:</p>
                        </div>
                        <div class="col">
                            <p style="font-weight: 400;">Cambio de cubierta ($500)</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End: #accion -->
            <!-- Start: #piezas -->
            <div class="row">
                <div class="col" style="width: 20%;max-width: 20%;">
                    <p style="font-weight: 700;">Piezas:</p>
                </div>
                <div class="col">
                    <p style="font-weight: 400;">Cubierta Pirelli C90 x1($9300)</p>
                </div>
            </div>
            <!-- End: #piezas -->
            <!-- Start: #subtotal -->
            <div class="row">
                <div class="col" style="width: 20%;max-width: 20%;">
                    <p style="font-weight: 700;">Subtotal:</p>
                </div>
                <div class="col">
                    <p style="font-weight: 400;">$9800</p>
                </div>
            </div>
            <!-- End: #subtotal -->
        </div>
        <!-- End: #detalle-tarea --> --}}
    </div>
    <!-- End: #tarea2 -->
    <!-- Start: #total -->
    <div class="row">
        <!-- Start: #empty -->
        <div class="col"></div>
        <!-- End: #empty -->
        <!-- Start: #total-lbl -->
        <div class="col">
            <div class="row">
                <div class="col" style="width: 20%;max-width: 20%;">
                    <p style="font-weight: 700;">Total:</p>
                </div>
                <div class="col">
                    <p>${{$totalprecio}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col" style="width: 20%;max-width: 20%;">
                    <p style="font-weight: 700;">Tiempo:</p>
                </div>
                <div class="col">
                    <p>{{$totalHoras}}H</p>
                </div>
            </div>
        </div>
        <!-- End: #total-lbl -->
    </div>
    <!-- End: #total -->
</div>
@endsection