<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    use HasFactory;
    protected $fillable = [
        'fechaHora',
        'estado',
        'precio',
        'id_ordenTrabajo',
        'id_accion',
        'id_nickname',
    ];


    public function pieza()
    {
     return $this->belongsToMany(Pieza::class,'tarea__piezas','id_tarea','id_pieza')->withPivot('cantidad', 'precio');
    }

    public function ordenTrabajo()
    {
        return $this->belongsTo(OrdenTrabajo::class, 'id_ordenTrabajo', 'id');
    }

    public function accion()
    {
        return $this->belongsTo(Accion::class, 'id_accion', 'id');
    }

    

}
