<?php

namespace Modules\Budget\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Abono extends Model
{
    use HasFactory;

    public $table = "abonados";

    protected $fillable = [
        'fecha',
        'numero_orden',
        'descripcion',
        'abonado',
        'forma_pago',
        'numero_referencia'
    ];


}