<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RankingST extends Model
{
    use HasFactory;
    protected $table = 'ranking_slide'; // Nombre de la tabla
    protected $primaryKey = 'id'; // Nombre de la clave primaria

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'score',
        'date',
        'mode',
    ];
}
