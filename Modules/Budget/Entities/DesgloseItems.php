<?php

namespace Modules\Budget\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DesgloseItems extends Model
{
    use HasFactory;

    public $table= "desglose_items";

    protected $fillable = [
        'numero_orden',
        'descripcion',
        'area',
        'cantidad',
        'precio_unitario',
        'total'
    ];


}