<?php

namespace Modules\Budget\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DesgloseDesglose extends Model
{
    use HasFactory;

    public $table  = "desglose_desglose";
    protected $fillable = [
        'numero_orden',
        'desglose_items',
        'cantidad',
        'material',
        'descripcion',
        'precio_base',
        'precio_total',
        'precio_base_proyectado',
        'precio_total_proyectado',
    ];


}