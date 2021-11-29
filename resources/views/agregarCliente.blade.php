@extends('layouts.app')

@section('content')
<h3 class="text-dark mb-4">Agregar nuevo cliente</h3>
<div class="card shadow">
    <div class="card-header d-flex justify-content-between align-items-center">
        <div class="row" style="width: 100%;">
            <div class="col d-xl-flex align-items-xl-center">
                <h6 class="text-primary font-weight-bold m-0">Nuevo cliente</h6>
            </div>
        </div>
    </div>
    <div class="card-body d-xl-flex justify-content-xl-center">
        <div class="col-lg-7">
            <div class="p-5">
                <form class="user" method="POST" action="/agregarCiente/agregar">
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input class="form-control form-control-user" type="text" id="nombre" placeholder="Nombre" name="nombre" required value="{{old('nombre')}}">
                            @error('nombre')
                            {{-- !!! @eze formatear el texto de error --}}
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                     <div class="col-sm-6">
                            <input class="form-control form-control-user" type="text" id="apellido" placeholder="Apellido" name="apellido" required value="{{old('apellido')}}"></div>
                            @error('apellido')
                            {{-- !!! @eze formatear el texto de error --}}
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input class="form-control form-control-user" type="text" id="dni" placeholder="DNI" name="dni" required value="{{old('dni')}}">
                            @error('dni')
                            {{-- !!! @eze formatear el texto de error --}}
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <input class="form-control form-control-user" type="number" id="telefono" placeholder="Teléfono" name="telefono" required value="{{old('telefono')}}">
                            @error('telefono')
                            {{-- !!! @eze formatear el texto de error --}}
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-user" type="email" id="email" aria-describedby="emailHelp" placeholder="Mail" name="mail" autocomplete="off" required value="{{old('mail')}}">
                        @error('mail')
                        {{-- !!! @eze formatear el texto de error --}}
                        <p class="text-red-500 text-xs mt-1" style="color:red!important;">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input class="form-control form-control-user" type="text" id="localidad" placeholder="Localidad" name="localidad" required value="{{old('localidad')}}" >
                            @error('localidad')
                            {{-- !!! @eze formatear el texto de error --}}
                            <p class="text-red-500 text-xs mt-1" style="color:red!important;">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                           <input class="form-control form-control-user" type="text" id="direccion" placeholder="Dirección" name="direccion" required value="{{old('direccion')}}">
                           @error('direccion')
                           {{-- !!! @eze formatear el texto de error --}}
                           <p class="text-red-500 text-xs mt-1" style="color:red!important;">{{$message}}</p>
                           @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            {{-- funcion con swal cancelarAgregarCliente() --}}
                            <button class="btn btn-primary btn-block text-white btn-user" type="button" style="background-color: rgb(223,78,104);" onclick=" window.location = '/clientes'">Cancelar</button>
                        </div>
                        <div class="col-sm-6">
                            <button id="btnGuardarCliente" class="btn btn-primary btn-block text-white btn-user" type="submit">Guardar cliente</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
