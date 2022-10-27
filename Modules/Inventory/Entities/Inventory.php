<?php

namespace Modules\Inventory\Entities;

use Illuminate\Database\Eloquent\Model;use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inventory extends Model
{

    protected $table = 'products';


    protected $fillable = [
        'name',
        'description',
        'image',
        'stock',
        'stock_alert',
        'price',
        'cost',
        'type'
    ];

    protected $casts = [
        'name' => 'string',
        'description' => 'string',
        'image' => 'string',
        'stock' => 'integer',
        'stock_alert' => 'integer',
        'price' => 'float',
        'cost' => 'float',
        'type' => 'string'
    ];



}