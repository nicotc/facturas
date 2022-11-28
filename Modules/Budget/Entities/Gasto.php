<?php

namespace Modules\Budget\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gasto extends Model
{
    use HasFactory;

    protected $fillable = [

        'numero_orden',
        'fecha',
        'proveedor',
        'descripcion',
        'total',
        'abono',
        'estado',
        'nota'


    ];

    protected static function newFactory()
    {
        return \Modules\Budget\Database\factories\GastoFactory::new();
    }
}