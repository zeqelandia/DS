@extends('layouts.app')

@section('content')
<div class="d-flex flex-column" id="content-wrapper">
    <div id="content">
        <div class="container-fluid" style="padding-top: 18px;">
            <h3 class="text-dark mb-4">Usuario</h3>
            <div class="card shadow">
                <div class="card-body d-xl-flex justify-content-xl-center">
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h4 class="text-dark mb-4">Bienvenido, {{auth()->user()->nickname}}</h4>
                            </div>
                            <form class="user" method="POST" action="/modificarUsuario">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user" type="text" id="nombre" placeholder="Nombre" name="nombre" value="{{auth()->user()->nombre}}">
                                       
                                        {{-- !!! @eze formatear el texto de error y revisar que no se rompa todo --}}
                                        @error('nombre')
                                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <div class="col-sm-6"><input class="form-control form-control-user" type="text" id="apellido" placeholder="Apellido" name="apellido" value="{{auth()->user()->apellido}}">
                                    @error('apellido')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                    @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <!-- Start: #adress --><input class="form-control form-control-user" type="text" id="direccion" placeholder="Dirección" name="direccion" value="{{auth()->user()->direccion}}">
                                        <!-- End: #adress -->
                                        @error('direccion')
                                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- Start: #phone --><input class="form-control form-control-user" type="text" id="telefono" placeholder="Teléfono" name="telefono" value="{{auth()->user()->telefono}}">
                                        @error('telefono')
                                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group"><input class="form-control form-control-user" type="email" id="email"  placeholder="Mail" name="email" value="{{auth()->user()->email}}">
                                    @error('email')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user" type="password" id="password" placeholder="Contraseña" name="password" disabled >
                                        @error('password')
                                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- Start: #nickname --><input class="form-control form-control-user" type="text" id="nickname" placeholder="Nickname" name="nickname" disabled value="{{auth()->user()->nickname}}">
                                        @error('nickname')
                                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0"><button class="btn btn-primary btn-block text-white btn-user" type="submit" style="background-color: rgb(223,78,104);">Borrar usuario</button></div>
                                    <div class="col-sm-6"><button class="btn btn-primary btn-block text-white btn-user" type="submit">Guardar cambios</button></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection