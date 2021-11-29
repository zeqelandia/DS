<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Models\Pieza;
use App\Mail\TestMail;


class PiezaController extends Controller
{
    public function obtenerPiezas()
    {
        return view('stock', ['piezas' => Pieza::paginate(7)]);
    }

    public function precioPieza(Request $request)
    {
        if ($request->has('_token')) {
            $precio = Pieza::where('id',$request->id)->get('precio');

             return  response()->json($precio);
        }
    
    }

    public function realizarpedidoForm($id)
    {
        session()->flash('idPieza',$id);
        $pieza= Pieza::where('id',$id)->first();
        return view('realizarPedido',['pieza'=>$pieza]);
    }

    public function enviarPedido()
    {
        $id=session()->get('idPieza');
        $pieza=Pieza::where('id',$id)->first();
        if($pieza!=null){
            $atributos=request()->validate([
                'cantidad'=> 'required|integer|min:1',
            ]);

            $datos =[ 
                'titulo'=> "[INFOMEC]: Pedido de piezas" ,
                'body'=> "Se desea realizar el siguiente pedido: ".$atributos['cantidad']." unidades de: ". $pieza->nombre. " modelo ". $pieza->modelo,
            ];

            $mail=$pieza->fabricante->mail;

            Mail::to($mail)->send(new TestMail($datos));

            return redirect('stock');
    
        }
        return back()->with('errorId','Hubo un error por favor reintente');
    }

    public function cargarStockForm($id)
    {
        session()->flash('idPieza',$id);
        $pieza= Pieza::where('id',$id)->first();
        return view('cargarStock',['pieza'=>$pieza]);
    }

    public function guardarStock()
    {
        $id=session()->get('idPieza');
        $pieza=Pieza::where('id',$id)->first();
       
        if($pieza!=null){
            $atributos=request()->validate([
                'cantidad'=> 'required|integer|min:0',
                'precio'=> 'required|numeric',
            ]);

            $pieza->cantidad=$atributos['cantidad']+$pieza->cantidad;
            $pieza->precio=$atributos['precio'];

            $pieza->save();

            return redirect('stock');
    
        }
        return back()->with('errorId','Hubo un error por favor reintente');
    }
}
