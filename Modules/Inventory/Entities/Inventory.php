<?php

namespace Modules\Inventory\Entities;

use Illuminate\Database\Eloquent\Model;use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inventory extends Model
{

    protected $table = 'inventories';


    protected $fillable = [
        'name',
        'description',
        'image',
        'quantity',
        'alert_quantity',
        'price',
        'cost',
    ];
    


}