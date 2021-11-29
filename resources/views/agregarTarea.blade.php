@extends('layouts.app')

@section('content')
<h3 class="text-dark mb-4">Agregar nueva tarea a la Orden de trabajo</h3>
<div id='OrdenTrabajo' value={{session()->get('id_ordenTrabajo')}}></div>
<div class="card shadow">
    <div class="card-header d-flex justify-content-between align-items-center">
        <div class="row" style="width: 100%;">
            <div class="col d-xl-flex align-items-xl-center">
                <h6 class="text-primary font-weight-bold m-0">Nueva tarea</h6>
            </div>
        </div>
    </div>
    
   
    <div class="card-body">
        <form method="POST" action="/agregarTarea/form" > 
        @csrf
            <div class="container" style="width: 100%;min-width: 100%;padding-left: 0;padding-right: 0;min-height: 100%;height: 100%;max-height: 100%;background-color: rgba(255,0,0,0);">
                <section>
                    <!-- Start: #accion -->
                    <article style="padding-right: 200px;padding-left: 200px;">
                       
                        
                        <h1 class="text-center" style="font-size: 17px;margin-top: 20px;font-weight: 700;">Seleccione una acción</h1>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr></tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="font-weight: 700;">Acción</td>
                                        <td>
                                            <select name="acciones" id="acciones" class="form-control" required>
                                                <option value='0' selected disabled hidden>-</option>
                                                @foreach ($acciones as $accion)
                                                <option id='doption' value="{{$accion->id}}" >{{$accion->nombre}}</option>
                                                @endforeach
                                            </select>
                                            {{-- <div class="dropdown"><button class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button" style="width: 100%;">Acciones</button>
                                                <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="#">First Item</a>
                                                <a class="dropdown-item" role="presentation" href="#">Second Item</a>
                                                <a class="dropdown-item" role="presentation" href="#">Third Item</a></div>
                                            </div> --}}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </article>
                    <!-- End: #accion -->
                    <!-- Start: #piezas -->
                    <article style="padding-right: 200px;padding-left: 200px;">
                        <h3 class="text-center" style="font-size: 17px;font-weight: 700;">Seleccione las piezas a utilizar e ingrese el precio de la misma</h3>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Pieza</th>
                                        <th style="width: 100px;">Precio</th>
                                        <th style="width: 40px;">Cantidad</th>
                                        <th style="width: 30px;">Agregar</th>
                                    </tr>
                                    <tr>
                                        <th>
                                            <select name="piezas" id="piezasListado" class="form-control" onchange="obtenerPrecio()" required>
                                                <option value='0' selected disabled hidden>-</option>
                                                @foreach ($piezas as $pieza)
                                                <option id='doption' value="{{$pieza->id}}" >{{$pieza->nombre}} - {{$pieza->modelo}}</option>
                                                @endforeach
                                            </select>
                                            {{-- <div class="dropdown"><button class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button" style="width: 100%;">Piezas</button>
                                                <div class="dropdown-menu" role="menu"><a id="piezaDropdown" class="dropdown-item" role="presentation" href="#">First Item</a><a class="dropdown-item" role="presentation" href="#">Second Item</a><a class="dropdown-item" role="presentation" href="#">Third Item</a></div>
                                            </div> --}}
                                        </th>
                                        <th><input name='precio' id="piezaPrecio" type="number" min="1" style="width: 100px;" value="" disabled></th>
                                        <th><input name='cantidad' id="piezaCantidad" type="number" min="1" style="width: 70px;" form></th>
                                        <th>
                                            <button id="btnAgregarPieza" class="btn btn-primary" role="button" type="button" data-toggle="tooltip" data-bs-tooltip="" style="margin-left: 10px;background-color: rgb(116,223,78);" title="Agregar pieza"><i class="fa fa-plus"></i></button>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="piezaListado">
                                </tbody>
                            </table>
                        </div>
                    </article>
                    <!-- End: #piezas -->
                    <!-- Start: botones -->
                    <article>
                        <div class="row">
                            <div class="col d-flex justify-content-center align-items-center align-content-center align-self-center">
                                <button id="btnCancelarAgregarTarea" type="button" class="btn btn-primary text-center d-flex justify-content-center align-self-center" role="button" data-toggle="tooltip" data-bs-tooltip="" style="width: 140px;background-color: rgb(223,78,95);" title="Cancelar y volver a la orden de trabajo">
                                    Cancelar</button>
                            </div>
                            <div class="col d-flex justify-content-center align-content-center">
                                <button class="btn btn-primary d-flex justify-content-center align-self-center"  data-toggle="tooltip" data-bs-tooltip="" style="width: 140px;" title="Agregar tarea" onclick="submit()"  id="AgregarTarea" disabled>
                                    Agregar tarea</button>
                            </div>
                        </div>
                    </article>
            <input name='ordenTrabajo' value={{session()->get('id_ordenTrabajo')}} id='ordenTrabajo' hidden readonly>
        </form>
            <!-- End: botones -->
            </section>
    </div>
</div>
<script src="/assets/js/agregarTarea.js"></script>
@endsection