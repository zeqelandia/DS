@extends('layouts.app')

@section('content')
<div class="d-sm-flex justify-content-between align-items-center mb-4" style="margin-bottom: 0px;">
    <h3 class="text-dark mb-0">Reporte de reparaciones</h3>
</div>
<div class="d-sm-flex justify-content-between align-items-center mb-4" style="margin-bottom: 0px;">
    <h6 class="text-dark mb-0">Datos correspondiente a reparaciones "@estadoReparación" cargadas entre @fechaDesde a @fechaHasta</h6>
</div>
<!-- Start: #reparacionesCard -->
<div class="row">
    <div class="col">
        <div class="card shadow mb-4" style="width: 100%;max-width: 100%;min-width: 100%;">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h6 class="text-primary font-weight-bold m-0">Reparaciones</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive table mt-2" id="dataTable-2" role="grid" aria-describedby="dataTable_info" style="margin-bottom: 0;">
                    <table class="table my-0" id="dataTable">
                        <thead>
                            <tr>
                                <th>Patente</th>
                                <th>Cliente</th>
                                <th style="width: 180px;">Fecha ingreso</th>
                                <th>Estado</th>
                                <th style="padding-right: 0;width: 90px;">Kilometraje</th>
                                <th>Fecha salida</th>
                                <th>Motivo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>ABC-123</td>
                                <td>Elon Musk</td>
                                <td>21/09/2021</td>
                                <td>En proceso</td>
                                <td style="padding-right: 0;">54000</td>
                                <td>-</td>
                                <td>Hace "rututu pum pum"</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr></tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End: #reparacionesCard -->
<!-- Start: #accionesCard -->
<div class="row">
    <div class="col">
        <div class="card shadow mb-4" style="width: 100%;max-width: 100%;min-width: 100%;">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h6 class="text-primary font-weight-bold m-0">Acciones</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive table mt-2" id="dataTable-3" role="grid" aria-describedby="dataTable_info" style="margin-bottom: 0;">
                    <table class="table my-0" id="dataTable">
                        <thead>
                            <tr>
                                <th style="width: 85%;">Nombre</th>
                                <th style="width: 15%;">Cantidad realizada</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Cambio de aceite</td>
                                <td>22</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr></tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End: #accionesCard -->
<!-- Start: #piezasCard -->
<div class="row">
    <div class="col">
        <div class="card shadow mb-4" style="width: 100%;max-width: 100%;min-width: 100%;">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h6 class="text-primary font-weight-bold m-0">Piezas</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive table mt-2" id="dataTable-1" role="grid" aria-describedby="dataTable_info">
                    <table class="table my-0" id="dataTable">
                        <thead>
                            <tr>
                                <th style="width: 30%;">Pieza</th>
                                <th style="width: 30%;">Fabricante</th>
                                <th style="width: 22%;">Modelo</th>
                                <th style="width: 6%;">Precio</th>
                                <th style="padding-right: 0;width: 12%;">Cantidad utilizada</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Cubierta</td>
                                <td>Pirelli</td>
                                <td>C90</td>
                                <td>9300</td>
                                <td style="padding-right: 0;">12</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr></tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End: #piezasCard -->
@endsection