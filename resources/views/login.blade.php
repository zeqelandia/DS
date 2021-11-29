@extends('layouts.appSimple')

@section('content')
<body class="bg-gradient-primary">
    <div class="container" style="margin-top: 100px;">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-flex">
                                <div class="flex-grow-1 bg-login-image" style="background-image: url(&quot;assets/img/mecanico.jpg&quot;);"></div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h4 class="text-dark mb-4">Bienvenido devuelta!</h4>
                                        
                                        {{-- Ver que hacer... cuando lo crea al usaaurio lo manda aca y aparece ese mensaje... hay que foramtearlo --}}
                                        {{-- El mensaje puede ser de exito de registro y que se logee, o que cerrro sesion --}}
                                        @if(session()->has('mensajeUsuario'))
                                        <p>{{ session('mensajeUsuario') }}</p>
                                        @endif

                                    </div>
                                    <form method="POST" action="/login" class="user">
                                        @csrf
                                        <div class="form-group"><input class="form-control form-control-user" type="nickname" id="nickname" placeholder="Nickname" name="nickname">
                                        </div>

                                        <div class="form-group"><input class="form-control form-control-user" type="password" id="password" placeholder="Contraseña" name="password">
                                      
                                            {{-- Formatear --}}
                                            @error('nickname')
                                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                            @enderror
                                        </div>

                                        <div class="form-group d-flex justify-content-center"><button  class="btn btn-primary btn-block text-white btn-user" type="submit" style="width: 50%;">Acceder</button></div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small"></div>
                                        </div>
                                        <hr>
                                    </form>
                                    <div class="text-center"></div>
                                    <div class="text-center"><a class="small" href="register">Cree una cuenta!</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
