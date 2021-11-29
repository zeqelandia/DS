<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reparacion extends Model
{
    use HasFactory;


    protected $fillable = [
        'fechaDeEntrada',
        'motivo',
        'kilometraje',
        'fechaDeSalida',
        'estado',
        'dniCliente',
        'patente',
    ];

    public function cliente()
    {
     return $this->belongsTo('App\Models\Cliente','dniCliente','dni');
    }

    public function ordenesTrabajo()
    {
     return $this->hasMany('App\Models\OrdenTrabajo','id_reparacion','id');
    }


}
