@extends('layouts.app')

@section('content')
<h3 class="text-dark mb-4">Generar nueva orden de trabajo</h3>
<div class="card shadow">
    <div class="card-header d-flex justify-content-between align-items-center">
        <div class="row" style="width: 100%;">
            <div class="col d-xl-flex align-items-xl-center">
                <h6 id="OrdenTrabajo" value={{session()->get('id_ordenTrabajo')}} class="text-primary font-weight-bold m-0">Nueva orden de trabajo</h6>
            </div>
        </div>
    </div>
    <div class="card-body">
        <!-- Start: #reparacion -->
        <div class="card shadow">
            <div class="card-body">
                <!-- Start: Reparacion-seleccionada -->
                <section>
                    <!-- Start: header -->
                    <article>
                        <div class="row">
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
        <div class="container" style="width: 100%;min-width: 100%;padding-left: 0;padding-right: 0;min-height: 100%;height: 100%;max-height: 100%;background-color: rgba(255,0,0,0);margin-top: 20px;">
            <section>
                <!-- Start: #tareas -->
                <article>
                    <!-- Start: #title -->
                    <div class="row">
                        <div class="col">
                            <h3 class="text-center" style="font-size: 17px;font-weight: 700;">A continuación puede agregar las tareas a realizar para esta orden de trabajo</h3>
                        </div>
                    </div>
                    <!-- End: #title -->
            
                    @isset($tareas)

                    @foreach ($tareas as $tarea)
                        
                    <div class="row">
                        <div class="col" style="padding-right: 200px;padding-left: 200px;">
                            <div class="card" style="margin-top: 15px;">
                                <div class="card-header align-items-center">
                                    <div class="row" style="width: 100%;">
                                        <div class="col d-xl-flex align-items-xl-center">
                                            <h6 id='Tarea' class="text-primary d-xl-flex align-items-xl-center font-weight-bold m-0">Tarea {{$loop->index+1}}</h6>
                                        </div>
                                        <div class="col d-xl-flex justify-content-xl-end"><button onclick="quitarTarea(this);" class="btn btn-primary" id='quitarTarea' data-toggle="tooltip" data-bs-tooltip="" type="button" style="margin-left: 10px;background-color: rgb(223,78,95);" title="Quitar tarea" value={{$tarea->id}}><i class="fa fa-remove"></i></button></div>
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
                                                                <th>Acción</th>
                                                                <th>Pieza</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>{{$tarea->accion->nombre}}</td>
                                                                <td>
                                                                    <div class="row" style="margin-left: 0;margin-right: 0;">
                                                                        <div class="col" style="padding-left: 0;padding-right: 0;">
                                                                            @foreach ($tarea->pieza as $pieza)
                                                                            <p style="margin-bottom: 0;">{{$pieza->nombre}} {{$pieza->modelo}}</p><br>
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
                    </div>
                    @endforeach
                    @endisset
                    <div class="row" style="margin-top: 15px;">
                        <div class="col d-flex justify-content-center align-items-center align-content-center align-self-center">
                            <button id="btnAgregarTarea" class="btn btn-primary d-flex justify-content-center align-self-center" role="button" data-toggle="tooltip" data-bs-tooltip="" style="width: 140px;" title="Agregar nueva tarea para esta orden de trabajo" onclick="agregarTarea()">Agregar Tarea</button>
                        </div>
                    </div>
                </article>
                <!-- End: #tareas -->
                <!-- Start: botones -->
                <article>
                    <div class="row">
                        <div class="col d-flex justify-content-center align-items-center align-content-center align-self-center">
                            <a id="btnCancelarGenerarOrden" class="btn btn-primary text-center d-flex justify-content-center align-self-center" role="button" data-toggle="tooltip" data-bs-tooltip="" style="width: 140px;background-color: rgb(223,78,95);color: rgb(255,255,255);" href="/reparaciones/cancelarOrdenTrabajo" title="Cancelar y volver a reparaciones">Cancelar</a>
                        </div>
                        <div class="col d-flex justify-content-center align-items-center">
                            <button id='btnGenerarOrden' title="Generar orden de trabajo" class="btn btn-primary text-center d-flex justify-content-center align-self-center"  data-toggle="tooltip" data-bs-tooltip="" style="width: 140px;background-color: rgb(78,115,223);" onclick="generarOrden()" >Generar orden</button>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col d-flex justify-content-center align-items-center">
                            <p id='errorFaltaTarea' hidden>Agregar al menos 1 tarea</p>
                        </div>

                        <div class="col d-flex justify-content-center align-items-center align-content-center align-self-center">
                        </div>
                    </div>
                </article>
                <!-- End: botones -->
            </section>
        </div>
    </div>
</div>
<script src="/assets/js/generarOrdenDeTrabajo.js"></script>
@endsection