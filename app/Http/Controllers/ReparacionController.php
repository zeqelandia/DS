<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reparacion;
use App\Models\Cliente;

class ReparacionController extends Controller
{
    public function obtenerReparaciones()
    {
        return view('reparaciones', ['reparaciones' => Reparacion::latest('fechaDeEntrada')->paginate(7)]);
    }

    public function formGenerarReparacion()
    {
        return view('generarReparacion', ['clientes' => Cliente::all()]);
    }

    public function crearReparacion(Request $request)
    {
        $fechaActual=now()->format('Y-m-d');

        $reparacion= new Reparacion;
        $reparacion->fechaDeEntrada=$fechaActual;
        $reparacion->motivo=$request->motivo;
        $reparacion->kilometraje=$request->kilometraje;
        $reparacion->estado='diagnostico';
        $reparacion->dniCliente=$request->cliente;
        $reparacion->patente=$request->vehiculo;
        
        $reparacion->save();

        return redirect('/reparaciones/agregarOrdenTrabajo/'.$reparacion->id);
    }

    public function cancelar(Request $request)
    {
       Reparacion::destroy($request->idReparacion);
        
    }


    public function comprobante($id)
    {
        $reparacion=Reparacion::where('id',$id)->get();
        $ordenesTrabajo=$reparacion[0]->ordenesTrabajo;
        $tareas=[];
        $i=0;
        $totalprecio=0;
        $totalHoras=0;
        foreach ($ordenesTrabajo as $key => $ordenTrabajo) {
            foreach ($ordenTrabajo->tareas as $key2 => $tarea) {
                $tareas[$i]=$tarea;
                $totalprecio=$tarea->precio+$totalprecio;
                $totalHoras=$tarea->accion->horas+$totalHoras;
                $i=$i+1;
            }
            
        }

     
        return view('comprobante', ['reparacion' => $reparacion,'tareas'=> $tareas,'totalHoras'=>$totalHoras,'totalprecio'=>$totalprecio]);

        $data = [
            'title' => 'Welcome to ItSolutionStuff.com',
            'date' => date('m/d/Y')
                ];
                
        $pdf = PDF::loadView('myPDF', $data);
        $pdf = PDF::loadView('myPDF', $data);
        return $pdf->download('itsolutionstuff.pdf');
    
    }
}
