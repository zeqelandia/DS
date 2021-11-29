<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class OrdenTrabajo extends Model
{
    use HasFactory;

    protected $fillable = [
        'estado',
        'porcentajeAvance',
        'horasTotales',
        'id_reparacion',
    ];

    public function reparacion()
    {
     return $this->belongsTo('App\Models\Reparacion','id_reparacion','id');
    }
    public function tareas()
    {
     return $this->hasMany('App\Models\Tarea','id_ordenTrabajo','id');
    }

}
