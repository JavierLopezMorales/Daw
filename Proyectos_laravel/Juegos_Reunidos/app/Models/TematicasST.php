<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TematicasST extends Model
{
  use HasFactory;

    protected $table = 'tematicas_slide'; // Nombre de la tabla
    protected $primaryKey = 'id'; // Nombre de la clave primaria

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type',
        'name',
        'description',
        'img_fondo',
        'img_puzzle',
        
    ];
}
