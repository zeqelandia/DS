<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrdenTrabajo;
use App\Models\Tarea;
use App\Models\Reparacion;
use Illuminate\Support\Facades\Auth;


class OrdenTrabajoController extends Controller
{
    public function obtenerOrdenTrabajos($id)
    {
        $reparacion= Reparacion::where('id',$id)->first();

        return view('ordenesDeTrabajo', ['ordenTrabajos' =>$reparacion->ordenesTrabajo,'reparacion'=>$reparacion]);
    }

    public function aceptar(Request $request)
    {

        //Habria que hacer los commits y rollback


            // no compruebo token por que no anda... habira que revisar que onda la seguridad
            OrdenTrabajo::find($request->idOrdenTrabajo)->update(['estado' => 'en proceso']);
            
            $ordenTrabajo = OrdenTrabajo::where('id',$request->idOrdenTrabajo)->get();

         
            // Hay que mejorarlo... esto busca las otras ordenes de trabajo de la reparacion
            $reparacion = $ordenTrabajo[0]->reparacion;
            if($reparacion->estado=="diagnostico"){
            Reparacion::find($reparacion->id)->update(['estado' => "en proceso"]);            
            }
           
    }

    public function completarTarea(Request $request)
    {
            // Acualizo el porcentaje de avance
            $tarea = Tarea::where('id',$request->idTarea)->get();
            
            $ordenTrabajo= OrdenTrabajo::where('id',$tarea[0]->ordenTrabajo->id)->get();

            $cantidadTotalTareas=sizeof($ordenTrabajo[0]->tareas);
            $porcentaje=$ordenTrabajo[0]->porcentajeAvance;

            $cantidaCompletaTareas=ceil($porcentaje*$cantidadTotalTareas/100)+1;
            
            $porcentaje=$cantidaCompletaTareas/$cantidadTotalTareas*100;
            
            if($porcentaje>=100){
                OrdenTrabajo::find($ordenTrabajo[0]->id)->update(['porcentajeAvance' => $porcentaje,'estado'=>'completado']);
            }
            else{
                OrdenTrabajo::find($ordenTrabajo[0]->id)->update(['porcentajeAvance' =>$porcentaje]);
            }
        

            // Modificar esto es para comprobar que las reparaciones tiene todas las ordenes de trabajo completas
            if($cantidaCompletaTareas/$cantidadTotalTareas*100>=100.0){
              
                $reparacion = $ordenTrabajo[0]->reparacion;
               
                $todasOrdenesTrabajo= $reparacion->ordenesTrabajo;
                $completado = true;
                foreach ($todasOrdenesTrabajo as $orden) {
                    if($orden->porcentajeAvance<100){
                        $completado=false;
                    }
                }
                
                if($completado){
                    Reparacion::find($reparacion->id)->update(['estado' => 'completado','fechaDeSalida'=>now()->format('Y-m-d h:i:s')]);            
                    }
                
            }

              // no compruebo token por que no anda... habira que revisar que onda la seguridad
              Tarea::find($request->idTarea)->update(['estado' => 'completada','id_nickname'=>Auth::id(),'fechaHora'=>now()->format('Y-m-d h:i:s')]);

    }


    public function formAgregar($id)
    {
    
        $reparacion = Reparacion::where('id',$id)->get();
        $reparacion=$reparacion[0];

        $ordenTrabajo=OrdenTrabajo::where('id',session()->get('id_ordenTrabajo'))->first();

        if($ordenTrabajo==null){
        $ordenTrabajo = new OrdenTrabajo;
        $ordenTrabajo->id_reparacion=$id;
        $ordenTrabajo->estado='pendiente';

        $ordenTrabajo->save();
        }
        session()->flash('id_ordenTrabajo', $ordenTrabajo->id);

        return view('generarOrdenDeTrabajo',['reparacion' => $reparacion,'tareas'=>$ordenTrabajo->tareas]);

    }

    public function cancelar(Request $request)
    {

        if ( $request->session()->get('id_ordenTrabajo')) {
            OrdenTrabajo::destroy( $request->session()->get('id_ordenTrabajo'));
            return redirect('/reparaciones');
        }
        else {
            // Con error que reintente, deberia volverlo a genear orden de trabajo de esa reparacion
            return redirect('/reparaciones');
        }
       
    }

    public function cancelaVista(Request $request)
    {
        $data=$request->all();
     
            OrdenTrabajo::destroy($data['idOrdenTrabajo']);
       
    }
    public function volverAgregar($id)
    {
        $ordenTrabajo=OrdenTrabajo::where('id',$id)->get();
        $ordenTrabajo=$ordenTrabajo[0];
        $reparacion=$ordenTrabajo->reparacion;

    
        session()->flash('id_ordenTrabajo', $ordenTrabajo->id);
        
        return redirect('reparaciones/agregarOrdenTrabajo/'.$reparacion->id)
        ->withInput(['reparacion' => $reparacion,'tareas'=>$ordenTrabajo->tareas]);
    }
}
