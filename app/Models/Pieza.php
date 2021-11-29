<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Fabricante;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pieza extends Model
{
    use HasFactory;


    public function fabricante()
    {
     return $this->belongsTo('App\Models\Fabricante', 'id_fabricante');
    }

    public function tarea()
    {
        return $this->belongsToMany(Tarea::class,'tarea__piezas','id_pieza','id_tarea');
    }
}
