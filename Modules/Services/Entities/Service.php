<?php

namespace Modules\Services\Entities;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    // use HasFactory;

    protected $table = 'services';
    
    protected $fillable = [
        'name',
        'description',
    ];


    // protected static function newFactory()
    // {
    //     return \Modules\Services\Database\factories\ServiceFactory::new();
    // }
}