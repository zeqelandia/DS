<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Rules\esEmpleado;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register');
    }
 
    public function store()
    {
    
    $dni=request()->all()['dni'];
    $atributos=request()->validate([
        'nombre'=> 'required',
        'apellido'=> 'required',
        'direccion'=> 'required',
        'telefono'=> 'required|numeric|digits:11',
        'email'=> 'required|email|unique:users,email',
        'nickname'=> 'required|min:5|unique:users,nickname',
        'password'=> 'required|min:8',
        'dni'=> 'required|numeric|digits:8|unique:users,dni|exists:empleados,dni',
        'legajo'=> ['required','numeric','digits:8', new esEmpleado($dni)],
      ]);
      unset($atributos['legajo']);
      User::create($atributos);

      session()->flash('mensajeUsuario','La cuenta a sido creada correctamente, por favor inicie sesión');

      return redirect('login');
    }
}
