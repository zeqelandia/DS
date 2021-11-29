@extends('layouts.app')

@section('content')
<h3 class="text-dark mb-4">Modificar cliente</h3>
<div class="card shadow">
    <div class="card-header d-flex justify-content-between align-items-center">
        <div class="row" style="width: 100%;">
            <div class="col d-xl-flex align-items-xl-center">
                <h6 class="text-primary font-weight-bold m-0">Cliente</h6>
            </div>
        </div>
    </div>
    <div class="card-body d-xl-flex justify-content-xl-center">
        <div class="col-lg-7">
            <div class="p-5">
            @if (session()->has('errorId'))
                <p  class="text-red-500 text-xs mt-1">{{session()->get('errorId')}}</p>
            @endif
                
         
        
                <form  method="POST"  action="/cliente/modificar/guardar">
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input class="form-control form-control-user" type="text" id="nombre" placeholder="Nombre" name="nombre" value={{empty($cliente->nombre) ? old('nombre'): $cliente->nombre }}>
                            @error('nombre')
                            {{-- !!! @eze formatear el texto de error --}}
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="col-sm-6">
                            <input class="form-control form-control-user" type="text" id="apellido" placeholder="Apellido" name="apellido" value={{empty($cliente->apellido) ? old('apellido'): $cliente->apellido }}>
                            @error('apellido')
                            {{-- !!! @eze formatear el texto de error --}}
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                        <input class="form-control form-control-user" type="text" id="dni" placeholder="DNI" name="dni" disabled value={{empty($cliente->dni) ? old('dni'): $cliente->dni }}>
                        </div>
                        <div class="col-sm-6">
                            <input class="form-control form-control-user" type="text" id="telefono" placeholder="Teléfono" name="telefono" value={{empty($cliente->telefono) ? old('telefono'): $cliente->telefono }}>
                            @error('dni')
                            {{-- !!! @eze formatear el texto de error --}}
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <input class="form-control form-control-user" type="email" id="email"  placeholder="Mail" name="mail" autocomplete="off" value={{empty($cliente->mail) ? old('mail'): $cliente->mail }}>
                        @error('mail')
                        {{-- !!! @eze formatear el texto de error --}}
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input class="form-control form-control-user" type="text" id="localidad" placeholder="Localidad" name="localidad" autocomplete="off" value={{empty($cliente->localidad) ? old('localidad'): $cliente->localidad }}>
                            @error('localidad')
                            {{-- !!! @eze formatear el texto de error --}}
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <input class="form-control form-control-user" type="text" id="direccion" placeholder="Dirección" name="direccion" value={{empty($cliente->direccion) ? old('direccion'): $cliente->direccion }}>
                            @error('direccion')
                            {{-- !!! @eze formatear el texto de error --}}
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div id="btnCancelarModificarCliente" class="col-sm-6 mb-3 mb-sm-0"><button class="btn btn-primary btn-block text-white btn-user" type="button" style="background-color: rgb(223,78,104);" onclick=" window.location = '/clientes'">Cancelar</button></div>
                        <div id="btnModificarClienteGuardar" class="col-sm-6"><button class="btn btn-primary btn-block text-white btn-user" type="submit">Guardar cambios</button></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
