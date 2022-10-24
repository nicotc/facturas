<?php

namespace Modules\Contact\Entities;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContactAddress extends Model
{
    // use HasFactory;

    protected $table = 'contacts_address';
    protected $fillable = [
            'contact_id',
            'address'
    ];

}