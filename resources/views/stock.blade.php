@extends('layouts.app')

@section('content')
<h3 class="text-dark mb-4">Stock</h3>
<div class="card shadow">
<div class="card-header d-flex justify-content-between align-items-center">
    <div class="row" style="width: 100%;">
        <div class="col d-xl-flex align-items-xl-center">
            <h6 class="text-primary font-weight-bold m-0">Stock</h6>
        </div>
    </div>
</div>
<div class="card-body">
    <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
        <table class="table my-0" id="dataTable">
            <thead>
                <tr>
                    <th>Pieza</th>
                    <th>Fabricante</th>
                    <th style="width: 180px;">Modelo</th>
                    <th>Precio</th>
                    <th style="padding-right: 0;width: 90px;">Cantidad</th>
                    <th>ID</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($piezas as $pieza)

                <tr class="t-row task task-stock"  data-id={{$pieza->id}}>
                    <td>{{$pieza->nombre}}</td>
                    <td>{{$pieza->fabricante->nombre}}</td>
                    <td>{{$pieza->modelo}}</td>
                    <td>{{$pieza->precio}}</td>
                    <td>{{$pieza->cantidad}}</td>
                    <td>{{$pieza->id}}</td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-12 d-flex justify-content-center pt-2">
            {{$piezas->links()}}
        </div>
    </div>         
</div>
</div>
@endsection