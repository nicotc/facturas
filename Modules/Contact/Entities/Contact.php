<?php

namespace Modules\Contact\Entities;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends Model
{
    // use HasFactory;

    protected $fillable = [
            'name',
            'last_name',
            'gender',
            'email',
            'phone_home',
            'phone_mobile',
            'address',
            'notes',
            'type'
    ];

    public function getFullNameAttribute($value)
    {
        return $this->name . ' ' . $this->last_name;
    }

    // protected static function newFactory()
    // {
    //     return \Modules\Contact\Database\factories\ContactFactory::new();
    // }
}
