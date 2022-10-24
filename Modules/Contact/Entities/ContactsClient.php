<?php

namespace Modules\Contact\Entities;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContactsClient extends Model
{
    // use HasFactory;

    protected $table = 'contacts_clients';

    protected $fillable = [
            'contact_id',
            'type',
            'rif',
            'name',
            'phone',
            'email',
            'address'
    ];



}