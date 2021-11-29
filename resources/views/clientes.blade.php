@extends('layouts.app')

@section('content')
<h3 class="text-dark mb-4">Clientes</h3>
<div class="card shadow">
    <div class="card-header d-flex justify-content-between align-items-center">
        <div class="row" style="width: 100%;">
            <div class="col d-xl-flex align-items-xl-center">
                <h6 class="text-primary font-weight-bold m-0">Clientes</h6>
            </div>
            <div class="col d-xl-flex justify-content-xl-end">
                <button id="btnAgregarCliente" class="btn btn-primary" role="button" data-toggle="tooltip" data-bs-tooltip="" style="margin-left: 10px;background-color: rgb(116,223,78);" title="Nuevo cliente"><i class="fa fa-plus"></i></button>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
            <table class="table my-0" id="dataTable">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>DNI</th>
                        <th>Teléfono</th>
                        <th>Localidad</th>
                        <th>Dirección</th>
                        <th>Mail</th>
                    </tr>
                </thead>
                <tbody id="clientes">
                    <script src="/assets/js/jquery.min.js"></script>
                    <script src="/assets/js/Cliente.js"></script>
                    <script src="/assets/js/clientes.js" type="module"></script>
                    <script src="/assets/js/common.js"></script>
                    @foreach ($clientes as $cliente)
                        <tr class="t-row task task-cliente" data-id={{$cliente->id}} >
                            <td>{{$cliente->nombre}}</td>
                            <td>{{$cliente->apellido}}</td>
                            <td>{{$cliente->dni}}</td>
                            <td>{{$cliente->telefono}}</td>
                            <td>{{$cliente->localidad}}</td>
                            <td>{{$cliente->direccion}}</td>
                            <td>{{$cliente->mail}}</td>
                        </tr>
                    @endforeach 
                    {{-- <script>
                        let clientes = [];
                        let clnt;
                        loadingScreen(true);
                        $.ajax({
                            url: "/clientesAjax",
                            method: 'get',
                            success: function(result){
                                loadingScreen(false);
                                for (const cliente of result.clientes) {
                                    clnt = new Cliente(cliente);
                                    clientes.push(clnt);
                                    document.getElementById("clientes").appendChild(clnt.getElement());
                                }
                            }
                        });
                        turnListHover();
                        loadingScreen(false);
                    </script> --}}
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection