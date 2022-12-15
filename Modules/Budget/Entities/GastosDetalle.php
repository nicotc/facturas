<?php

namespace Modules\Budget\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GastosDetalle extends Model
{
    use HasFactory;

    protected  $table = "gastos_detalles";

    protected $fillable = [
        'fecha',
        'gastos_id',
        'descripcion',
        'abono',
        'nota'
    ];


}
