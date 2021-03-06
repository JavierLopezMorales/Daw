<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoostMM extends Model
{
    use HasFactory;

    protected $table = 'boost_m_m'; // Nombre de la tabla
    protected $primaryKey = 'id'; // Nombre de la clave primaria

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'amount',
        'icon',
        'selector',
    ];
}
