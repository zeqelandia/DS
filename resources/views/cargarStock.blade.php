@extends('layouts.app')

@section('content')
<h3 class="text-dark mb-4">Cargar stock</h3>
<div class="card shadow">
    <div class="card-header d-flex justify-content-between align-items-center">
        <div class="row" style="width: 100%;">
            <div class="col d-xl-flex align-items-xl-center">
                <h6 class="text-primary font-weight-bold m-0">Stock</h6>
            </div>
        </div>
    </div>
    <div class="card-body d-xl-flex flex-column justify-content-xl-center">
        <div class="row">
            <div class="col">
                <!-- Start: #reparacion -->
                <div class="card shadow">
                    <div class="card-body">
                        <!-- Start: Reparacion-seleccionada -->
                        <section>

                            @if (session()->has('errorId'))
                            <p>{{session()->get('errorId')}}</p>
                            @endif

                            <!-- Start: header -->
                            <article>
                                <div class="row">
                                    <div class="col d-flex justify-content-xl-center align-items-xl-center">
                                        <h3 class="text-center" style="font-size: 17px;margin-top: 0;font-weight: 700;margin-bottom: 0;">Usted ha seleccionado la siguiente pieza</h3>
                                    </div>
                                </div>
                            </article>
                            <!-- End: header -->
                            <article>
                                <div class="row" style="padding-left: 10px;margin-top: 15px;">
                                    <div class="col" style="font-weight: 700;">
                                        <p style="margin-bottom: 0;">Nombre</p>
                                    </div>
                                    <div class="col" style="font-weight: 700;">
                                        <p style="margin-bottom: 0;">Fabricante</p>
                                    </div>
                                    <div class="col" style="font-weight: 700;">
                                        <p style="margin-bottom: 0;">Modelo</p>
                                    </div>
                                    <div class="col" style="font-weight: 700;">
                                        <p style="margin-bottom: 0;">Precio Actual</p>
                                    </div>
                                    <div class="col" style="font-weight: 700;">
                                        <p style="margin-bottom: 0;">Cantidad Actual</p>
                                    </div>
                                </div>
                                <div class="row" style="padding-left: 10px;">
                                    <div class="col" style="font-weight: 400;">
                                        <p style="margin-bottom: 0;">{{$pieza->nombre}}</p>
                                    </div>
                                    <div class="col" style="font-weight: 400;">
                                        <p style="margin-bottom: 0;">{{$pieza->fabricante->nombre}}</p>
                                    </div>
                                    <div class="col" style="font-weight: 400;">
                                        <p style="margin-bottom: 0;">{{$pieza->modelo}}</p>
                                    </div>
                                    <div class="col" style="font-weight: 400;">
                                        <p style="margin-bottom: 0;">{{$pieza->precio}}</p>
                                    </div>
                                    <div class="col" style="font-weight: 400;">
                                        <p style="margin-bottom: 0;">{{$pieza->cantidad}}</p>
                                    </div>
                                </div>
                            </article>
                        </section>
                        <!-- End: Reparacion-seleccionada -->
                    </div>
                </div>
                <!-- End: #reparacion -->
            </div>
        </div>
        <div class="row" style="margin-top: 20px;">
            <div class="col">
                <div class="p-5">
                    <form class="user" method="POST" action="/cargarStock/guardar">
                        @csrf
                        <div class="form-group row">


                            <div class="col-sm-6 d-xl-flex justify-content-xl-start align-items-xl-center mb-3 mb-sm-0" style="max-width: 20%;">
                                <p style="margin-bottom: 0;font-weight: 700;">Cantidad a agregar</p>
                            </div>

                            <div class="col-sm-6" style="max-width: 80%;width: 85%;min-width: 80%;">
                                <input class="form-control form-control-user" type="number" id="cantidad" min='0' placeholder="Cantidad a agregar" name="cantidad">
                                @error('cantidad')
                                {{-- !!! @eze formatear el texto de error --}}
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>


                        </div>

                        <div class="form-group row">


                            <div class="col-sm-6 d-xl-flex justify-content-xl-start align-items-xl-center mb-3 mb-sm-0" style="max-width: 20%;">
                                <p style="margin-bottom: 0;font-weight: 700;">Nuevo precio</p>
                            </div>

                            <div class="col-sm-6" style="max-width: 80%;width: 85%;min-width: 80%;">
                                <input class="form-control form-control-user" type="number" id="precio" min='0' placeholder="Nuevo precio" name="precio" value="{{$pieza->precio}}">
                                @error('precio')
                                {{-- !!! @eze formatear el texto de error --}}
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>


                        </div>


                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <button id="btnCancelarGuardarStock" class="btn btn-primary btn-block text-white btn-user" type="button" style="background-color: rgb(223,78,104);" onclick=" window.location = '/stock'">Cancelar</button>
                            </div>
                            <div class="col-sm-6">
                                <button id="btnGuardarStock" class="btn btn-primary btn-block text-white btn-user" type="submit">Cargar stock</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection