<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    use HasFactory;

     /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_libro', 'id_usuario','fecha_prestamo','fecha_devolucion_1','fecha_devolucion_2', 'estado'];
    public static $rules = [];


}
