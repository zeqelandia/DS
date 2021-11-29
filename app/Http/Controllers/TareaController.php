<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarea;
use App\Models\Pieza;
use App\Models\Accion;
use App\Models\Tarea_Pieza;
use App\Models\OrdenTrabajo;
use Illuminate\Support\Facades\Auth;

class TareaController extends Controller
{
    public function completar(Request $request)
    {
            // no compruebo token por que no anda... habira que revisar que onda la seguridad

            $tarea = Tarea::find($request->idtarea)->update(['estado' => 'completada','id_nickname'=>Auth::id(),'fechaHora'=>now()->format('YYYY-MM-DD hh:ii:ss')]);
    }

    public function mostrarForm($id)
    {
    
        session()->flash('id_ordenTrabajo',$id);
        return view('agregarTarea', ['acciones' => Accion::all(),'piezas'=>Pieza::all()]);
    }

    public function agregarTarea(Request $request)
    {   

        session()->flash('id_ordenTrabajo',$request->id_ordenTrabajo);
        $data=$request->all();
        $tarea= new Tarea;
        $tarea->estado="no realizado";
        $tarea->id_ordenTrabajo=$data['ordenTrabajo'];
        $tarea->id_accion=$data['acciones'];
        $tarea->precio=$tarea->accion->precio;
        $tarea->save();

        $horasAccion=Accion::where('id',$data['acciones'])->get();
        $horasAccion=$horasAccion[0]->horas;

 
        $ordenTrabajo=OrdenTrabajo::find($data['ordenTrabajo']);
        $ordenTrabajo->horasTotales=$ordenTrabajo->horasTotales+$horasAccion;    
        $ordenTrabajo->save();

        $i=1;
        $precioPiezas=0;
        foreach ($data as $key => $value) {
            if($key == 'precio_N'.strval($i)){

            $idPieza="pieza_N".strval($i);
            $cantidad="cantidad_N".strval($i);
            $precio="precio_N".strval($i);
            $piezaUtilizar= new Tarea_pieza;
            $piezaUtilizar->id_tarea=$tarea->id;
            $piezaUtilizar->id_pieza=$request->$idPieza;
            $piezaUtilizar->cantidad=$request->$cantidad;
            $piezaUtilizar->precio=$request->$precio*$request->$cantidad;

            $precioPiezas=$precioPiezas+$piezaUtilizar->precio;

            $piezaUtilizar->save();
            $i=$i+1;
            }    
        }

        $tarea->precio=$tarea->precio+$precioPiezas;
        $tarea->save();

        
        return redirect('/reparaciones/agregarOrdenTrabajo/Orden/'.$data['ordenTrabajo']);

    }

    public function eliminarTarea(Request $request)
    {
        $tarea=Tarea::find($request->idtarea);
        
        $horasTareaEliminada=Accion::where('id',$tarea->id_accion)->get();
        $horasTareaEliminada=$horasTareaEliminada[0]->horas;

        $ordenTrabajo=$tarea->ordenTrabajo;
        $cantidadTotal=sizeof($ordenTrabajo->tareas);
 

        if($cantidadTotal<=1){
            $reparacion=$ordenTrabajo->reparacion;
            OrdenTrabajo::destroy($ordenTrabajo->id);

            if(sizeof($reparacion->ordenesTrabajo)<=1){
                $reparacion->estado='diagnostico';
                $reparacion->save();
            }
        }
        else{ 
            $porcentaje=$ordenTrabajo->porcentajeAvance;
            $tareasCompletadas=ceil($porcentaje*$cantidadTotal/100);
            $ordenTrabajo->porcentajeAvance=$tareasCompletadas/($cantidadTotal-1)*100;
            $ordenTrabajo->horasTotales=$ordenTrabajo->horasTotales-$horasTareaEliminada;
            Tarea::destroy($request->idtarea);
            $ordenTrabajo->save();
        }
    }

}
