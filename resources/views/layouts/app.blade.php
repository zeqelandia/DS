<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Infomec') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Template assets -->
    <link rel="stylesheet" href='/assets/bootstrap/css/bootstrap.min.css'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="/assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="/assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="/assets/css/common.css">
    <link rel="stylesheet" href="/assets/css/contextMenu.css">
    <link rel="shortcut icon" type="image/x-icon" href="logo.png" />
</head>
<body id="page-top">
    <div id="app">
        <div id="wrapper">
            <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
                <div class="container-fluid d-flex flex-column p-0">
                    <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                        <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
                        <div class="sidebar-brand-text mx-3"><span>InfoMec</span></div>
                    </a>
                    <hr class="sidebar-divider my-0">
                    <ul class="nav navbar-nav text-light" id="accordionSidebar">
                        <li class="nav-item" role="presentation"><a class="nav-link" href="/reparaciones"><i class="fas fa-tachometer-alt"></i><span>Reparaciones</span></a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="/stock"><i class="fas fa-list-alt"></i><span>Stock</span></a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="/vehiculos"><i class="fas fa-car"></i><span>Vehículos</span></a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="/clientes"><i class="fas fa-group"></i><span>Clientes</span></a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="/usuario"><i class="fas fa-user"></i><span>Usuario</span></a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="/cerrarSesion"><i class="fa fa-sign-out"></i><span>Cerrar Sesión</span></a></li>
                        <li class="nav-item" role="presentation"></li>
                    </ul>
                    <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
                </div>
            </nav>
            <div class="d-flex flex-column" id="content-wrapper">
                <div id="content">
                    <div class="container-fluid" style="padding-top: 18px;">
                        <div class="loading">Loading&#8230;</div>
                        @yield('content')
                    </div>
                </div>
                <nav id="context-menu" class="context-menu">
                    <ul class="context-menu__items">
                        <div id="tasks-repairs">
                            <li class="context-menu__item item-repair">
                                <a  id="btnGenerarComprobante" href="comprobante" class="context-menu__link" data-action="View"><i class="fa fa-download"></i> Generar comprobante</a>
                            </li>
                            <li class="context-menu__item item-repair">
                                <a id="btnCancelarReparacion" href="#" class="context-menu__link" data-action="Edit"><i class="fa fa-times"></i> Cancelar reparación</a>
                            </li>
                            <li class="context-menu__item item-repair">
                                <a  id="btnAgregarOrdenTrabajo" href="#" class="context-menu__link" data-action="Delete"><i class="fa fa-plus"></i> Agregar orden de trabajo</a>
                            </li>
                            <li class="context-menu__item item-repair">
                                <a id="btnVerOrdenesTrabajo" href="#" class="context-menu__link" data-action="Ver ordenes"><i class="fa fa-eye"></i> Ver órdenes de trabajo</a>
                            </li>
                        </div>
                        <div id="tasks-vehicles">
                            <li class="context-menu__item item-vehicle">
                                <a id="btnCambiarTitularidadVehiculo" class="context-menu__link" data-action="Edit"><i class="fa fa-refresh"></i> Cambiar titularidad de vehículo</a>
                            </li>
                        </div>
                        <div id="tasks-clientes">
                            <li class="context-menu__item item-cliente">
                                <a id="btnBorrarCliente" href="#" class="context-menu__link" data-action="Delete"><i class="fa fa-times"></i> Borrar cliente</a>
                            </li>
                            <li class="context-menu__item item-cliente">
                                <a id="btnModificarCliente" href="#" class="context-menu__link" data-action="Edit"><i class="fa fa-random"></i> Modificar cliente</a>
                            </li>
                        </div>
                        <div id="tasks-stock">
                            <li class="context-menu__item item-stock">
                                <a id="btnCargarStock" href="#" class="context-menu__link" data-action="Edit"><i class="fa fa-plus"></i> Cargar stock</a>
                            </li>
                            <li class="context-menu__item item-stock">
                                <a id="btnRealizarPedido" href="#" class="context-menu__link" data-action="Edit"><i class="fa fa-envelope-o"></i> Realizar pedido de pieza</a>
                            </li>
                        </div>
                    </ul>
                </nav>
                <footer class="sticky-footer">
                    <div class="container my-auto">
                        <div class="text-center my-auto copyright"><span>Copyright © InfoMec 2021</span></div>
                    </div>
                </footer>
            </div>     
        </div>
    </div>
    <a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
</body>
<!-- Template assets -->
<script src="/assets/js/jquery.min.js"></script>
<script src="/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="/assets/js/chart.min.js"></script>
<script src="/assets/js/bs-init.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
<script src="/assets/js/theme.js"></script>
<script src="/assets/js/sweetalert.min.js"></script>
<script src="/assets/js/common.js"></script>
<script src="/assets/js/contextMenu.js"></script>
</html>
