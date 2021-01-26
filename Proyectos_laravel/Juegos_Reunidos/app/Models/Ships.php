<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ships extends Model
{
    use HasFactory;

    protected $table = 'ships'; // Nombre de la tabla
    protected $primaryKey = 'id'; // Nombre de la clave primaria

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'image',
        'atk_speed',
        'atk_damage',
        'speed',
        'health',
        'bullet_type',

    ];

}
