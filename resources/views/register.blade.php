@extends('layouts.appSimple')

@section('content')
<body class="bg-gradient-primary">
    <div class="container" style="margin-top: 150px;">
        <div class="card shadow-lg o-hidden border-0 my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-flex">
                        <div class="flex-grow-1 bg-register-image" style="background-image: url(&quot;assets/img/mecanico2.jpg&quot;);background-position: center;background-size: cover;"></div>
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h4 class="text-dark mb-4">Cree su cuenta!</h4>
                            </div>

                          
                            <form method="POST" action="/register" class="user">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input class="form-control form-control-user" type="text" id="nombre" name="nombre" placeholder="Nombre" value="{{old('nombre')}}" >
                                        @error('nombre')
                                        {{-- !!! @eze formatear el texto de error --}}
                                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                        @enderror
                                    </div>
                                   
                                    <div class="col-sm-6"><input class="form-control form-control-user" type="text" id="apellido"  name="apellido" placeholder="Apellido" value="{{old('apellido')}}"> 
                                        @error('apellido')
                                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <!-- Start: #adress --><input class="form-control form-control-user" type="text" id="direccion" name="direccion" placeholder="Dirección" value="{{old('direccion')}}">
                                        @error('direccion')
                                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                        @enderror
                                    </div>
                                    
                                    <div class="col-sm-6">
                                        <!-- Start: #phone --><input class="form-control form-control-user" type="number" id="telefono" name="telefono" placeholder="Teléfono" value="{{old('telefono')}}" >
                                        @error('telefono')
                                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                        @enderror
                                        <!-- End: #phone -->
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <!-- Start: #adress --><input class="form-control form-control-user" type="text" id="dni" name="dni" placeholder="DNI" value="{{old('dni')}}">
                                        @error('dni')
                                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                        @enderror
                                    </div>
                                    
                                    <div class="col-sm-6">
                                        <!-- Start: #phone --><input class="form-control form-control-user" type="text" id="legajo" name="legajo" placeholder="Legajo" value="{{old('legajo')}}" >
                                        @error('legajo')
                                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                        @enderror
                                        <!-- End: #phone -->
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input class="form-control form-control-user" type="email" id="email"  name="email" aria-describedby="emailHelp" placeholder="Mail" value="{{old('email')}}"  autocomplete="off"> 
                                    @error('email')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                    @enderror
                                </div>
                               
                               
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user" type="password" id="password" name="password" placeholder="Contraseña"  autocomplete="off">
                                        @error('password')
                                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                        @enderror
                                    </div>
                                   
                                    <div class="col-sm-6">
                                        <!-- Start: #nickname --><input class="form-control form-control-user" type="text" id="nickname" name="nickname" placeholder="Nickname" value="{{old('nickname')}}">
                                        @error('nickname')
                                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                        @enderror
                                        <!-- End: #nickname -->
                                    </div>

                                </div>
                            

                                <button class="btn btn-primary btn-block text-white btn-user" type="submit">Registrar usuario</button>
                                <!-- "swal('Register!');" -->
                                <hr>
                            
          
                            </form>
                            <div class="text-center"></div>
                            <div class="text-center"><a class="small" href="login">Ya tiene una cuenta? Ingrese aquí!</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection