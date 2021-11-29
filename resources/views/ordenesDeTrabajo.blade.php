@extends('layouts.app')

@section('content')

<h3 class="text-dark mb-4">Órdenes de trabajo</h3>
<!-- Start: #reparacion -->
<div class="card shadow">
    <div class="card-body">
        <!-- Start: Reparacion-seleccionada -->
        <section>
            <!-- Start: header -->
            <article>
                <div class="row">
                    <div class="col" style="width: 20px;max-width: 65px;"><a class="btn btn-primary" role="button" data-toggle="tooltip" data-bs-tooltip="" href="\reparaciones" title="Volver a reparaciones"><i class="fa fa-arrow-left"></i></a></div>
                    <div class="col d-flex justify-content-xl-center align-items-xl-center">
                        <h3 class="text-center" style="font-size: 17px;margin-top: 0;font-weight: 700;margin-bottom: 0;">Usted ha seleccionado la siguiente reparación</h3>
                    </div>
                </div>
            </article>
            <!-- End: header -->
            <article>
                <div class="row" style="padding-left: 10px;margin-top: 15px;">
                    <div class="col" style="font-weight: 700;">
                        <p style="margin-bottom: 0;">Patente</p>
                    </div>
                    <div class="col" style="font-weight: 700;">
                        <p style="margin-bottom: 0;">Titular</p>
                    </div>
                    <div class="col" style="font-weight: 700;">
                        <p style="margin-bottom: 0;">Fecha ingreso</p>
                    </div>
                    <div class="col" style="font-weight: 700;">
                        <p style="margin-bottom: 0;">Estado</p>
                    </div>
                    <div class="col" style="font-weight: 700;">
                        <p style="margin-bottom: 0;">Fecha salida</p>
                    </div>
                    <div class="col" style="font-weight: 700;">
                        <p style="margin-bottom: 0;">Kilometraje</p>
                    </div>
                    <div class="col" style="font-weight: 700;">
                        <p style="margin-bottom: 0;">Motivo</p>
                    </div>
                </div>
                <div class="row" style="padding-left: 10px;">
                    <div class="col" style="font-weight: 400;">
                        <p style="margin-bottom: 0;">{{$reparacion->patente}}</p>
                    </div>
                    <div class="col" style="font-weight: 400;">
                        <p style="margin-bottom: 0;">{{$reparacion->cliente->apellido}} {{$reparacion->cliente->nombre}}</p>
                    </div>
                    <div class="col" style="font-weight: 400;">
                        <p style="margin-bottom: 0;"> {{date('d/m/y', strtotime($reparacion->fechaDeEntrada))}}</p>
                    </div>
                    <div class="col" style="font-weight: 400;">
                        <p style="margin-bottom: 0;">{{ucfirst($reparacion->estado)}}</p>
                    </div>
                    <div class="col" style="font-weight: 400;">
                        <p style="margin-bottom: 0;">
                            @isset($reparacion->fechaDeSalida)
                            {{date('d/m/y', strtotime($reparacion->fechaDeSalida))}} 
                            @else-@endisset</p>
                    </div>
                    <div class="col" style="font-weight: 400;">
                        <p style="margin-bottom: 0;">{{$reparacion->kilometraje}}</p>
                    </div>
                    <div class="col" style="font-weight: 400;">
                        <p style="margin-bottom: 0;">{{$reparacion->motivo}}</p>
                    </div>
                </div>
            </article>
        </section>
        <!-- End: Reparacion-seleccionada -->
    </div>
</div>
<!-- End: #reparacion -->
<!-- Start: #ordenDeTrabajo -->

@if (empty($ordenTrabajos))
<div class="card shadow" style="margin-top: 30px;">
    <div class="card-header align-items-center">
        <div class="row" style="width: 100%;">
            <div class="col d-xl-flex align-items-xl-center">
                <h6 class="text-primary d-xl-flex align-items-xl-center font-weight-bold m-0">Esta reparación no tiene ordenes de trabajo</h6>
            </div>

        </div>
    </div>
</div>   
@endif
@foreach ($ordenTrabajos as $ordenTrabajo)
<div class="card shadow" style="margin-top: 30px;">
    <div class="card-header align-items-center">
        <div class="row" style="width: 100%;">
            <div class="col d-xl-flex align-items-xl-center">
                <h6 class="text-primary d-xl-flex align-items-xl-center font-weight-bold m-0">Orden de trabajo {{$loop->index+1}}</h6>
            </div>
            @if ($ordenTrabajo->estado=="pendiente" )
            <div class="col d-xl-flex justify-content-xl-end">
                @if (!empty($ordenTrabajo->tareas))
                <button  id="btnAceptarOrdendeTrabajo" class="btn btn-primary" role="button" data-toggle="tooltip" data-bs-tooltip="" title="Confirmar esta orden de trabajo" style="background-color: rgb(78,223,84);" value="{{$ordenTrabajo->id}}" onclick="aceptarOrdenTrabajo(this)" ><i class="fa fa-check"></i></button>
                @endif
                <button class="btn btn-primary" data-toggle="tooltip" data-bs-tooltip="" type="button" style="margin-left: 10px;background-color: rgb(223,78,87);" title="Cancelar esta orden de trabajo" value="{{$ordenTrabajo->id}}" onclick="rechazarOrdenTrabajo(this)"><i class="fa fa-remove"></i></button>
            </div>
            @endif
        </div>
        <div class="row" style="width: 100%;">
            <div class="col">
                <div class="row">
                    <div class="col" style="width: 60px;max-width: 60px;min-width: 60px;">
                        <p style="margin-bottom: 0;font-weight: 700;width: 60px;">Estado:</p>
                    </div>
                    <div class="col" style="width: 110px;min-width: 110px;max-width: 110px;">
                        <p style="margin-bottom: 0;width: 90px;">{{ucfirst($ordenTrabajo->estado)}}</p>
                    </div>
                    <div class="col" style="width: 110px;max-width: 110px;">
                        <p style="margin-bottom: 0;font-weight: 700;width: 100px;">% de avance:</p>
                    </div>
                    <div class="col" style="width: 50px;max-width: 50px;">
                        <p style="margin-bottom: 0;width: 50px;">{{$ordenTrabajo->porcentajeAvance}}%</p>
                    </div>
                    <div class="col" style="max-width: 120px;">
                        <p style="margin-bottom: 0;font-weight: 700;width: 120px;">Horas totales:</p>
                    </div>
                    <div class="col">
                        <p style="margin-bottom: 0;width: 45px;">{{$ordenTrabajo->horasTotales}}H</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @foreach ($ordenTrabajo->tareas as $tarea)
    <div class="card-body" style="padding-top: 0;">
        <div class="card" style="margin-top: 15px;">
            <div class="card-header align-items-center">
                <div class="row" style="width: 100%;">
                    <div class="col d-xl-flex align-items-xl-center">
                        <h6 class="text-primary d-xl-flex align-items-xl-center font-weight-bold m-0">Tarea {{$loop->index+1}}</h6>
                    </div>
    
                    @if ($tarea->estado=='no realizado'  and $ordenTrabajo->estado!=="pendiente")
                    <div class="col d-xl-flex justify-content-xl-end">
                        <button id="'btnCompletarTarea" class="btn btn-primary" role="button" data-toggle="tooltip" data-bs-tooltip="" style="background-color: rgb(81,223,78);" title="Completar esta tarea" value="{{$tarea->id}}" onclick="completarTarea(this)"><i class="fa fa-check"></i></button>
                        <button class="btn btn-primary" data-toggle="tooltip" data-bs-tooltip="" type="button" style="margin-left: 10px;background-color: rgb(223,78,95);" title="Eliminar esta tarea" value="{{$tarea->id}}" onclick="cancelarTarea(this)"><i class="fa fa-remove"></i></button>
                
                    </div>
                    @endif
                </div>
            </div>
            <div class="card-body" style="padding-top: 0;padding-bottom: 0;">
                <!-- Start: #tarea -->
                <section>
                    <div class="row">
                        <div class="col">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Fecha</th>
                                            <th>Hora</th>
                                            <th>Estado</th>
                                            <th>Precio tarea</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                @isset($tarea->fechaHora)
                                                {{date('d/m/y', strtotime($tarea->fechaHora))}}
                                                @else -
                                                @endisset
                                        </td>
                                            <td>
                                                @isset($tarea->fechaHora)
                                                {{date('h:i', strtotime($tarea->fechaHora))}}
                                                @else -
                                                @endisset
                                            </td>
                                            <td>{{ucfirst($tarea->estado)}}</td>
                                            <td>{{$tarea->precio}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Acción</th>
                                            <th>Pieza</th>
                                            <th>Cantidad</th>
                                            <th>Precio pieza</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{$tarea->accion->nombre}}</td>
                                           
                                           
                                                
                                         
                                            <td>
                                                <div class="row" style="margin-left: 0;margin-right: 0;">
                                                    <div class="col" style="padding-left: 0;padding-right: 0;">
                                                        @foreach ($tarea->pieza as $pieza)
                                                        <p style="margin-bottom: 0;">{{$pieza->nombre}} {{$pieza->modelo}}</p>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="row" style="margin-left: 0;margin-right: 0;">
                                                    <div class="col" style="padding-left: 0;padding-right: 0;">
                                                        @foreach ($tarea->pieza as $pieza)
                                                        <p style="margin-bottom: 0;">{{$pieza->pivot->cantidad}}</p>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="row" style="margin-left: 0;margin-right: 0;">
                                                    <div class="col" style="padding-left: 0;padding-right: 0;">
                                                        @foreach ($tarea->pieza as $pieza)
                                                        <p style="margin-bottom: 0;">{{$pieza->pivot->precio}}</p>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </td>
                                         
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- End: #tarea -->
            </div>
           
        </div>
        

    </div>
    @endforeach
</div>
@endforeach

@endsection