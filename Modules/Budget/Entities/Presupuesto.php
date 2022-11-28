<?php

namespace Modules\Budget\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Presupuesto extends Model
{
    use HasFactory;

   public $table = "presupuesto";

    protected $fillable = [
        'modelo',
        'desglose_items',
        'numero_orden',
        'descripcion',
        'area',
        'cantidad',
        'precio_unitario',
        'total'
    ];

}