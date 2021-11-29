<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea_Pieza extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_tarea',
        'id_pieza',
        'cantidad',
        'precio',
    ];
}
