<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Libro
 *
 * @property $id
 * @property $image
 * @property $nombre
 * @property $categoria
 * @property $ISBN
 * @property $autor
 * @property $editorial
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Libro extends Model
{

    public static $rules = [
		'nombre' => 'required',
		'categoria_id' => 'required',
		'ISBN' => 'required',
		'autor' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['image','nombre','categoria_id','ISBN','autor','editorial','archivo'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }


}
