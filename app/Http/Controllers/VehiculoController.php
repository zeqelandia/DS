<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehiculo;
use App\Models\Marca;
use App\Models\Modelo;
use App\Models\Cliente;
use Illuminate\Support\Facades\Validator;

class VehiculoController extends Controller
{
    public function obtenerVehiculo()
    {
        return view('vehiculos', ['vehiculos' => Vehiculo::paginate(7)]);
    }

    public function datosAgregarVehiculo(Request $request){
     
    
        if ($request->has('_token')) {
            $array=[];
            $array['marcas']  =  Marca ::all();
            $array['modelos'] =  Modelo ::all();
            $array['clientes']  =  Cliente ::all();

             return  response()->json($array);
        }
    
        // Que hacer si no tiene token
        // return view('vehiculos', ['vehiculos' => Vehiculo::paginate(7)]);
    }

    public function obtenerVehiculoCliente(Request $request)
    {
       
        if ($request->has('_token')) {
            $array=[];
            $array['vehiculos']  =  Vehiculo ::where('dniCliente',$request->id)->get();
             return  response()->json($array);
        }
    
    }

    public function agregarVehiculo(Request $request)
    {
      

        $validator = Validator::make($request->all(), [
            'patente'=> ['regex:/^[A-Z]{3}[0-9]{3}$/',
                    'unique:vehiculos,patente'],
            'año'=> 'required',
            'dniCliente'=> 'required',
            'id_marca'=> 'required',
            'id_modelo'=> 'required',
        ]);
    
        if ($validator->fails()) {
            $marcas =  Marca ::all();
            $modelos =  Modelo ::all();
            $clientes  =  Cliente ::all();
            session()->flash('errorEnCargar', true);
            session()->flash('marcas', $marcas);
            session()->flash('modelos',  $modelos);
            session()->flash('clientes', $clientes);
            return redirect('vehiculos')
                        ->withErrors($validator)
                        ->withInput();
        }

        $atributos=$validator->valid();
        unset($atributos['_token']);
        Vehiculo::create($atributos);

        return redirect('vehiculos');

    }

    public function cambiarTitularidadForm($id)
    {
        session()->flash('idVehiculo',$id);
       $vehiculo=Vehiculo::where('id',$id)->first();
       $idCliente=$vehiculo->cliente->id;
       $clientes = Cliente::all()->except($idCliente);
        return view('cambiarTitularidad',['vehiculo'=>$vehiculo,'clientes'=>$clientes]);
    }

    public function cambiarTitularidad(Request $request)
    {
        $id=session()->get('idVehiculo');
        $vehiculo=Vehiculo::where('id',$id)->first();
       if ( $vehiculo!=null) {

        $vehiculo->dniCliente=$request->cliente;
        $vehiculo->save();
            return redirect('vehiculos');
        
        }
        return back()->with('errorId','Hubo un error por favor reintente');
        }

    
}
