<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;


class esEmpleado implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */

    private $dni;

    public function __construct($dni)
    {
        $this->dni = $dni;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
    
    
       $legajo = DB::table('empleados')->where('dni',$this->dni)->value('legajo');
       return $value==$legajo;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Error al validar empleado';
    }
}
