<?php

namespace Modules\Budget\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DesgloseExtras extends Model
{
    use HasFactory;

    public $table = 'desglose_extras';

    protected $fillable = [
            'numero_orden',
            'desglose_items',
            'cantidad',
            'descripcion',
            'precio_base',
            'precio_total',
    ];


}